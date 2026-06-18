<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Bill extends Model
{
    protected $fillable = [
        'business_id',
        'bill_number',
        'customer_name',
        'customer_email',
        'customer_phone',
        'customer_address',
        'bill_date',
        'due_date',
        'status',
        'subtotal',
        'tax_amount',
        'tax_rate',
        'discount_amount',
        'total',
        'notes',
        'created_by',
        'qr_code',
    ];

    protected function casts(): array
    {
        return [
            'bill_date' => 'date',
            'due_date' => 'date',
            'subtotal' => 'decimal:2',
            'tax_amount' => 'decimal:2',
            'tax_rate' => 'decimal:2',
            'discount_amount' => 'decimal:2',
            'total' => 'decimal:2',
        ];
    }

    public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class);
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function lineItems(): HasMany
    {
        return $this->hasMany(BillItem::class);
    }

    public static function generateBillNumber(): string
    {
        $latestBill = self::latest('id')->first();
        $number = $latestBill ? (int) str_replace('BILL-', '', $latestBill->bill_number) + 1 : 1001;
        return 'BILL-' . str_pad($number, 6, '0', STR_PAD_LEFT);
    }

    public function scopeForBusiness($query, $businessId)
    {
        return $query->where('business_id', $businessId);
    }

    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public function calculateTotals()
    {
        $subtotal = $this->lineItems()->sum('total');
        $this->subtotal = $subtotal;
        $this->tax_amount = $subtotal * ($this->tax_rate / 100);
        $this->total = $subtotal + $this->tax_amount - $this->discount_amount;
        $this->save();
    }
}
