<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Subscription;
use App\Models\SubscriptionNotification;
use App\Models\SubscriptionPlan;
use App\Services\SubscriptionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SubscriptionController extends Controller
{
    public function __construct(protected SubscriptionService $subscriptionService)
    {
    }

    /**
     * Display available subscription plans
     */
    public function plans()
    {
        $plans = SubscriptionPlan::active()->get();

        return view('subscriptions.plans', compact('plans'));
    }

    /**
     * Show current subscription status for a business
     */
    public function show(Business $business)
    {
        Gate::authorize('view', $business);

        $subscription = $this->subscriptionService->getActiveSubscription($business);
        $stats = $this->subscriptionService->getSubscriptionStats($business);
        $history = $business->subscriptions()
            ->with('plan')
            ->latest()
            ->take(10)
            ->get();

        return view('subscriptions.show', compact('business', 'subscription', 'stats', 'history'));
    }

    /**
     * Show subscription form
     */
    public function create(Business $business)
    {
        Gate::authorize('update', $business);

        $plans = SubscriptionPlan::active()->get();
        $currentSubscription = $this->subscriptionService->getActiveSubscription($business);

        return view('subscriptions.create', compact('business', 'plans', 'currentSubscription'));
    }

    /**
     * Subscribe a business to a plan
     */
    public function store(Request $request, Business $business)
    {
        Gate::authorize('update', $business);

        $validated = $request->validate([
            'plan_id' => 'required|exists:subscription_plans,id',
            'payment_method' => 'required|in:cash,mobile_money,bank_transfer,card',
            'payment_reference' => 'nullable|string|max:255',
        ]);

        $plan = SubscriptionPlan::findOrFail($validated['plan_id']);

        $subscription = $this->subscriptionService->createSubscription(
            $business,
            $plan,
            [
                'method' => $validated['payment_method'],
                'reference' => $validated['payment_reference'],
            ]
        );

        return redirect()
            ->route('subscriptions.show', $business)
            ->with('success', __('messages.subscription_created_successfully'));
    }

    /**
     * Show renewal form
     */
    public function renew(Subscription $subscription)
    {
        Gate::authorize('update', $subscription->business);

        $plans = SubscriptionPlan::active()->get();

        return view('subscriptions.renew', compact('subscription', 'plans'));
    }

    /**
     * Process renewal
     */
    public function processRenewal(Request $request, Subscription $subscription)
    {
        Gate::authorize('update', $subscription->business);

        $validated = $request->validate([
            'plan_id' => 'nullable|exists:subscription_plans,id',
            'payment_method' => 'required|in:cash,mobile_money,bank_transfer,card',
            'payment_reference' => 'nullable|string|max:255',
        ]);

        $newPlan = isset($validated['plan_id'])
            ? SubscriptionPlan::find($validated['plan_id'])
            : null;

        $newSubscription = $this->subscriptionService->renewSubscription(
            $subscription,
            $newPlan,
            [
                'method' => $validated['payment_method'],
                'reference' => $validated['payment_reference'],
            ]
        );

        return redirect()
            ->route('subscriptions.show', $subscription->business)
            ->with('success', __('messages.subscription_renewed_successfully'));
    }

    /**
     * Cancel subscription
     */
    public function cancel(Subscription $subscription)
    {
        Gate::authorize('update', $subscription->business);

        $subscription->cancel();

        return redirect()
            ->route('subscriptions.show', $subscription->business)
            ->with('success', __('messages.subscription_cancelled'));
    }

    /**
     * Get user's subscription notifications
     */
    public function notifications(Request $request)
    {
        $notifications = SubscriptionNotification::with(['subscription.business', 'subscription.plan'])
            ->where('user_id', $request->user()->id)
            ->latest()
            ->paginate(20);

        return view('subscriptions.notifications', compact('notifications'));
    }

    /**
     * Mark notification as read
     */
    public function markNotificationRead(SubscriptionNotification $notification)
    {
        if ($notification->user_id !== auth()->id()) {
            abort(403);
        }

        $notification->markAsRead();

        return back()->with('success', __('messages.notification_marked_read'));
    }

    /**
     * Mark all notifications as read
     */
    public function markAllNotificationsRead(Request $request)
    {
        SubscriptionNotification::where('user_id', $request->user()->id)
            ->where('is_read', false)
            ->update([
                'is_read' => true,
                'read_at' => now(),
            ]);

        return back()->with('success', __('messages.all_notifications_marked_read'));
    }
}
