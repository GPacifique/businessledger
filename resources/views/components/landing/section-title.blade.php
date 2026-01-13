{{-- Section Title Component --}}
@props([
    'badge' => null,
    'title' => '',
    'subtitle' => null,
    'align' => 'center', // center, left, right
    'light' => false, // For dark backgrounds
])

@php
    $alignmentClasses = [
        'center' => 'text-center mx-auto',
        'left' => 'text-left',
        'right' => 'text-right ml-auto',
    ];
    $alignment = $alignmentClasses[$align] ?? $alignmentClasses['center'];
@endphp

<div {{ $attributes->merge(['class' => 'max-w-3xl ' . $alignment]) }}>
    @if($badge)
        <div class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold mb-4 {{ $light ? 'bg-white/10 text-white' : 'bg-emerald-100 text-emerald-700' }}">
            <span class="h-2 w-2 rounded-full mr-2 {{ $light ? 'bg-emerald-400' : 'bg-emerald-500' }} animate-pulse"></span>
            {{ $badge }}
        </div>
    @endif

    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold font-display mb-4 {{ $light ? 'text-white' : 'text-gray-900' }}">
        {!! $title !!}
    </h2>

    @if($subtitle)
        <p class="text-lg sm:text-xl {{ $light ? 'text-gray-300' : 'text-gray-600' }} leading-relaxed">
            {{ $subtitle }}
        </p>
    @endif

    {{ $slot }}
</div>
