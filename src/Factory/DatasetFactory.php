<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Factory;

use Brightspace\Bds\Schema\Entity\Dataset;
use Brightspace\Bds\Schema\Entity\DatasetColumn;
use Gadget\Factory\AbstractFactory;
use Gadget\Io\Cast;

/** @extends AbstractFactory<Dataset> */
final class DatasetFactory extends AbstractFactory
{
    /**
     * @param DatasetColumnFactory $datasetColumnFactory
     */
    public function __construct(private DatasetColumnFactory $datasetColumnFactory)
    {
        parent::__construct(Dataset::class);
    }


    /** @inheritdoc */
    public function create(mixed $values): Dataset
    {
        $values = Cast::toArray($values);
        return new Dataset(
            name: Cast::toString($values['name'] ?? null),
            moduleName: Cast::toString($values['moduleName'] ?? null),
            sqlTableName: Cast::toString($values['sqlTableName'] ?? ''),
            url: Cast::toString($values['url'] ?? ''),
            description: Cast::toString($values['description'] ?? ''),
            columns: Cast::toTypedMap(
                $values['columns'] ?? [],
                $this->datasetColumnFactory->create(...),
                fn (DatasetColumn $column) => $column->name
            )
        );
    }
}
