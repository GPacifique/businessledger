<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Transaction extends Model
{
    protected $fillable = [
        'transaction_number',
        'account_id',
        'transaction_category_id',
        'type',
        'amount',
        'transaction_date',
        'description'
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function category()
    {
        return $this->belongsTo(TransactionCategory::class,
            'transaction_category_id');
    }
}