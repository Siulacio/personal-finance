<?php

namespace App\Models;

use App\Enums\CategoryTypes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    protected $fillable = [
        'type',
        'amount',
        'description',
        'image',
        'date',
        'user_id',
        'category_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    protected static function booted(): void
    {
        static::created(function ($transaction) {
            if ($transaction->type === CategoryTypes::EXPENSE->value) {
                $budget = Budget::query()
                    ->where('user_id', $transaction->user_id)
                    ->where('category_id', $transaction->category_id)
                    ->where('month', now()->format('F'))
                    ->where('year', now()->year)
                    ->first();

                if ($budget) {
                    $budget->spent_amount += $transaction->amount;
                    $budget->save();
                }
            }
        });
    }
}
