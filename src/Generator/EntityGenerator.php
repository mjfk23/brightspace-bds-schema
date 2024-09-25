<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator;

use Brightspace\Bds\Schema\Entity\Dataset;
use Brightspace\Bds\Schema\Entity\DatasetColumn;
use Brightspace\Bds\Schema\Entity\DatasetColumnType;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\UniqueConstraint;
use Symfony\Bundle\MakerBundle\FileManager;
use Symfony\Bundle\MakerBundle\Generator;
use Symfony\Bundle\MakerBundle\Util\ClassNameDetails;
use Symfony\Bundle\MakerBundle\Util\ClassSource\Model\ClassProperty;
use Symfony\Bundle\MakerBundle\Util\ClassSourceManipulator;

final class EntityGenerator
{
    /**
     * @param FileManager $fileManager
     * @param Generator $generator
     */
    public function __construct(
        private FileManager $fileManager,
        private Generator $generator
    ) {
    }


    /**
     * @param Dataset $dataset
     * @return array{string,string}
     */
    public function generateEntity(Dataset $dataset): array
    {
        $entityName = preg_replace('/[^a-zA-Z0-9]/', '', $dataset->name) ?? $dataset->name;
        $tableName = $dataset->sqlTableName;
        $columns = array_map(
            $this->createClassProperty(...),
            $dataset->columns
        );

        list(
            $entityClassDetails,
            $repoClassDetails
        ) = $this->createClassDetails($entityName);

        list($entityPath,) = $this->generateClasses(
            $entityClassDetails,
            $repoClassDetails,
            $tableName
        );

        $manipulator = new ClassSourceManipulator(
            sourceCode: $this->fileManager->getFileContents($entityPath),
            overwrite: true,
            useAttributesForDoctrineMapping: true
        );

        $manipulator->setClassDocComment([
            ...$this->createCommentLines(trim($dataset->description), 117),
            "",
            "@see {$dataset->url}"
        ]);

        $keys = array_values(array_filter($dataset->columns, fn(DatasetColumn $c) => $c->isPrimary));
        if (count($keys) > 0) {
            $manipulator->addAttributeToClass(UniqueConstraint::class, [
                'name' => "{$dataset->sqlTableName}_PUK",
                'columns' => array_map(fn($c) => $c->name, $keys)
            ]);
        }

        foreach ($columns as $column) {
            $manipulator->addEntityField($column);
        }

        $this->fileManager->dumpFile($entityPath, $manipulator->getSourceCode());

        return [
            $entityClassDetails->getFullName(),
            $repoClassDetails->getFullName()
        ];
    }


    /**
     * @param string $entityName
     * @return array{ClassNameDetails,ClassNameDetails}
     */
    private function createClassDetails(string $entityName): array
    {
        return [
            $this->createClassNameDetails(
                $entityName,
                'Generator\\Entity\\'
            ),
            $this->createClassNameDetails(
                $entityName,
                'Generator\\Repository\\',
                'Repository'
            )
        ];
    }


    /**
     * @param ClassNameDetails $entityClassDetails
     * @param ClassNameDetails $repoClassDetails
     * @param string $tableName
     * @return array{string,string}
     */
    private function generateClasses(
        ClassNameDetails $entityClassDetails,
        ClassNameDetails $repoClassDetails,
        string $tableName
    ): array {
        $paths = [
            $this->generator->generateClass(
                $entityClassDetails->getFullName(),
                dirname(__DIR__) . '/Resources/Template/Entity.tmpl',
                [
                    'repository_full_name' => $repoClassDetails->getFullName(),
                    'repository_short_name' => $repoClassDetails->getShortName(),
                    'table_name' => $tableName
                ]
            ),
            $this->generator->generateClass(
                $repoClassDetails->getFullName(),
                dirname(__DIR__) . '/Resources/Template/Repository.tmpl',
                [
                    'entity_full_name' => $entityClassDetails->getFullName(),
                    'entity_short_name' => $entityClassDetails->getShortName()
                ]
            )
        ];

        $this->generator->writeChanges();

        return $paths;
    }


    /**
     * @param string $name
     * @param string $namespacePrefix
     * @param string $suffix
     * @param string $validationErrorMessage
     * @return ClassNameDetails
     */
    private function createClassNameDetails(
        string $name,
        string $namespacePrefix,
        string $suffix = '',
        string $validationErrorMessage = ''
    ): ClassNameDetails {
        return $this->generator->createClassNameDetails(
            $name,
            $namespacePrefix,
            $suffix,
            $validationErrorMessage
        );
    }


    /**
     * @param DatasetColumn $column
     * @return ClassProperty
     */
    private function createClassProperty(DatasetColumn $column): ClassProperty
    {
        list($precision, $scale) = match ($column->type) {
            DatasetColumnType::BIGINT => ['20', null],
            DatasetColumnType::INT => ['10', null],
            DatasetColumnType::SMALLINT => ['5', null],
            DatasetColumnType::DECIMAL => [...explode(',', $column->size), null, null],
            default => [null, null]
        };

        return new ClassProperty(
            propertyName: lcfirst($column->name),
            type: match ($column->type) {
                DatasetColumnType::BIGINT => Types::BIGINT,
                DatasetColumnType::BIT => Types::BOOLEAN,
                DatasetColumnType::DATETIME2 => Types::DATETIMETZ_IMMUTABLE,
                DatasetColumnType::DECIMAL => Types::DECIMAL,
                DatasetColumnType::FLOAT => Types::FLOAT,
                DatasetColumnType::INT => Types::INTEGER,
                DatasetColumnType::NVARCHAR => Types::STRING,
                DatasetColumnType::SMALLINT => Types::SMALLINT,
                DatasetColumnType::VARCHAR => Types::STRING,
                DatasetColumnType::UNIQUEIDENTIFIER => Types::GUID
            },
            length: match ($column->type) {
                DatasetColumnType::NVARCHAR,
                DatasetColumnType::VARCHAR => min(intval(2 * max(1, intval($column->size))), 4000),
                default => null
            },
            precision: is_string($precision) ? intval($precision) : null,
            scale: is_string($scale) ? intval($scale) : null,
            nullable: !$column->isPrimary,
            comments: $this->createCommentLines($column->description, 113),
            name: $column->name
        );
    }


    /**
     * @param string $comment
     * @param int $length
     * @return string[]
     */
    private function createCommentLines(
        string $comment,
        int $length = 100
    ): array {
        $commentLines = [];
        $current = '';

        $tokens = explode(' ', $comment);
        foreach ($tokens as $token) {
            $new = trim("{$current} {$token}");
            if (strlen($new) > $length) {
                $commentLines[] = $current;
                $current = trim($token);
            } else {
                $current = $new;
            }
        }

        if (strlen($current) > 0) {
            $commentLines[] = $current;
        }

        return $commentLines;
    }
}
