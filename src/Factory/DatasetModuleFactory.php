<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Factory;

use Brightspace\Bds\Schema\Entity\DatasetModule;
use Gadget\Factory\AbstractFactory;
use Gadget\Io\Cast;

/** @extends AbstractFactory<DatasetModule> */
final class DatasetModuleFactory extends AbstractFactory
{
    public function __construct()
    {
        parent::__construct(DatasetModule::class);
    }


    /**
     * @param mixed $values
     * @return DatasetModule
     */
    public function create(mixed $values): DatasetModule
    {
        $values = Cast::toArray($values);
        return new DatasetModule(
            name: Cast::toString($values['name'] ?? null),
            url: Cast::toString($values['url'] ?? null),
            datasets: Cast::toTypedMap(
                $values['datasets'] ?? [],
                Cast::toString(...),
                fn (string $dataset) => $dataset
            )
        );
    }
}
