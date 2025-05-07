<?php

declare(strict_types=1);

namespace App\Enums;

enum CategoryTypes: string
{
    case INCOME = 'income';
    case EXPENSE = 'expense';

    public static function toArray(): array
    {
        return [
            'income' => trans('category.types.' . self::INCOME->value),
            'expense' => trans('category.types.' . self::EXPENSE->value),
        ];
    }
}
