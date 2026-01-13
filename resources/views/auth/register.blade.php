<x-guest-layout>
    <div class="text-center mb-8">
        <div class="mx-auto w-16 h-16 bg-gradient-to-br from-emerald-500 via-teal-500 to-cyan-500 rounded-2xl flex items-center justify-center mb-4 shadow-lg shadow-emerald-500/30">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
        </div>
        <h2 class="text-2xl font-bold bg-gradient-to-r from-emerald-600 via-teal-600 to-cyan-600 bg-clip-text text-transparent">Create Account</h2>
        <p class="text-gray-500 mt-1">Join EDI Properties today</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Full Name')" class="text-gray-700 font-semibold" />
            <div class="relative mt-1">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <x-text-input id="name" class="pl-10 block w-full rounded-xl border-gray-200 focus:border-emerald-500 focus:ring-emerald-500 transition-all duration-300" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="John Doe" />
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-semibold" />
            <div class="relative mt-1">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                    </svg>
                </div>
                <x-text-input id="email" class="pl-10 block w-full rounded-xl border-gray-200 focus:border-emerald-500 focus:ring-emerald-500 transition-all duration-300" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="you@example.com" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-semibold" />
            <div class="relative mt-1">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <x-text-input id="password" class="pl-10 block w-full rounded-xl border-gray-200 focus:border-emerald-500 focus:ring-emerald-500 transition-all duration-300"
                                type="password"
                                name="password"
                                required autocomplete="new-password"
                                placeholder="••••••••" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-700 font-semibold" />
            <div class="relative mt-1">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <x-text-input id="password_confirmation" class="pl-10 block w-full rounded-xl border-gray-200 focus:border-emerald-500 focus:ring-emerald-500 transition-all duration-300"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password"
                                placeholder="••••••••" />
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Security Puzzle -->
        <div class="mt-4">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Security Check</label>
            <div class="bg-gradient-to-r from-slate-50 to-gray-50 rounded-xl p-4 border border-gray-200">
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center">
                        <div class="p-2 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-lg mr-3">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-700">Solve to verify you're human</p>
                            <p class="text-xs text-gray-500">Answer the math question below</p>
                        </div>
                    </div>
                </div>

                @php
                    $operators = ['+', '-', '×'];
                    $operator = $operators[array_rand($operators)];

                    if ($operator === '+') {
                        $num1 = rand(5, 15);
                        $num2 = rand(3, 10);
                        $answer = $num1 + $num2;
                    } elseif ($operator === '-') {
                        $num1 = rand(10, 20);
                        $num2 = rand(2, 9);
                        $answer = $num1 - $num2;
                    } else {
                        $num1 = rand(2, 9);
                        $num2 = rand(2, 5);
                        $answer = $num1 * $num2;
                    }

                    $hashedAnswer = hash('sha256', $answer . config('app.key'));
                @endphp

                <div class="flex items-center space-x-3">
                    <div class="flex-1 bg-white rounded-lg px-4 py-3 border border-gray-200 text-center">
                        <span class="text-2xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                            {{ $num1 }} {{ $operator }} {{ $num2 }} = ?
                        </span>
                    </div>
                    <div class="flex-1">
                        <input type="number" name="captcha_answer" id="captcha_answer"
                            class="block w-full rounded-lg border-gray-200 text-center text-xl font-bold focus:border-indigo-500 focus:ring-indigo-500 transition-colors duration-200"
                            placeholder="?" required>
                        <input type="hidden" name="captcha_hash" value="{{ $hashedAnswer }}">
                    </div>
                </div>
            </div>
            <x-input-error :messages="$errors->get('captcha_answer')" class="mt-2" />
        </div>

        <div class="mt-6">
            <button type="submit" class="w-full justify-center py-3 inline-flex items-center px-6 bg-gradient-to-r from-emerald-500 via-teal-500 to-cyan-500 border border-transparent rounded-xl font-semibold text-base text-white hover:from-emerald-600 hover:via-teal-600 hover:to-cyan-600 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 transition-all duration-300 shadow-lg shadow-emerald-500/25 hover:shadow-xl hover:-translate-y-0.5">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                </svg>
                {{ __('Create Account') }}
            </button>
        </div>
    </form>

    <div class="mt-6 text-center">
        <p class="text-gray-600">
            Already have an account?
            <a href="{{ route('login') }}" class="bg-gradient-to-r from-emerald-600 via-teal-600 to-cyan-600 bg-clip-text text-transparent font-bold hover:from-teal-600 hover:to-cyan-600 transition-all duration-300">
                Sign in
            </a>
        </p>
    </div>

    <!-- Features Summary -->
    <div class="mt-6 pt-6 border-t border-gray-200">
        <p class="text-xs text-gray-500 text-center mb-3">What you'll get:</p>
        <div class="grid grid-cols-2 gap-3 text-xs">
            <div class="flex items-center bg-gradient-to-r from-emerald-50 to-teal-50 px-3 py-2 rounded-lg border border-emerald-100">
                <div class="p-1 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-md mr-2">
                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <span class="font-medium text-emerald-700">Property Listings</span>
            </div>
            <div class="flex items-center bg-gradient-to-r from-cyan-50 to-blue-50 px-3 py-2 rounded-lg border border-cyan-100">
                <div class="p-1 bg-gradient-to-br from-cyan-400 to-blue-500 rounded-md mr-2">
                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <span class="font-medium text-cyan-700">Saved Favorites</span>
            </div>
            <div class="flex items-center bg-gradient-to-r from-teal-50 to-emerald-50 px-3 py-2 rounded-lg border border-teal-100">
                <div class="p-1 bg-gradient-to-br from-teal-400 to-emerald-500 rounded-md mr-2">
                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <span class="font-medium text-teal-700">Direct Contact</span>
            </div>
            <div class="flex items-center bg-gradient-to-r from-amber-50 to-orange-50 px-3 py-2 rounded-lg border border-amber-100">
                <div class="p-1 bg-gradient-to-br from-amber-400 to-orange-500 rounded-md mr-2">
                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <span class="font-medium text-amber-700">Investment Tips</span>
            </div>
        </div>
    </div>
</x-guest-layout>
