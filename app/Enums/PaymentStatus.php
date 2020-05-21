<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class PaymentStatus extends Enum
{
    const waiting =   1;
    const success = 2;
    const cancel = 3;
    const fail = 4;


    public static function getPaymentStatus(int $value): string
    {
        switch ($value) {
            case self::waiting:
                return 'در انتظار پرداخت';
                break;
            case self::success:
                return 'موفق';
                break;
            case self::cancel:
                return 'کنسل شده';
                break;
            case self::fail:
                return 'مشکل در پرداخت';
                break;
            default:
                return self::getKey($value);
        }
    }
    
}
