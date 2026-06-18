@extends('layouts.landing')

@section('title', config('app.name', 'FinTrack') . ' - Smart Business Finance Management')

@section('content')

{{-- ========================================
    HERO SECTION
======================================== --}}
<section id="hero" class="relative min-h-screen flex items-center bg-gradient-to-br from-slate-900 via-emerald-900 to-cyan-900 overflow-hidden">

    {{-- Background Pattern --}}
    <div class="absolute inset-0 opacity-10">
        <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
            <defs>
                <pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse">
                    <path d="M 10 0 L 0 0 0 10" fill="none" stroke="white" stroke-width="0.5"/>
                </pattern>
            </defs>
            <rect width="100" height="100" fill="url(#grid)"/>
        </svg>
    </div>

    {{-- Floating elements --}}
    <div class="absolute top-20 left-20 w-32 h-32 bg-emerald-400/20 rounded-full blur-3xl animate-pulse"></div>
    <div class="absolute bottom-20 right-20 w-48 h-48 bg-cyan-400/20 rounded-full blur-3xl animate-pulse"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-8 py-32">

        <div class="grid lg:grid-cols-2 gap-16 items-center">

            {{-- LEFT --}}
            <div class="text-white">

                <div class="inline-flex items-center px-4 py-2 bg-white/10 rounded-full text-sm mb-6 border border-white/20">
                    <span class="h-2 w-2 rounded-full bg-emerald-400 mr-2 animate-pulse"></span>
                    Smart Finance Management Platform
                </div>

                <h1 class="text-5xl lg:text-6xl font-extrabold leading-tight mb-6">
                    Manage Sales, Expenses & Profit in One Dashboard
                </h1>

                <p class="text-xl text-emerald-100 mb-8">
                    FinTrack helps businesses track income, control expenses, and understand real-time profit across all operations.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 mb-10">

                    <a href="{{ route('login') }}"
                       class="px-8 py-4 bg-emerald-400 text-slate-900 rounded-xl font-bold hover:bg-emerald-300 transition transform hover:scale-105">
                        Get Started
                    </a>

                    <a href="#features"
                       class="px-8 py-4 bg-white/10 text-white rounded-xl font-bold border border-white/20 hover:bg-white/20">
                        Explore Features
                    </a>

                </div>

                {{-- STATS --}}
                <div class="grid grid-cols-3 gap-6 text-center">
                    <div>
                        <p class="text-2xl font-bold text-emerald-300">100%</p>
                        <p class="text-sm text-emerald-100">Real-time Tracking</p>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-emerald-300">24/7</p>
                        <p class="text-sm text-emerald-100">Access Anywhere</p>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-emerald-300">Multi</p>
                        <p class="text-sm text-emerald-100">Business Support</p>
                    </div>
                </div>

            </div>

            {{-- RIGHT --}}
            <div class="grid grid-cols-2 gap-4">

                @foreach([
                    ['title'=>'Sales Tracking','desc'=>'Monitor daily sales in real-time','color'=>'emerald'],
                    ['title'=>'Expense Control','desc'=>'Track every business expense','color'=>'cyan'],
                    ['title'=>'Profit Reports','desc'=>'Know your real profit instantly','color'=>'teal'],
                    ['title'=>'Inventory','desc'=>'Manage stock efficiently','color'=>'green'],
                ] as $item)

                <div class="bg-white/10 backdrop-blur rounded-2xl p-6 border border-white/10">
                    <h3 class="text-white font-bold mb-2">{{ $item['title'] }}</h3>
                    <p class="text-emerald-100 text-sm">{{ $item['desc'] }}</p>
                </div>

                @endforeach

            </div>

        </div>
    </div>
</section>


{{-- ========================================
    FEATURES
======================================== --}}
<section id="features" class="py-24 bg-white">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900">Everything You Need to Run Your Business</h2>
            <p class="text-gray-600 mt-4">All-in-one financial system for modern businesses</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach([
                'POS Sales System',
                'Expense Tracking',
                'Profit Analytics',
                'Multi-Business Management',
                'Invoice Generator',
                'Financial Reports'
            ] as $feature)

            <div class="p-6 rounded-2xl border hover:shadow-xl transition">
                <h3 class="font-bold text-lg text-gray-900">{{ $feature }}</h3>
                <p class="text-gray-600 mt-2">Powerful tool to manage your business efficiently.</p>
            </div>

            @endforeach

        </div>

    </div>

</section>


{{-- ========================================
    DASHBOARD PREVIEW
======================================== --}}
<section class="py-24 bg-gray-50">

    <div class="max-w-7xl mx-auto px-6">

        <div class="grid lg:grid-cols-2 gap-12 items-center">

            <div>
                <h2 class="text-4xl font-bold text-gray-900 mb-4">
                    Real-Time Financial Dashboard
                </h2>

                <p class="text-gray-600 mb-6">
                    View sales, expenses, profit, and performance insights instantly with a powerful analytics dashboard.
                </p>

                <ul class="space-y-3 text-gray-700">
                    <li>✔ Live sales updates</li>
                    <li>✔ Expense categorization</li>
                    <li>✔ Profit & loss reports</li>
                    <li>✔ Multi-branch support</li>
                </ul>
            </div>

            <div class="bg-white rounded-2xl shadow-xl p-6">
                <div class="h-64 bg-gradient-to-br from-emerald-500 to-cyan-500 rounded-xl flex items-center justify-center text-white font-bold">
                    FinTrack Dashboard Preview
                </div>
            </div>

        </div>

    </div>

</section>


{{-- ========================================
    CTA
======================================== --}}
<section class="py-24 bg-emerald-600 text-white text-center">

    <div class="max-w-3xl mx-auto px-6">

        <h2 class="text-4xl font-bold mb-4">
            Start Managing Your Business Smarter Today
        </h2>

        <p class="text-emerald-100 mb-8">
            Join thousands of businesses using FinTrack to control finances and grow profit.
        </p>

        <a href="{{ route('register') }}"
           class="px-8 py-4 bg-white text-emerald-700 rounded-xl font-bold hover:bg-gray-100 transition">
            Create Free Account
        </a>

    </div>

</section>

@endsection