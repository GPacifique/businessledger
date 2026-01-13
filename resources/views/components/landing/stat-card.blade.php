{{-- Stat Card Component --}}
@props([
    'value' => '',
    'label' => '',
    'icon' => null,
    'light' => false,
])

<div {{ $attributes->merge(['class' => 'text-center group']) }}>
    @if($icon)
        <div class="mb-2 {{ $light ? 'text-emerald-400' : 'text-emerald-600' }} flex justify-center group-hover:scale-110 transition-transform duration-300">
            {!! $icon !!}
        </div>
    @endif

    <p class="text-3xl sm:text-4xl font-extrabold mb-1 {{ $light ? 'text-emerald-400' : 'text-emerald-600' }} font-display">
        {{ $value }}
    </p>
    <p class="{{ $light ? 'text-emerald-200' : 'text-gray-600' }} text-sm font-medium">
        {{ $label }}
    </p>
</div>
