<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <div class="p-2 bg-gradient-to-br from-violet-500 to-purple-600 rounded-xl shadow-lg shadow-violet-500/25">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                </div>
                <h2 class="font-bold text-2xl bg-gradient-to-r from-violet-600 to-purple-600 bg-clip-text text-transparent">
                    {{ __('messages.Categories') }}
                </h2>
            </div>
            <a href="{{ route('categories.create') }}"
                class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-violet-500 via-purple-500 to-fuchsia-500 border border-transparent rounded-xl font-semibold text-sm text-white hover:from-violet-600 hover:via-purple-600 hover:to-fuchsia-600 focus:outline-none focus:ring-2 focus:ring-violet-500 focus:ring-offset-2 transition-all duration-300 shadow-lg shadow-violet-500/25 hover:shadow-xl hover:-translate-y-0.5">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                {{ __('messages.Add Category') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-6 bg-gradient-to-r from-emerald-50 to-teal-50 border border-emerald-200 text-emerald-700 px-5 py-4 rounded-2xl shadow-lg flex items-center space-x-3" role="alert">
                    <div class="p-2 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-xl">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif

            @if (session('error'))
                <div class="mb-6 bg-gradient-to-r from-rose-50 to-pink-50 border border-rose-200 text-rose-700 px-5 py-4 rounded-2xl shadow-lg flex items-center space-x-3" role="alert">
                    <div class="p-2 bg-gradient-to-br from-rose-400 to-pink-500 rounded-xl">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>
                    <span class="font-medium">{{ session('error') }}</span>
                </div>
            @endif

            <div class="bg-white/80 backdrop-blur-lg overflow-hidden shadow-xl rounded-2xl border border-white/20">
                <div class="p-6 text-gray-900">
                    @if ($categories->isEmpty())
                        <div class="text-center py-16">
                            <div class="mx-auto w-20 h-20 bg-gradient-to-br from-violet-100 to-purple-100 rounded-full flex items-center justify-center mb-6 animate-pulse">
                                <svg class="w-10 h-10 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ __('messages.No categories') }}</h3>
                            <p class="text-gray-500 mb-8">{{ __('messages.Get started by creating a new category.') }}</p>
                            <a href="{{ route('categories.create') }}"
                                class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-violet-500 via-purple-500 to-fuchsia-500 border border-transparent rounded-xl font-semibold text-sm text-white hover:from-violet-600 hover:via-purple-600 hover:to-fuchsia-600 transition-all duration-300 shadow-lg shadow-violet-500/25 hover:shadow-xl hover:-translate-y-0.5">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                {{ __('messages.Add Category') }}
                            </a>
                        </div>
                    @else
                        <!-- Income Categories -->
                        <div class="mb-10">
                            <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                                <div class="p-2 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-lg mr-3 shadow-md shadow-emerald-500/25">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <span class="bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent">{{ __('messages.Income Categories') }}</span>
                            </h3>
                            @php
                                $incomeCategories = $categories->where('type', 'income');
                            @endphp
                            @if ($incomeCategories->isEmpty())
                                <p class="text-sm text-gray-500 italic pl-11">{{ __('messages.No income categories yet.') }}</p>
                            @else
                                <div class="overflow-x-auto rounded-xl">
                                    <table class="min-w-full">
                                        <thead class="bg-gradient-to-r from-emerald-500 to-teal-500">
                                            <tr>
                                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                                                    {{ __('messages.Name') }}
                                                </th>
                                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                                                    {{ __('messages.Description') }}
                                                </th>
                                                <th scope="col" class="px-6 py-4 text-right text-xs font-bold text-white uppercase tracking-wider">
                                                    {{ __('messages.Actions') }}
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-100">
                                            @foreach ($incomeCategories as $category)
                                                <tr class="hover:bg-gradient-to-r hover:from-emerald-50 hover:to-teal-50 transition-all duration-300">
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full bg-gradient-to-r from-emerald-100 to-teal-100 text-emerald-700 border border-emerald-200">
                                                            {{ $category->name }}
                                                        </span>
                                                    </td>
                                                    <td class="px-6 py-4 text-sm text-gray-600">
                                                        {{ $category->description ?? '-' }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                                        <div class="flex items-center justify-end space-x-2">
                                                            <a href="{{ route('categories.edit', $category) }}"
                                                                class="p-2 bg-gradient-to-br from-amber-400 to-orange-500 rounded-lg text-white hover:shadow-lg hover:shadow-amber-500/25 transition-all duration-300 hover:-translate-y-0.5"
                                                                title="{{ __('messages.Edit') }}">
                                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                                </svg>
                                                            </a>
                                                            <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline" onsubmit="return confirm('{{ __('messages.Are you sure you want to delete this category?') }}');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="p-2 bg-gradient-to-br from-rose-400 to-red-500 rounded-lg text-white hover:shadow-lg hover:shadow-rose-500/25 transition-all duration-300 hover:-translate-y-0.5"
                                                                    title="{{ __('messages.Delete') }}">
                                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                                    </svg>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>

                        <!-- Expense Categories -->
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                                <div class="p-2 bg-gradient-to-br from-rose-400 to-pink-500 rounded-lg mr-3 shadow-md shadow-rose-500/25">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </div>
                                <span class="bg-gradient-to-r from-rose-600 to-pink-600 bg-clip-text text-transparent">{{ __('messages.Expense Categories') }}</span>
                            </h3>
                            @php
                                $expenseCategories = $categories->where('type', 'expense');
                            @endphp
                            @if ($expenseCategories->isEmpty())
                                <p class="text-sm text-gray-500 italic pl-11">{{ __('messages.No expense categories yet.') }}</p>
                            @else
                                <div class="overflow-x-auto rounded-xl">
                                    <table class="min-w-full">
                                        <thead class="bg-gradient-to-r from-rose-500 via-red-500 to-pink-500">
                                            <tr>
                                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                                                    {{ __('messages.Name') }}
                                                </th>
                                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                                                    {{ __('messages.Description') }}
                                                </th>
                                                <th scope="col" class="px-6 py-4 text-right text-xs font-bold text-white uppercase tracking-wider">
                                                    {{ __('messages.Actions') }}
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-100">
                                            @foreach ($expenseCategories as $category)
                                                <tr class="hover:bg-gradient-to-r hover:from-rose-50 hover:to-pink-50 transition-all duration-300">
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full bg-gradient-to-r from-rose-100 to-pink-100 text-rose-700 border border-rose-200">
                                                            {{ $category->name }}
                                                        </span>
                                                    </td>
                                                    <td class="px-6 py-4 text-sm text-gray-600">
                                                        {{ $category->description ?? '-' }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                                        <div class="flex items-center justify-end space-x-2">
                                                            <a href="{{ route('categories.edit', $category) }}"
                                                                class="p-2 bg-gradient-to-br from-amber-400 to-orange-500 rounded-lg text-white hover:shadow-lg hover:shadow-amber-500/25 transition-all duration-300 hover:-translate-y-0.5"
                                                                title="{{ __('messages.Edit') }}">
                                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                                </svg>
                                                            </a>
                                                            <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline" onsubmit="return confirm('{{ __('messages.Are you sure you want to delete this category?') }}');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="p-2 bg-gradient-to-br from-rose-400 to-red-500 rounded-lg text-white hover:shadow-lg hover:shadow-rose-500/25 transition-all duration-300 hover:-translate-y-0.5"
                                                                    title="{{ __('messages.Delete') }}">
                                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                                    </svg>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
