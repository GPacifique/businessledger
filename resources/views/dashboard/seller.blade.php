<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $business->name ?? 'Dashboard' }}
            </h2>
            <span class="px-3 py-1 text-sm bg-blue-100 text-blue-800 rounded-full">
                {{ __('messages.Staff') }}
            </span>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Quick Stats -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Today's Income -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-green-100 text-green-600">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">{{ __("messages.Today's Income") }}</p>
                                <p class="text-2xl font-semibold text-gray-900">{{ format_currency($todayIncome ?? 0) }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Today's Expenses -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-red-100 text-red-600">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">{{ __("messages.Today's Expenses") }}</p>
                                <p class="text-2xl font-semibold text-gray-900">{{ format_currency($todayExpenses ?? 0) }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- My Entries This Week -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">{{ __('messages.My Entries (Week)') }}</p>
                                <p class="text-2xl font-semibold text-gray-900">{{ $weeklyEntries ?? 0 }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Net Balance Today -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full {{ ($todayBalance ?? 0) >= 0 ? 'bg-green-100 text-green-600' : 'bg-orange-100 text-orange-600' }}">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">{{ __("messages.Today's Balance") }}</p>
                                <p class="text-2xl font-semibold {{ ($todayBalance ?? 0) >= 0 ? 'text-green-600' : 'text-orange-600' }}">{{ format_currency($todayBalance ?? 0) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <a href="{{ route('incomes.create') }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow border-l-4 border-green-500">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-green-100">
                                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-semibold text-gray-900">{{ __('messages.Add Income') }}</h4>
                                <p class="text-gray-500">{{ __('messages.Record a new income entry') }}</p>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="{{ route('expenses.create') }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow border-l-4 border-red-500">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-red-100">
                                <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-semibold text-gray-900">{{ __('messages.Add Expense') }}</h4>
                                <p class="text-gray-500">{{ __('messages.Record a new expense entry') }}</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Recent Entries -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Recent Income -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-gray-900">{{ __('messages.Recent Income') }}</h3>
                            <a href="{{ route('incomes.index') }}" class="text-sm text-indigo-600 hover:text-indigo-800">{{ __('messages.View All') }}</a>
                        </div>
                        @if(isset($recentIncomes) && $recentIncomes->count() > 0)
                            <div class="space-y-3">
                                @foreach($recentIncomes as $income)
                                    <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                                        <div>
                                            <p class="font-medium text-gray-900">{{ $income->title }}</p>
                                            <p class="text-sm text-gray-500">{{ $income->category->name ?? __('messages.Uncategorized') }} • {{ $income->date->format('M d, Y') }}</p>
                                        </div>
                                        <span class="text-green-600 font-semibold">+{{ format_currency($income->amount) }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500 text-center py-4">{{ __('messages.No recent income recorded') }}</p>
                        @endif
                    </div>
                </div>

                <!-- Recent Expenses -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-gray-900">{{ __('messages.Recent Expenses') }}</h3>
                            <a href="{{ route('expenses.index') }}" class="text-sm text-indigo-600 hover:text-indigo-800">{{ __('messages.View All') }}</a>
                        </div>
                        @if(isset($recentExpenses) && $recentExpenses->count() > 0)
                            <div class="space-y-3">
                                @foreach($recentExpenses as $expense)
                                    <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                                        <div>
                                            <p class="font-medium text-gray-900">{{ $expense->title }}</p>
                                            <p class="text-sm text-gray-500">{{ $expense->category->name ?? __('messages.Uncategorized') }} • {{ $expense->date->format('M d, Y') }}</p>
                                        </div>
                                        <span class="text-red-600 font-semibold">-{{ format_currency($expense->amount) }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500 text-center py-4">{{ __('messages.No recent expenses recorded') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
