@extends('layouts.landing')

@section('title', 'Our Services - ' . config('landing.company.name'))

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
            {{ config('landing.services.badge', 'Our Services') }}
        </span>
        <h1 class="text-4xl lg:text-5xl font-bold text-white mb-6">
            {!! config('landing.services.heading', 'Complete Real Estate <span class="text-emerald-400">Solutions</span>') !!}
        </h1>
        <p class="text-xl text-emerald-100 max-w-3xl mx-auto">
            {{ config('landing.services.subheading') }}
        </p>
    </div>
</section>

{{-- Services Grid --}}
<section class="py-16 lg:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach(config('landing.services.items', []) as $index => $service)
            @php
                $colors = [
                    'emerald' => ['bg' => 'bg-emerald-100', 'text' => 'text-emerald-600', 'border' => 'border-emerald-200'],
                    'red' => ['bg' => 'bg-red-100', 'text' => 'text-red-600', 'border' => 'border-red-200'],
                    'orange' => ['bg' => 'bg-orange-100', 'text' => 'text-orange-600', 'border' => 'border-orange-200'],
                    'blue' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-600', 'border' => 'border-blue-200'],
                    'purple' => ['bg' => 'bg-purple-100', 'text' => 'text-purple-600', 'border' => 'border-purple-200'],
                    'cyan' => ['bg' => 'bg-cyan-100', 'text' => 'text-cyan-600', 'border' => 'border-cyan-200'],
                ];
                $color = $colors[$service['icon_color']] ?? $colors['emerald'];
            @endphp
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 border {{ $color['border'] }} hover:-translate-y-2">
                <div class="w-16 h-16 {{ $color['bg'] }} rounded-2xl flex items-center justify-center mb-6">
                    @if(str_contains(strtolower($service['title']), 'house') || str_contains(strtolower($service['title']), 'residential'))
                    <svg class="w-8 h-8 {{ $color['text'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    @elseif(str_contains(strtolower($service['title']), 'land'))
                    <svg class="w-8 h-8 {{ $color['text'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                    </svg>
                    @elseif(str_contains(strtolower($service['title']), 'farm'))
                    <svg class="w-8 h-8 {{ $color['text'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    @elseif(str_contains(strtolower($service['title']), 'gym') || str_contains(strtolower($service['title']), 'fitness'))
                    <svg class="w-8 h-8 {{ $color['text'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                    @elseif(str_contains(strtolower($service['title']), 'guest') || str_contains(strtolower($service['title']), 'hotel'))
                    <svg class="w-8 h-8 {{ $color['text'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    @elseif(str_contains(strtolower($service['title']), 'management'))
                    <svg class="w-8 h-8 {{ $color['text'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                    </svg>
                    @else
                    <svg class="w-8 h-8 {{ $color['text'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    @endif
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $service['title'] }}</h3>
                <p class="text-gray-600 mb-6">{{ $service['description'] }}</p>
                <a href="{{ route('properties.index') }}" class="inline-flex items-center {{ $color['text'] }} font-semibold hover:underline">
                    View Properties
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Process Section --}}
<section class="py-16 lg:py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-2 bg-emerald-100 text-emerald-700 rounded-full text-sm font-semibold mb-6">
                {{ config('landing.process.badge', 'How It Works') }}
            </span>
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                {!! config('landing.process.heading', 'Find Your Property in <span class="text-emerald-600">3 Steps</span>') !!}
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                {{ config('landing.process.subheading') }}
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @foreach(config('landing.process.steps', []) as $step)
            <div class="relative">
                <div class="bg-white rounded-2xl p-8 shadow-lg text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-2xl font-bold text-white">{{ $step['number'] }}</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $step['title'] }}</h3>
                    <p class="text-gray-600">{{ $step['description'] }}</p>
                </div>
                @if(!$loop->last)
                <div class="hidden md:block absolute top-1/2 -right-4 transform -translate-y-1/2 z-10">
                    <svg class="w-8 h-8 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Highlights Section --}}
<section class="py-16 lg:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <span class="inline-block px-4 py-2 bg-emerald-100 text-emerald-700 rounded-full text-sm font-semibold mb-6">
                    Service Highlights
                </span>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6">
                    Complete Support at <span class="text-emerald-600">Every Step</span>
                </h2>
                <p class="text-gray-600 mb-8">
                    We provide comprehensive support throughout your property journey, from initial consultation to after-sale services.
                </p>
                <div class="space-y-4">
                    @foreach(config('landing.process.highlights', []) as $highlight)
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-gray-900">{{ $highlight['title'] }}</h4>
                            <p class="text-gray-600">{{ $highlight['description'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl p-8 text-white">
                <h3 class="text-2xl font-bold mb-6">Ready to Get Started?</h3>
                <p class="text-emerald-100 mb-8">
                    Contact us today and let our experts help you find the perfect property for your needs.
                </p>
                <div class="space-y-4">
                    <a href="tel:{{ config('landing.company.phone') }}" class="flex items-center text-white hover:text-emerald-200 transition-colors">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        {{ config('landing.company.phone') }}
                    </a>
                    <a href="mailto:{{ config('landing.company.email') }}" class="flex items-center text-white hover:text-emerald-200 transition-colors">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        {{ config('landing.company.email') }}
                    </a>
                    <div class="flex items-center text-white">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        {{ config('landing.company.location') }}
                    </div>
                </div>
                <a href="{{ route('contact') }}" class="inline-flex items-center justify-center w-full mt-8 px-6 py-4 bg-white text-emerald-600 rounded-xl font-bold hover:bg-gray-100 transition-all">
                    Contact Us Now
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
