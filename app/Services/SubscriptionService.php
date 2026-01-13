<?php

namespace App\Services;

use App\Models\Business;
use App\Models\Subscription;
use App\Models\SubscriptionNotification;
use App\Models\SubscriptionPlan;
use App\Models\User;
use App\Notifications\SubscriptionExpiringNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SubscriptionService
{
    /**
     * Create a new subscription for a business
     */
    public function createSubscription(
        Business $business,
        SubscriptionPlan $plan,
        array $paymentDetails = []
    ): Subscription {
        return DB::transaction(function () use ($business, $plan, $paymentDetails) {
            // Cancel any existing active subscription
            $business->subscriptions()
                ->where('status', 'active')
                ->update(['status' => 'cancelled', 'cancelled_at' => now()]);

            return Subscription::create([
                'business_id' => $business->id,
                'plan_id' => $plan->id,
                'status' => 'active',
                'starts_at' => now(),
                'ends_at' => now()->addDays($plan->duration_days),
                'amount_paid' => $plan->price,
                'payment_reference' => $paymentDetails['reference'] ?? null,
                'payment_method' => $paymentDetails['method'] ?? null,
            ]);
        });
    }

    /**
     * Renew an existing subscription
     */
    public function renewSubscription(
        Subscription $subscription,
        ?SubscriptionPlan $newPlan = null,
        array $paymentDetails = []
    ): Subscription {
        $plan = $newPlan ?? $subscription->plan;
        $startsAt = $subscription->ends_at->isFuture() ? $subscription->ends_at : now();

        return DB::transaction(function () use ($subscription, $plan, $startsAt, $paymentDetails) {
            // Mark current subscription as expired if it's ending
            if ($subscription->ends_at->isPast()) {
                $subscription->markAsExpired();
            }

            return Subscription::create([
                'business_id' => $subscription->business_id,
                'plan_id' => $plan->id,
                'status' => 'active',
                'starts_at' => $startsAt,
                'ends_at' => $startsAt->copy()->addDays($plan->duration_days),
                'amount_paid' => $plan->price,
                'payment_reference' => $paymentDetails['reference'] ?? null,
                'payment_method' => $paymentDetails['method'] ?? null,
            ]);
        });
    }

    /**
     * Check and process expiring subscriptions
     */
    public function processExpiringSubscriptions(): array
    {
        $stats = [
            'expired' => 0,
            'notified_7_days' => 0,
            'notified_3_days' => 0,
            'notified_1_day' => 0,
        ];

        // Mark expired subscriptions
        $expiredCount = Subscription::where('status', 'active')
            ->where('ends_at', '<', now())
            ->update(['status' => 'expired']);
        $stats['expired'] = $expiredCount;

        // Send notifications for expiring subscriptions
        $stats['notified_7_days'] = $this->sendExpiringNotifications(7, '7_days');
        $stats['notified_3_days'] = $this->sendExpiringNotifications(3, '3_days');
        $stats['notified_1_day'] = $this->sendExpiringNotifications(1, '1_day');

        // Notify about just expired subscriptions
        $this->sendExpiredNotifications();

        return $stats;
    }

    /**
     * Send notifications for subscriptions expiring in X days
     */
    protected function sendExpiringNotifications(int $days, string $type): int
    {
        $targetDate = now()->addDays($days);
        $notifiedCount = 0;

        $subscriptions = Subscription::with(['business.users', 'plan'])
            ->where('status', 'active')
            ->whereDate('ends_at', $targetDate->toDateString())
            ->get();

        foreach ($subscriptions as $subscription) {
            // Check if notification already sent for this type
            if ($subscription->hasNotificationBeenSent($type)) {
                continue;
            }

            $this->notifyBusinessMembers($subscription, $type, $days);
            $notifiedCount++;
        }

        return $notifiedCount;
    }

    /**
     * Send notifications for subscriptions that just expired
     */
    protected function sendExpiredNotifications(): void
    {
        $subscriptions = Subscription::with(['business.users', 'plan'])
            ->where('status', 'expired')
            ->whereDate('ends_at', now()->subDay()->toDateString())
            ->get();

        foreach ($subscriptions as $subscription) {
            if ($subscription->hasNotificationBeenSent('expired')) {
                continue;
            }

            $this->notifyBusinessMembers($subscription, 'expired', 0);
        }
    }

    /**
     * Notify all members of a business about subscription status
     */
    protected function notifyBusinessMembers(Subscription $subscription, string $type, int $daysRemaining): void
    {
        $users = $subscription->business->users;

        foreach ($users as $user) {
            try {
                // Send Laravel notification
                $user->notify(new SubscriptionExpiringNotification($subscription, $type, $daysRemaining));

                // Record in subscription_notifications table
                SubscriptionNotification::create([
                    'subscription_id' => $subscription->id,
                    'user_id' => $user->id,
                    'type' => $type,
                    'sent_at' => now(),
                ]);

                Log::info("Subscription notification sent", [
                    'user_id' => $user->id,
                    'subscription_id' => $subscription->id,
                    'type' => $type,
                ]);
            } catch (\Exception $e) {
                Log::error("Failed to send subscription notification", [
                    'user_id' => $user->id,
                    'subscription_id' => $subscription->id,
                    'type' => $type,
                    'error' => $e->getMessage(),
                ]);
            }
        }
    }

    /**
     * Get active subscription for a business
     */
    public function getActiveSubscription(Business $business): ?Subscription
    {
        return $business->subscriptions()
            ->where('status', 'active')
            ->where('ends_at', '>', now())
            ->latest()
            ->first();
    }

    /**
     * Check if business has active subscription
     */
    public function hasActiveSubscription(Business $business): bool
    {
        return $this->getActiveSubscription($business) !== null;
    }

    /**
     * Get subscription statistics for a business
     */
    public function getSubscriptionStats(Business $business): array
    {
        $activeSubscription = $this->getActiveSubscription($business);

        return [
            'has_active' => $activeSubscription !== null,
            'current_plan' => $activeSubscription?->plan->name,
            'days_remaining' => $activeSubscription?->daysRemaining() ?? 0,
            'ends_at' => $activeSubscription?->ends_at,
            'is_expiring_soon' => $activeSubscription?->isExpiringSoon() ?? false,
            'total_subscriptions' => $business->subscriptions()->count(),
        ];
    }
}
