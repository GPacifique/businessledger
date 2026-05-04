<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <a href="{{ route('admin.dashboard') }}" class="h-10 w-10 rounded-xl bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-gray-200 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </a>
                <div class="h-12 w-12 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white font-bold text-lg shadow-lg">
                    {{ strtoupper(substr($business->name, 0, 2)) }}
                </div>
                <div>
                    <h2 class="font-bold text-xl text-gray-800 leading-tight">{{ $business->name }}</h2>
                    <p class="text-sm text-gray-500">Financial Overview</p>
                </div>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.businesses.balance-sheet', $business) }}" class="inline-flex items-center px-4 py-2 bg-emerald-600 text-white rounded-lg font-medium hover:bg-emerald-700 transition shadow-sm">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                   {{_('messages.Download Balance Sheet')}}
                </a>
                <a href="{{ route('admin.businesses.edit', $business) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg font-medium hover:bg-blue-700 transition">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Edit Business
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Business Status & Subscription -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                <!-- Business Info Card -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Business Info</h3>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-500">Status</span>
                            @if($business->status === 'approved')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500 mr-1.5"></span>
                                    Approved
                                </span>
                            @elseif($business->status === 'pending')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-800">
                                    Pending
                                </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-800">
                                    Rejected
                                </span>
                            @endif
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-500">Created</span>
                            <span class="text-gray-900 font-medium">{{ $business->created_at->format('M d, Y') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-500">Total Users</span>
                            <span class="text-gray-900 font-medium">{{ $businessUsers->count() }}</span>
                        </div>
                    </div>
                </div>

                <!-- Subscription Card -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Subscription</h3>
                    @if($subscription)
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-500">Plan</span>
                                <span class="text-gray-900 font-medium">{{ $subscription->plan->name ?? 'N/A' }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500">Status</span>
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                                    Active
                                </span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500">Expires</span>
                                <span class="text-gray-900 font-medium">{{ $subscription->ends_at->format('M d, Y') }}</span>
                            </div>
                        </div>
                    @else
                        <div class="text-center py-4">
                            <div class="h-12 w-12 rounded-full bg-gray-100 flex items-center justify-center mx-auto mb-3">
                                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <p class="text-gray-500 text-sm">No active subscription</p>
                        </div>
                    @endif
                </div>

                <!-- Users Card -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Team Members</h3>
                    <div class="space-y-3 max-h-40 overflow-y-auto">
                        @forelse($businessUsers as $user)
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="h-8 w-8 rounded-full bg-purple-100 flex items-center justify-center mr-2">
                                        <span class="text-xs font-bold text-purple-600">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                                    </div>
                                    <span class="text-sm text-gray-900">{{ $user->name }}</span>
                                </div>
                                <span class="text-xs px-2 py-1 rounded-full bg-gray-100 text-gray-600">{{ ucfirst(str_replace('_', ' ', $user->role)) }}</span>
                            </div>
                        @empty
                            <p class="text-gray-500 text-sm text-center">No users assigned</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Financial Stats Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Income -->
                <div class="bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl p-6 text-white shadow-lg">
                    <div class="flex items-center justify-between mb-4">
                        <div class="h-12 w-12 rounded-xl bg-white/20 flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-green-100 text-sm font-medium mb-1">Total Income</p>
                    <p class="text-3xl font-bold">{{ number_format($totalIncome, 0) }} <span class="text-lg">RWF</span></p>
                    <p class="text-green-100 text-xs mt-2">All time earnings</p>
                </div>

                <!-- Total Expenses -->
                <div class="bg-gradient-to-br from-red-500 to-rose-600 rounded-2xl p-6 text-white shadow-lg">
                    <div class="flex items-center justify-between mb-4">
                        <div class="h-12 w-12 rounded-xl bg-white/20 flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-red-100 text-sm font-medium mb-1">Total Expenses</p>
                    <p class="text-3xl font-bold">{{ number_format($totalExpenses, 0) }} <span class="text-lg">RWF</span></p>
                    <p class="text-red-100 text-xs mt-2">All time spending</p>
                </div>

                <!-- Net Profit -->
                <div class="bg-gradient-to-br {{ $netProfit >= 0 ? 'from-indigo-500 to-purple-600' : 'from-orange-500 to-red-600' }} rounded-2xl p-6 text-white shadow-lg">
                    <div class="flex items-center justify-between mb-4">
                        <div class="h-12 w-12 rounded-xl bg-white/20 flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-indigo-100 text-sm font-medium mb-1">Net Profit</p>
                    <p class="text-3xl font-bold">{{ number_format($netProfit, 0) }} <span class="text-lg">RWF</span></p>
                    <p class="text-indigo-100 text-xs mt-2">{{ $netProfit >= 0 ? 'Profitable' : 'Loss' }}</p>
                </div>

                <!-- This Month Profit -->
                <div class="bg-gradient-to-br from-cyan-500 to-teal-600 rounded-2xl p-6 text-white shadow-lg">
                    <div class="flex items-center justify-between mb-4">
                        <div class="h-12 w-12 rounded-xl bg-white/20 flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-cyan-100 text-sm font-medium mb-1">This Month</p>
                    <p class="text-3xl font-bold">{{ number_format($monthlyProfit, 0) }} <span class="text-lg">RWF</span></p>
                    <p class="text-cyan-100 text-xs mt-2">{{ now()->format('F Y') }}</p>
                </div>
            </div>

            <!-- Monthly Breakdown -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- This Month Stats -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-6">{{ now()->format('F Y') }} Breakdown</h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-green-50 rounded-xl">
                            <div class="flex items-center">
                                <div class="h-10 w-10 rounded-lg bg-green-500 flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"/>
                                    </svg>
                                </div>
                                <span class="font-medium text-gray-700">Income</span>
                            </div>
                            <span class="text-xl font-bold text-green-600">{{ number_format($monthlyIncome, 0) }} RWF</span>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-red-50 rounded-xl">
                            <div class="flex items-center">
                                <div class="h-10 w-10 rounded-lg bg-red-500 flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 13l-5 5m0 0l-5-5m5 5V6"/>
                                    </svg>
                                </div>
                                <span class="font-medium text-gray-700">Expenses</span>
                            </div>
                            <span class="text-xl font-bold text-red-600">{{ number_format($monthlyExpenses, 0) }} RWF</span>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-indigo-50 rounded-xl border-2 border-indigo-200">
                            <div class="flex items-center">
                                <div class="h-10 w-10 rounded-lg bg-indigo-500 flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <span class="font-medium text-gray-700">Net Profit</span>
                            </div>
                            <span class="text-xl font-bold {{ $monthlyProfit >= 0 ? 'text-indigo-600' : 'text-red-600' }}">{{ number_format($monthlyProfit, 0) }} RWF</span>
                        </div>
                    </div>
                </div>

                <!-- This Year Stats -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-6">{{ now()->format('Y') }} Yearly Summary</h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-green-50 rounded-xl">
                            <div class="flex items-center">
                                <div class="h-10 w-10 rounded-lg bg-green-500 flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"/>
                                    </svg>
                                </div>
                                <span class="font-medium text-gray-700">Yearly Income</span>
                            </div>
                            <span class="text-xl font-bold text-green-600">{{ number_format($yearlyIncome, 0) }} RWF</span>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-red-50 rounded-xl">
                            <div class="flex items-center">
                                <div class="h-10 w-10 rounded-lg bg-red-500 flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 13l-5 5m0 0l-5-5m5 5V6"/>
                                    </svg>
                                </div>
                                <span class="font-medium text-gray-700">Yearly Expenses</span>
                            </div>
                            <span class="text-xl font-bold text-red-600">{{ number_format($yearlyExpenses, 0) }} RWF</span>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-indigo-50 rounded-xl border-2 border-indigo-200">
                            <div class="flex items-center">
                                <div class="h-10 w-10 rounded-lg bg-indigo-500 flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <span class="font-medium text-gray-700">Yearly Profit</span>
                            </div>
                            <span class="text-xl font-bold {{ $yearlyProfit >= 0 ? 'text-indigo-600' : 'text-red-600' }}">{{ number_format($yearlyProfit, 0) }} RWF</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 6-Month Trend Chart -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-8">
                <h3 class="text-lg font-semibold text-gray-900 mb-6">Last 6 Months Trend</h3>

                <!-- Chart Canvas -->
                <div class="mb-8" style="height: 300px;">
                    <canvas id="trendChart"></canvas>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-left text-sm text-gray-500 border-b border-gray-200">
                                <th class="pb-3 font-medium">Month</th>
                                <th class="pb-3 font-medium text-right">Income</th>
                                <th class="pb-3 font-medium text-right">Expenses</th>
                                <th class="pb-3 font-medium text-right">Profit</th>
                                <th class="pb-3 font-medium">Trend</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($monthlyData as $data)
                                @php $profit = $data['income'] - $data['expenses']; @endphp
                                <tr class="hover:bg-gray-50">
                                    <td class="py-4 font-medium text-gray-900">{{ $data['month'] }}</td>
                                    <td class="py-4 text-right text-green-600 font-medium">{{ number_format($data['income'], 0) }} RWF</td>
                                    <td class="py-4 text-right text-red-600 font-medium">{{ number_format($data['expenses'], 0) }} RWF</td>
                                    <td class="py-4 text-right font-bold {{ $profit >= 0 ? 'text-indigo-600' : 'text-red-600' }}">{{ number_format($profit, 0) }} RWF</td>
                                    <td class="py-4">
                                        @php
                                            $maxValue = max($data['income'], $data['expenses'], 1);
                                            $incomePercent = ($data['income'] / $maxValue) * 100;
                                            $expensePercent = ($data['expenses'] / $maxValue) * 100;
                                        @endphp
                                        <div class="w-32 space-y-1">
                                            <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
                                                <div class="h-full bg-green-500 rounded-full" style="width: {{ $incomePercent }}%"></div>
                                            </div>
                                            <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
                                                <div class="h-full bg-red-500 rounded-full" style="width: {{ $expensePercent }}%"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Category Breakdown -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Income by Category -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-6">Income by Category</h3>
                    @if($incomeByCategory->count())
                        <!-- Doughnut Chart -->
                        <div class="mb-6 flex justify-center" style="height: 200px;">
                            <canvas id="incomeCategoryChart"></canvas>
                        </div>
                        <div class="space-y-4">
                            @foreach($incomeByCategory as $category)
                                @php $percentage = $totalIncome > 0 ? ($category['total'] / $totalIncome) * 100 : 0; @endphp
                                <div>
                                    <div class="flex justify-between mb-1">
                                        <span class="text-sm font-medium text-gray-700">{{ $category['category'] }}</span>
                                        <span class="text-sm font-bold text-green-600">{{ number_format($category['total'], 0) }} RWF</span>
                                    </div>
                                    <div class="h-3 bg-gray-100 rounded-full overflow-hidden">
                                        <div class="h-full bg-gradient-to-r from-green-400 to-emerald-500 rounded-full" style="width: {{ $percentage }}%"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 text-center py-8">No income data available</p>
                    @endif
                </div>

                <!-- Expenses by Category -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-6">Expenses by Category</h3>
                    @if($expensesByCategory->count())
                        <!-- Doughnut Chart -->
                        <div class="mb-6 flex justify-center" style="height: 200px;">
                            <canvas id="expenseCategoryChart"></canvas>
                        </div>
                        <div class="space-y-4">
                            @foreach($expensesByCategory as $category)
                                @php $percentage = $totalExpenses > 0 ? ($category['total'] / $totalExpenses) * 100 : 0; @endphp
                                <div>
                                    <div class="flex justify-between mb-1">
                                        <span class="text-sm font-medium text-gray-700">{{ $category['category'] }}</span>
                                        <span class="text-sm font-bold text-red-600">{{ number_format($category['total'], 0) }} RWF</span>
                                    </div>
                                    <div class="h-3 bg-gray-100 rounded-full overflow-hidden">
                                        <div class="h-full bg-gradient-to-r from-red-400 to-rose-500 rounded-full" style="width: {{ $percentage }}%"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 text-center py-8">No expense data available</p>
                    @endif
                </div>
            </div>

            <!-- Recent Transactions -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Recent Incomes -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-green-50 to-emerald-50">
                        <h3 class="text-lg font-semibold text-gray-900">Recent Incomes</h3>
                    </div>
                    <div class="divide-y divide-gray-100">
                        @forelse($recentIncomes as $income)
                            <div class="p-4 hover:bg-gray-50 transition">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded-lg bg-green-100 flex items-center justify-center mr-3">
                                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-900">{{ $income->title }}</p>
                                            <p class="text-xs text-gray-500">{{ $income->category->name ?? 'Uncategorized' }} • {{ $income->date->format('M d, Y') }}</p>
                                        </div>
                                    </div>
                                    <span class="text-lg font-bold text-green-600">+{{ number_format($income->amount, 0) }}</span>
                                </div>
                            </div>
                        @empty
                            <div class="p-8 text-center text-gray-500">
                                <p>No income records found</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Recent Expenses -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-red-50 to-rose-50">
                        <h3 class="text-lg font-semibold text-gray-900">Recent Expenses</h3>
                    </div>
                    <div class="divide-y divide-gray-100">
                        @forelse($recentExpenses as $expense)
                            <div class="p-4 hover:bg-gray-50 transition">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded-lg bg-red-100 flex items-center justify-center mr-3">
                                            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-900">{{ $expense->title }}</p>
                                            <p class="text-xs text-gray-500">{{ $expense->category->name ?? 'Uncategorized' }} • {{ $expense->date->format('M d, Y') }}</p>
                                        </div>
                                    </div>
                                    <span class="text-lg font-bold text-red-600">-{{ number_format($expense->amount, 0) }}</span>
                                </div>
                            </div>
                        @empty
                            <div class="p-8 text-center text-gray-500">
                                <p>No expense records found</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // 6-Month Trend Line/Bar Chart
            const trendCtx = document.getElementById('trendChart');
            if (trendCtx) {
                new Chart(trendCtx, {
                    type: 'bar',
                    data: {
                        labels: {!! json_encode(collect($monthlyData)->pluck('month')) !!},
                        datasets: [
                            {
                                label: 'Income',
                                data: {!! json_encode(collect($monthlyData)->pluck('income')) !!},
                                backgroundColor: 'rgba(16, 185, 129, 0.8)',
                                borderColor: 'rgb(16, 185, 129)',
                                borderWidth: 2,
                                borderRadius: 6,
                                barPercentage: 0.4,
                            },
                            {
                                label: 'Expenses',
                                data: {!! json_encode(collect($monthlyData)->pluck('expenses')) !!},
                                backgroundColor: 'rgba(239, 68, 68, 0.8)',
                                borderColor: 'rgb(239, 68, 68)',
                                borderWidth: 2,
                                borderRadius: 6,
                                barPercentage: 0.4,
                            },
                            {
                                label: 'Profit',
                                data: {!! json_encode(collect($monthlyData)->map(fn($d) => $d['income'] - $d['expenses'])) !!},
                                type: 'line',
                                borderColor: 'rgb(99, 102, 241)',
                                backgroundColor: 'rgba(99, 102, 241, 0.1)',
                                borderWidth: 3,
                                fill: true,
                                tension: 0.4,
                                pointBackgroundColor: 'rgb(99, 102, 241)',
                                pointBorderColor: '#fff',
                                pointBorderWidth: 2,
                                pointRadius: 5,
                                pointHoverRadius: 7,
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        interaction: {
                            mode: 'index',
                            intersect: false,
                        },
                        plugins: {
                            legend: {
                                position: 'top',
                                labels: {
                                    usePointStyle: true,
                                    padding: 20,
                                    font: { size: 12, weight: '500' }
                                }
                            },
                            tooltip: {
                                backgroundColor: 'rgba(17, 24, 39, 0.9)',
                                padding: 12,
                                titleFont: { size: 14, weight: 'bold' },
                                bodyFont: { size: 13 },
                                callbacks: {
                                    label: function(context) {
                                        return context.dataset.label + ': ' + new Intl.NumberFormat().format(context.raw) + ' RWF';
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: { color: 'rgba(0,0,0,0.05)' },
                                ticks: {
                                    callback: function(value) {
                                        return new Intl.NumberFormat('en', { notation: 'compact' }).format(value);
                                    }
                                }
                            },
                            x: {
                                grid: { display: false }
                            }
                        }
                    }
                });
            }

            // Income by Category Doughnut Chart
            const incomeCtx = document.getElementById('incomeCategoryChart');
            if (incomeCtx) {
                const incomeData = {!! json_encode($incomeByCategory->map(fn($c) => ['category' => $c['category'], 'total' => $c['total']])->values()) !!};

                if (incomeData.length > 0) {
                    const greenColors = [
                        'rgba(16, 185, 129, 0.9)',
                        'rgba(5, 150, 105, 0.9)',
                        'rgba(4, 120, 87, 0.9)',
                        'rgba(6, 95, 70, 0.9)',
                        'rgba(52, 211, 153, 0.9)',
                        'rgba(110, 231, 183, 0.9)',
                        'rgba(167, 243, 208, 0.9)',
                    ];

                    new Chart(incomeCtx, {
                        type: 'doughnut',
                        data: {
                            labels: incomeData.map(d => d.category),
                            datasets: [{
                                data: incomeData.map(d => d.total),
                                backgroundColor: greenColors.slice(0, incomeData.length),
                                borderColor: '#fff',
                                borderWidth: 3,
                                hoverOffset: 10
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            cutout: '60%',
                            plugins: {
                                legend: {
                                    position: 'bottom',
                                    labels: {
                                        usePointStyle: true,
                                        padding: 15,
                                        font: { size: 11 }
                                    }
                                },
                                tooltip: {
                                    backgroundColor: 'rgba(17, 24, 39, 0.9)',
                                    padding: 12,
                                    callbacks: {
                                        label: function(context) {
                                            const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                            const percentage = ((context.raw / total) * 100).toFixed(1);
                                            return context.label + ': ' + new Intl.NumberFormat().format(context.raw) + ' RWF (' + percentage + '%)';
                                        }
                                    }
                                }
                            }
                        }
                    });
                }
            }

            // Expenses by Category Doughnut Chart
            const expenseCtx = document.getElementById('expenseCategoryChart');
            if (expenseCtx) {
                const expenseData = {!! json_encode($expensesByCategory->map(fn($c) => ['category' => $c['category'], 'total' => $c['total']])->values()) !!};

                if (expenseData.length > 0) {
                    const redColors = [
                        'rgba(239, 68, 68, 0.9)',
                        'rgba(220, 38, 38, 0.9)',
                        'rgba(185, 28, 28, 0.9)',
                        'rgba(153, 27, 27, 0.9)',
                        'rgba(248, 113, 113, 0.9)',
                        'rgba(252, 165, 165, 0.9)',
                        'rgba(254, 202, 202, 0.9)',
                    ];

                    new Chart(expenseCtx, {
                        type: 'doughnut',
                        data: {
                            labels: expenseData.map(d => d.category),
                            datasets: [{
                                data: expenseData.map(d => d.total),
                                backgroundColor: redColors.slice(0, expenseData.length),
                                borderColor: '#fff',
                                borderWidth: 3,
                                hoverOffset: 10
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            cutout: '60%',
                            plugins: {
                                legend: {
                                    position: 'bottom',
                                    labels: {
                                        usePointStyle: true,
                                        padding: 15,
                                        font: { size: 11 }
                                    }
                                },
                                tooltip: {
                                    backgroundColor: 'rgba(17, 24, 39, 0.9)',
                                    padding: 12,
                                    callbacks: {
                                        label: function(context) {
                                            const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                            const percentage = ((context.raw / total) * 100).toFixed(1);
                                            return context.label + ': ' + new Intl.NumberFormat().format(context.raw) + ' RWF (' + percentage + '%)';
                                        }
                                    }
                                }
                            }
                        }
                    });
                }
            }
        });
    </script>
</x-app-layout>
