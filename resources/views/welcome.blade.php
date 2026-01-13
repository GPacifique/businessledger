@extends('layouts.landing')

@section('title', config('landing.company.name') . ' - ' . config('landing.company.tagline'))

@section('content')
{{-- ========================================
    HERO SECTION
======================================== --}}
<section id="hero" class="relative min-h-screen flex items-center bg-gradient-to-br from-emerald-900 via-teal-900 to-cyan-900 overflow-hidden">
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

    {{-- Floating Decorative Elements --}}
    <div class="absolute top-20 left-20 w-32 h-32 bg-emerald-400/20 rounded-full blur-3xl animate-pulse" aria-hidden="true"></div>
    <div class="absolute bottom-40 right-20 w-48 h-48 bg-teal-400/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;" aria-hidden="true"></div>
    <div class="absolute top-1/3 right-1/4 w-24 h-24 bg-green-400/20 rounded-full blur-2xl animate-pulse" style="animation-delay: 2s;" aria-hidden="true"></div>
    <div class="absolute bottom-20 left-1/4 w-36 h-36 bg-cyan-400/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 1.5s;" aria-hidden="true"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32 lg:py-40">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            {{-- Left Content --}}
            <div class="text-white">
                <div class="inline-flex items-center px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-sm mb-6 border border-white/20">
                    <span class="h-2 w-2 rounded-full bg-green-400 mr-2 animate-pulse" aria-hidden="true"></span>
                    {{ config('landing.hero.badge', 'Welcome') }}
                </div>

                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight mb-6 font-display">
                    {!! config('landing.hero.main_heading', 'Welcome') !!}
                </h1>

                <p class="text-xl text-emerald-100 mb-8 leading-relaxed max-w-xl">
                    {{ config('landing.hero.subheading', '') }}
                </p>

                <div class="flex flex-col sm:flex-row gap-4 mb-12">
                    <a href="{{ route('properties.index') }}" class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-emerald-400 to-teal-500 text-gray-900 rounded-xl font-bold text-lg hover:from-emerald-300 hover:to-teal-400 transition-all duration-300 transform hover:scale-105 shadow-xl shadow-emerald-500/25">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                        {{ config('landing.hero.cta_primary_text', 'Get Started') }}
                    </a>
                    <a href="#services" class="inline-flex items-center justify-center px-8 py-4 bg-white/10 backdrop-blur-sm text-white rounded-xl font-bold text-lg hover:bg-white/20 transition-all duration-300 border border-white/20">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ config('landing.hero.cta_secondary_text', 'Learn More') }}
                    </a>
                </div>

                {{-- Stats --}}
                <div class="grid grid-cols-3 gap-6">
                    @foreach(config('landing.hero.stats', []) as $stat)
                        <x-landing.stat-card value="{{ $stat['value'] }}" label="{{ $stat['label'] }}" :light="true" />
                    @endforeach
                </div>
            </div>

            {{-- Right Content - Feature Cards --}}
            <div class="grid grid-cols-2 gap-4" role="list" aria-label="Key features">
                @foreach(config('landing.features', []) as $feature)
                    <x-landing.feature-card
                        iconBg="{{ $feature['icon_bg'] }}"
                        title="{{ $feature['title'] }}"
                        description="{{ $feature['description'] }}"
                        :class="$loop->odd ? 'lg:mt-0' : 'mt-8'"
                    >
                        <x-slot name="icon">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </x-slot>
                    </x-landing.feature-card>
                @endforeach
            </div>

    {{-- Scroll Indicator --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
        <a href="#about" class="text-white/60 hover:text-white transition-colors" aria-label="Scroll to about section">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
            </svg>
        </a>
    </div>
</section>
{{-- ========================================
    ABOUT SECTION
======================================== --}}
<section id="about" class="py-20 lg:py-32 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
            {{-- Left Content - Image/Visual --}}
            <div class="relative">
                <div class="relative z-10 rounded-2xl overflow-hidden shadow-2xl">
                    <div class="aspect-w-4 aspect-h-3 bg-gradient-to-br from-emerald-400 to-teal-600 p-8 lg:p-12">
                        <div class="bg-white/95 backdrop-blur rounded-xl shadow-xl p-6 lg:p-8">
                            {{-- Mock Dashboard Preview --}}
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <div class="h-3 w-24 bg-gray-200 rounded"></div>
                                    <div class="h-3 w-16 bg-emerald-200 rounded"></div>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="bg-gradient-to-br from-emerald-400 to-green-600 rounded-xl p-4 text-white">
                                        <p class="text-xs opacity-80">{{ __('messages.Featured') }}</p>
                                        <p class="text-xl font-bold">{{ config('landing.company.name') }}</p>
                                    </div>
                                    <div class="bg-gradient-to-br from-red-400 to-rose-600 rounded-xl p-4 text-white">
                                        <p class="text-xs opacity-80">{{ __('messages.Quality') }}</p>
                                        <p class="text-xl font-bold">{{ __('messages.Premium') }}</p>
                                    </div>
                                </div>
                                <div class="bg-gradient-to-r from-emerald-50 to-teal-50 rounded-xl p-4 border border-emerald-100">
                                    <p class="text-xs text-gray-500">{{ __('messages.Location') }}</p>
                                    <p class="text-xl font-bold text-emerald-600">{{ config('landing.company.location') }}</p>
                                </div>
                        <div class="flex items-start space-x-4">
                            <div class="h-8 w-8 rounded-full bg-purple-100 flex items-center justify-center mr-2">
                                <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <div>
                                <span class="text-gray-600">{{ __('messages.Trust Level') }}</span>
                                <span class="text-emerald-600 font-semibold">{{ __('messages.Verified') }}</span>
                                    </div>
                                    <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
                                        <div class="h-full w-[100%] bg-gradient-to-r from-emerald-400 to-teal-500 rounded-full"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Decorative Elements --}}
                <div class="absolute -top-4 -right-4 w-24 h-24 bg-emerald-200 rounded-full opacity-50 blur-xl" aria-hidden="true"></div>
                <div class="absolute -bottom-4 -left-4 w-32 h-32 bg-teal-200 rounded-full opacity-50 blur-xl" aria-hidden="true"></div>
            </div>

            {{-- Right Content --}}
            <div>
                <x-landing.section-title
                    badge="{{ config('landing.about.badge', 'About Us') }}"
                    title="{!! config('landing.about.heading', 'Welcome') !!}"
                    subtitle="{{ config('landing.about.subheading', '') }}"
                    align="left"
                />

                <div class="mt-10 space-y-6">
                    @foreach(config('landing.about.benefits', []) as $benefit)
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 h-12 w-12 rounded-xl bg-emerald-100 flex items-center justify-center">
                                <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 font-display">{{ $benefit['title'] }}</h3>
                                <p class="text-gray-600 mt-1">{{ $benefit['description'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-10">
                    <a href="#contact" class="inline-flex items-center px-6 py-3 bg-emerald-600 text-white rounded-xl font-semibold hover:bg-emerald-700 transition-all duration-300 hover:scale-105 shadow-lg shadow-emerald-500/25">
                        {{ config('landing.about.cta_text', 'Learn More') }}
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- ========================================
    SERVICES SECTION
======================================== --}}
<section id="services" class="py-20 lg:py-32 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-landing.section-title
            badge="{{ config('landing.services.badge') }}"
            title="{!! config('landing.services.heading') !!}"
            subtitle="{{ config('landing.services.subheading') }}"
            class="mb-16"
        />

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach(config('landing.services.items', []) as $service)
                <x-landing.card
                    title="{{ $service['title'] }}"
                    description="{{ $service['description'] }}"
                    iconColor="{{ $service['icon_color'] }}"
                >
                    <x-slot name="icon">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </x-slot>
                </x-landing.card>
            @endforeach
        </div>
    </div>
</section>

{{-- ========================================
    PROPERTIES CAROUSEL SECTION
======================================== --}}
<section id="properties" class="py-20 lg:py-32 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-landing.section-title
            badge="{{ __('messages.Featured Listings') }}"
            title="{{ __('messages.Discover Our Properties') }}"
            subtitle="{{ __('messages.Explore properties description') }}"
            class="mb-16"
        />

        <div class="relative">
            <!-- Carousel Container -->
            <div x-data="propertyCarousel()" class="relative">
                <!-- Slides -->
                <div class="overflow-hidden rounded-2xl">
                    <div class="flex transition-transform duration-500 ease-out"
                         :style="`transform: translateX(-${currentSlide * 100}%)`">

                        <!-- Property 1 -->
                        <div class="min-w-full">
                            <div class="grid lg:grid-cols-2 gap-8 items-center">
                                <div class="relative aspect-video rounded-xl overflow-hidden shadow-2xl">
                                    <img src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?w=800&q=80"
                                         alt="Luxury Modern Villa"
                                         class="w-full h-full object-cover">
                                    <div class="absolute top-4 right-4 bg-emerald-600 text-white px-4 py-2 rounded-full text-sm font-semibold">
                                        {{ __('messages.Featured') }}
                                    </div>
                                </div>
                                <div>
                                    <h3 class="text-3xl font-bold text-gray-900 mb-4">{{ __('messages.Luxury Modern Villa') }}</h3>
                                    <p class="text-gray-600 text-lg mb-6">{{ __('messages.Villa description') }}</p>
                                    <div class="grid grid-cols-3 gap-4 mb-8">
                                        <div class="bg-emerald-50 p-4 rounded-lg">
                                            <p class="text-emerald-600 font-bold text-xl">4</p>
                                            <p class="text-gray-600 text-sm">{{ __('messages.Bedrooms') }}</p>
                                        </div>
                                        <div class="bg-emerald-50 p-4 rounded-lg">
                                            <p class="text-emerald-600 font-bold text-xl">3</p>
                                            <p class="text-gray-600 text-sm">{{ __('messages.Bathrooms') }}</p>
                                        </div>
                                        <div class="bg-emerald-50 p-4 rounded-lg">
                                            <p class="text-emerald-600 font-bold text-xl">2500</p>
                                            <p class="text-gray-600 text-sm">{{ __('messages.Sq. Meters') }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-end gap-2 mb-6">
                                        <span class="text-4xl font-bold text-emerald-600">$850K</span>
                                        <span class="text-gray-600 mb-1">USD</span>
                                    </div>
                                    <a href="#contact" class="inline-flex items-center px-6 py-3 bg-emerald-600 text-white rounded-lg font-semibold hover:bg-emerald-700 transition-colors">
                                        {{ __('messages.Learn More') }}
                                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Property 2 -->
                        <div class="min-w-full">
                            <div class="grid lg:grid-cols-2 gap-8 items-center">
                                <div class="relative aspect-video rounded-xl overflow-hidden shadow-2xl">
                                    <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=800&q=80"
                                         alt="Urban Penthouse"
                                         class="w-full h-full object-cover">
                                    <div class="absolute top-4 right-4 bg-blue-600 text-white px-4 py-2 rounded-full text-sm font-semibold">
                                        {{ __('messages.Luxury') }}
                                    </div>
                                </div>
                                <div>
                                    <h3 class="text-3xl font-bold text-gray-900 mb-4">{{ __('messages.Urban Penthouse') }}</h3>
                                    <p class="text-gray-600 text-lg mb-6">{{ __('messages.Penthouse description') }}</p>
                                    <div class="grid grid-cols-3 gap-4 mb-8">
                                        <div class="bg-blue-50 p-4 rounded-lg">
                                            <p class="text-blue-600 font-bold text-xl">3</p>
                                            <p class="text-gray-600 text-sm">{{ __('messages.Bedrooms') }}</p>
                                        </div>
                                        <div class="bg-blue-50 p-4 rounded-lg">
                                            <p class="text-blue-600 font-bold text-xl">2.5</p>
                                            <p class="text-gray-600 text-sm">{{ __('messages.Bathrooms') }}</p>
                                        </div>
                                        <div class="bg-blue-50 p-4 rounded-lg">
                                            <p class="text-blue-600 font-bold text-xl">1800</p>
                                            <p class="text-gray-600 text-sm">{{ __('messages.Sq. Meters') }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-end gap-2 mb-6">
                                        <span class="text-4xl font-bold text-blue-600">$1.2M</span>
                                        <span class="text-gray-600 mb-1">USD</span>
                                    </div>
                                    <a href="#contact" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                                        {{ __('messages.Learn More') }}
                                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Property 3 -->
                        <div class="min-w-full">
                            <div class="grid lg:grid-cols-2 gap-8 items-center">
                                <div class="relative aspect-video rounded-xl overflow-hidden shadow-2xl">
                                    <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=800&q=80"
                                         alt="Beachfront Estate"
                                         class="w-full h-full object-cover">
                                    <div class="absolute top-4 right-4 bg-teal-600 text-white px-4 py-2 rounded-full text-sm font-semibold">
                                        {{ __('messages.Exclusive') }}
                                    </div>
                                </div>
                                <div>
                                    <h3 class="text-3xl font-bold text-gray-900 mb-4">{{ __('messages.Beachfront Estate') }}</h3>
                                    <p class="text-gray-600 text-lg mb-6">{{ __('messages.Estate description') }}</p>
                                    <div class="grid grid-cols-3 gap-4 mb-8">
                                        <div class="bg-teal-50 p-4 rounded-lg">
                                            <p class="text-teal-600 font-bold text-xl">5</p>
                                            <p class="text-gray-600 text-sm">{{ __('messages.Bedrooms') }}</p>
                                        </div>
                                        <div class="bg-teal-50 p-4 rounded-lg">
                                            <p class="text-teal-600 font-bold text-xl">4</p>
                                            <p class="text-gray-600 text-sm">{{ __('messages.Bathrooms') }}</p>
                                        </div>
                                        <div class="bg-teal-50 p-4 rounded-lg">
                                            <p class="text-teal-600 font-bold text-xl">3500</p>
                                            <p class="text-gray-600 text-sm">{{ __('messages.Sq. Meters') }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-end gap-2 mb-6">
                                        <span class="text-4xl font-bold text-teal-600">$2.5M</span>
                                        <span class="text-gray-600 mb-1">USD</span>
                                    </div>
                                    <a href="#contact" class="inline-flex items-center px-6 py-3 bg-teal-600 text-white rounded-lg font-semibold hover:bg-teal-700 transition-colors">
                                        {{ __('messages.Learn More') }}
                                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <button @click="prevSlide()"
                        class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-16 bg-emerald-600 text-white p-3 rounded-full hover:bg-emerald-700 transition-colors shadow-lg z-10 hidden lg:flex items-center justify-center"
                        aria-label="{{ __('messages.Previous property') }}">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </button>
                <button @click="nextSlide()"
                        class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-16 bg-emerald-600 text-white p-3 rounded-full hover:bg-emerald-700 transition-colors shadow-lg z-10 hidden lg:flex items-center justify-center"
                        aria-label="{{ __('messages.Next property') }}">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </button>

                <!-- Dots Indicators -->
                <div class="flex justify-center gap-3 mt-8">
                    <template x-for="(dot, index) in 3" :key="index">
                        <button @click="currentSlide = index"
                                :class="{'bg-emerald-600': currentSlide === index, 'bg-gray-300': currentSlide !== index}"
                                class="w-3 h-3 rounded-full transition-colors"
                                :aria-label="`Go to property ${index + 1}`">
                        </button>
                    </template>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ========================================
    TESTIMONIALS SECTION
======================================== --}}
<section id="testimonials" class="py-20 lg:py-32 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-landing.section-title
            badge="{{ config('landing.testimonials.badge', 'Testimonials') }}"
            title="{!! config('landing.testimonials.heading', 'What Clients Say') !!}"
            subtitle="{{ config('landing.testimonials.subheading', '') }}"
            class="mb-16"
        />

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach(config('landing.testimonials.items', []) as $testimonial)
                <x-landing.testimonial-card
                    quote="{{ $testimonial['quote'] }}"
                    author="{{ $testimonial['author'] }}"
                    role="{{ $testimonial['role'] }}"
                    company="{{ $testimonial['company'] }}"
                    :rating="$testimonial['rating']"
                />
            @endforeach
        </div>
    </div>
</section>

{{-- ========================================
    CTA SECTION
======================================== --}}
<section class="py-20 lg:py-24 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-r from-emerald-600 to-teal-600 rounded-3xl p-8 sm:p-12 lg:p-16 text-center shadow-2xl shadow-emerald-500/20 relative overflow-hidden">
            {{-- Background Pattern --}}
            <div class="absolute inset-0 opacity-10">
                <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
                    <defs>
                        <pattern id="cta-grid" width="10" height="10" patternUnits="userSpaceOnUse">
                            <path d="M 10 0 L 0 0 0 10" fill="none" stroke="white" stroke-width="0.5"/>
                        </pattern>
                    </defs>
                    <rect width="100" height="100" fill="url(#cta-grid)"/>
                </svg>
            </div>

            <div class="relative z-10">
                <h2 class="text-3xl sm:text-4xl font-bold text-white mb-4 font-display">
                    {{ config('landing.cta.heading', 'Ready to Get Started?') }}
                </h2>
                <p class="text-xl text-emerald-100 mb-8 max-w-2xl mx-auto">
                    {{ config('landing.cta.subheading', '') }}
                </p>

                <a href="#contact" class="inline-flex items-center justify-center px-8 py-4 bg-white text-emerald-700 rounded-xl font-bold text-lg hover:bg-emerald-50 transition-all duration-300 transform hover:scale-105 shadow-xl">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                    {{ config('landing.cta.cta_text', 'Get Started') }}
                </a>

                <div class="flex items-center justify-center flex-wrap gap-6 mt-8 text-sm text-emerald-100">
                    @foreach(config('landing.cta.benefits', []) as $benefit)
                        <span class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-emerald-300" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            {{ $benefit }}
                        </span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ========================================
    CONTACT SECTION
======================================== --}}
<section id="contact" class="py-20 lg:py-32 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-20">
            {{-- Left Content --}}
            <div>
                <x-landing.section-title
                    badge="{{ __('messages.Get In Touch') }}"
                    title="{{ __('messages.Have Questions?') }} <span class='text-emerald-600'>{{ __('messages.Contact Us') }}</span>"
                    subtitle="{{ __('messages.We are here to help') }}"
                    align="left"
                />

                <div class="mt-10 space-y-6">
                    {{-- Email --}}
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 h-12 w-12 rounded-xl bg-emerald-100 flex items-center justify-center">
                            <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">{{ __('messages.Email Us') }}</h3>
                            <a href="mailto:{{ config('landing.company.email') }}" class="text-emerald-600 hover:text-emerald-700 transition-colors">{{ config('landing.company.email') }}</a>
                        </div>
                    </div>

                    {{-- Phone --}}
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 h-12 w-12 rounded-xl bg-emerald-100 flex items-center justify-center">
                            <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">{{ __('messages.Call Us') }}</h3>
                            <a href="tel:{{ config('landing.company.phone') }}" class="text-emerald-600 hover:text-emerald-700 transition-colors">{{ config('landing.company.phone') }}</a>
                        </div>
                    </div>

                    {{-- Location --}}
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 h-12 w-12 rounded-xl bg-emerald-100 flex items-center justify-center">
                            <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">{{ __('messages.Visit Us') }}</h3>
                            <p class="text-gray-600">{{ config('landing.company.location') }}</p>
                        </div>
                    </div>

                    {{-- Hours --}}
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 h-12 w-12 rounded-xl bg-emerald-100 flex items-center justify-center">
                            <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">{{ __('messages.Business Hours') }}</h3>
                            <p class="text-gray-600">{{ config('landing.company.business_hours') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right Content - Contact Form --}}
            <div class="bg-gray-50 rounded-2xl p-8 lg:p-10">
                <h3 class="text-2xl font-bold text-gray-900 mb-6 font-display">{{ config('landing.contact.form_heading', 'Send Us a Message') }}</h3>

                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.First Name') }}</label>
                            <input
                                type="text"
                                id="first_name"
                                name="first_name"
                                required
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors"
                                placeholder="John"
                            >
                        </div>
                        <div>
                            <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.Last Name') }}</label>
                            <input
                                type="text"
                                id="last_name"
                                name="last_name"
                                required
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors"
                                placeholder="Doe"
                            >
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.Email Address') }}</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            required
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors"
                            placeholder="john@example.com"
                        >
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.Phone Number (Optional)') }}</label>
                        <input
                            type="tel"
                            id="phone"
                            name="phone"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors"
                            placeholder="+250 7XX XXX XXX"
                        >
                    </div>

                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.Subject') }}</label>
                        <select
                            id="subject"
                            name="subject"
                            required
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors"
                        >
                            <option value="">{{ __('messages.Select a subject') }}</option>
                            <option value="general">{{ __('messages.General Inquiry') }}</option>
                            <option value="support">{{ __('messages.Technical Support') }}</option>
                            <option value="billing">{{ __('messages.Billing Question') }}</option>
                            <option value="partnership">{{ __('messages.Partnership Opportunity') }}</option>
                            <option value="feedback">{{ __('messages.Feedback') }}</option>
                        </select>
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.Message') }}</label>
                        <textarea
                            id="message"
                            name="message"
                            rows="5"
                            required
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors resize-none"
                            placeholder="{{ __('messages.How can we help you?') }}"
                        ></textarea>
                    </div>

                    <button
                        type="submit"
                        class="w-full px-8 py-4 bg-emerald-600 text-white rounded-xl font-semibold hover:bg-emerald-700 transition-all duration-300 transform hover:scale-[1.02] shadow-lg shadow-emerald-500/25 flex items-center justify-center"
                    >
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                        </svg>
                        {{ __('messages.Send Message') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
function propertyCarousel() {
    return {
        currentSlide: 0,
        autoplayInterval: null,

        init() {
            // Start autoplay when component initializes
            this.startAutoplay();

            // Pause autoplay on hover
            this.$el.addEventListener('mouseenter', () => this.stopAutoplay());
            this.$el.addEventListener('mouseleave', () => this.startAutoplay());
        },

        nextSlide() {
            this.currentSlide = (this.currentSlide + 1) % 3;
            this.resetAutoplay();
        },

        prevSlide() {
            this.currentSlide = (this.currentSlide - 1 + 3) % 3;
            this.resetAutoplay();
        },

        startAutoplay() {
            this.autoplayInterval = setInterval(() => {
                this.currentSlide = (this.currentSlide + 1) % 3;
            }, 5000); // Change slide every 5 seconds
        },

        stopAutoplay() {
            if (this.autoplayInterval) {
                clearInterval(this.autoplayInterval);
                this.autoplayInterval = null;
            }
        },

        resetAutoplay() {
            this.stopAutoplay();
            this.startAutoplay();
        },

        destroy() {
            this.stopAutoplay();
        }
    }
}
</script>
@endpush

@endsection
