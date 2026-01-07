<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-rose-500 via-red-500 to-pink-500 border border-transparent rounded-xl font-semibold text-sm text-white uppercase tracking-widest hover:from-rose-600 hover:via-red-600 hover:to-pink-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all duration-300 shadow-lg shadow-red-500/25 hover:shadow-xl hover:-translate-y-0.5']) }}>
    {{ $slot }}
</button>
