<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class UserType extends Enum
{
    const user =   1;
    const admin = 2;
    const superAdmin = 3;

    public static function getUserType(int $value): string
    {
        switch ($value) {
            case self::user:
                return 'کاربر عادی';
                break;
            case self::admin:
                return 'ادمین';
                break;
            case self::superAdmin:
                return 'ادمین اصلی';
                break;

            default:
                return self::getKey($value);
        }
    }

}
