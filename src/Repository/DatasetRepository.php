<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Repository;

use Brightspace\Bds\Schema\Factory\DatasetFactory;
use Brightspace\Bds\Schema\Entity\Dataset;
use Gadget\Store\JSONFileObjectStore;

/** @extends JSONFileObjectStore<Dataset> */
final class DatasetRepository extends JSONFileObjectStore
{
    /** @var array<string,string> $moduleNameIndex */
    private array $moduleNameIndex = [];


    /**
     * @param DatasetFactory $datasetFactory
     * @param string|null $path
     */
    public function __construct(
        DatasetFactory $datasetFactory,
        string|null $path = null
    ) {
        parent::__construct(
            $datasetFactory,
            fn (Dataset $element): string => $element->name,
            $path ?? __DIR__ . '/../Resources/datasets.json'
        );
    }


    /** @inheritdoc */
    public function load(): bool
    {
        return parent::load() && $this->buildModuleNameIndex();
    }


    /** @inheritdoc */
    public function key(string|object $keyOrElement): string
    {
        return is_object($keyOrElement)
            ? parent::key($keyOrElement)
            : ($this->moduleNameIndex[$keyOrElement] ?? strval($keyOrElement));
    }


    /** @inheritdoc */
    public function save(object $element): bool
    {
        return parent::save($element) && $this->buildModuleNameIndex();
    }


    /** @inheritdoc */
    public function delete(string|object $keyOrElement): bool
    {
        return parent::delete($keyOrElement) && $this->buildModuleNameIndex();
    }


    /**
     * @return bool
     */
    private function buildModuleNameIndex(): bool
    {
        $this->moduleNameIndex = array_flip(array_map(
            fn (Dataset $dataset): string => $dataset->moduleName,
            iterator_to_array($this)
        ));
        return true;
    }
}
