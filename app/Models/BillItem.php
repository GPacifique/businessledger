<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BillItem extends Model
{
    protected $fillable = [
        'bill_id',
        'description',
        'quantity',
        'unit_price',
        'total',
    ];

    protected function casts(): array
    {
        return [
            'quantity' => 'decimal:2',
            'unit_price' => 'decimal:2',
            'total' => 'decimal:2',
        ];
    }

    public function bill(): BelongsTo
    {
        return $this->belongsTo(Bill::class);
    }

    protected static function booted(): void
    {
        static::saved(function (BillItem $item) {
            $item->total = $item->quantity * $item->unit_price;
            $item->saveQuietly();
            
            if ($item->bill) {
                $item->bill->calculateTotals();
            }
        });

        static::deleted(function (BillItem $item) {
            if ($item->bill) {
                $item->bill->calculateTotals();
            }
        });
    }
}
