<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Command;

use Brightspace\Bds\Schema\Generator\SchemaGenerator;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand('brightspace:bds:update-datasets')]
final class UpdateDatasetsCommand extends Command
{
    /**
     * @param SchemaGenerator $schemaGenerator
     */
    public function __construct(private SchemaGenerator $schemaGenerator)
    {
        parent::__construct();
    }


    /** @inheritdoc */
    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ): int {
        $this->schemaGenerator->generateDatasets($output->writeln(...));
        return self::SUCCESS;
    }
}
