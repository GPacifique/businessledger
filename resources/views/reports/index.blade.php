<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.Reports') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Date Filter -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <form method="GET" action="{{ route('reports.index') }}" class="flex flex-wrap items-end gap-4">
                        <div>
                            <label for="start_date" class="block text-sm font-medium text-gray-700">{{ __('messages.Start Date') }}</label>
                            <input type="date" name="start_date" id="start_date" value="{{ $startDate }}"
                                class="mt-1 block rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        </div>
                        <div>
                            <label for="end_date" class="block text-sm font-medium text-gray-700">{{ __('messages.End Date') }}</label>
                            <input type="date" name="end_date" id="end_date" value="{{ $endDate }}"
                                class="mt-1 block rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        </div>
                        <div>
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z">
                                    </path>
                                </svg>
                                {{ __('messages.Filter') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Summary Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <!-- Total Income -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-green-100 text-green-600">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">{{ __('messages.Daily Income') }}</p>
                                <p class="text-2xl font-semibold text-green-600">{{ format_currency($totalIncome ?? 0) }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Expenses -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-red-100 text-red-600">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">{{ __('messages.Daily Expenses') }}</p>
                                <p class="text-2xl font-semibold text-red-600">{{ format_currency($totalExpenses ?? 0) }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Net Balance -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            @php
                                $netBalance = ($totalIncome ?? 0) - ($totalExpenses ?? 0);
                            @endphp
                            <div
                                class="p-3 rounded-full {{ $netBalance >= 0 ? 'bg-blue-100 text-blue-600' : 'bg-orange-100 text-orange-600' }}">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                    </path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">{{ __('messages.Daily Balance') }}</p>
                                <p
                                    class="text-2xl font-semibold {{ $netBalance >= 0 ? 'text-blue-600' : 'text-orange-600' }}">
                                    {{ format_currency($netBalance) }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Monthly Stats -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        {{ __('messages.This Month') }} ({{ now()->format('F Y') }})
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="text-center p-4 bg-green-50 rounded-lg">
                            <p class="text-sm text-gray-600">{{ __('messages.Monthly Income') }}</p>
                            <p class="text-xl font-bold text-green-600">{{ format_currency($monthlyIncome ?? 0) }}</p>
                        </div>
                        <div class="text-center p-4 bg-red-50 rounded-lg">
                            <p class="text-sm text-gray-600">{{ __('messages.Monthly Expenses') }}</p>
                            <p class="text-xl font-bold text-red-600">{{ format_currency($monthlyExpenses ?? 0) }}</p>
                        </div>
                        @php
                            $monthlyBalance = ($monthlyIncome ?? 0) - ($monthlyExpenses ?? 0);
                        @endphp
                        <div class="text-center p-4 {{ $monthlyBalance >= 0 ? 'bg-blue-50' : 'bg-orange-50' }} rounded-lg">
                            <p class="text-sm text-gray-600">{{ __('messages.Monthly Balance') }}</p>
                            <p class="text-xl font-bold {{ $monthlyBalance >= 0 ? 'text-blue-600' : 'text-orange-600' }}">
                                {{ format_currency($monthlyBalance) }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Yearly Stats -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                            </path>
                        </svg>
                        {{ __('messages.This Year') }} ({{ now()->format('Y') }})
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="text-center p-4 bg-green-50 rounded-lg">
                            <p class="text-sm text-gray-600">{{ __('messages.Yearly Income') }}</p>
                            <p class="text-xl font-bold text-green-600">{{ format_currency($yearlyIncome ?? 0) }}</p>
                        </div>
                        <div class="text-center p-4 bg-red-50 rounded-lg">
                            <p class="text-sm text-gray-600">{{ __('messages.Yearly Expenses') }}</p>
                            <p class="text-xl font-bold text-red-600">{{ format_currency($yearlyExpenses ?? 0) }}</p>
                        </div>
                        @php
                            $yearlyBalance = ($yearlyIncome ?? 0) - ($yearlyExpenses ?? 0);
                        @endphp
                        <div class="text-center p-4 {{ $yearlyBalance >= 0 ? 'bg-blue-50' : 'bg-orange-50' }} rounded-lg">
                            <p class="text-sm text-gray-600">{{ __('messages.Yearly Balance') }}</p>
                            <p class="text-xl font-bold {{ $yearlyBalance >= 0 ? 'text-blue-600' : 'text-orange-600' }}">
                                {{ format_currency($yearlyBalance) }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Category Breakdown -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Income by Category -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <span class="w-3 h-3 bg-green-500 rounded-full mr-2"></span>
                            {{ __('messages.Income by Category') }}
                        </h3>
                        @if ($incomeByCategory->isEmpty())
                            <p class="text-sm text-gray-500 italic">{{ __('messages.No income recorded in this period.') }}</p>
                        @else
                            <div class="space-y-3">
                                @foreach ($incomeByCategory as $item)
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <span
                                                class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                                {{ $item->category->name ?? 'Uncategorized' }}
                                            </span>
                                        </div>
                                        <span class="text-sm font-medium text-gray-900">
                                            {{ format_currency($item->total) }}
                                        </span>
                                    </div>
                                    @if ($totalIncome > 0)
                                        <div class="w-full bg-gray-200 rounded-full h-2">
                                            <div class="bg-green-500 h-2 rounded-full"
                                                style="width: {{ ($item->total / $totalIncome) * 100 }}%"></div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Expenses by Category -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <span class="w-3 h-3 bg-red-500 rounded-full mr-2"></span>
                            {{ __('messages.Expenses by Category') }}
                        </h3>
                        @if ($expenseByCategory->isEmpty())
                            <p class="text-sm text-gray-500 italic">{{ __('messages.No expenses recorded in this period.') }}</p>
                        @else
                            <div class="space-y-3">
                                @foreach ($expenseByCategory as $item)
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <span
                                                class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                                                {{ $item->category->name ?? 'Uncategorized' }}
                                            </span>
                                        </div>
                                        <span class="text-sm font-medium text-gray-900">
                                            {{ format_currency($item->total) }}
                                        </span>
                                    </div>
                                    @if ($totalExpenses > 0)
                                        <div class="w-full bg-gray-200 rounded-full h-2">
                                            <div class="bg-red-500 h-2 rounded-full"
                                                style="width: {{ ($item->total / $totalExpenses) * 100 }}%"></div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Daily Summary -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">{{ __('messages.Daily Summary') }}</h3>
                    @php
                        $allDays = collect($dailyIncome->keys())
                            ->merge($dailyExpenses->keys())
                            ->unique()
                            ->sort();
                    @endphp
                    @if ($allDays->isEmpty())
                        <p class="text-sm text-gray-500 italic">{{ __('messages.No transactions recorded in this period.') }}</p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __('messages.Date') }}
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __('messages.Income') }}
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __('messages.Expenses') }}
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __('messages.Net') }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($allDays as $day)
                                        @php
                                            $dayIncome = $dailyIncome[$day] ?? 0;
                                            $dayExpense = $dailyExpenses[$day] ?? 0;
                                            $dayNet = $dayIncome - $dayExpense;
                                        @endphp
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ \Carbon\Carbon::parse($day)->format('M d, Y') }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-right text-green-600 font-medium">
                                                {{ $dayIncome > 0 ? format_currency($dayIncome) : '-' }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-right text-red-600 font-medium">
                                                {{ $dayExpense > 0 ? format_currency($dayExpense) : '-' }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-right font-medium {{ $dayNet >= 0 ? 'text-blue-600' : 'text-orange-600' }}">
                                                {{ format_currency($dayNet) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="bg-gray-50">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">
                                            {{ __('messages.Total') }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-right text-green-600 font-bold">
                                            {{ format_currency($totalIncome ?? 0) }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-right text-red-600 font-bold">
                                            {{ format_currency($totalExpenses ?? 0) }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-right font-bold {{ $netBalance >= 0 ? 'text-blue-600' : 'text-orange-600' }}">
                                            {{ format_currency($netBalance) }}
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
