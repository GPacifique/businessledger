@extends('layouts.landing')

@section('title', 'Browse Properties - ' . config('landing.company.name'))

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
            {{ config('landing.properties.badge', 'Our Properties') }}
        </span>
        <h1 class="text-4xl lg:text-5xl font-bold text-white mb-6">
            {!! config('landing.properties.heading', 'Browse <span class="text-emerald-400">Properties</span>') !!}
        </h1>
        <p class="text-xl text-emerald-100 max-w-3xl mx-auto">
            {{ config('landing.properties.subheading', 'Discover our carefully selected properties for investment and living.') }}
        </p>
    </div>
</section>

{{-- Filter Section --}}
<section class="bg-gray-50 py-6 border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <div class="flex flex-wrap items-center gap-3">
                <span class="text-gray-600 font-medium">Filter by:</span>
                <button onclick="filterProperties('all')" class="filter-btn active px-4 py-2 rounded-lg text-sm font-medium transition-all bg-emerald-600 text-white" data-filter="all">
                    All Properties
                </button>
                <button onclick="filterProperties('Residential')" class="filter-btn px-4 py-2 rounded-lg text-sm font-medium transition-all bg-gray-200 text-gray-700 hover:bg-gray-300" data-filter="Residential">
                    Residential
                </button>
                <button onclick="filterProperties('Land')" class="filter-btn px-4 py-2 rounded-lg text-sm font-medium transition-all bg-gray-200 text-gray-700 hover:bg-gray-300" data-filter="Land">
                    Land
                </button>
                <button onclick="filterProperties('Commercial')" class="filter-btn px-4 py-2 rounded-lg text-sm font-medium transition-all bg-gray-200 text-gray-700 hover:bg-gray-300" data-filter="Commercial">
                    Commercial
                </button>
                <button onclick="filterProperties('Farm')" class="filter-btn px-4 py-2 rounded-lg text-sm font-medium transition-all bg-gray-200 text-gray-700 hover:bg-gray-300" data-filter="Farm">
                    Farm
                </button>
            </div>
            <p class="text-gray-600">
                <span class="font-semibold text-emerald-600" id="property-count">{{ count($properties) }}</span> properties found
            </p>
        </div>
    </div>
</section>

{{-- Properties Grid --}}
<section class="py-16 lg:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8" id="properties-grid">
            @forelse($properties as $index => $property)
                <div class="property-card bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100" data-type="{{ $property['type'] }}">
                    {{-- Property Image --}}
                    <div class="relative h-56 bg-gradient-to-br from-emerald-400 to-teal-500 overflow-hidden">
                        {{-- Placeholder with icon --}}
                        <div class="absolute inset-0 flex items-center justify-center">
                            @if($property['type'] === 'Residential')
                                <svg class="w-24 h-24 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                </svg>
                            @elseif($property['type'] === 'Land')
                                <svg class="w-24 h-24 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                                </svg>
                            @elseif($property['type'] === 'Commercial')
                                <svg class="w-24 h-24 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                            @elseif($property['type'] === 'Farm')
                                <svg class="w-24 h-24 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            @endif
                        </div>

                        {{-- Status Badge --}}
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 bg-emerald-500 text-white text-sm font-semibold rounded-full">
                                {{ $property['status'] }}
                            </span>
                        </div>

                        {{-- Type Badge --}}
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1 bg-white/90 text-gray-800 text-sm font-semibold rounded-full">
                                {{ $property['type'] }}
                            </span>
                        </div>
                    </div>

                    {{-- Property Details --}}
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2 line-clamp-1">
                            {{ $property['title'] }}
                        </h3>

                        <div class="flex items-center text-gray-600 mb-3">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span class="text-sm">{{ $property['location'] }}</span>
                        </div>

                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                            {{ $property['description'] }}
                        </p>

                        {{-- Property Specs --}}
                        <div class="flex items-center gap-4 text-gray-600 text-sm mb-4 pb-4 border-b">
                            @if($property['bedrooms'])
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                    </svg>
                                    {{ $property['bedrooms'] }} Beds
                                </div>
                            @endif
                            @if($property['bathrooms'])
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"/>
                                    </svg>
                                    {{ $property['bathrooms'] }} Baths
                                </div>
                            @endif
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/>
                                </svg>
                                {{ $property['area'] }}
                            </div>
                        </div>

                        {{-- Price & CTA --}}
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-2xl font-bold text-emerald-600">{{ $property['price'] }}</p>
                            </div>
                            <a href="{{ route('properties.show', $index) }}" class="inline-flex items-center px-4 py-2 bg-emerald-600 text-white rounded-lg font-medium hover:bg-emerald-700 transition-colors">
                                View Details
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-16">
                    <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">No Properties Available</h3>
                    <p class="text-gray-500">Check back soon for new listings.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

{{-- CTA Section --}}
<section class="bg-gradient-to-r from-emerald-600 to-teal-600 py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-white mb-4">Can't Find What You're Looking For?</h2>
        <p class="text-emerald-100 text-lg mb-8">Contact us with your requirements and we'll help you find the perfect property.</p>
        <a href="/#contact" class="inline-flex items-center px-8 py-4 bg-white text-emerald-600 rounded-xl font-bold hover:bg-gray-100 transition-all">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
            Contact Us
        </a>
    </div>
</section>

@push('scripts')
<script>
function filterProperties(type) {
    const cards = document.querySelectorAll('.property-card');
    const buttons = document.querySelectorAll('.filter-btn');
    let visibleCount = 0;

    // Update button states
    buttons.forEach(btn => {
        btn.classList.remove('bg-emerald-600', 'text-white');
        btn.classList.add('bg-gray-200', 'text-gray-700');
        if (btn.dataset.filter === type) {
            btn.classList.remove('bg-gray-200', 'text-gray-700');
            btn.classList.add('bg-emerald-600', 'text-white');
        }
    });

    // Filter cards
    cards.forEach(card => {
        if (type === 'all' || card.dataset.type === type) {
            card.style.display = 'block';
            visibleCount++;
        } else {
            card.style.display = 'none';
        }
    });

    // Update count
    document.getElementById('property-count').textContent = visibleCount;
}
</script>
@endpush
@endsection
