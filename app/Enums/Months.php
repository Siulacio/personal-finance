<?php

declare(strict_types=1);

namespace App\Enums;

enum Months: string
{
    case JANUARY = 'January';
    case FEBRUARY = 'February';
    case MARCH = 'March';
    case APRIL = 'April';
    case MAY = 'May';
    case JUNE = 'June';
    case JULY = 'July';
    case AUGUST = 'August';
    case SEPTEMBER = 'September';
    case OCTOBER = 'October';
    case NOVEMBER = 'November';
    case DECEMBER = 'December';

    public static function toArray(): array
    {
        return [
            self::JANUARY->value => trans('generals.months.' . self::JANUARY->value),
            self::FEBRUARY->value => trans('generals.months.' . self::FEBRUARY->value),
            self::MARCH->value => trans('generals.months.' . self::MARCH->value),
            self::APRIL->value => trans('generals.months.' . self::APRIL->value),
            self::MAY->value => trans('generals.months.' . self::MAY->value),
            self::JUNE->value => trans('generals.months.' . self::JUNE->value),
            self::JULY->value => trans('generals.months.' . self::JULY->value),
            self::AUGUST->value => trans('generals.months.' . self::AUGUST->value),
            self::SEPTEMBER->value => trans('generals.months.' . self::SEPTEMBER->value),
            self::OCTOBER->value => trans('generals.months.' . self::OCTOBER->value),
            self::NOVEMBER->value => trans('generals.months.' . self::NOVEMBER->value),
            self::DECEMBER->value => trans('generals.months.' . self::DECEMBER->value),
        ];
    }
}
