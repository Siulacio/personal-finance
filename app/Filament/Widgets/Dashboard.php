<?php

namespace App\Filament\Widgets;

use App\Const\HeroIcons;
use App\Enums\CategoryTypes;
use App\Models\{Category, Transaction, User};
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Str;

class Dashboard extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            $this->getUserStat(),
            $this->getCategoryStat(),
            $this->getTransactionStat(),
        ];
    }

    private function getUserStat(): Stat
    {
        return Stat::make(Str::plural(trans('user.entity')), User::query()->count())
            ->icon(HeroIcons::USERS)
            ->description(trans('user.stats.total'));
    }

    private function getCategoryStat(): Stat
    {
        return Stat::make(Str::plural(trans('category.entity')), Category::query()->count())
            ->icon(HeroIcons::RECTANGLE_STACK)
            ->description(trans('category.stats.total'));
    }

    private function getTransactionStat(): Stat
    {
        return Stat::make(Str::plural(trans('transaction.entity')), '$ ' . $this->getIncomeSum())
            ->icon(HeroIcons::CURRENCY_DOLAR)
            ->description(trans('transaction.stats.income_total'));
    }

    private function getIncomeSum(): int
    {
        return Transaction::query()
            ->where('type', CategoryTypes::INCOME->value)
            ->sum('amount');
    }
}
