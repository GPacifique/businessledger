<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <a href="{{ route('admin.users.index') }}" class="h-10 w-10 rounded-xl bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-gray-200 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </a>
                <div>
                    <h2 class="font-bold text-xl text-gray-800 leading-tight">{{ __('messages.Edit User') }}</h2>
                    <p class="text-sm text-gray-500">{{ $user->email }}</p>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-100 bg-gradient-to-r from-blue-50 to-indigo-50">
                    <div class="flex items-center">
                        <div class="h-14 w-14 rounded-full bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center mr-4 text-white text-xl font-bold">
                            {{ strtoupper(substr($user->name, 0, 2)) }}
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">{{ $user->name }}</h3>
                            <p class="text-sm text-gray-500">{{ __('messages.Registered') }}: {{ $user->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                </div>

                <form action="{{ route('admin.users.update', $user) }}" method="POST" class="p-6 space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.Name') }} *</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required
                            class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.Email') }} *</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required
                            class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition">
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Role -->
                    <div>
                        <label for="role" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.Role') }} *</label>
                        <select name="role" id="role" required
                            class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition">
                            <option value="user" {{ old('role', $user->role) === 'user' ? 'selected' : '' }}>{{ __('messages.User') }}</option>
                            <option value="seller" {{ old('role', $user->role) === 'seller' ? 'selected' : '' }}>{{ __('messages.Seller') }}</option>
                            <option value="accountant" {{ old('role', $user->role) === 'accountant' ? 'selected' : '' }}>{{ __('messages.Accountant') }}</option>
                            <option value="business_admin" {{ old('role', $user->role) === 'business_admin' ? 'selected' : '' }}>{{ __('messages.Business Admin') }}</option>
                            <option value="system_admin" {{ old('role', $user->role) === 'system_admin' ? 'selected' : '' }}>{{ __('messages.System Admin') }}</option>
                        </select>
                        @error('role')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Business -->
                    <div>
                        <label for="business_id" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.Business') }}</label>
                        <select name="business_id" id="business_id"
                            class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition">
                            <option value="">{{ __('messages.No Business Assigned') }}</option>
                            @foreach($businesses as $business)
                                <option value="{{ $business->id }}" {{ old('business_id', $user->business_id) == $business->id ? 'selected' : '' }}>
                                    {{ $business->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('business_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Account Status -->
                    <div>
                        <label for="account_status" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.Account Status') }} *</label>
                        <div class="flex space-x-4">
                            <label class="flex items-center p-4 bg-green-50 rounded-xl border-2 cursor-pointer transition hover:bg-green-100
                                {{ old('account_status', $user->account_status) === 'active' ? 'border-green-500' : 'border-transparent' }}">
                                <input type="radio" name="account_status" value="active" class="sr-only" {{ old('account_status', $user->account_status) === 'active' ? 'checked' : '' }}>
                                <div class="h-8 w-8 rounded-lg bg-green-500 flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-green-800">{{ __('messages.Active') }}</p>
                                    <p class="text-xs text-green-600">{{ __('messages.Can access the system') }}</p>
                                </div>
                            </label>
                            <label class="flex items-center p-4 bg-red-50 rounded-xl border-2 cursor-pointer transition hover:bg-red-100
                                {{ old('account_status', $user->account_status) === 'suspended' ? 'border-red-500' : 'border-transparent' }}">
                                <input type="radio" name="account_status" value="suspended" class="sr-only" {{ old('account_status', $user->account_status) === 'suspended' ? 'checked' : '' }}>
                                <div class="h-8 w-8 rounded-lg bg-red-500 flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-red-800">{{ __('messages.Suspended') }}</p>
                                    <p class="text-xs text-red-600">{{ __('messages.Access blocked') }}</p>
                                </div>
                            </label>
                        </div>
                        @error('account_status')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex items-center justify-between pt-6 border-t border-gray-100">
                        @if($user->id !== auth()->id())
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this user? This action cannot be undone.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-100 text-red-700 rounded-xl font-medium hover:bg-red-200 transition">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                    {{ __('messages.Delete') }}
                                </span>
                            </button>
                        </form>
                        @else
                        <div></div>
                        @endif
                        <div class="flex space-x-3">
                            <a href="{{ route('admin.users.index') }}"
                                class="px-6 py-2.5 border border-gray-300 text-gray-700 rounded-xl font-medium hover:bg-gray-50 transition">
                                {{ __('messages.cancel') }}
                            </a>
                            <button type="submit"
                                class="px-6 py-2.5 bg-gradient-to-r from-blue-500 to-indigo-600 text-white rounded-xl font-medium hover:from-blue-600 hover:to-indigo-700 transition transform hover:scale-105 shadow-lg">
                                <span class="flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    {{ __('messages.Update User') }}
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Radio button styling
        document.querySelectorAll('input[name="account_status"]').forEach(radio => {
            radio.addEventListener('change', function() {
                document.querySelectorAll('input[name="account_status"]').forEach(r => {
                    r.closest('label').classList.remove('border-green-500', 'border-red-500');
                    r.closest('label').classList.add('border-transparent');
                });
                if (this.value === 'active') {
                    this.closest('label').classList.add('border-green-500');
                } else {
                    this.closest('label').classList.add('border-red-500');
                }
            });
        });
    </script>
</x-app-layout>
