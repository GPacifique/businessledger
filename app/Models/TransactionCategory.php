<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'description',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    /**
     * Transactions belonging to this category.
     */
    public function transactions()
    {
        return $this->hasMany(
            Transaction::class,
            'transaction_category_id'
        );
    }

    /**
     * Total amount for this category.
     */
    public function totalAmount()
    {
        return $this->transactions()->sum('amount');
    }
}
