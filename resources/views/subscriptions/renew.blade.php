@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">{{ __('messages.Renew Subscription') }}</h2>
            <p class="mt-2 text-gray-600 dark:text-gray-400">Renew your subscription for {{ $subscription->business->name }}</p>
        </div>

        <!-- Current Subscription Info -->
        <div class="mb-6 p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
            <h4 class="font-medium text-gray-900 dark:text-white mb-2">Current Subscription</h4>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm">
                <div>
                    <span class="text-gray-500 dark:text-gray-400">Plan:</span>
                    <p class="font-medium text-gray-900 dark:text-white">{{ $subscription->plan->name }}</p>
                </div>
                <div>
                    <span class="text-gray-500 dark:text-gray-400">Status:</span>
                    <p class="font-medium {{ $subscription->status === 'active' ? 'text-green-600' : 'text-red-600' }}">
                        {{ ucfirst($subscription->status) }}
                    </p>
                </div>
                <div>
                    <span class="text-gray-500 dark:text-gray-400">Expires:</span>
                    <p class="font-medium text-gray-900 dark:text-white">{{ $subscription->ends_at->format('M d, Y') }}</p>
                </div>
                <div>
                    <span class="text-gray-500 dark:text-gray-400">Days Remaining:</span>
                    <p class="font-medium {{ $subscription->daysRemaining() <= 7 ? 'text-red-600' : 'text-gray-900 dark:text-white' }}">
                        {{ $subscription->daysRemaining() }}
                    </p>
                </div>
            </div>
        </div>

        <form action="{{ route('subscriptions.process-renewal', $subscription) }}" method="POST">
            @csrf

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Select Plan for Renewal</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Leave unchanged to renew with the same plan</p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($plans as $plan)
                    <label class="relative block cursor-pointer">
                        <input type="radio" name="plan_id" value="{{ $plan->id }}"
                               class="sr-only peer"
                               {{ $plan->id === $subscription->plan_id ? 'checked' : '' }}>
                        <div class="p-4 border-2 border-gray-200 dark:border-gray-700 rounded-lg peer-checked:border-indigo-600 peer-checked:bg-indigo-50 dark:peer-checked:bg-indigo-900/30 hover:border-gray-300 transition-colors">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="font-semibold text-gray-900 dark:text-white">
                                        {{ $plan->name }}
                                        @if($plan->id === $subscription->plan_id)
                                        <span class="text-xs text-indigo-600">(Current)</span>
                                        @endif
                                    </p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ ucfirst($plan->billing_cycle) }}</p>
                                </div>
                                <span class="text-lg font-bold text-indigo-600">{{ number_format($plan->price) }} RWF</span>
                            </div>
                            <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">{{ $plan->description }}</p>
                        </div>
                    </label>
                    @endforeach
                </div>

                @error('plan_id')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">{{ __('messages.Payment Method') }}</h3>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <label class="relative block cursor-pointer">
                        <input type="radio" name="payment_method" value="mobile_money" class="sr-only peer" required>
                        <div class="p-4 border-2 border-gray-200 dark:border-gray-700 rounded-lg peer-checked:border-indigo-600 peer-checked:bg-indigo-50 dark:peer-checked:bg-indigo-900/30 hover:border-gray-300 transition-colors text-center">
                            <svg class="w-8 h-8 mx-auto text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                            </svg>
                            <p class="mt-2 text-sm font-medium text-gray-900 dark:text-white">Mobile Money</p>
                        </div>
                    </label>

                    <label class="relative block cursor-pointer">
                        <input type="radio" name="payment_method" value="cash" class="sr-only peer">
                        <div class="p-4 border-2 border-gray-200 dark:border-gray-700 rounded-lg peer-checked:border-indigo-600 peer-checked:bg-indigo-50 dark:peer-checked:bg-indigo-900/30 hover:border-gray-300 transition-colors text-center">
                            <svg class="w-8 h-8 mx-auto text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            <p class="mt-2 text-sm font-medium text-gray-900 dark:text-white">Cash</p>
                        </div>
                    </label>

                    <label class="relative block cursor-pointer">
                        <input type="radio" name="payment_method" value="bank_transfer" class="sr-only peer">
                        <div class="p-4 border-2 border-gray-200 dark:border-gray-700 rounded-lg peer-checked:border-indigo-600 peer-checked:bg-indigo-50 dark:peer-checked:bg-indigo-900/30 hover:border-gray-300 transition-colors text-center">
                            <svg class="w-8 h-8 mx-auto text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                            </svg>
                            <p class="mt-2 text-sm font-medium text-gray-900 dark:text-white">Bank Transfer</p>
                        </div>
                    </label>

                    <label class="relative block cursor-pointer">
                        <input type="radio" name="payment_method" value="card" class="sr-only peer">
                        <div class="p-4 border-2 border-gray-200 dark:border-gray-700 rounded-lg peer-checked:border-indigo-600 peer-checked:bg-indigo-50 dark:peer-checked:bg-indigo-900/30 hover:border-gray-300 transition-colors text-center">
                            <svg class="w-8 h-8 mx-auto text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                            </svg>
                            <p class="mt-2 text-sm font-medium text-gray-900 dark:text-white">Card</p>
                        </div>
                    </label>
                </div>

                @error('payment_method')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">{{ __('messages.Payment Reference') }} (Optional)</h3>

                <input type="text" name="payment_reference"
                       class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-indigo-500 focus:border-indigo-500"
                       placeholder="Transaction ID or Reference Number">

                @error('payment_reference')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('subscriptions.show', $subscription->business) }}"
                   class="px-6 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-md hover:bg-gray-50 dark:hover:bg-gray-700">
                    {{ __('messages.Cancel') }}
                </a>
                <button type="submit"
                        class="px-6 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition-colors">
                    {{ __('messages.Renew Now') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
