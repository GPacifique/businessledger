@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-8 text-center">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white">{{ __('messages.Subscription Plans') }}</h2>
            <p class="mt-4 text-lg text-gray-600 dark:text-gray-400">Choose the plan that best fits your business needs</p>
        </div>

        <!-- Monthly/Yearly Toggle -->
        <div class="flex justify-center mb-8">
            <div class="bg-gray-100 dark:bg-gray-700 p-1 rounded-lg inline-flex">
                <button type="button" id="monthly-btn" class="px-4 py-2 text-sm font-medium rounded-md bg-white dark:bg-gray-800 text-gray-900 dark:text-white shadow-sm">
                    {{ __('messages.Monthly') }}
                </button>
                <button type="button" id="yearly-btn" class="px-4 py-2 text-sm font-medium rounded-md text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">
                    {{ __('messages.Yearly') }}
                </button>
            </div>
        </div>

        <!-- Plans Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($plans as $plan)
            <div class="plan-card {{ $plan->billing_cycle }}-plan bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition-transform duration-200 {{ $plan->billing_cycle === 'yearly' ? 'hidden' : '' }}">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $plan->name }}</h3>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">{{ $plan->description }}</p>

                    <div class="mt-4">
                        <span class="text-4xl font-bold text-gray-900 dark:text-white">{{ number_format($plan->price) }}</span>
                        <span class="text-gray-500 dark:text-gray-400"> RWF / {{ $plan->billing_cycle === 'monthly' ? __('messages.per month') : __('messages.per year') }}</span>
                    </div>

                    <ul class="mt-6 space-y-3">
                        @if($plan->features)
                            @foreach($plan->features as $feature)
                            <li class="flex items-center text-gray-600 dark:text-gray-300">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                {{ $feature }}
                            </li>
                            @endforeach
                        @endif
                    </ul>

                    @auth
                        @if(auth()->user()->business)
                        <a href="{{ route('subscriptions.create', auth()->user()->business) }}?plan={{ $plan->id }}"
                           class="mt-8 block w-full text-center px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition-colors">
                            {{ __('messages.Select Plan') }}
                        </a>
                        @endif
                    @else
                        <a href="{{ route('login') }}"
                           class="mt-8 block w-full text-center px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition-colors">
                            {{ __('messages.Select Plan') }}
                        </a>
                    @endauth
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const monthlyBtn = document.getElementById('monthly-btn');
    const yearlyBtn = document.getElementById('yearly-btn');
    const monthlyPlans = document.querySelectorAll('.monthly-plan');
    const yearlyPlans = document.querySelectorAll('.yearly-plan');

    monthlyBtn.addEventListener('click', function() {
        monthlyBtn.classList.add('bg-white', 'dark:bg-gray-800', 'text-gray-900', 'dark:text-white', 'shadow-sm');
        monthlyBtn.classList.remove('text-gray-500', 'dark:text-gray-400');
        yearlyBtn.classList.remove('bg-white', 'dark:bg-gray-800', 'text-gray-900', 'dark:text-white', 'shadow-sm');
        yearlyBtn.classList.add('text-gray-500', 'dark:text-gray-400');

        monthlyPlans.forEach(p => p.classList.remove('hidden'));
        yearlyPlans.forEach(p => p.classList.add('hidden'));
    });

    yearlyBtn.addEventListener('click', function() {
        yearlyBtn.classList.add('bg-white', 'dark:bg-gray-800', 'text-gray-900', 'dark:text-white', 'shadow-sm');
        yearlyBtn.classList.remove('text-gray-500', 'dark:text-gray-400');
        monthlyBtn.classList.remove('bg-white', 'dark:bg-gray-800', 'text-gray-900', 'dark:text-white', 'shadow-sm');
        monthlyBtn.classList.add('text-gray-500', 'dark:text-gray-400');

        yearlyPlans.forEach(p => p.classList.remove('hidden'));
        monthlyPlans.forEach(p => p.classList.add('hidden'));
    });
});
</script>
@endsection
