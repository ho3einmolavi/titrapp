<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class TicketType extends Enum
{
    const text =   0;
    const voice =   1;
    const image = 2;


    public static function getTicketType(int $value): string
    {
        switch ($value) {
            case self::text:
                return 'text';
                break;
            case self::voice:
                return 'voice';
                break;
            case self::image:
                return 'image';
                break;
            default:
                return self::getKey($value);
        }
    }
}
