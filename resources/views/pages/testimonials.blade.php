@extends('layouts.landing')

@section('title', 'Testimonials - ' . config('landing.company.name'))

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
            {{ config('landing.testimonials.badge', 'Client Testimonials') }}
        </span>
        <h1 class="text-4xl lg:text-5xl font-bold text-white mb-6">
            {!! config('landing.testimonials.heading', 'What Our <span class="text-emerald-400">Clients Say</span>') !!}
        </h1>
        <p class="text-xl text-emerald-100 max-w-3xl mx-auto">
            {{ config('landing.testimonials.subheading') }}
        </p>
    </div>
</section>

{{-- Testimonials Grid --}}
<section class="py-16 lg:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach(config('landing.testimonials.items', []) as $testimonial)
            <div class="bg-gray-50 rounded-2xl p-8 hover:shadow-lg transition-shadow">
                {{-- Rating Stars --}}
                <div class="flex items-center mb-4">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= ($testimonial['rating'] ?? 5))
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        @else
                            <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        @endif
                    @endfor
                </div>

                {{-- Quote --}}
                <blockquote class="text-gray-700 mb-6 italic">
                    "{{ $testimonial['quote'] }}"
                </blockquote>

                {{-- Author --}}
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-full flex items-center justify-center text-white font-bold">
                        {{ substr($testimonial['author'], 0, 1) }}
                    </div>
                    <div class="ml-4">
                        <p class="font-semibold text-gray-900">{{ $testimonial['author'] }}</p>
                        <p class="text-sm text-gray-600">{{ $testimonial['role'] }} - {{ $testimonial['company'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Stats Section --}}
<section class="py-16 bg-gradient-to-r from-emerald-600 to-teal-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-4 gap-8 text-center text-white">
            @foreach(config('landing.hero.stats', []) as $stat)
            <div>
                <p class="text-4xl lg:text-5xl font-bold mb-2">{{ $stat['value'] }}</p>
                <p class="text-emerald-100 text-lg">{{ $stat['label'] }}</p>
            </div>
            @endforeach
            <div>
                <p class="text-4xl lg:text-5xl font-bold mb-2">5.0</p>
                <p class="text-emerald-100 text-lg">Average Rating</p>
            </div>
        </div>
    </div>
</section>

{{-- CTA Section --}}
<section class="py-16 lg:py-24 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-gray-900 mb-4">Join Our Satisfied Clients</h2>
        <p class="text-xl text-gray-600 mb-8">Experience the difference with {{ config('landing.company.name') }}. Let us help you find your perfect property.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('properties.index') }}" class="inline-flex items-center justify-center px-8 py-4 bg-emerald-600 text-white rounded-xl font-bold hover:bg-emerald-700 transition-all">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
                Browse Properties
            </a>
            <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-8 py-4 bg-gray-200 text-gray-800 rounded-xl font-bold hover:bg-gray-300 transition-all">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                Contact Us
            </a>
        </div>
    </div>
</section>
@endsection
