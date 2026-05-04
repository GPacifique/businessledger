<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-bold text-2xl text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 leading-tight">
                    {{ $business->name }}
                </h2>
                <p class="text-gray-500 text-sm mt-1">{{ __('messages.Welcome back!') }} {{ __("messages.Here's what's happening with your business today.") }}</p>
            </div>
            <span class="px-4 py-2 text-sm bg-gradient-to-r from-emerald-400 to-green-500 text-white rounded-full font-semibold shadow-lg shadow-green-500/30">
                {{ __('messages.Business Admin') }}
            </span>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Stats Overview -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Today's Income -->
                <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-emerald-400 via-green-500 to-teal-600 p-6 shadow-xl shadow-green-500/20 transform hover:scale-[1.02] transition-all duration-300">
                    <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-white/10 rounded-full blur-2xl"></div>
                    <div class="relative">
                        <div class="flex items-center justify-between">
                            <div class="p-3 rounded-xl bg-white/20 backdrop-blur-sm">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <span class="flex items-center text-white/80 text-xs font-medium">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                                {{ __('messages.Today') }}
                            </span>
                        </div>
                        <div class="mt-4">
                            <p class="text-white/80 text-sm font-medium">{{ __("messages.Today's Income") }}</p>
                            <p class="text-3xl font-bold text-white mt-1">{{ format_currency($stats['today_income'] ?? 0) }}</p>
                        </div>
                    </div>
                </div>

                <!-- Today's Expenses -->
                <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-rose-400 via-red-500 to-pink-600 p-6 shadow-xl shadow-red-500/20 transform hover:scale-[1.02] transition-all duration-300">
                    <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-white/10 rounded-full blur-2xl"></div>
                    <div class="relative">
                        <div class="flex items-center justify-between">
                            <div class="p-3 rounded-xl bg-white/20 backdrop-blur-sm">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <span class="flex items-center text-white/80 text-xs font-medium">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"></path>
                                </svg>
                                {{ __('messages.Today') }}
                            </span>
                        </div>
                        <div class="mt-4">
                            <p class="text-white/80 text-sm font-medium">{{ __("messages.Today's Expenses") }}</p>
                            <p class="text-3xl font-bold text-white mt-1">{{ format_currency($stats['today_expenses'] ?? 0) }}</p>
                        </div>
                    </div>
                </div>

                <!-- Monthly Income -->
                <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-cyan-400 via-blue-500 to-indigo-600 p-6 shadow-xl shadow-blue-500/20 transform hover:scale-[1.02] transition-all duration-300">
                    <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-white/10 rounded-full blur-2xl"></div>
                    <div class="relative">
                        <div class="flex items-center justify-between">
                            <div class="p-3 rounded-xl bg-white/20 backdrop-blur-sm">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                            <span class="flex items-center text-white/80 text-xs font-medium">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                {{ __('messages.This Month') }}
                            </span>
                        </div>
                        <div class="mt-4">
                            <p class="text-white/80 text-sm font-medium">{{ __('messages.Monthly Income') }}</p>
                            <p class="text-3xl font-bold text-white mt-1">{{ format_currency($stats['month_income'] ?? 0) }}</p>
                        </div>
                    </div>
                </div>

                <!-- Monthly Expenses -->
                <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-amber-400 via-orange-500 to-red-500 p-6 shadow-xl shadow-orange-500/20 transform hover:scale-[1.02] transition-all duration-300">
                    <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-white/10 rounded-full blur-2xl"></div>
                    <div class="relative">
                        <div class="flex items-center justify-between">
                            <div class="p-3 rounded-xl bg-white/20 backdrop-blur-sm">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                            </div>
                            <span class="flex items-center text-white/80 text-xs font-medium">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                {{ __('messages.This Month') }}
                            </span>
                        </div>
                        <div class="mt-4">
                            <p class="text-white/80 text-sm font-medium">{{ __('messages.Monthly Expenses') }}</p>
                            <p class="text-3xl font-bold text-white mt-1">{{ format_currency($stats['month_expenses'] ?? 0) }}</p>
                        </div>
                    </div>
                </div>
            </div>
<!-- charts js-->
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
                                data: {!! json_encode(collect($monthlyData)->pluck('profit')) !!},
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
                const expenseData = {!! json_encode($expenseByCategory->map(fn($c) => ['category' => $c['category'], 'total' => $c['total']])->values()) !!};

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

            <!-- Balance Summary -->
            <div class="bg-white/80 backdrop-blur-lg overflow-hidden rounded-2xl shadow-xl border border-white/20 mb-8">
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center">
                        <span class="w-8 h-8 rounded-lg bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center mr-3">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                            </svg>
                        </span>
                        {{ __('messages.Balance Summary') }}
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="text-center p-6 bg-gradient-to-br from-emerald-50 to-green-100 rounded-2xl border border-emerald-200/50">
                            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-emerald-400 to-green-600 flex items-center justify-center mx-auto mb-3 shadow-lg shadow-green-500/30">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                                </svg>
                            </div>
                            <p class="text-sm text-gray-600 font-medium">{{ __('messages.Total Income') }}</p>
                            <p class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-emerald-500 to-green-600 mt-2">{{ format_currency($stats['total_income'] ?? 0) }}</p>
                        </div>
                        <div class="text-center p-6 bg-gradient-to-br from-rose-50 to-red-100 rounded-2xl border border-rose-200/50">
                            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-rose-400 to-red-600 flex items-center justify-center mx-auto mb-3 shadow-lg shadow-red-500/30">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                                </svg>
                            </div>
                            <p class="text-sm text-gray-600 font-medium">{{ __('messages.Total Expenses') }}</p>
                            <p class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-rose-500 to-red-600 mt-2">{{ format_currency($stats['total_expenses'] ?? 0) }}</p>
                        </div>
                        <div class="text-center p-6 {{ ($stats['balance'] ?? 0) >= 0 ? 'bg-gradient-to-br from-indigo-50 to-purple-100 border-indigo-200/50' : 'bg-gradient-to-br from-orange-50 to-amber-100 border-orange-200/50' }} rounded-2xl border">
                            <div class="w-12 h-12 rounded-full {{ ($stats['balance'] ?? 0) >= 0 ? 'bg-gradient-to-br from-indigo-400 to-purple-600 shadow-purple-500/30' : 'bg-gradient-to-br from-orange-400 to-amber-600 shadow-orange-500/30' }} flex items-center justify-center mx-auto mb-3 shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <p class="text-sm text-gray-600 font-medium">{{ __('messages.Net Balance') }}</p>
                            <p class="text-3xl font-bold {{ ($stats['balance'] ?? 0) >= 0 ? 'text-transparent bg-clip-text bg-gradient-to-r from-indigo-500 to-purple-600' : 'text-transparent bg-clip-text bg-gradient-to-r from-orange-500 to-amber-600' }} mt-2">
                                {{ format_currency($stats['balance'] ?? 0) }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <a href="{{ route('incomes.create') }}" class="group relative overflow-hidden bg-white/80 backdrop-blur-lg rounded-2xl p-6 shadow-lg border border-white/20 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-emerald-400/20 to-green-500/20 rounded-full -mr-10 -mt-10 group-hover:scale-150 transition-transform duration-500"></div>
                    <div class="relative text-center">
                        <div class="mx-auto w-14 h-14 bg-gradient-to-br from-emerald-400 to-green-600 rounded-2xl flex items-center justify-center mb-4 shadow-lg shadow-green-500/30 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                        <h4 class="font-bold text-gray-900">{{ __('messages.Add Income') }}</h4>
                        <p class="text-sm text-gray-500 mt-1">{{ __('messages.Record new income') }}</p>
                    </div>
                </a>

                <a href="{{ route('expenses.create') }}" class="group relative overflow-hidden bg-white/80 backdrop-blur-lg rounded-2xl p-6 shadow-lg border border-white/20 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-rose-400/20 to-red-500/20 rounded-full -mr-10 -mt-10 group-hover:scale-150 transition-transform duration-500"></div>
                    <div class="relative text-center">
                        <div class="mx-auto w-14 h-14 bg-gradient-to-br from-rose-400 to-red-600 rounded-2xl flex items-center justify-center mb-4 shadow-lg shadow-red-500/30 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                            </svg>
                        </div>
                        <h4 class="font-bold text-gray-900">{{ __('messages.Add Expense') }}</h4>
                        <p class="text-sm text-gray-500 mt-1">{{ __('messages.Record new expense') }}</p>
                    </div>
                </a>

                <a href="{{ route('categories.index') }}" class="group relative overflow-hidden bg-white/80 backdrop-blur-lg rounded-2xl p-6 shadow-lg border border-white/20 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-cyan-400/20 to-blue-500/20 rounded-full -mr-10 -mt-10 group-hover:scale-150 transition-transform duration-500"></div>
                    <div class="relative text-center">
                        <div class="mx-auto w-14 h-14 bg-gradient-to-br from-cyan-400 to-blue-600 rounded-2xl flex items-center justify-center mb-4 shadow-lg shadow-blue-500/30 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                        </div>
                        <h4 class="font-bold text-gray-900">{{ __('messages.Categories') }}</h4>
                        <p class="text-sm text-gray-500 mt-1">{{ __('messages.Manage categories') }}</p>
                    </div>
                </a>

                <a href="{{ route('reports.index') }}" class="group relative overflow-hidden bg-white/80 backdrop-blur-lg rounded-2xl p-6 shadow-lg border border-white/20 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-purple-400/20 to-pink-500/20 rounded-full -mr-10 -mt-10 group-hover:scale-150 transition-transform duration-500"></div>
                    <div class="relative text-center">
                        <div class="mx-auto w-14 h-14 bg-gradient-to-br from-purple-400 to-pink-600 rounded-2xl flex items-center justify-center mb-4 shadow-lg shadow-purple-500/30 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h4 class="font-bold text-gray-900">{{ __('messages.Reports') }}</h4>
                        <p class="text-sm text-gray-500 mt-1">{{ __('messages.View financial reports') }}</p>
                    </div>
                </a>
            </div>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h4 class="font-medium text-gray-900">{{ __('messages.Reports') }}</h4>
                        <p class="text-sm text-gray-500">{{ __('messages.View financial reports') }}</p>
                    </div>
                </a>
            </div>

            <!-- Recent Transactions -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Recent Income -->
                <div class="bg-white/80 backdrop-blur-lg overflow-hidden rounded-2xl shadow-xl border border-white/20">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-lg font-bold text-gray-900 flex items-center">
                                <span class="w-8 h-8 rounded-lg bg-gradient-to-br from-emerald-400 to-green-600 flex items-center justify-center mr-3 shadow-lg shadow-green-500/20">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                                    </svg>
                                </span>
                                {{ __('messages.Recent Income') }}
                            </h3>
                            <a href="{{ route('incomes.index') }}" class="text-sm font-semibold text-transparent bg-clip-text bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 transition-colors">{{ __('messages.View All') }} →</a>
                        </div>
                        @if(isset($recentIncomes) && $recentIncomes->count() > 0)
                            <div class="space-y-3">
                                @foreach($recentIncomes as $income)
                                    <div class="flex justify-between items-center p-4 bg-gradient-to-r from-emerald-50/80 to-green-50/80 rounded-xl border border-emerald-100/50 hover:shadow-md transition-all duration-200">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-emerald-400 to-green-500 flex items-center justify-center mr-3 shadow-md shadow-green-500/20">
                                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="font-semibold text-gray-900">{{ $income->title }}</p>
                                                <p class="text-sm text-gray-500">{{ $income->category->name ?? 'Uncategorized' }} • {{ $income->date->format('M d, Y') }}</p>
                                            </div>
                                        </div>
                                        <span class="text-lg font-bold text-transparent bg-clip-text bg-gradient-to-r from-emerald-500 to-green-600">+{{ format_currency($income->amount) }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-8">
                                <div class="w-16 h-16 rounded-full bg-gradient-to-br from-emerald-100 to-green-200 flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <p class="text-gray-500">{{ __('messages.No recent income recorded') }}</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Recent Expenses -->
                <div class="bg-white/80 backdrop-blur-lg overflow-hidden rounded-2xl shadow-xl border border-white/20">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-lg font-bold text-gray-900 flex items-center">
                                <span class="w-8 h-8 rounded-lg bg-gradient-to-br from-rose-400 to-red-600 flex items-center justify-center mr-3 shadow-lg shadow-red-500/20">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                                    </svg>
                                </span>
                                {{ __('messages.Recent Expenses') }}
                            </h3>
                            <a href="{{ route('expenses.index') }}" class="text-sm font-semibold text-transparent bg-clip-text bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 transition-colors">{{ __('messages.View All') }} →</a>
                        </div>
                        @if(isset($recentExpenses) && $recentExpenses->count() > 0)
                            <div class="space-y-3">
                                @foreach($recentExpenses as $expense)
                                    <div class="flex justify-between items-center p-4 bg-gradient-to-r from-rose-50/80 to-red-50/80 rounded-xl border border-rose-100/50 hover:shadow-md transition-all duration-200">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-rose-400 to-red-500 flex items-center justify-center mr-3 shadow-md shadow-red-500/20">
                                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="font-semibold text-gray-900">{{ $expense->title }}</p>
                                                <p class="text-sm text-gray-500">{{ $expense->category->name ?? 'Uncategorized' }} • {{ $expense->date->format('M d, Y') }}</p>
                                            </div>
                                        </div>
                                        <span class="text-lg font-bold text-transparent bg-clip-text bg-gradient-to-r from-rose-500 to-red-600">-{{ format_currency($expense->amount) }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-8">
                                <div class="w-16 h-16 rounded-full bg-gradient-to-br from-rose-100 to-red-200 flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </div>
                                <p class="text-gray-500">{{ __('messages.No recent expenses recorded') }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Staff Management -->
            <div class="mt-8 bg-white/80 backdrop-blur-lg overflow-hidden rounded-2xl shadow-xl border border-white/20">
                <div class="p-6">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-violet-400 to-purple-600 flex items-center justify-center mr-4 shadow-lg shadow-purple-500/20">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-900">{{ __('messages.Staff Management') }}</h3>
                                <p class="text-gray-500">{{ __('messages.Total staff members') }}: <span class="font-bold text-transparent bg-clip-text bg-gradient-to-r from-violet-500 to-purple-600">{{ $stats['staff_count'] ?? 0 }}</span></p>
                            </div>
                        </div>
                        <a href="{{ route('staff.index') }}" class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-violet-500 to-purple-600 text-white rounded-xl font-semibold text-sm hover:from-violet-600 hover:to-purple-700 transition-all duration-300 shadow-lg shadow-purple-500/20 hover:shadow-xl hover:-translate-y-0.5">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
                            {{ __('messages.Manage Staff') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
