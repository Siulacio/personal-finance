<?php

namespace App\Filament\Widgets;

use App\Enums\{CategoryTypes, Months};
use App\Traits\HasTransactionChartData;
use Filament\Widgets\ChartWidget;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Str;

class ExpenseChart extends ChartWidget
{
    use HasTransactionChartData;

    public function getHeading(): string|Htmlable|null
    {
        return trans('chart.expense_report');
    }

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => Str::plural(trans('category.types.' . CategoryTypes::EXPENSE->value)),
                    'data' => $this->getTransactionCharData(CategoryTypes::EXPENSE->value),
                    'backgroundColor' => '#FF5733',
                    'borderColor' => '#FF5733',
                    'fill' => false,
                ],
            ],
            'labels' => Months::toPlainArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
