<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator;

use Brightspace\Bds\Schema\Factory\DatasetFactory;
use Brightspace\Bds\Schema\Entity\Dataset;
use Brightspace\Bds\Schema\Repository\DatasetModuleRepository;
use Brightspace\Bds\Schema\Repository\DatasetRepository;
use Gadget\Io\Cast;
use Gadget\Io\File;

final class SchemaGenerator
{
    /**
     * @param DatasetModuleRepository $moduleRepository
     * @param DatasetRepository $datasetRepository
     * @param DatasetFactory $datasetFactory
     * @param ModuleLoader $moduleLoader
     * @param ModuleParser $moduleParser
     * @param EntityGenerator $entityGenerator
     */
    public function __construct(
        private DatasetModuleRepository $moduleRepository,
        private DatasetRepository $datasetRepository,
        private DatasetFactory $datasetFactory,
        private ModuleLoader $moduleLoader,
        private ModuleParser $moduleParser,
        private EntityGenerator $entityGenerator
    ) {
    }


    /** @inheritdoc */
    public function generateDatasets(callable|null $writeln = null): self
    {
        $this->moduleRepository->load();
        $this->datasetRepository->load();

        $writeln ??= fn () => 0;
        $available = [];

        foreach ($this->moduleRepository as $module) {
            try {
                $writeln($module->name);

                $datasets = Cast::toTypedMap(
                    $this->moduleParser->parseModule(
                        $module,
                        $this->moduleLoader->loadModule($module)
                    ),
                    $this->datasetFactory->create(...),
                    fn (Dataset $dataset) => $dataset->moduleName
                );

                foreach ($datasets as $dataset) {
                    $writeln(sprintf(
                        " %s %s",
                        in_array($dataset->moduleName, $module->datasets, true)
                            ? '~'
                            : '+',
                        $dataset->moduleName
                    ));
                }

                foreach ($module->datasets as $dataset) {
                    if (!isset($datasets[$dataset])) {
                        $writeln(sprintf(
                            " ! %s",
                            $dataset
                        ));
                    }
                }

                $module->datasets = array_keys($datasets);
                $this->moduleRepository->save($module);

                foreach ($datasets as $dataset) {
                    $current = $this->datasetRepository->get($dataset->moduleName)
                        ?? $dataset;
                    $current->url = $dataset->url;
                    $current->description = $dataset->description;
                    $current->columns = $dataset->columns;
                    $this->datasetRepository->save($current);

                    $available[$current->name] = $current->name;
                }
            } catch (\Throwable $t) {
                throw new \RuntimeException(
                    "{$module->name}: Error processing module: {$module->name}",
                    0,
                    $t
                );
            }
        }

        foreach ($this->datasetRepository as $dataset) {
            if (!isset($available[$dataset->name])) {
                // Remove orphan dataset
                $this->datasetRepository->delete($dataset->name);
            }
        }

        $this->moduleRepository->commit();
        $this->datasetRepository->commit();

        return $this;
    }


    /** @inheritdoc */
    public function generateEntities(callable|null $writeln = null): self
    {
        array_map(unlink(...), File::glob([
            __DIR__ . '/Entity/*.php',
            __DIR__ . '/Repository/*.php'
        ]));

        $this->datasetRepository->load();

        $writeln ??= fn () => 0;
        foreach ($this->datasetRepository as $dataset) {
            $writeln($dataset->name);
            list($entityClass, $repoClass) = $this->entityGenerator->generateEntity($dataset);
            $writeln("~ {$entityClass}");
            $writeln("~ {$repoClass}");
        }

        return $this;
    }
}
