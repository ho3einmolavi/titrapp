<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class PaymentType extends Enum
{
    const course =   1;
    const vip = 2;

    public static function getPaymentType(int $value): string
    {
        switch ($value) {
            case self::course:
                return 'خرید آموزش';
                break;
            case self::vip:
                return 'خرید عضویت ویژه';
                break;
            default:
                return self::getKey($value);
        }
    }
}
