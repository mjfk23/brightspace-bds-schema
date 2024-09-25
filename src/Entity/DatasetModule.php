<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Entity;

final class DatasetModule implements \JsonSerializable
{
    /**
     * @param string $name
     * @param string $url
     * @param string[] $datasets
     */
    public function __construct(
        public string $name,
        public string $url,
        public array $datasets
    ) {
    }


    /** @inheritdoc */
    public function jsonSerialize(): mixed
    {
        return [
            'name' => $this->name,
            'url' => $this->url,
            'datasets' => array_values($this->datasets)
        ];
    }
}
