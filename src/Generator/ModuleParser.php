<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator;

use Brightspace\Bds\Schema\Entity\DatasetModule;
use Gadget\Io\DOM;

final class ModuleParser
{
    /** @var string[] */
    private const INVALID_H2_VALUES = [
        "About Availability Type",
        "Entity Relationship Diagram",
        "Deleting Outcome Objects",
        "Sample join",
        "Tool-Specific Object Lookup"
    ];

    /** @var array<int,string> */
    private const BDS_COLUMN_MAP = [
        0 => 'versionHistory',
        1 => 'name',
        2 => 'description',
        3 => 'type',
        4 => 'size',
        5 => 'key'
    ];


    /**
     * @param DatasetModule $module
     * @param non-empty-string $contents
     * @return array<string,array<string,mixed>>
     */
    public function parseModule(
        DatasetModule $module,
        string $contents
    ): array {
        $datasets = [];

        $document = DOM::loadHTML($contents);
        $datasetNodes = $this->collectDatasetNodes($document);
        foreach ($datasetNodes as list('h2' => $h2, 'p' => $p, 'table' => $table)) {
            $moduleDataset = DOM::cleanNodeValue($h2);
            $datasetName = (string) preg_replace('/[^a-zA-Z0-9 ]+/', '', $moduleDataset);
            $datasets[$moduleDataset] = [
                "name" => str_replace(' ', '', $datasetName),
                "moduleName" => $moduleDataset,
                "sqlTableName" => 'D2L_' . str_replace(' ', '_', strtoupper($datasetName)),
                "url" => $module->url . '#' . str_replace(' ', '-', strtolower($moduleDataset)),
                "description" => $this->getDatasetDescription($p),
                "columns" => $this->getDatasetColumns($table)
            ];
        }

        return $datasets;
    }


    /**
     * @param \DOMDocument $document
     * @return array{h2:\DOMNode,p:\DOMNode[],table:\DOMNode}[]
     */
    private function collectDatasetNodes(\DOMDocument $document): array
    {
        /** @var array{h2:\DOMNode,p:\DOMNode[],table:\DOMNode}[] $datasetNodes */
        $datasetNodes = [];
        /** @var array{h2:\DOMNode,p:\DOMNode[],table:\DOMNode|null}|null $current */
        $current = null;

        $article = $this->findArticleNode($document);
        foreach (DOM::childNodes($article) as $item) {
            switch (strtolower($item->nodeName)) {
                case 'h2':
                    if ($this->isValidH2($item)) {
                        if ($current === null) {
                            $current = ['h2' => $item, 'p' => [], 'table' => null];
                        } else {
                            $current['h2'] = $item;
                        }
                    }
                    break;
                case 'p':
                    if (is_array($current)) {
                        $current['p'][] = $item;
                    }
                    break;
                case 'table':
                    if (is_array($current) && count(DOM::findChildrenByName($item, 'thead')) > 0) {
                        $datasetNodes[] = [...$current, 'table' => $item];
                        $current = null;
                    }
                    break;
            }
        }

        return $datasetNodes;
    }


    /**
     * @param \DOMDocument $document
     * @return \DOMNode
     */
    private function findArticleNode(\DOMDocument $document): \DOMNode
    {
        // Collect all nodes at path '#fallbackPageContent > main > section > div'
        $nodes = DOM::findChildrenByName(
            DOM::findChildByName(
                DOM::findChildByName(
                    DOM::getElementById(
                        $document,
                        'fallbackPageContent'
                    ),
                    'main'
                ),
                'section'
            ),
            'div'
        );

        // Return first <article> child node
        foreach ($nodes as $node) {
            foreach (DOM::nodeAttributes($node) as $name => $attr) {
                if ($name === "class" && str_contains($attr->nodeValue ?? '', "mainColumn")) {
                    return DOM::findChildByName(
                        $node,
                        'article'
                    );
                }
            }
        }

        throw new \RuntimeException();
    }


    /**
     * @param \DOMNode $item
     * @return bool
     */
    private function isValidH2(\DOMNode $item): bool
    {
        $nodeValue = DOM::cleanNodeValue($item);
        foreach (self::INVALID_H2_VALUES as $invalidValue) {
            if (str_contains($nodeValue, $invalidValue)) {
                return false;
            }
        }
        return true;
    }


    /**
     * @param \DOMNode[] $p
     * @return string
     */
    private function getDatasetDescription(array $p): string
    {
        return implode(" ", array_filter(
            array_map(
                fn(\DOMNode $node) => DOM::cleanNodeValue($node),
                $p
            ),
            fn(string $v): bool => !in_array(
                strtolower($v),
                ['', 'about', 'returned fields', 'available filters'],
                true
            )
        ));
    }


    /**
     * @param \DOMNode $table
     * @return mixed[]
     */
    private function getDatasetColumns(\DOMNode $table): array
    {
        $columns = [];

        $tableRows = DOM::findChildrenByName(
            DOM::findChildByName($table, 'tbody'),
            'tr'
        );

        foreach ($tableRows as $tableRow) {
            $tableRowValues = [];

            $tableCells = DOM::findChildrenByName($tableRow, 'td');

            $columnMap = match (count($tableCells)) {
                6 => self::BDS_COLUMN_MAP,
                default => throw new \RuntimeException("Invalid dataset type")
            };

            foreach ($tableCells as $idx => $tableCell) {
                $p = DOM::findChildrenByName($tableCell, 'p');
                $tableRowValues[$columnMap[$idx]] = implode(" ", array_filter(
                    array_map(
                        fn(\DOMNode $n) => DOM::cleanNodeValue($n),
                        (count($p) > 0) ? $p : [$tableCell]
                    ),
                    fn($p) => $p !== ''
                ));
            }

            $columns[] = $tableRowValues;
        }

        return $columns;
    }
}
