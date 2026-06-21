@props(['variant' => 'light'])

@php
    $quotes = [
          "Success in business starts with smart decisions.",
    
    "Track your finances today to secure your future tomorrow.",
    
    "Profit is not an accident—it is the result of planning.",
    
    "Great businesses are built on great management.",
    
    "Every dollar saved is a dollar earned.",
    
    "Small daily improvements lead to long-term business success.",
    
    "Your business grows when your systems grow.",
    
    "Good management turns vision into reality.",
    
    "Revenue is vanity, profit is sanity.",
    
    "Behind every successful business is organized data.",
    
    "Manage expenses wisely and profits will follow.",
    
    "Efficiency is doing things right; effectiveness is doing the right things.",
    
    "Business success begins with proper planning.",
    
    "What gets measured gets improved.",
    
    "Strong businesses are built with discipline and consistency.",
    
    "Financial clarity leads to smarter decisions.",
    
    "Growth happens when you track what matters.",
    
    "A goal without a plan is just a wish.",
    
    "Smart businesses monitor income, control expenses, and maximize profits.",
    
    "The secret of success is consistency of purpose.",
    
    "Your dashboard reflects the health of your business.",
    
    "Work smarter, manage better, grow faster.",
    
    "Every transaction tells a story—make yours profitable.",
    
    "Success is built one smart decision at a time.",
    
    "Turn your data into decisions and decisions into growth.",
    
    "Well-managed businesses survive every season.",
    
    "Leadership and organization drive business excellence.",
    
    "Profit grows where discipline flows.",
    
    "Dream big, manage wisely.",
    
    "Today's planning creates tomorrow's success.",
    ];
    $randomQuote = $quotes[array_rand($quotes)];
@endphp

@if($variant === 'dark')
<!-- Dark Footer for Welcome/Landing Pages -->
<footer class="relative z-10 bg-gradient-to-r from-emerald-900 via-teal-900 to-emerald-900">
    <!-- Motivational Quote Section -->
    <div class="border-t border-white/10 py-8">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-gradient-to-r from-emerald-400 to-teal-500 mb-4">
                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M9.983 3v7.391c0 5.704-3.731 9.57-8.983 10.609l-.995-2.151c2.432-.917 3.995-3.638 3.995-5.849h-4v-10h9.983zm14.017 0v7.391c0 5.704-3.748 9.571-9 10.609l-.996-2.151c2.433-.917 3.996-3.638 3.996-5.849h-3.983v-10h9.983z"/>
                </svg>
            </div>
            <p class="text-xl md:text-2xl font-medium text-white/90 italic mb-3">
                "{{ $randomQuote }}"
            </p>
            <p class="text-emerald-300 text-sm">— Accounting Software 🏠</p>
        </div>
    </div>

    <!-- Main Footer Content -->
    <div class="border-t border-white/10 py-10 px-6 lg:px-12">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Brand -->
                <div class="md:col-span-2">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="bg-white/20 backdrop-blur-sm p-2 rounded-xl">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white">FinTrack</h3>
                            <p class="text-emerald-200 text-xs">accounting Software</p>
                        </div>
                    </div>
                    <p class="text-emerald-200 text-sm leading-relaxed max-w-md">
                        Your trusted partner in Managing. Business Finances.
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-white font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('login') }}" class="text-emerald-200 hover:text-white transition text-sm">Login</a></li>
                        <li><a href="{{ route('register') }}" class="text-emerald-200 hover:text-white transition text-sm">Register</a></li>
                        <li><a href="{{ route('about') }}" class="text-emerald-200 hover:text-white transition text-sm">About Us</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="text-white font-semibold mb-4">Get in Touch</h4>
                    <ul class="space-y-3">
                        <li>
                            <a href="tel:+250729347391" class="flex items-center text-emerald-200 hover:text-white transition text-sm">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                                +250 729 347 391
                            </a>
                        </li>
                        <li>
                            <a href="https://wa.me/250786163963" target="_blank" class="flex items-center text-emerald-200 hover:text-white transition text-sm">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                </svg>
                                WhatsApp
                            </a>
                        </li>
                        <li>
                            <span class="flex items-center text-emerald-200 text-sm">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                Kigali, Rwanda
                            </span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="mt-10 pt-6 border-t border-white/10 flex flex-col md:flex-row items-center justify-between">
                <p class="text-emerald-200 text-sm mb-4 md:mb-0">
                    © {{ date('Y') }} FinTrack. Made with ❤️ in Rwanda
                </p>
                <div class="flex items-center space-x-4">
                    <span class="text-emerald-300 text-xs flex items-center">
                        <svg class="w-4 h-4 mr-1 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        Secure & Trusted
                    </span>
                    <span class="text-emerald-300 text-xs flex items-center">
                        <svg class="w-4 h-4 mr-1 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.8１ .588-１ .588h3.46１a１ １ ０ ００．９５１－．６９l１．０７－３．２９２z"/>
                        </svg>
                        4.8/5 Rating
                    </span>
                </div>
            </div>
        </div>
    </div>
</footer>

@else
<!-- Light Footer for App Dashboard Pages -->
<footer class="bg-white border-t border-gray-200 mt-auto">
    <!-- Motivational Quote Section -->
    <div class="bg-gradient-to-r from-emerald-50 via-teal-50 to-cyan-50 py-6">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <div class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gradient-to-r from-emerald-500 to-teal-500 mb-3">
                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M9.983 3v7.391c0 5.704-3.731 9.57-8.983 10.609l-.995-2.151c2.432-.917 3.995-3.638 3.995-5.849h-4v-10h9.983zm14.017 0v7.391c0 5.704-3.748 9.571-9 10.609l-.996-2.151c2.433-.917 3.996-3.638 3.996-5.849h-3.983v-10h9.983z"/>
                </svg>
            </div>
            <p class="text-lg font-medium text-gray-700 italic">
                "{{ $randomQuote }}"
            </p>
            <p class="text-emerald-500 text-xs mt-2">— FinTrack ACCOUNTING SOFTWARE 🏠</p>
        </div>
    </div>

    <!-- Main Footer Content -->
    <div class="py-6 px-6 lg:px-12">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between">
            <div class="flex items-center space-x-3 mb-4 md:mb-0">
                <div class="bg-emerald-100 p-2 rounded-lg">
                    <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                </div>
                <div>
                    <span class="text-gray-800 font-bold">FinTrack</span>
                    <span class="text-gray-400 mx-2">|</span>
                    <span class="text-gray-500 text-sm">Accounting Software</span>
                </div>
            </div>

            <div class="flex items-center space-x-6">
                <a href="tel:+250729347391" class="text-gray-500 hover:text-emerald-600 transition flex items-center text-sm">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    Contact
                </a>
                <span class="text-gray-300">|</span>
                <p class="text-gray-500 text-sm">
                    © FinTrack {{ date('Y') }} Made with ❤️ in Rwanda
                </p>
            </div>
        </div>
    </div>
</footer>
@endif
