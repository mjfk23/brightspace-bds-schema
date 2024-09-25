<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Entity;

final class DatasetColumn
{
    public string $name;
    public string $description;
    public DatasetColumnType $type;
    public string $size;
    public bool $isPrimary;
    public bool $isForeign;
    public bool $canBeNull;
    public string $versionHistory;


    /**
     * @param string $name
     * @param string $description
     * @param value-of<DatasetColumnType>|DatasetColumnType $type
     * @param string $size
     * @param bool $isPrimary
     * @param bool $isForeign
     * @param bool $canBeNull
     * @param string $versionHistory
     */
    public function __construct(
        string $name,
        string $description,
        string|DatasetColumnType $type,
        string $size,
        bool $isPrimary,
        bool $isForeign,
        bool $canBeNull,
        string $versionHistory,
    ) {
        $this->name = $name;
        $this->description = $description;
        $this->type = is_string($type) ? DatasetColumnType::from($type) : $type;
        $this->size = $size;
        $this->isPrimary = $isPrimary;
        $this->isForeign = $isForeign;
        $this->canBeNull = $canBeNull;
        $this->versionHistory = $versionHistory;
    }
}
