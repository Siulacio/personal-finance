<?php

declare(strict_types=1);

namespace App\Traits;

use App\Models\Transaction;

trait HasTransactionChartData
{
    private function getTransactionCharData(string $type): array
    {
        $transactions = Transaction::query()
            ->where('type', $type)
            ->selectRaw('MONTH(date) as month, SUM(amount) as total')
            ->groupBy('month')
            ->groupBy('month')
            ->get();

        $totalRevenue = array_fill(0, 12, 0);

        foreach ($transactions as $transaction) {
            $totalRevenue[$transaction->month - 1] = $transaction->total;
        }

        return $totalRevenue;
    }
}
