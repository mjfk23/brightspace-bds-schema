<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Entity;

enum DatasetColumnType: string
{
    case BIGINT = 'bigint';
    case BIT = 'bit';
    case DATETIME2 = 'datetime2';
    case DECIMAL = 'decimal';
    case FLOAT = 'float';
    case INT = 'int';
    case NVARCHAR = 'nvarchar';
    case SMALLINT = 'smallint';
    case VARCHAR = 'varchar';
    case UNIQUEIDENTIFIER = 'uniqueidentifier';


    /**
     * @param string|self $value
     * @return self
     */
    public static function getType(string|self $value): self
    {
        if ($value instanceof self) {
            return $value;
        }

        $value = strtolower($value);
        return match ($value) {
            'integer' => static::INT,
            'navchar' => static::NVARCHAR,
            'datetime' => static::DATETIME2,
            default => static::from($value)
        };
    }
}
