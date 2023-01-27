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
}
