<?php

namespace App\Enums;

use BenSampo\Enum\Enum;


final class PlanType extends Enum
{
    const normal =   1;
    const start =   2;
    const suggest =   3;

    public static function getPlanType(int $value): string
    {
        switch ($value) {
            case self::normal:
                return 'عادی';
                break;
            case self::start:
                return 'شروع';
                break;
            case self::suggest:
                return 'پیشنهادی';
                break;
            default:
                return self::getKey($value);
        }
    }
}
