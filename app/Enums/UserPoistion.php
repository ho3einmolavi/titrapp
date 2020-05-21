<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class UserPoistion extends Enum
{
    const mainpage =   1;
    const sidebar = 2;

    public static function getUserPosition(int $value): string
    {
        switch ($value) {
            case self::mainpage:
                return 'صفحه اصلی';
                break;
            case self::sidebar:
                return 'منو سمت چپ';
                break;
            default:
                return self::getKey($value);
        }
    }

}
