<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Murenzi Properties') }} | @yield('title', 'Welcome')</title>

        <!-- SEO Meta Tags -->
        <meta name="description" content="Murenzi Properties - Your trusted partner in real estate. Find your dream property in Rwanda with our expert guidance.">
        <meta name="keywords" content="real estate, properties, land, houses, apartments, Rwanda, Kigali, investment, murenzi properties">
        <meta name="author" content="Murenzi Properties">
        <meta name="robots" content="index, follow">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:title" content="{{ config('app.name', 'Murenzi Properties') }} - Real Estate & Investments">
        <meta property="og:description" content="Find your dream property in Rwanda with Murenzi Properties. Expert guidance for residential, commercial, and land investments.">
        <meta property="og:image" content="{{ asset('images/og-image.png') }}">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
        <meta property="og:site_name" content="Murenzi Properties">

        <!-- Twitter -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:url" content="{{ url()->current() }}">
        <meta name="twitter:title" content="{{ config('app.name', 'Murenzi Properties') }} - Real Estate & Investments">
        <meta name="twitter:description" content="Find your dream property in Rwanda with Murenzi Properties. Expert guidance for residential, commercial, and land investments.">
        <meta name="twitter:image" content="{{ asset('images/og-image.png') }}">

        <!-- Favicon -->
        <link rel="icon" type="image/svg+xml" href="{{ asset('images/logo.svg') }}">
        <link rel="apple-touch-icon" href="{{ asset('images/logo.svg') }}">

        <!-- Theme Color -->
        <meta name="theme-color" content="#10b981">
        <meta name="msapplication-TileColor" content="#10b981">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex">
            <!-- Left Side - Promotional Flyer -->
            <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-emerald-600 via-teal-600 to-cyan-500 relative overflow-hidden">
                <!-- Background Pattern -->
                <div class="absolute inset-0 opacity-10">
                    <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                        <defs>
                            <pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse">
                                <path d="M 10 0 L 0 0 0 10" fill="none" stroke="white" stroke-width="0.5"/>
                            </pattern>
                        </defs>
                        <rect width="100" height="100" fill="url(#grid)"/>
                    </svg>
                </div>

                <!-- Floating Elements -->
                <div class="absolute top-20 left-10 w-20 h-20 bg-white/10 rounded-full blur-xl animate-pulse"></div>
                <div class="absolute bottom-32 right-20 w-32 h-32 bg-teal-400/20 rounded-full blur-2xl animate-pulse" style="animation-delay: 1s;"></div>
                <div class="absolute top-1/2 left-1/4 w-16 h-16 bg-cyan-400/20 rounded-full blur-xl animate-pulse" style="animation-delay: 2s;"></div>

                <!-- Content -->
                <div class="relative z-10 flex flex-col justify-between p-12 text-white w-full">
                    <!-- Logo & Tagline -->
                    <div>
                        <div class="flex items-center space-x-3 mb-4">
                            <div class="bg-white/20 backdrop-blur-sm p-3 rounded-xl">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                </svg>
                            </div>
                            <div>
                                <h1 class="text-3xl font-extrabold tracking-tight">Murenzi Properties</h1>
                                <p class="text-emerald-200 text-sm">Real Estate & Investments</p>
                            </div>
                        </div>

                        <!-- Motivational Quote -->
                        @php
                            $quotes = [
                                "Home is where your story begins.",
                                "The best investment on earth is earth.",
                                "Don't wait to buy real estate. Buy real estate and wait.",
                                "Real estate is an imperishable asset, ever-increasing in value.",
                                "Owning a home is a keystone of wealth.",
                                "The wise young man invests in real estate.",
                                "Land monopoly is the mother of all monopolies.",
                                "Buy land, they're not making it anymore.",
                                "In real estate, you make 10% of your money in the market, and 90% waiting.",
                                "Every accomplishment starts with the decision to try.",
                            ];
                            $randomQuote = $quotes[array_rand($quotes)];
                        @endphp
                        <div class="mt-6 bg-white/10 backdrop-blur-sm rounded-xl p-4 border-l-4 border-amber-400">
                            <p class="text-white/90 italic text-sm">"{{ $randomQuote }}"</p>
                            <p class="text-emerald-300 text-xs mt-2">— Your dream property awaits 🏠</p>
                        </div>
                    </div>

                    <!-- Features -->
                    <div class="space-y-6">
                        <h2 class="text-2xl font-bold mb-6">Why Choose Murenzi Properties?</h2>

                        <div class="space-y-4">
                            <div class="flex items-start space-x-4 bg-white/10 backdrop-blur-sm rounded-xl p-4 transform hover:scale-105 transition">
                                <div class="bg-emerald-400 p-2 rounded-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold">Premium Properties</h3>
                                    <p class="text-emerald-200 text-sm">Curated selection of residential & commercial properties</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4 bg-white/10 backdrop-blur-sm rounded-xl p-4 transform hover:scale-105 transition">
                                <div class="bg-teal-400 p-2 rounded-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold">Expert Guidance</h3>
                                    <p class="text-emerald-200 text-sm">Professional agents to help you every step</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4 bg-white/10 backdrop-blur-sm rounded-xl p-4 transform hover:scale-105 transition">
                                <div class="bg-amber-400 p-2 rounded-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold">Land Investments</h3>
                                    <p class="text-emerald-200 text-sm">Prime plots in strategic locations across Rwanda</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4 bg-white/10 backdrop-blur-sm rounded-xl p-4 transform hover:scale-105 transition">
                                <div class="bg-cyan-400 p-2 rounded-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold">Secure Transactions</h3>
                                    <p class="text-emerald-200 text-sm">Legal support & transparent dealings guaranteed</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact & CTA -->
                    <div class="space-y-6">
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6">
                            <p class="text-emerald-200 text-sm uppercase tracking-wider mb-2">Need Help? Contact Us</p>
                            <div class="flex items-center space-x-3">
                                <div class="bg-green-500 p-3 rounded-full animate-pulse">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-2xl font-bold">0788 309 762</p>
                                    <p class="text-emerald-200 text-sm">Available Mon-Sat</p>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4 text-sm text-emerald-200">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                Free Consultation
                            </span>
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                Site Visits
                            </span>
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                Legal Support
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Form -->
            <div class="w-full lg:w-1/2 flex flex-col justify-center items-center p-8 bg-gray-50">
                <!-- Mobile Logo -->
                <div class="lg:hidden mb-8 text-center">
                    <div class="flex items-center justify-center space-x-2 mb-2">
                        <div class="bg-emerald-600 p-2 rounded-xl">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                        </div>
                        <h1 class="text-2xl font-bold text-gray-800">Murenzi Properties</h1>
                    </div>
                    <p class="text-gray-500 text-sm">Real Estate & Investments</p>
                </div>

                <div class="w-full max-w-md">
                    <div class="bg-white shadow-xl rounded-2xl p-8">
                        {{ $slot }}
                    </div>

                    <!-- Mobile Contact -->
                    <div class="lg:hidden mt-6 text-center">
                        <p class="text-gray-500 text-sm">Need help? Call</p>
                        <a href="tel:0788309762" class="text-emerald-600 font-bold text-lg">0788 309 762</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Floating WhatsApp Button -->
        <a href="https://wa.me/250788309762?text=Hello%2C%20I%20am%20interested%20in%20Murenzi%20Properties" target="_blank" class="fixed bottom-6 right-6 z-50 bg-green-500 hover:bg-green-600 text-white p-4 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-110 group">
            <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
            </svg>
            <span class="absolute right-full mr-3 top-1/2 -translate-y-1/2 bg-gray-900 text-white text-sm px-3 py-1 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">
                Chat with us!
            </span>
        </a>
    </body>
</html>
