<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-5 py-2.5 bg-white/80 backdrop-blur-lg border border-gray-200 rounded-xl font-semibold text-sm text-gray-700 shadow-lg hover:bg-gray-50 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 disabled:opacity-25 transition-all duration-300 hover:-translate-y-0.5']) }}>
    {{ $slot }}
</button>
