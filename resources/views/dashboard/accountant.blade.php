<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $business->name ?? __('messages.Dashboard') }} - {{ __('messages.Financial Overview') }}
            </h2>
            <span class="px-3 py-1 text-sm bg-purple-100 text-purple-800 rounded-full">
                {{ __('messages.Accountant') }}
            </span>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Financial Summary Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Today's Income -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500">{{ __("messages.Today's Income") }}</p>
                                <p class="text-2xl font-bold text-green-600">{{ format_currency($todayIncome ?? 0) }}</p>
                            </div>
                            <div class="p-3 bg-green-100 rounded-full">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Today's Expenses -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500">{{ __("messages.Today's Expenses") }}</p>
                                <p class="text-2xl font-bold text-red-600">{{ format_currency($todayExpenses ?? 0) }}</p>
                            </div>
                            <div class="p-3 bg-red-100 rounded-full">
                                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 13l-5 5m0 0l-5-5m5 5V6"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Monthly Income -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500">{{ __('messages.Monthly Income') }}</p>
                                <p class="text-2xl font-bold text-green-600">{{ format_currency($monthIncome ?? 0) }}</p>
                            </div>
                            <div class="p-3 bg-green-100 rounded-full">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Monthly Expenses -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500">{{ __('messages.Monthly Expenses') }}</p>
                                <p class="text-2xl font-bold text-red-600">{{ format_currency($monthExpenses ?? 0) }}</p>
                            </div>
                            <div class="p-3 bg-red-100 rounded-full">
                                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profit/Loss Summary -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-6">{{ __('messages.Profit & Loss Summary') }}</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="text-center p-6 bg-gradient-to-br from-green-50 to-green-100 rounded-xl">
                            <p class="text-sm text-gray-600 mb-2">{{ __('messages.Total Income') }}</p>
                            <p class="text-3xl font-bold text-green-600">{{ format_currency($totalIncome ?? 0) }}</p>
                            <p class="text-xs text-gray-500 mt-2">{{ __('messages.All time') }}</p>
                        </div>
                        <div class="text-center p-6 bg-gradient-to-br from-red-50 to-red-100 rounded-xl">
                            <p class="text-sm text-gray-600 mb-2">{{ __('messages.Total Expenses') }}</p>
                            <p class="text-3xl font-bold text-red-600">{{ format_currency($totalExpenses ?? 0) }}</p>
                            <p class="text-xs text-gray-500 mt-2">{{ __('messages.All time') }}</p>
                        </div>
                        <div class="text-center p-6 bg-gradient-to-br {{ ($netProfit ?? 0) >= 0 ? 'from-blue-50 to-blue-100' : 'from-orange-50 to-orange-100' }} rounded-xl">
                            <p class="text-sm text-gray-600 mb-2">{{ __('messages.Net') }} {{ ($netProfit ?? 0) >= 0 ? __('messages.Profitable') : __('messages.Loss') }}</p>
                            <p class="text-3xl font-bold {{ ($netProfit ?? 0) >= 0 ? 'text-blue-600' : 'text-orange-600' }}">{{ format_currency(abs($netProfit ?? 0)) }}</p>
                            <p class="text-xs text-gray-500 mt-2">{{ __('messages.All time') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <a href="{{ route('incomes.index') }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow">
                    <div class="p-6 text-center">
                        <div class="mx-auto w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mb-3">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h4 class="font-medium text-gray-900">{{ __('messages.Income Records') }}</h4>
                        <p class="text-sm text-gray-500">{{ __('messages.View all income') }}</p>
                    </div>
                </a>

                <a href="{{ route('expenses.index') }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow">
                    <div class="p-6 text-center">
                        <div class="mx-auto w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mb-3">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <h4 class="font-medium text-gray-900">{{ __('messages.Expense Records') }}</h4>
                        <p class="text-sm text-gray-500">{{ __('messages.View all expenses') }}</p>
                    </div>
                </a>

                <a href="{{ route('categories.index') }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow">
                    <div class="p-6 text-center">
                        <div class="mx-auto w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mb-3">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                        </div>
                        <h4 class="font-medium text-gray-900">{{ __('messages.Categories') }}</h4>
                        <p class="text-sm text-gray-500">{{ __('messages.Manage categories') }}</p>
                    </div>
                </a>

                <a href="{{ route('reports.index') }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow">
                    <div class="p-6 text-center">
                        <div class="mx-auto w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mb-3">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h4 class="font-medium text-gray-900">{{ __('messages.Reports') }}</h4>
                        <p class="text-sm text-gray-500">{{ __('messages.Financial reports') }}</p>
                    </div>
                </a>
            </div>

            <!-- Recent Transactions -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Recent Income -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-gray-900">{{ __('messages.Recent Income') }}</h3>
                            <a href="{{ route('incomes.index') }}" class="text-sm text-indigo-600 hover:text-indigo-800">{{ __('messages.View All') }}</a>
                        </div>
                        @if(isset($recentIncomes) && $recentIncomes->count() > 0)
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead>
                                        <tr>
                                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Category</th>
                                            <th class="px-4 py-2 text-right text-xs font-medium text-gray-500 uppercase">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        @foreach($recentIncomes as $income)
                                            <tr>
                                                <td class="px-4 py-3 text-sm text-gray-500">{{ $income->date->format('M d') }}</td>
                                                <td class="px-4 py-3 text-sm text-gray-900">{{ Str::limit($income->title, 20) }}</td>
                                                <td class="px-4 py-3 text-sm text-gray-500">{{ $income->category->name ?? '-' }}</td>
                                                <td class="px-4 py-3 text-sm text-green-600 text-right font-medium">+{{ format_currency($income->amount) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead>
                                        <tr>
                                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Category</th>
                                            <th class="px-4 py-2 text-right text-xs font-medium text-gray-500 uppercase">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        @foreach($recentExpenses as $expense)
                                            <tr>
                                                <td class="px-4 py-3 text-sm text-gray-500">{{ $expense->date->format('M d') }}</td>
                                                <td class="px-4 py-3 text-sm text-gray-900">{{ Str::limit($expense->title, 20) }}</td>
                                                <td class="px-4 py-3 text-sm text-gray-500">{{ $expense->category->name ?? '-' }}</td>
                                                <td class="px-4 py-3 text-sm text-red-600 text-right font-medium">-{{ format_currency($expense->amount) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-gray-500 text-center py-4">{{ __('messages.No recent expenses recorded') }}</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Category Breakdown -->
            <div class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">{{ __('messages.Category Overview') }} ({{ __('messages.This Month') }})</h3>
                    @if(isset($categoryStats) && count($categoryStats) > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($categoryStats as $category)
                                <div class="p-4 bg-gray-50 rounded-lg">
                                    <div class="flex justify-between items-center mb-2">
                                        <span class="font-medium text-gray-900">{{ $category['name'] }}</span>
                                        <span class="text-xs px-2 py-1 rounded-full {{ $category['type'] === 'income' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ ucfirst($category['type']) }}
                                        </span>
                                    </div>
                                    <p class="text-lg font-semibold {{ $category['type'] === 'income' ? 'text-green-600' : 'text-red-600' }}">
                                        {{ format_currency($category['total']) }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 text-center py-4">{{ __('messages.No category data available') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
