```blade
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
                    <h2 class="font-bold text-xl text-gray-800 leading-tight">
                        {{ __('messages.Edit User') }}
                    </h2>
                    <p class="text-sm text-gray-500">{{ $user->email }}</p>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

                <!-- Header -->
                <div class="px-6 py-5 border-b border-gray-100 bg-gradient-to-r from-blue-50 to-indigo-50">
                    <div class="flex items-center">
                        <div class="h-14 w-14 rounded-full bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center mr-4 text-white text-xl font-bold">
                            {{ strtoupper(substr($user->name, 0, 2)) }}
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">{{ $user->name }}</h3>
                            <p class="text-sm text-gray-500">
                                {{ __('messages.Registered') }}: {{ $user->created_at->format('M d, Y') }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- UPDATE FORM -->
                <form action="{{ route('admin.users.update', $user) }}" method="POST" class="p-6 space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            {{ __('messages.Name') }} *
                        </label>
                        <input type="text" name="name"
                               value="{{ old('name', $user->name) }}"
                               required
                               class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            {{ __('messages.Email') }} *
                        </label>
                        <input type="email" name="email"
                               value="{{ old('email', $user->email) }}"
                               required
                               class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <!-- Role -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            {{ __('messages.Role') }} *
                        </label>
                        <select name="role"
                                class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="user" {{ old('role', $user->role) === 'user' ? 'selected' : '' }}>User</option>
                            <option value="seller" {{ old('role', $user->role) === 'seller' ? 'selected' : '' }}>Seller</option>
                            <option value="accountant" {{ old('role', $user->role) === 'accountant' ? 'selected' : '' }}>Accountant</option>
                            <option value="business_admin" {{ old('role', $user->role) === 'business_admin' ? 'selected' : '' }}>Business Admin</option>
                            <option value="system_admin" {{ old('role', $user->role) === 'system_admin' ? 'selected' : '' }}>System Admin</option>
                        </select>
                    </div>

                    <!-- Business -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            {{ __('messages.Business') }}
                        </label>
                        <select name="business_id"
                                class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">No Business Assigned</option>
                            @foreach($businesses as $business)
                                <option value="{{ $business->id }}"
                                    {{ old('business_id', $user->businesses->first()?->id) == $business->id ? 'selected' : '' }}>
                                    {{ $business->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            {{ __('messages.Account Status') }}
                        </label>

                        <div class="flex space-x-4">
                            <label class="flex items-center p-4 bg-green-50 rounded-xl border cursor-pointer">
                                <input type="radio" name="account_status" value="active"
                                       class="mr-2"
                                       {{ old('account_status', $user->account_status) === 'active' ? 'checked' : '' }}>
                                Active
                            </label>

                            <label class="flex items-center p-4 bg-red-50 rounded-xl border cursor-pointer">
                                <input type="radio" name="account_status" value="suspended"
                                       class="mr-2"
                                       {{ old('account_status', $user->account_status) === 'suspended' ? 'checked' : '' }}>
                                Suspended
                            </label>
                        </div>
                    </div>

                    <!-- ACTIONS -->
                    <div class="flex items-center justify-between pt-6 border-t border-gray-100">

                        <!-- DELETE BUTTON -->
                        @if($user->id !== auth()->id())
                            <button type="button"
                                    onclick="confirmDelete()"
                                    class="px-4 py-2 bg-red-100 text-red-700 rounded-xl hover:bg-red-200 transition">
                                Delete
                            </button>
                        @else
                            <div></div>
                        @endif

                        <!-- RIGHT ACTIONS -->
                        <div class="flex space-x-3">
                            <a href="{{ route('admin.users.index') }}"
                               class="px-6 py-2 border border-gray-300 rounded-xl hover:bg-gray-50">
                                Cancel
                            </a>

                            <button type="submit"
                                    class="px-6 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700">
                                Update User
                            </button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <!-- DELETE FORM (OUTSIDE UPDATE FORM) -->
    @if($user->id !== auth()->id())
        <form id="delete-user-form"
              action="{{ route('admin.users.destroy', $user) }}"
              method="POST"
              class="hidden">
            @csrf
            @method('DELETE')
        </form>
    @endif

    <script>
        function confirmDelete() {
            if (confirm('Are you sure you want to delete this user? This action cannot be undone.')) {
                document.getElementById('delete-user-form').submit();
            }
        }
    </script>

</x-app-layout>
```
