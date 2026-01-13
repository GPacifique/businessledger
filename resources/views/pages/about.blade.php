@extends('layouts.landing')

@section('title', 'About Us - ' . config('landing.company.name'))

@section('content')
{{-- Hero Section --}}
<section class="relative bg-gradient-to-br from-emerald-900 via-teal-900 to-cyan-900 py-24 lg:py-32">
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

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="inline-block px-4 py-2 bg-emerald-400/20 text-emerald-300 rounded-full text-sm font-semibold mb-6">
            {{ config('landing.about.badge', 'About Us') }}
        </span>
        <h1 class="text-4xl lg:text-5xl font-bold text-white mb-6">
            {!! config('landing.about.heading', 'Your Trusted Real Estate <span class="text-emerald-400">Partner</span>') !!}
        </h1>
        <p class="text-xl text-emerald-100 max-w-3xl mx-auto">
            {{ config('landing.about.subheading') }}
        </p>
    </div>
</section>

{{-- Our Story Section --}}
<section class="py-16 lg:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <span class="inline-block px-4 py-2 bg-emerald-100 text-emerald-700 rounded-full text-sm font-semibold mb-6">
                    {{ __('messages.Our Story') }}
                </span>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6">
                    {{ __('messages.Building Dreams Since') }} <span class="text-emerald-600">2010</span>
                </h2>
                <div class="prose prose-lg text-gray-600">
                    <p>
                        {{ config('landing.company.name') }} was founded with a simple mission: to make property investment accessible, transparent, and profitable for everyone. What started as a small family business has grown into one of Rwanda's most trusted real estate companies.
                    </p>
                    <p>
                        Over the years, we have helped thousands of families find their dream homes, assisted investors in building wealth through strategic property acquisitions, and contributed to the development of communities across the country.
                    </p>
                    <p>
                        Our commitment to integrity, customer satisfaction, and excellence has earned us the trust of clients from all walks of life. We believe that every property transaction should be a positive experience, and we work tirelessly to ensure that our clients achieve their goals.
                    </p>
                </div>
            </div>
            <div class="relative">
                <div class="bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl p-8 text-white">
                    <div class="grid grid-cols-2 gap-6">
                        @foreach(config('landing.hero.stats', []) as $stat)
                        <div class="text-center p-6 bg-white/10 rounded-xl backdrop-blur-sm">
                            <p class="text-4xl font-bold mb-2">{{ $stat['value'] }}</p>
                            <p class="text-emerald-100">{{ $stat['label'] }}</p>
                        </div>
                        @endforeach
                        <div class="text-center p-6 bg-white/10 rounded-xl backdrop-blur-sm">
                            <p class="text-4xl font-bold mb-2">100%</p>
                            <p class="text-emerald-100">{{ __('messages.Verified Properties') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Why Choose Us Section --}}
<section class="py-16 lg:py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-2 bg-emerald-100 text-emerald-700 rounded-full text-sm font-semibold mb-6">
                {{ __('messages.Why Choose Us') }}
            </span>
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                {{ __('messages.What Sets Us Apart') }}
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                {{ __('messages.We are committed to providing exceptional service') }}
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @foreach(config('landing.about.benefits', []) as $benefit)
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow">
                <div class="w-14 h-14 bg-emerald-100 rounded-xl flex items-center justify-center mb-6">
                    @if($benefit['icon'] === 'shield')
                    <svg class="w-7 h-7 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                    @elseif($benefit['icon'] === 'currency')
                    <svg class="w-7 h-7 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    @elseif($benefit['icon'] === 'lightning')
                    <svg class="w-7 h-7 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                    @endif
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $benefit['title'] }}</h3>
                <p class="text-gray-600">{{ $benefit['description'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Our Values Section --}}
<section class="py-16 lg:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-2 bg-emerald-100 text-emerald-700 rounded-full text-sm font-semibold mb-6">
                {{ __('messages.Our Values') }}
            </span>
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                {{ __('messages.Principles That Guide Us') }}
            </h2>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">{{ __('messages.Integrity') }}</h3>
                <p class="text-gray-600 text-sm">{{ __('messages.Integrity description') }}</p>
            </div>
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">{{ __('messages.Client Focus') }}</h3>
                <p class="text-gray-600 text-sm">{{ __('messages.Client Focus description') }}</p>
            </div>
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">{{ __('messages.Excellence') }}</h3>
                <p class="text-gray-600 text-sm">{{ __('messages.Excellence description') }}</p>
            </div>
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">{{ __('messages.Community') }}</h3>
                <p class="text-gray-600 text-sm">{{ __('messages.Community description') }}</p>
            </div>
        </div>
    </div>
</section>

{{-- CTA Section --}}
<section class="bg-gradient-to-r from-emerald-600 to-teal-600 py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-white mb-4">{{ __('messages.Ready to Start Your Property Journey?') }}</h2>
        <p class="text-emerald-100 text-lg mb-8">{{ __('messages.Let us help you find the perfect property') }}</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('properties.index') }}" class="inline-flex items-center justify-center px-8 py-4 bg-white text-emerald-600 rounded-xl font-bold hover:bg-gray-100 transition-all">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
                {{ __('messages.Browse Properties') }}
            </a>
            <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-8 py-4 bg-emerald-500/30 text-white rounded-xl font-bold hover:bg-emerald-500/40 transition-all border border-white/30">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                {{ __('messages.Contact Us') }}
            </a>
        </div>
    </div>
</section>
@endsection
