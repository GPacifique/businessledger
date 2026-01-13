<?php

namespace App\Notifications;

use App\Models\Subscription;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SubscriptionExpiringNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public Subscription $subscription,
        public string $type,
        public int $daysRemaining
    ) {}

    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $business = $this->subscription->business;
        $plan = $this->subscription->plan;

        $subject = match($this->type) {
            '7_days' => __('messages.subscription_expiring_subject_7_days', ['business' => $business->name]),
            '3_days' => __('messages.subscription_expiring_subject_3_days', ['business' => $business->name]),
            '1_day' => __('messages.subscription_expiring_subject_1_day', ['business' => $business->name]),
            'expired' => __('messages.subscription_expired_subject', ['business' => $business->name]),
            default => __('messages.subscription_notification_subject'),
        };

        $message = (new MailMessage)
            ->subject($subject)
            ->greeting(__('messages.hello', ['name' => $notifiable->name]));

        if ($this->type === 'expired') {
            $message->line(__('messages.subscription_expired_body', ['business' => $business->name]))
                ->line(__('messages.subscription_renew_prompt'))
                ->action(__('messages.renew_subscription'), url('/subscriptions/renew/' . $this->subscription->id))
                ->line(__('messages.subscription_expired_warning'));
        } else {
            $message->line(__('messages.subscription_expiring_body', [
                    'business' => $business->name,
                    'days' => $this->daysRemaining,
                ]))
                ->line(__('messages.subscription_details'))
                ->line('• ' . __('messages.plan') . ': ' . $plan->name)
                ->line('• ' . __('messages.expires_on') . ': ' . $this->subscription->ends_at->format('F j, Y'))
                ->line('• ' . __('messages.billing_cycle') . ': ' . ucfirst($plan->billing_cycle))
                ->action(__('messages.renew_now'), url('/subscriptions/renew/' . $this->subscription->id))
                ->line(__('messages.subscription_expiring_footer'));
        }

        return $message;
    }

    public function toArray(object $notifiable): array
    {
        return [
            'subscription_id' => $this->subscription->id,
            'business_id' => $this->subscription->business_id,
            'business_name' => $this->subscription->business->name,
            'type' => $this->type,
            'days_remaining' => $this->daysRemaining,
            'ends_at' => $this->subscription->ends_at->toISOString(),
            'plan_name' => $this->subscription->plan->name,
        ];
    }
}
