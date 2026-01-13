{{-- Feature Card Component --}}
@props([
    'icon' => null,
    'iconBg' => 'bg-emerald-500',
    'title' => '',
    'description' => '',
])

<div {{ $attributes->merge(['class' => 'bg-white/10 backdrop-blur-sm rounded-2xl p-6 transform hover:scale-105 transition-all duration-300 border border-white/20 group']) }}>
    @if($icon)
        <div class="h-12 w-12 rounded-xl {{ $iconBg }} flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
            {!! $icon !!}
        </div>
    @endif

    @if($title)
        <h3 class="text-white font-bold text-lg mb-2 font-display">{{ $title }}</h3>
    @endif

    @if($description)
        <p class="text-emerald-200 text-sm">{{ $description }}</p>
    @endif

    {{ $slot }}
</div>
