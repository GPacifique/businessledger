<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Expense extends Model
{
    protected $fillable = [
        'business_id',
        'category_id',
        'created_by',
        'title',
        'description',
        'amount',
        'date',
        'reference_number',
        'payment_method',
        'vendor',
        'attachment',
        'notes',
        'is_recurring',
        'recurring_frequency',
    ];

    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
            'date' => 'date',
            'is_recurring' => 'boolean',
        ];
    }

    public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function scopeForBusiness($query, $businessId)
    {
        return $query->where('business_id', $businessId);
    }

    public function scopeDateBetween($query, $startDate, $endDate)
    {
        return $query->whereBetween('date', [$startDate, $endDate]);
    }

    public function scopeThisMonth($query)
    {
        return $query->whereMonth('date', now()->month)
                     ->whereYear('date', now()->year);
    }

    public function scopeThisYear($query)
    {
        return $query->whereYear('date', now()->year);
    }

    public function scopeRecurring($query)
    {
        return $query->where('is_recurring', true);
    }

    /**
     * Generate a unique reference number for expense
     * Format: EXP-YYYYMMDD-XXXXX
     */
    public static function generateReferenceNumber(): string
    {
        $date = now()->format('Ymd');
        $prefix = 'EXP-' . $date . '-';

        // Get the last expense with this prefix
        $lastExpense = self::where('reference_number', 'like', $prefix . '%')
            ->orderBy('reference_number', 'desc')
            ->first();

        if ($lastExpense) {
            // Extract the number and increment
            $lastNumber = (int) substr($lastExpense->reference_number, -5);
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        return $prefix . str_pad($newNumber, 5, '0', STR_PAD_LEFT);
    }
}
