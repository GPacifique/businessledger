<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <div class="p-2 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl shadow-lg shadow-indigo-500/25">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h2 class="font-bold text-2xl bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                    {{ __('messages.Bills') }}
                </h2>
            </div>
            <a href="{{ route('bills.create') }}"
                class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-indigo-500 to-purple-600 border border-transparent rounded-xl font-semibold text-sm text-white hover:from-indigo-600 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-300 shadow-lg shadow-indigo-500/25 hover:shadow-xl hover:-translate-y-0.5">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                {{ __('messages.Create Bill') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-6 bg-gradient-to-r from-emerald-50 to-green-50 border border-emerald-200 text-emerald-700 px-6 py-4 rounded-2xl flex items-center shadow-lg">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-emerald-400 to-green-500 flex items-center justify-center mr-4 shadow-md">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white/80 backdrop-blur-lg overflow-hidden rounded-2xl shadow-xl border border-white/20 mb-8">
                <div class="p-6">
                    <!-- Filters -->
                    <div class="flex flex-col md:flex-row gap-4 mb-6">
                        <form method="GET" action="{{ route('bills.index') }}" class="flex flex-col md:flex-row gap-4 flex-1">
                            <div class="flex-1">
                                <input type="text" name="search" value="{{ request('search') }}" placeholder="{{ __('messages.Search by bill number or customer') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200">
                            </div>
                            <select name="status" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200">
                                <option value="">{{ __('messages.All Status') }}</option>
                                @foreach($statuses as $key => $label)
                                    <option value="{{ $key }}" {{ request('status') === $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="px-6 py-2 bg-gradient-to-r from-indigo-500 to-purple-600 border border-transparent rounded-lg font-semibold text-sm text-white hover:from-indigo-600 hover:to-purple-700 transition-all duration-300 shadow-lg shadow-indigo-500/25 hover:shadow-xl hover:-translate-y-0.5">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button>
                        </form>
                    </div>

                    @if ($bills->isEmpty())
                        <div class="text-center py-16">
                            <div class="mx-auto w-20 h-20 bg-gradient-to-br from-indigo-100 to-purple-100 rounded-full flex items-center justify-center mb-6">
                                <svg class="w-10 h-10 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ __('messages.No bills found') }}</h3>
                            <p class="text-gray-500 mb-8">{{ __('messages.Get started by creating your first bill.') }}</p>
                            <a href="{{ route('bills.create') }}"
                                class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-500 to-purple-600 border border-transparent rounded-xl font-semibold text-sm text-white hover:from-indigo-600 hover:to-purple-700 transition-all duration-300 shadow-lg shadow-indigo-500/25 hover:shadow-xl hover:-translate-y-0.5">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                {{ __('messages.Create Bill') }}
                            </a>
                        </div>
                    @else
                        <div class="overflow-x-auto rounded-xl">
                            <table class="min-w-full">
                                <thead class="bg-gradient-to-r from-indigo-500 to-purple-600">
                                    <tr>
                                        <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                                            {{ __('messages.Bill Number') }}
                                        </th>
                                        <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                                            {{ __('messages.Customer') }}
                                        </th>
                                        <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                                            {{ __('messages.Bill Date') }}
                                        </th>
                                        <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                                            {{ __('messages.Due Date') }}
                                        </th>
                                        <th scope="col" class="px-6 py-4 text-right text-xs font-bold text-white uppercase tracking-wider">
                                            {{ __('messages.Amount') }}
                                        </th>
                                        <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                                            {{ __('messages.Status') }}
                                        </th>
                                        <th scope="col" class="px-6 py-4 text-right text-xs font-bold text-white uppercase tracking-wider">
                                            {{ __('messages.Actions') }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-100">
                                    @foreach ($bills as $bill)
                                        <tr class="hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 transition-all duration-300">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="font-semibold text-gray-900">{{ $bill->bill_number }}</span>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div>
                                                    <p class="font-semibold text-gray-900">{{ $bill->customer_name }}</p>
                                                    <p class="text-sm text-gray-500">{{ $bill->customer_email ?? '-' }}</p>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="text-gray-600">{{ $bill->bill_date->format('M d, Y') }}</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="text-gray-600">{{ $bill->due_date->format('M d, Y') }}</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                                <span class="text-lg font-bold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">{{ format_currency($bill->total) }}</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                                    @if($bill->status === 'draft') bg-gray-100 text-gray-800
                                                    @elseif($bill->status === 'sent') bg-blue-100 text-blue-800
                                                    @elseif($bill->status === 'paid') bg-green-100 text-green-800
                                                    @elseif($bill->status === 'overdue') bg-red-100 text-red-800
                                                    @else bg-yellow-100 text-yellow-800 @endif">
                                                    {{ ucfirst($bill->status) }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                                <div class="flex justify-end space-x-2">
                                                    <a href="{{ route('bills.show', $bill) }}" class="text-indigo-600 hover:text-indigo-900 font-semibold">{{ __('messages.View') }}</a>
                                                    <a href="{{ route('bills.edit', $bill) }}" class="text-blue-600 hover:text-blue-900 font-semibold">{{ __('messages.Edit') }}</a>
                                                    @if($bill->status === 'draft')
                                                        <form action="{{ route('bills.destroy', $bill) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="text-red-600 hover:text-red-900 font-semibold">{{ __('messages.Delete') }}</button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="mt-6">
                            {{ $bills->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
