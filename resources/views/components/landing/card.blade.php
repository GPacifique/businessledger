{{-- Card Component --}}
@props([
    'icon' => null,
    'iconColor' => 'emerald', // emerald, blue, purple, red, orange, cyan
    'title' => '',
    'description' => '',
    'hoverable' => true,
    'glass' => false,
])

@php
    $iconColorClasses = [
        'emerald' => 'from-emerald-400 to-green-600',
        'blue' => 'from-blue-400 to-indigo-600',
        'purple' => 'from-purple-400 to-violet-600',
        'red' => 'from-red-400 to-rose-600',
        'orange' => 'from-orange-400 to-amber-600',
        'cyan' => 'from-cyan-400 to-teal-600',
        'yellow' => 'from-yellow-400 to-orange-600',
        'pink' => 'from-pink-400 to-rose-600',
    ];
    $iconGradient = $iconColorClasses[$iconColor] ?? $iconColorClasses['emerald'];

    $borderHoverClasses = [
        'emerald' => 'hover:border-emerald-400/50',
        'blue' => 'hover:border-blue-400/50',
        'purple' => 'hover:border-purple-400/50',
        'red' => 'hover:border-red-400/50',
        'orange' => 'hover:border-orange-400/50',
        'cyan' => 'hover:border-cyan-400/50',
        'yellow' => 'hover:border-yellow-400/50',
        'pink' => 'hover:border-pink-400/50',
    ];
    $borderHover = $borderHoverClasses[$iconColor] ?? $borderHoverClasses['emerald'];
@endphp

<article {{ $attributes->merge(['class' => 'group rounded-2xl p-6 sm:p-8 transition-all duration-300 ' .
    ($glass ? 'bg-white/10 backdrop-blur-sm border border-white/10 ' . $borderHover : 'bg-white border border-gray-100 shadow-lg hover:shadow-xl') .
    ($hoverable ? ' hover:-translate-y-1' : '')]) }}>

    @if($icon)
        <div class="h-14 w-14 rounded-2xl bg-gradient-to-br {{ $iconGradient }} flex items-center justify-center mb-6 shadow-lg group-hover:scale-110 transition-transform duration-300">
            {!! $icon !!}
        </div>
    @endif

    @if($title)
        <h3 class="text-xl font-bold mb-3 {{ $glass ? 'text-white' : 'text-gray-900' }} font-display">
            {{ $title }}
        </h3>
    @endif

    @if($description)
        <p class="{{ $glass ? 'text-gray-300' : 'text-gray-600' }} leading-relaxed">
            {{ $description }}
        </p>
    @endif

    {{ $slot }}
</article>
