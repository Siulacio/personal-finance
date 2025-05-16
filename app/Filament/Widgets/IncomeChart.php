<?php

declare(strict_types=1);

namespace App\Filament\Widgets;

use App\Enums\{CategoryTypes, Months};
use App\Traits\HasTransactionChartData;
use Filament\Widgets\ChartWidget;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Str;

class IncomeChart extends ChartWidget
{
    use HasTransactionChartData;

    public function getHeading(): string|Htmlable|null
    {
        return trans('chart.income_report');
    }

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => Str::plural(trans('category.types.' . CategoryTypes::INCOME->value)),
                    'data' => $this->getTransactionCharData(CategoryTypes::INCOME->value),
                    'backgroundColor' => '#4CAF50',
                    'borderColor' => '#4CAF50',
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
