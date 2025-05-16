<?php

namespace App\Filament\Widgets;

use App\Enums\CategoryTypes;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

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
        return Stat::make('Users', User::query()->count())
            ->icon('heroicon-o-users')
            ->description('Total de usuarios registrados');
    }

    private function getCategoryStat(): Stat
    {
        return Stat::make('Categories', Category::query()->count())
            ->icon('heroicon-o-rectangle-stack')
            ->description('Total de categorias disponibles');
    }

    private function getTransactionStat(): Stat
    {
        return Stat::make('Transactions', '$ ' . $this->getIncomeSum())
            ->icon('heroicon-o-currency-dollar')
            ->description('Total de ingresos');
    }

    private function getIncomeSum(): int
    {
        return Transaction::query()->where('type', CategoryTypes::INCOME->value)->sum('amount');
    }
}
