<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Entity;

final class Dataset implements \JsonSerializable
{
    /**
     * @param string $name
     * @param string $moduleName
     * @param string $sqlTableName
     * @param string $url
     * @param string $description
     * @param array<string,DatasetColumn> $columns
     */
    public function __construct(
        public string $name,
        public string $moduleName,
        public string $sqlTableName = '',
        public string $apiName = '',
        public string $entityName = '',
        public string $tableName = '',
        public string $url = '',
        public string $description = '',
        public array $columns = []
    ) {
    }


    /** @inheritdoc */
    public function jsonSerialize(): mixed
    {
        return [
            'name' => $this->name,
            'moduleName' => $this->moduleName,
            'sqlTableName' => $this->sqlTableName,
            'url' => $this->url,
            'description' => $this->description,
            'columns' => array_values($this->columns)
        ];
    }
}
