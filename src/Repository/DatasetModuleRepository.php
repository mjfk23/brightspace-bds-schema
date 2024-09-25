<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Repository;

use Brightspace\Bds\Schema\Factory\DatasetModuleFactory;
use Brightspace\Bds\Schema\Entity\DatasetModule;
use Gadget\Store\JSONFileObjectStore;

/** @extends JSONFileObjectStore<DatasetModule> */
final class DatasetModuleRepository extends JSONFileObjectStore
{
    /**
     * @param DatasetModuleFactory $datasetModuleFactory
     * @param string|null $path
     */
    public function __construct(
        DatasetModuleFactory $datasetModuleFactory,
        string|null $path = null
    ) {
        parent::__construct(
            $datasetModuleFactory,
            fn(DatasetModule $element): string => $element->name,
            $path ?? __DIR__ . '/../Resources/modules.json'
        );
    }
}
