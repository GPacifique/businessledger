<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'BusinessLedger') }} - Income & Expense Management</title>

        <!-- SEO Meta Tags -->
        <meta name="description" content="BusinessLedger - The smart way to track your business income and expenses. Manage your finances, monitor cash flow, and make better business decisions.">
        <meta name="keywords" content="income tracking, expense management, business finance, cash flow, profit tracking, financial reports, Rwanda, RWF, business accounting">
        <meta name="author" content="BusinessLedger">
        <meta name="robots" content="index, follow">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url('/') }}">
        <meta property="og:title" content="BusinessLedger - Smart Income & Expense Management">
        <meta property="og:description" content="Track your business income and expenses effortlessly. Get insights into your cash flow and profitability.">
        <meta property="og:image" content="{{ asset('images/og-image.png') }}">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
        <meta property="og:site_name" content="BusinessLedger">

        <!-- Twitter -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:url" content="{{ url('/') }}">
        <meta name="twitter:title" content="BusinessLedger - Smart Income & Expense Management">
        <meta name="twitter:description" content="Track your business income and expenses effortlessly. Get insights into your cash flow and profitability.">
        <meta name="twitter:image" content="{{ asset('images/og-image.png') }}">

        <!-- Favicon -->
        <link rel="icon" type="image/svg+xml" href="{{ asset('images/logo.svg') }}">
        <link rel="apple-touch-icon" href="{{ asset('images/logo.svg') }}">

        <!-- Theme Color -->
        <meta name="theme-color" content="#059669">
        <meta name="msapplication-TileColor" content="#059669">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-sans">
        <div class="min-h-screen bg-gradient-to-br from-emerald-900 via-teal-900 to-cyan-900 relative overflow-hidden">
            <!-- Background Pattern -->
            <div class="absolute inset-0 opacity-10">
                <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <defs>
                        <pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse">
                            <path d="M 10 0 L 0 0 0 10" fill="none" stroke="white" stroke-width="0.5"/>
                        </pattern>
                    </defs>
                    <rect width="100" height="100" fill="url(#grid)"/>
                </svg>
            </div>

            <!-- Floating Decorative Elements -->
            <div class="absolute top-20 left-20 w-32 h-32 bg-emerald-400/20 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-40 right-20 w-48 h-48 bg-teal-400/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
            <div class="absolute top-1/3 right-1/4 w-24 h-24 bg-green-400/20 rounded-full blur-2xl animate-pulse" style="animation-delay: 2s;"></div>
            <div class="absolute bottom-20 left-1/4 w-36 h-36 bg-cyan-400/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 1.5s;"></div>

            <!-- Navigation -->
            <nav class="relative z-10 px-6 py-4 lg:px-12">
                <div class="flex items-center justify-between max-w-7xl mx-auto">
                    <!-- Logo -->
                    <div class="flex items-center space-x-3">
                        <div class="bg-white/20 backdrop-blur-sm p-3 rounded-xl">
                            <svg class="w-10 h-10 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 2v20M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl font-extrabold text-white tracking-tight">BusinessLedger</h1>
                            <p class="text-emerald-200 text-xs">Income & Expense Tracker</p>
                        </div>
                    </div>

                    <!-- Auth Links -->
                    @if (Route::has('login'))
                        <div class="flex items-center space-x-4">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="px-6 py-2.5 bg-white/20 backdrop-blur-sm text-white rounded-xl font-semibold hover:bg-white/30 transition">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="px-6 py-2.5 text-white font-semibold hover:text-emerald-200 transition">
                                    Log in
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="px-6 py-2.5 bg-white text-emerald-900 rounded-xl font-semibold hover:bg-emerald-100 transition transform hover:scale-105 shadow-lg">
                                        Get Started
                                    </a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </nav>

            <!-- Hero Section -->
            <div class="relative z-10 px-6 lg:px-12 py-20 lg:py-32">
                <div class="max-w-7xl mx-auto">
                    <div class="grid lg:grid-cols-2 gap-12 items-center">
                        <!-- Left Content -->
                        <div class="text-white">
                            <div class="inline-flex items-center px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-sm mb-6">
                                <span class="h-2 w-2 rounded-full bg-green-400 mr-2 animate-pulse"></span>
                                Track Every Franc Coming In & Going Out
                            </div>

                            <h2 class="text-4xl lg:text-6xl font-extrabold leading-tight mb-6">
                                Master Your
                                <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-cyan-400">
                                    Business Finances
                                </span>
                            </h2>

                            <p class="text-xl text-emerald-200 mb-8 leading-relaxed">
                                Stop guessing where your money goes. BusinessLedger helps you track every income and expense, categorize transactions, and see your true profit in real-time.
                            </p>

                            <div class="flex flex-col sm:flex-row gap-4 mb-12">
                                <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-emerald-400 to-teal-500 text-gray-900 rounded-xl font-bold text-lg hover:from-emerald-300 hover:to-teal-400 transition transform hover:scale-105 shadow-xl">
                                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    </svg>
                                    Start Tracking Free
                                </a>
                                <a href="#features" class="inline-flex items-center justify-center px-8 py-4 bg-white/10 backdrop-blur-sm text-white rounded-xl font-bold text-lg hover:bg-white/20 transition">
                                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                    </svg>
                                    See Features
                                </a>
                            </div>

                            <!-- Stats -->
                            <div class="grid grid-cols-3 gap-6">
                                <div class="text-center">
                                    <p class="text-3xl font-extrabold text-emerald-400">100%</p>
                                    <p class="text-emerald-200 text-sm">Visibility</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-3xl font-extrabold text-emerald-400">Real-time</p>
                                    <p class="text-emerald-200 text-sm">Balance Updates</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-3xl font-extrabold text-emerald-400">Easy</p>
                                    <p class="text-emerald-200 text-sm">To Use</p>
                                </div>
                            </div>
                        </div>

                        <!-- Right Content - Feature Cards -->
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 transform hover:scale-105 transition border border-white/20">
                                <div class="h-12 w-12 rounded-xl bg-green-500 flex items-center justify-center mb-4">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <h3 class="text-white font-bold text-lg mb-2">Track Income</h3>
                                <p class="text-emerald-200 text-sm">Record all money coming into your business</p>
                            </div>

                            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 transform hover:scale-105 transition border border-white/20 mt-8">
                                <div class="h-12 w-12 rounded-xl bg-red-500 flex items-center justify-center mb-4">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                </div>
                                <h3 class="text-white font-bold text-lg mb-2">Track Expenses</h3>
                                <p class="text-emerald-200 text-sm">Monitor every franc spent</p>
                            </div>

                            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 transform hover:scale-105 transition border border-white/20">
                                <div class="h-12 w-12 rounded-xl bg-blue-500 flex items-center justify-center mb-4">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"/>
                                    </svg>
                                </div>
                                <h3 class="text-white font-bold text-lg mb-2">See Profit/Loss</h3>
                                <p class="text-emerald-200 text-sm">Know your true financial position</p>
                            </div>

                            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 transform hover:scale-105 transition border border-white/20 mt-8">
                                <div class="h-12 w-12 rounded-xl bg-purple-500 flex items-center justify-center mb-4">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                                <h3 class="text-white font-bold text-lg mb-2">Smart Reports</h3>
                                <p class="text-emerald-200 text-sm">Daily, weekly, monthly summaries</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Features Section -->
            <div id="features" class="relative z-10 px-6 lg:px-12 py-20 bg-white/5 backdrop-blur-sm">
                <div class="max-w-7xl mx-auto">
                    <div class="text-center mb-16">
                        <h3 class="text-3xl lg:text-4xl font-extrabold text-white mb-4">Take Control of Your Money</h3>
                        <p class="text-emerald-200 text-lg max-w-2xl mx-auto">Everything you need to manage your business finances in one place</p>
                    </div>

                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <!-- Income Management -->
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 border border-white/10 hover:border-emerald-400/50 transition">
                            <div class="h-14 w-14 rounded-2xl bg-gradient-to-br from-green-400 to-emerald-600 flex items-center justify-center mb-6">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/>
                                </svg>
                            </div>
                            <h4 class="text-xl font-bold text-white mb-3">Income Categories</h4>
                            <p class="text-emerald-200">Organize income by source: Sales, Services, Investments, Rent, and more. Know where your money comes from.</p>
                        </div>

                        <!-- Expense Management -->
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 border border-white/10 hover:border-red-400/50 transition">
                            <div class="h-14 w-14 rounded-2xl bg-gradient-to-br from-red-400 to-rose-600 flex items-center justify-center mb-6">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                                </svg>
                            </div>
                            <h4 class="text-xl font-bold text-white mb-3">Expense Categories</h4>
                            <p class="text-emerald-200">Track expenses by type: Rent, Salaries, Utilities, Supplies, Transport, Marketing, and custom categories.</p>
                        </div>

                        <!-- Dashboard -->
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 border border-white/10 hover:border-blue-400/50 transition">
                            <div class="h-14 w-14 rounded-2xl bg-gradient-to-br from-blue-400 to-indigo-600 flex items-center justify-center mb-6">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                </svg>
                            </div>
                            <h4 class="text-xl font-bold text-white mb-3">Financial Dashboard</h4>
                            <p class="text-emerald-200">See your total income, expenses, and net balance at a glance. Visual charts show trends over time.</p>
                        </div>

                        <!-- Recurring Transactions -->
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 border border-white/10 hover:border-purple-400/50 transition">
                            <div class="h-14 w-14 rounded-2xl bg-gradient-to-br from-purple-400 to-violet-600 flex items-center justify-center mb-6">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                </svg>
                            </div>
                            <h4 class="text-xl font-bold text-white mb-3">Recurring Expenses</h4>
                            <p class="text-emerald-200">Mark recurring expenses like rent, salaries, and subscriptions. Never forget a regular payment.</p>
                        </div>

                        <!-- Multi-Business -->
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 border border-white/10 hover:border-cyan-400/50 transition">
                            <div class="h-14 w-14 rounded-2xl bg-gradient-to-br from-cyan-400 to-teal-600 flex items-center justify-center mb-6">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                            </div>
                            <h4 class="text-xl font-bold text-white mb-3">Multiple Businesses</h4>
                            <p class="text-emerald-200">Manage finances for multiple businesses separately. Each business has its own ledger.</p>
                        </div>

                        <!-- Reports -->
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 border border-white/10 hover:border-yellow-400/50 transition">
                            <div class="h-14 w-14 rounded-2xl bg-gradient-to-br from-yellow-400 to-orange-600 flex items-center justify-center mb-6">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <h4 class="text-xl font-bold text-white mb-3">Financial Reports</h4>
                            <p class="text-emerald-200">Generate profit & loss statements, expense breakdowns, and income summaries. Export to PDF.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- How It Works Section -->
            <div class="relative z-10 px-6 lg:px-12 py-20">
                <div class="max-w-5xl mx-auto">
                    <div class="text-center mb-16">
                        <h3 class="text-3xl lg:text-4xl font-extrabold text-white mb-4">Simple as 1-2-3</h3>
                        <p class="text-emerald-200 text-lg">Start managing your finances in minutes</p>
                    </div>

                    <div class="grid md:grid-cols-3 gap-8">
                        <div class="text-center">
                            <div class="h-16 w-16 rounded-full bg-gradient-to-br from-emerald-400 to-teal-500 flex items-center justify-center mx-auto mb-6 text-2xl font-bold text-white">1</div>
                            <h4 class="text-xl font-bold text-white mb-3">Create Your Account</h4>
                            <p class="text-emerald-200">Sign up for free and set up your business profile in under a minute.</p>
                        </div>

                        <div class="text-center">
                            <div class="h-16 w-16 rounded-full bg-gradient-to-br from-emerald-400 to-teal-500 flex items-center justify-center mx-auto mb-6 text-2xl font-bold text-white">2</div>
                            <h4 class="text-xl font-bold text-white mb-3">Add Transactions</h4>
                            <p class="text-emerald-200">Record your income and expenses as they happen. Categorize each transaction.</p>
                        </div>

                        <div class="text-center">
                            <div class="h-16 w-16 rounded-full bg-gradient-to-br from-emerald-400 to-teal-500 flex items-center justify-center mx-auto mb-6 text-2xl font-bold text-white">3</div>
                            <h4 class="text-xl font-bold text-white mb-3">See Your Profit</h4>
                            <p class="text-emerald-200">View your dashboard to see income, expenses, and profit at any time.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="relative z-10 px-6 lg:px-12 py-20">
                <div class="max-w-4xl mx-auto text-center">
                    <div class="bg-gradient-to-r from-white/10 to-white/5 backdrop-blur-sm rounded-3xl p-12 border border-white/20">
                        <h3 class="text-3xl lg:text-4xl font-extrabold text-white mb-4">Know Your Numbers, Grow Your Business</h3>
                        <p class="text-xl text-emerald-200 mb-8">Join business owners who use BusinessLedger to track every franc and make smarter financial decisions.</p>

                        <div class="flex flex-col sm:flex-row gap-4 justify-center mb-8">
                            <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-emerald-400 to-teal-500 text-gray-900 rounded-xl font-bold text-lg hover:from-emerald-300 hover:to-teal-400 transition transform hover:scale-105 shadow-xl">
                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                Start Tracking Now - It's Free
                            </a>
                        </div>

                        <div class="flex items-center justify-center flex-wrap gap-6 text-sm text-emerald-200">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-1 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                Free Forever Plan
                            </span>
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-1 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                No Credit Card Required
                            </span>
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-1 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                RWF Currency Support
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="relative z-10 px-6 lg:px-12 py-8 border-t border-white/10">
                <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between text-emerald-200 text-sm">
                    <p>&copy; {{ date('Y') }} BusinessLedger. Track Your Finances, Grow Your Business.</p>
                    <div class="flex items-center space-x-4 mt-4 md:mt-0">
                        <a href="#" class="hover:text-white transition">Privacy</a>
                        <a href="#" class="hover:text-white transition">Terms</a>
                        <a href="#" class="hover:text-white transition">Contact</a>
                    </div>
                </div>
            </footer>
        </div>

        <!-- Floating WhatsApp Button -->
        <a href="https://wa.me/250786163963?text=Hello%2C%20I%20need%20help%20with%20BusinessLedger" target="_blank" class="fixed bottom-6 right-6 z-50 bg-green-500 hover:bg-green-600 text-white p-4 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-110 group">
            <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
            </svg>
            <span class="absolute right-full mr-3 top-1/2 -translate-y-1/2 bg-gray-900 text-white text-sm px-3 py-1 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">
                Need help?
            </span>
        </a>
    </body>
</html>
