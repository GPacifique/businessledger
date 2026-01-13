<?php

namespace Database\Seeders;

use App\Models\SubscriptionPlan;
use Illuminate\Database\Seeder;

class SubscriptionPlanSeeder extends Seeder
{
    public function run(): void
    {
        $plans = [
            [
                'name' => 'Basic Monthly',
                'slug' => 'basic-monthly',
                'description' => 'Perfect for small businesses just getting started',
                'price' => 5000.00,
                'billing_cycle' => 'monthly',
                'duration_days' => 30,
                'features' => [
                    'Up to 3 users',
                    'Unlimited income entries',
                    'Unlimited expense entries',
                    'Basic reports',
                    'Email support',
                ],
                'is_active' => true,
            ],
            [
                'name' => 'Basic Yearly',
                'slug' => 'basic-yearly',
                'description' => 'Perfect for small businesses - Save 2 months!',
                'price' => 50000.00,
                'billing_cycle' => 'yearly',
                'duration_days' => 365,
                'features' => [
                    'Up to 3 users',
                    'Unlimited income entries',
                    'Unlimited expense entries',
                    'Basic reports',
                    'Email support',
                    '2 months free',
                ],
                'is_active' => true,
            ],
            [
                'name' => 'Professional Monthly',
                'slug' => 'professional-monthly',
                'description' => 'For growing businesses with more needs',
                'price' => 15000.00,
                'billing_cycle' => 'monthly',
                'duration_days' => 30,
                'features' => [
                    'Up to 10 users',
                    'Unlimited income entries',
                    'Unlimited expense entries',
                    'Advanced reports',
                    'Export to PDF/Excel',
                    'Priority email support',
                    'Phone support',
                ],
                'is_active' => true,
            ],
            [
                'name' => 'Professional Yearly',
                'slug' => 'professional-yearly',
                'description' => 'For growing businesses - Save 2 months!',
                'price' => 150000.00,
                'billing_cycle' => 'yearly',
                'duration_days' => 365,
                'features' => [
                    'Up to 10 users',
                    'Unlimited income entries',
                    'Unlimited expense entries',
                    'Advanced reports',
                    'Export to PDF/Excel',
                    'Priority email support',
                    'Phone support',
                    '2 months free',
                ],
                'is_active' => true,
            ],
            [
                'name' => 'Enterprise Monthly',
                'slug' => 'enterprise-monthly',
                'description' => 'For large businesses with advanced needs',
                'price' => 30000.00,
                'billing_cycle' => 'monthly',
                'duration_days' => 30,
                'features' => [
                    'Unlimited users',
                    'Unlimited income entries',
                    'Unlimited expense entries',
                    'Advanced reports',
                    'Export to PDF/Excel',
                    'API access',
                    'Dedicated account manager',
                    '24/7 support',
                    'Custom integrations',
                ],
                'is_active' => true,
            ],
            [
                'name' => 'Enterprise Yearly',
                'slug' => 'enterprise-yearly',
                'description' => 'For large businesses - Save 2 months!',
                'price' => 300000.00,
                'billing_cycle' => 'yearly',
                'duration_days' => 365,
                'features' => [
                    'Unlimited users',
                    'Unlimited income entries',
                    'Unlimited expense entries',
                    'Advanced reports',
                    'Export to PDF/Excel',
                    'API access',
                    'Dedicated account manager',
                    '24/7 support',
                    'Custom integrations',
                    '2 months free',
                ],
                'is_active' => true,
            ],
        ];

        foreach ($plans as $plan) {
            SubscriptionPlan::updateOrCreate(
                ['slug' => $plan['slug']],
                $plan
            );
        }
    }
}
