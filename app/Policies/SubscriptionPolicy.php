<?php

namespace App\Policies;

use App\Models\Subscription;
use App\Models\User;

class SubscriptionPolicy
{
    /**
     * Determine if the user can view any subscriptions.
     */
    public function viewAny(User $user): bool
    {
        return $user->isSystemAdmin() || $user->isBusinessAdmin();
    }

    /**
     * Determine if the user can view the subscription.
     */
    public function view(User $user, Subscription $subscription): bool
    {
        if ($user->isSystemAdmin()) {
            return true;
        }

        return $user->business_id === $subscription->business_id;
    }

    /**
     * Determine if the user can create subscriptions.
     */
    public function create(User $user): bool
    {
        return $user->isSystemAdmin() || $user->isBusinessAdmin();
    }

    /**
     * Determine if the user can update the subscription.
     */
    public function update(User $user, Subscription $subscription): bool
    {
        if ($user->isSystemAdmin()) {
            return true;
        }

        return $user->isBusinessAdmin() && $user->business_id === $subscription->business_id;
    }

    /**
     * Determine if the user can cancel the subscription.
     */
    public function cancel(User $user, Subscription $subscription): bool
    {
        if ($user->isSystemAdmin()) {
            return true;
        }

        return $user->isBusinessAdmin() && $user->business_id === $subscription->business_id;
    }
}
