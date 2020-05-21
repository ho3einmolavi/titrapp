<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class TicketStatus extends Enum
{
    const waiting =   0;
    const customeAnswere =   1;
    const adminAnswere = 2;
    const closed = 3;

    public static function getTicketStatus(int $value): string
    {
        switch ($value) {
            case self::waiting:
                return 'در انتظار پاسخ';
                break;
            case self::customeAnswere:
                return 'پاسخ مشتری';
                break;
            case self::adminAnswere:
                return 'پاسخ داده شده';
                break;
            case self::closed:
                return 'بسته شده';
                break;
            default:
                return self::getKey($value);
        }
    }
}
