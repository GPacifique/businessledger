<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <a href="{{ route('admin.dashboard') }}" class="h-10 w-10 rounded-xl bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-gray-200 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </a>
                <div>
                    <h2 class="font-bold text-xl text-gray-800 leading-tight">{{ __('messages.Edit Business') }}</h2>
                    <p class="text-sm text-gray-500">{{ $business->name }}</p>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-100 bg-gradient-to-r from-indigo-50 to-purple-50">
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">{{ __('messages.business_details') }}</h3>
                            <p class="text-xs text-gray-500">{{ __('messages.Update business information') }}</p>
                        </div>
                    </div>
                </div>

                <form action="{{ route('admin.businesses.update', $business) }}" method="POST" class="p-6 space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Business Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.business_name') }} *</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $business->name) }}" required
                            class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition"
                            placeholder="{{ __('messages.enter_business_name') }}">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Address -->
                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.address') }}</label>
                        <textarea name="address" id="address" rows="3"
                            class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition"
                            placeholder="{{ __('messages.enter_business_address') }}">{{ old('address', $business->address) }}</textarea>
                        @error('address')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Phone -->
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.phone_number') }}</label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone', $business->phone) }}"
                            class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition"
                            placeholder="+250 7XX XXX XXX">
                        @error('phone')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Current Admin Info -->
                    @if($business->users->where('role', 'business_admin')->first())
                        <div class="bg-blue-50 rounded-xl p-4">
                            <p class="text-sm text-blue-700">
                                <strong>{{ __('messages.Current Admin') }}:</strong>
                                {{ $business->users->where('role', 'business_admin')->first()->name }}
                                ({{ $business->users->where('role', 'business_admin')->first()->email }})
                            </p>
                        </div>
                    @endif

                    <!-- Status -->
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.status') }} *</label>
                        <div class="flex flex-wrap gap-4">
                            <label class="flex items-center p-4 bg-green-50 rounded-xl border-2 cursor-pointer transition hover:bg-green-100
                                {{ old('status', $business->status) === 'approved' ? 'border-green-500' : 'border-transparent' }}">
                                <input type="radio" name="status" value="approved" class="sr-only" {{ old('status', $business->status) === 'approved' ? 'checked' : '' }}>
                                <div class="h-8 w-8 rounded-lg bg-green-500 flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-green-800">{{ __('messages.approved') }}</p>
                                    <p class="text-xs text-green-600">{{ __('messages.Active') }}</p>
                                </div>
                            </label>
                            <label class="flex items-center p-4 bg-yellow-50 rounded-xl border-2 cursor-pointer transition hover:bg-yellow-100
                                {{ old('status', $business->status) === 'pending' ? 'border-yellow-500' : 'border-transparent' }}">
                                <input type="radio" name="status" value="pending" class="sr-only" {{ old('status', $business->status) === 'pending' ? 'checked' : '' }}>
                                <div class="h-8 w-8 rounded-lg bg-yellow-500 flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-yellow-800">{{ __('messages.pending') }}</p>
                                    <p class="text-xs text-yellow-600">{{ __('messages.Awaiting Review') }}</p>
                                </div>
                            </label>
                            <label class="flex items-center p-4 bg-red-50 rounded-xl border-2 cursor-pointer transition hover:bg-red-100
                                {{ old('status', $business->status) === 'rejected' ? 'border-red-500' : 'border-transparent' }}">
                                <input type="radio" name="status" value="rejected" class="sr-only" {{ old('status', $business->status) === 'rejected' ? 'checked' : '' }}>
                                <div class="h-8 w-8 rounded-lg bg-red-500 flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-red-800">{{ __('messages.rejected') }}</p>
                                    <p class="text-xs text-red-600">{{ __('messages.Rejected') }}</p>
                                </div>
                            </label>
                        </div>
                        @error('status')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex items-center justify-between pt-6 border-t border-gray-100">
                        <button type="button" onclick="document.getElementById('delete-form').submit();" class="px-4 py-2 bg-red-100 text-red-700 rounded-xl font-medium hover:bg-red-200 transition">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                                {{ __('messages.Delete') }}
                            </span>
                        </button>
                        <div class="flex space-x-3">
                            <a href="{{ route('admin.dashboard') }}"
                                class="px-6 py-2.5 border border-gray-300 text-gray-700 rounded-xl font-medium hover:bg-gray-50 transition">
                                {{ __('messages.cancel') }}
                            </a>
                            <button type="submit"
                                class="px-6 py-2.5 bg-gradient-to-r from-indigo-500 to-purple-600 text-white rounded-xl font-medium hover:from-indigo-600 hover:to-purple-700 transition transform hover:scale-105 shadow-lg">
                                <span class="flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    {{ __('messages.Update Business') }}
                                </span>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Delete Form (outside the update form) -->
                <form id="delete-form" action="{{ route('admin.businesses.destroy', $business) }}" method="POST" class="hidden" onsubmit="return confirm('Are you sure you want to delete this business? This action cannot be undone.');">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
    </div>

    <script>
        // Radio button styling
        document.querySelectorAll('input[name="status"]').forEach(radio => {
            radio.addEventListener('change', function() {
                document.querySelectorAll('input[name="status"]').forEach(r => {
                    r.closest('label').classList.remove('border-green-500', 'border-yellow-500', 'border-red-500');
                    r.closest('label').classList.add('border-transparent');
                });
                if (this.value === 'approved') {
                    this.closest('label').classList.add('border-green-500');
                } else if (this.value === 'pending') {
                    this.closest('label').classList.add('border-yellow-500');
                } else {
                    this.closest('label').classList.add('border-red-500');
                }
            });
        });
    </script>
</x-app-layout>
