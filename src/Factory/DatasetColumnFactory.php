<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Factory;

use Brightspace\Bds\Schema\Entity\DatasetColumn;
use Brightspace\Bds\Schema\Entity\DatasetColumnType;
use Gadget\Factory\AbstractFactory;
use Gadget\Io\Cast;

/** @extends AbstractFactory<DatasetColumn> */
final class DatasetColumnFactory extends AbstractFactory
{
    public function __construct()
    {
        parent::__construct(DatasetColumn::class);
    }


    /** @inheritdoc */
    public function create(mixed $values): DatasetColumn
    {
        $values = Cast::toArray($values);

        $key = strtoupper(Cast::toString($values['key'] ?? ''));
        $isPrimary = Cast::toBool($values['isPrimary'] ?? str_contains($key, 'PK'));
        $isForeign = Cast::toBool($values['isForeign'] ?? str_contains($key, 'FK'));

        $description = Cast::toString($values['description'] ?? '');
        $canBeNull = Cast::toBool(
            $values['canBeNull']
                ?? str_contains(strtolower($description), 'field can be null')
        );
        if ($canBeNull === true && !str_contains(strtolower($description), "field can be null")) {
            $description .= " Field can be null.";
        }

        return new DatasetColumn(
            name: Cast::toString($values['name'] ?? null),
            description: $description,
            type: DatasetColumnType::from(Cast::toString($values['type'] ?? null)),
            size: Cast::toString($values['size'] ?? null),
            isPrimary: $isPrimary,
            isForeign: $isForeign,
            canBeNull: $canBeNull,
            versionHistory: Cast::toString($values['versionHistory'] ?? '')
        );
    }
}
