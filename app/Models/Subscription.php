<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Carbon\Carbon;

class Subscription extends Model
{
    protected $fillable = [
        'business_id',
        'plan_id',
        'status',
        'starts_at',
        'ends_at',
        'cancelled_at',
        'amount_paid',
        'payment_reference',
        'payment_method',
    ];

    protected function casts(): array
    {
        return [
            'starts_at' => 'datetime',
            'ends_at' => 'datetime',
            'cancelled_at' => 'datetime',
            'amount_paid' => 'decimal:2',
        ];
    }

    public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class);
    }

    public function plan(): BelongsTo
    {
        return $this->belongsTo(SubscriptionPlan::class, 'plan_id');
    }

    public function notifications(): HasMany
    {
        return $this->hasMany(SubscriptionNotification::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeExpired($query)
    {
        return $query->where('status', 'expired');
    }

    public function scopeExpiring($query, int $days = 7)
    {
        return $query->where('status', 'active')
            ->whereBetween('ends_at', [now(), now()->addDays($days)]);
    }

    public function scopeExpiringSoon($query)
    {
        return $query->where('status', 'active')
            ->where('ends_at', '<=', now()->addDays(7))
            ->where('ends_at', '>', now());
    }

    // Helper methods
    public function isActive(): bool
    {
        return $this->status === 'active' && $this->ends_at->isFuture();
    }

    public function isExpired(): bool
    {
        return $this->status === 'expired' || $this->ends_at->isPast();
    }

    public function isExpiringSoon(int $days = 7): bool
    {
        return $this->isActive() && $this->ends_at->diffInDays(now()) <= $days;
    }

    public function daysRemaining(): int
    {
        if ($this->ends_at->isPast()) {
            return 0;
        }
        return (int) now()->diffInDays($this->ends_at, false);
    }

    public function getDaysRemainingAttribute(): int
    {
        return $this->daysRemaining();
    }

    public function getIsExpiringAttribute(): bool
    {
        return $this->isExpiringSoon();
    }

    public function cancel(): void
    {
        $this->update([
            'status' => 'cancelled',
            'cancelled_at' => now(),
        ]);
    }

    public function markAsExpired(): void
    {
        $this->update(['status' => 'expired']);
    }

    public function renew(?SubscriptionPlan $plan = null): self
    {
        $plan = $plan ?? $this->plan;

        return self::create([
            'business_id' => $this->business_id,
            'plan_id' => $plan->id,
            'status' => 'active',
            'starts_at' => $this->ends_at->isFuture() ? $this->ends_at : now(),
            'ends_at' => ($this->ends_at->isFuture() ? $this->ends_at : now())->addDays($plan->duration_days),
            'amount_paid' => $plan->price,
        ]);
    }

    public function hasNotificationBeenSent(string $type): bool
    {
        return $this->notifications()->where('type', $type)->exists();
    }
}
