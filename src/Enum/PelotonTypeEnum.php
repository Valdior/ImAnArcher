<?php

namespace App\Enum;

enum PelotonTypeEnum: int
{
    case TYPE_18 = 1;
    case TYPE_25 = 2;
    case TYPE_50_30 = 3;
    case TYPE_50 = 4;
    case TYPE_70 = 5;
    case TYPE_1440 = 6;

    public function label(): string
    {
        return match ($this) {
            static::TYPE_18 => '18 m',
            static::TYPE_25 => '25 m',
            static::TYPE_50_30 => '50/30',
            static::TYPE_50 => '50',
            static::TYPE_70 => '70',
            static::TYPE_1440 => '1440',
        };
    }
}
