<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Priority extends Enum
{
    const low =   0;
    const middle =   1;
    const high = 2;

    public static function getPriority(int $value): string
    {
        switch ($value) {
            case self::low:
                return 'کم';
                break;
            case self::middle:
                return 'متوسط';
                break;
            case self::high:
                return 'زیاد';
                break;
            default:
                return self::getKey($value);
        }
    }
}
