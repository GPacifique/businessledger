<?php

namespace App\Console\Commands;

use App\Services\SubscriptionService;
use Illuminate\Console\Command;

class ProcessSubscriptions extends Command
{
    protected $signature = 'subscriptions:process
                            {--dry-run : Run without sending notifications}';

    protected $description = 'Process subscriptions: mark expired and send notifications for expiring subscriptions';

    public function __construct(protected SubscriptionService $subscriptionService)
    {
        parent::__construct();
    }

    public function handle(): int
    {
        $this->info('Processing subscriptions...');

        if ($this->option('dry-run')) {
            $this->warn('Running in dry-run mode - no notifications will be sent');
            $this->showPendingNotifications();
            return Command::SUCCESS;
        }

        $stats = $this->subscriptionService->processExpiringSubscriptions();

        $this->table(
            ['Action', 'Count'],
            [
                ['Marked as Expired', $stats['expired']],
                ['7-day Notifications', $stats['notified_7_days']],
                ['3-day Notifications', $stats['notified_3_days']],
                ['1-day Notifications', $stats['notified_1_day']],
            ]
        );

        $this->info('Subscription processing completed!');

        return Command::SUCCESS;
    }

    protected function showPendingNotifications(): void
    {
        $this->info('Pending notifications:');

        // 7 days
        $sevenDays = \App\Models\Subscription::with('business')
            ->where('status', 'active')
            ->whereDate('ends_at', now()->addDays(7)->toDateString())
            ->get();

        $this->line("7-day warnings: {$sevenDays->count()} subscriptions");
        foreach ($sevenDays as $sub) {
            $this->line("  - {$sub->business->name} (ends: {$sub->ends_at->format('Y-m-d')})");
        }

        // 3 days
        $threeDays = \App\Models\Subscription::with('business')
            ->where('status', 'active')
            ->whereDate('ends_at', now()->addDays(3)->toDateString())
            ->get();

        $this->line("3-day warnings: {$threeDays->count()} subscriptions");
        foreach ($threeDays as $sub) {
            $this->line("  - {$sub->business->name} (ends: {$sub->ends_at->format('Y-m-d')})");
        }

        // 1 day
        $oneDay = \App\Models\Subscription::with('business')
            ->where('status', 'active')
            ->whereDate('ends_at', now()->addDays(1)->toDateString())
            ->get();

        $this->line("1-day warnings: {$oneDay->count()} subscriptions");
        foreach ($oneDay as $sub) {
            $this->line("  - {$sub->business->name} (ends: {$sub->ends_at->format('Y-m-d')})");
        }

        // Expired
        $expired = \App\Models\Subscription::with('business')
            ->where('status', 'active')
            ->where('ends_at', '<', now())
            ->get();

        $this->line("To be marked expired: {$expired->count()} subscriptions");
        foreach ($expired as $sub) {
            $this->line("  - {$sub->business->name} (ended: {$sub->ends_at->format('Y-m-d')})");
        }
    }
}
