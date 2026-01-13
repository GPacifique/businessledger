@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">{{ __('messages.Subscription') }} - {{ $business->name }}</h2>
        </div>

        <!-- Alert Messages -->
        @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-300 rounded-lg">
            {{ session('success') }}
        </div>
        @endif

        @if(session('warning'))
        <div class="mb-4 p-4 bg-yellow-100 dark:bg-yellow-900 text-yellow-700 dark:text-yellow-300 rounded-lg">
            {{ session('warning') }}
        </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Current Subscription Card -->
            <div class="lg:col-span-2">
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">{{ __('messages.Current Subscription') }}</h3>

                    @if($subscription)
                        <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-700 rounded-lg mb-4">
                            <div>
                                <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $subscription->plan->name }}</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ ucfirst($subscription->plan->billing_cycle) }}</p>
                            </div>
                            <div class="text-right">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                    @if($subscription->status === 'active' && !$subscription->isExpiringSoon())
                                        bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300
                                    @elseif($subscription->isExpiringSoon())
                                        bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300
                                    @else
                                        bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300
                                    @endif
                                ">
                                    {{ ucfirst($subscription->status) }}
                                </span>
                            </div>
                        </div>

                        <!-- Subscription Details -->
                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('messages.Days Remaining') }}</p>
                                <p class="text-2xl font-bold {{ $stats['days_remaining'] <= 7 ? 'text-red-600' : 'text-gray-900 dark:text-white' }}">
                                    {{ $stats['days_remaining'] }}
                                </p>
                            </div>
                            <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('messages.Expires On') }}</p>
                                <p class="text-lg font-semibold text-gray-900 dark:text-white">
                                    {{ $subscription->ends_at->format('M d, Y') }}
                                </p>
                            </div>
                        </div>

                        <!-- Expiring Warning -->
                        @if($subscription->isExpiringSoon())
                        <div class="p-4 bg-yellow-50 dark:bg-yellow-900/50 border border-yellow-200 dark:border-yellow-800 rounded-lg mb-4">
                            <div class="flex">
                                <svg class="w-5 h-5 text-yellow-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                <div>
                                    <p class="text-sm font-medium text-yellow-800 dark:text-yellow-200">{{ __('messages.Subscription Expiring Soon') }}</p>
                                    <p class="text-sm text-yellow-700 dark:text-yellow-300">{{ __('messages.Your subscription expires in :days days', ['days' => $stats['days_remaining']]) }}</p>
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- Actions -->
                        <div class="flex space-x-4">
                            <a href="{{ route('subscriptions.renew', $subscription) }}"
                               class="flex-1 text-center px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition-colors">
                                {{ __('messages.Renew Subscription') }}
                            </a>
                            @if($subscription->status === 'active')
                            <form action="{{ route('subscriptions.cancel', $subscription) }}" method="POST" class="flex-1"
                                  onsubmit="return confirm('Are you sure you want to cancel your subscription?')">
                                @csrf
                                <button type="submit" class="w-full px-4 py-2 border border-red-300 text-red-700 rounded-md hover:bg-red-50 dark:hover:bg-red-900/50 transition-colors">
                                    {{ __('messages.Cancel Subscription') }}
                                </button>
                            </form>
                            @endif
                        </div>
                    @else
                        <div class="text-center py-8">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.No Active Subscription') }}</h3>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Subscribe to a plan to unlock all features.</p>
                            <div class="mt-6">
                                <a href="{{ route('subscriptions.create', $business) }}"
                                   class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                                    {{ __('messages.Subscribe') }}
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Stats Card -->
            <div class="lg:col-span-1">
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Subscription Stats</h3>

                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600 dark:text-gray-400">Status</span>
                            <span class="font-medium text-gray-900 dark:text-white">
                                @if($stats['has_active'])
                                    <span class="text-green-600">{{ __('messages.Active') }}</span>
                                @else
                                    <span class="text-red-600">Inactive</span>
                                @endif
                            </span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600 dark:text-gray-400">{{ __('messages.Plan') }}</span>
                            <span class="font-medium text-gray-900 dark:text-white">{{ $stats['current_plan'] ?? 'None' }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600 dark:text-gray-400">Total Subscriptions</span>
                            <span class="font-medium text-gray-900 dark:text-white">{{ $stats['total_subscriptions'] }}</span>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="mt-6 bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Quick Actions</h3>
                    <div class="space-y-3">
                        <a href="{{ route('subscriptions.plans') }}" class="block w-full text-center px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-md hover:bg-gray-200 dark:hover:bg-gray-600">
                            {{ __('messages.View Plans') }}
                        </a>
                        <a href="{{ route('subscriptions.notifications') }}" class="block w-full text-center px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-md hover:bg-gray-200 dark:hover:bg-gray-600">
                            {{ __('messages.Subscription Notifications') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Subscription History -->
        <div class="mt-8 bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">{{ __('messages.Subscription History') }}</h3>

            @if($history->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('messages.Plan') }}</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('messages.Status') }}</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('messages.Start Date') }}</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('messages.End Date') }}</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('messages.Amount') }}</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($history as $sub)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">{{ $sub->plan->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                    @if($sub->status === 'active') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300
                                    @elseif($sub->status === 'expired') bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-300
                                    @elseif($sub->status === 'cancelled') bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300
                                    @else bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300
                                    @endif
                                ">
                                    {{ ucfirst($sub->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $sub->starts_at->format('M d, Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $sub->ends_at->format('M d, Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">{{ number_format($sub->amount_paid) }} RWF</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <p class="text-gray-500 dark:text-gray-400 text-center py-4">No subscription history yet.</p>
            @endif
        </div>
    </div>
</div>
@endsection
