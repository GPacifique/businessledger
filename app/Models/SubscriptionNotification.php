<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubscriptionNotification extends Model
{
    protected $fillable = [
        'subscription_id',
        'user_id',
        'type',
        'sent_at',
        'is_read',
        'read_at',
    ];

    protected function casts(): array
    {
        return [
            'sent_at' => 'datetime',
            'read_at' => 'datetime',
            'is_read' => 'boolean',
        ];
    }

    public function subscription(): BelongsTo
    {
        return $this->belongsTo(Subscription::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function markAsRead(): void
    {
        $this->update([
            'is_read' => true,
            'read_at' => now(),
        ]);
    }

    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }

    public function getMessageAttribute(): string
    {
        $business = $this->subscription->business->name;

        return match($this->type) {
            '7_days' => __('messages.subscription_expiring_7_days', ['business' => $business]),
            '3_days' => __('messages.subscription_expiring_3_days', ['business' => $business]),
            '1_day' => __('messages.subscription_expiring_1_day', ['business' => $business]),
            'expired' => __('messages.subscription_expired', ['business' => $business]),
            default => __('messages.subscription_notification', ['business' => $business]),
        };
    }
}
