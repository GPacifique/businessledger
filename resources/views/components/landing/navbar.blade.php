{{-- Landing Page Navbar Component --}}
<header
    x-data="{
        mobileMenuOpen: false,
        scrolled: false,
        activeSection: 'hero'
    }"
    x-init="
        window.addEventListener('scroll', () => {
            scrolled = window.scrollY > 50;
            // Update active section based on scroll position
            const sections = ['contact', 'testimonials', 'portfolio', 'services', 'about', 'hero'];
            for (const section of sections) {
                const el = document.getElementById(section);
                if (el && window.scrollY >= el.offsetTop - 100) {
                    activeSection = section;
                    break;
                }
            }
        })
    "
    :class="scrolled ? 'bg-white/95 backdrop-blur-lg shadow-lg' : 'bg-transparent'"
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-300"
>
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" aria-label="Main navigation">
        <div class="flex items-center justify-between h-20">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="flex items-center space-x-3 group">
                <div class="p-1 rounded-xl transition-all duration-300 group-hover:scale-105">
                    <img src="{{ asset('images/logo.png') }}" alt="FinTrack Logo" class="w-12 h-12 rounded-lg object-cover">
                </div>
                <div>
                    <span :class="scrolled ? 'text-gray-900' : 'text-white'" class="text-xl font-bold font-display transition-colors duration-300">FinTrack</span>
                    <p :class="scrolled ? 'text-emerald-600' : 'text-emerald-200'" class="text-xs font-medium transition-colors duration-300">Accounting Software</p>
                </div>
            </a>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center space-x-1">
                @php
                    $navLinks = [
                        ['href' => route('home'), 'label' => 'Home', 'section' => 'hero'],
                        ['href' => route('about'), 'label' => 'About', 'section' => 'about'],
                        ['href' => route('services'), 'label' => 'Services', 'section' => 'services'],
                        ['href' => route('properties.index'), 'label' => 'Properties', 'section' => 'properties'],
                        ['href' => route('testimonials'), 'label' => 'Testimonials', 'section' => 'testimonials'],
                        ['href' => route('contact'), 'label' => 'Contact', 'section' => 'contact'],
                    ];
                @endphp

                @foreach($navLinks as $link)
                    <a
                        href="{{ $link['href'] }}"
                        :class="[
                            scrolled ? 'text-gray-700 hover:text-emerald-600' : 'text-white/90 hover:text-white',
                            activeSection === '{{ $link['section'] }}' ? (scrolled ? 'text-emerald-600 font-semibold' : 'text-white font-semibold') : ''
                        ]"
                        class="px-4 py-2 text-sm font-medium transition-colors duration-200 rounded-lg hover:bg-white/10"
                    >
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </div>

            <!-- Auth Buttons -->
            <div class="hidden lg:flex items-center space-x-3">
                @if (Route::has('login'))
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            :class="scrolled ? 'bg-emerald-600 text-white hover:bg-emerald-700' : 'bg-white text-emerald-900 hover:bg-emerald-50'"
                            class="px-5 py-2.5 rounded-xl font-semibold text-sm transition-all duration-300 hover:scale-105 shadow-lg"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            :class="scrolled ? 'text-gray-700 hover:text-emerald-600' : 'text-white hover:text-emerald-200'"
                            class="px-5 py-2.5 font-semibold text-sm transition-colors duration-200"
                        >
                            Log in
                        </a>
                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                :class="scrolled ? 'bg-emerald-600 text-white hover:bg-emerald-700' : 'bg-white text-emerald-900 hover:bg-emerald-50'"
                                class="px-5 py-2.5 rounded-xl font-semibold text-sm transition-all duration-300 hover:scale-105 shadow-lg"
                            >
                                Get Started
                            </a>
                        @endif
                    @endauth
                @endif
            </div>

            <!-- Mobile Menu Button -->
            <button
                @click="mobileMenuOpen = !mobileMenuOpen"
                :class="scrolled ? 'text-gray-900' : 'text-white'"
                class="lg:hidden p-2 rounded-lg hover:bg-white/10 transition-colors"
                :aria-expanded="mobileMenuOpen"
                aria-controls="mobile-menu"
                aria-label="Toggle navigation menu"
            >
                <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="mobileMenuOpen" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div
            x-show="mobileMenuOpen"
            x-cloak
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-4"
            id="mobile-menu"
            class="lg:hidden absolute top-full left-0 right-0 bg-white shadow-xl border-t border-gray-100"
        >
            <div class="px-4 py-6 space-y-1">
                @foreach($navLinks as $link)
                    <a
                        href="{{ $link['href'] }}"
                        @click="mobileMenuOpen = false"
                        class="block px-4 py-3 text-gray-700 hover:text-emerald-600 hover:bg-emerald-50 rounded-lg font-medium transition-colors"
                    >
                        {{ $link['label'] }}
                    </a>
                @endforeach

                <hr class="my-4 border-gray-200">

                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="block px-4 py-3 bg-emerald-600 text-white text-center rounded-xl font-semibold hover:bg-emerald-700 transition-colors">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="block px-4 py-3 text-gray-700 hover:text-emerald-600 text-center font-medium transition-colors">
                            Log in
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="block px-4 py-3 bg-emerald-600 text-white text-center rounded-xl font-semibold hover:bg-emerald-700 transition-colors mt-2">
                                Get Started Free
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>
</header>
