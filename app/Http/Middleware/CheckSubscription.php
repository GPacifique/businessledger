<?php

namespace App\Http\Middleware;

use App\Services\SubscriptionService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSubscription
{
    public function __construct(protected SubscriptionService $subscriptionService)
    {
    }

    /**
     * Handle an incoming request.
     * Check if the user's business has an active subscription.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        // Skip for system admins
        if ($user && $user->isSystemAdmin()) {
            return $next($request);
        }

        // Skip if user has no business
        if (!$user || !$user->business_id) {
            return $next($request);
        }

        $business = $user->business;

        // Check if business has active subscription
        if (!$this->subscriptionService->hasActiveSubscription($business)) {
            // Allow access to subscription-related routes
            if ($request->routeIs('subscriptions.*')) {
                return $next($request);
            }

            return redirect()
                ->route('subscriptions.show', $business)
                ->with('warning', __('messages.subscription_required'));
        }

        // Add subscription info to the request for use in views
        $subscription = $this->subscriptionService->getActiveSubscription($business);
        $request->merge(['_active_subscription' => $subscription]);

        // Share subscription data with all views
        view()->share('activeSubscription', $subscription);
        view()->share('subscriptionExpiringWarning', $subscription?->isExpiringSoon());

        return $next($request);
    }
}
