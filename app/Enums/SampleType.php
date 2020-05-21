<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class SampleType extends Enum
{
    const image =   1;
    const video = 2;

    public static function getSampleType(int $value): string
    {
        switch ($value) {
            case self::image:
                return 'تصویر';
                break;
            case self::video:
                return 'ویدیو';
                break;
            default:
                return self::getKey($value);
        }
    }

}
