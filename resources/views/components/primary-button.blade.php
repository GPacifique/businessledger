<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 border border-transparent rounded-xl font-semibold text-sm text-white uppercase tracking-widest hover:from-indigo-600 hover:via-purple-600 hover:to-pink-600 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition-all duration-300 shadow-lg shadow-purple-500/25 hover:shadow-xl hover:-translate-y-0.5']) }}>
    {{ $slot }}
</button>
