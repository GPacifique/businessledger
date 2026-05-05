<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <div class="p-2 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl shadow-lg shadow-indigo-500/25">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="font-bold text-2xl bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                        {{ $bill->bill_number }}
                    </h2>
                    <p class="text-gray-500 text-sm">{{ $bill->customer_name }}</p>
                </div>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ route('bills.edit', $bill) }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-500 to-cyan-600 text-white rounded-xl font-semibold text-sm hover:from-blue-600 hover:to-cyan-700 transition-all duration-300 shadow-lg">
                    {{ __('messages.Edit') }}
                </a>
                <a href="{{ route('bills.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-500 text-white rounded-xl font-semibold text-sm hover:bg-gray-600 transition-all duration-300">
                    {{ __('messages.Back') }}
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/80 backdrop-blur-lg overflow-hidden rounded-2xl shadow-xl border border-white/20 p-8">
                <!-- Bill Header -->
                <div class="flex justify-between items-start mb-8 pb-8 border-b border-gray-200">
                    <div>
                        <h1 class="text-4xl font-bold text-gray-900 mb-2">{{ $bill->bill_number }}</h1>
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                            @if($bill->status === 'draft') bg-gray-100 text-gray-800
                            @elseif($bill->status === 'sent') bg-blue-100 text-blue-800
                            @elseif($bill->status === 'paid') bg-green-100 text-green-800
                            @elseif($bill->status === 'overdue') bg-red-100 text-red-800
                            @else bg-yellow-100 text-yellow-800 @endif">
                            {{ ucfirst($bill->status) }}
                        </span>
                    </div>
                    <div class="text-right">
                        <p class="text-gray-600">{{ __('messages.From') }}:</p>
                        <p class="font-bold text-lg">{{ $bill->business->name }}</p>
                    </div>
                </div>

                <!-- Bill Details -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                    <!-- Bill From -->
                    <div>
                        <h3 class="text-sm font-bold text-gray-700 uppercase mb-3">{{ __('messages.From') }}</h3>
                        <p class="font-semibold text-gray-900">{{ $bill->business->name }}</p>
                        <p class="text-sm text-gray-600">{{ $bill->business->address ?? '-' }}</p>
                        <p class="text-sm text-gray-600">{{ $bill->business->phone ?? '-' }}</p>
                    </div>

                    <!-- Bill To -->
                    <div>
                        <h3 class="text-sm font-bold text-gray-700 uppercase mb-3">{{ __('messages.Bill To') }}</h3>
                        <p class="font-semibold text-gray-900">{{ $bill->customer_name }}</p>
                        @if($bill->customer_email)
                            <p class="text-sm text-gray-600">{{ $bill->customer_email }}</p>
                        @endif
                        @if($bill->customer_phone)
                            <p class="text-sm text-gray-600">{{ $bill->customer_phone }}</p>
                        @endif
                        @if($bill->customer_address)
                            <p class="text-sm text-gray-600">{{ $bill->customer_address }}</p>
                        @endif
                    </div>
</div>
                <!-- Bill Dates -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8 pb-8 border-b border-gray-200">
                    <div>
                        <p class="text-sm text-gray-600 mb-1">{{ __('messages.Bill Date') }}</p>
                        <p class="font-semibold text-gray-900">{{ $bill->bill_date->format('M d, Y') }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 mb-1">{{ __('messages.Due Date') }}</p>
                        <p class="font-semibold text-gray-900">{{ $bill->due_date->format('M d, Y') }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 mb-1">{{ __('messages.Created By') }}</p>
                        <p class="font-semibold text-gray-900">{{ $bill->createdBy->name }}</p>
                    </div>
                </div>

                <!-- Line Items -->
                <div class="mb-8">
                    <table class="min-w-full">
                        <thead>
                            <tr class="bg-gradient-to-r from-indigo-50 to-purple-50 border-b border-gray-200">
                                <th class="px-6 py-3 text-left text-sm font-bold text-gray-900">{{ __('messages.Description') }}</th>
                                <th class="px-6 py-3 text-right text-sm font-bold text-gray-900">{{ __('messages.Quantity') }}</th>
                                <th class="px-6 py-3 text-right text-sm font-bold text-gray-900">{{ __('messages.Unit Price') }}</th>
                                <th class="px-6 py-3 text-right text-sm font-bold text-gray-900">{{ __('messages.Total') }}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($bill->lineItems as $item)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 text-gray-900">{{ $item->description }}</td>
                                    <td class="px-6 py-4 text-right text-gray-900">{{ number_format($item->quantity, 2) }}</td>
                                    <td class="px-6 py-4 text-right text-gray-900">{{ format_currency($item->unit_price) }}</td>
                                    <td class="px-6 py-4 text-right font-semibold text-gray-900">{{ format_currency($item->total) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Summary -->
                <div class="flex justify-end mb-8">
                    <div class="w-full md:w-96 space-y-3">
                        <div class="flex justify-between text-gray-600">
                            <span>{{ __('messages.Subtotal') }}</span>
                            <span class="font-semibold">{{ format_currency($bill->subtotal) }}</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>{{ __('messages.Tax') }} ({{ $bill->tax_rate }}%)</span>
                            <span class="font-semibold">{{ format_currency($bill->tax_amount) }}</span>
                        </div>
                        @if($bill->discount_amount > 0)
                            <div class="flex justify-between text-gray-600">
                                <span>{{ __('messages.Discount') }}</span>
                                <span class="font-semibold">-{{ format_currency($bill->discount_amount) }}</span>
                            </div>
                        @endif
                        <div class="flex justify-between pt-3 border-t-2 border-gray-200">
                            <span class="font-bold text-gray-900">{{ __('messages.Total') }}</span>
                            <span class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">{{ format_currency($bill->total) }}</span>
                        </div>
                    </div>
                </div>

                <!-- Notes -->
                @if($bill->notes)
                    <div class="mb-8 pb-8 border-b border-gray-200">
                        <h3 class="text-sm font-bold text-gray-900 uppercase mb-3">{{ __('messages.Notes') }}</h3>
                        <p class="text-gray-700">{{ $bill->notes }}</p>
                    </div>
                @endif
  <!-- QR Code -->
                    @if($bill->qr_code)
                        <div class="flex flex-col items-center justify-center p-4 bg-gradient-to-br from-indigo-50 to-purple-50 rounded-xl border border-indigo-100">
                            <img src="{{ asset('storage/' . $bill->qr_code) }}" alt="Bill QR Code" class="w-40 h-40">
                            <p class="text-xs text-gray-600 mt-2 text-center">Scan to view bill</p>
                        </div>
                    @endif
                
                <!-- Actions -->
                <div class="flex justify-between items-center">
                    <div>
                        <a href="{{ route('bills.download', $bill) }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-purple-500 to-pink-600 text-white rounded-xl font-semibold text-sm hover:from-purple-600 hover:to-pink-700 transition-all duration-300 shadow-lg mr-3">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            {{ __('messages.Download PDF') }}
                        </a>
                        @if($bill->status === 'draft')
                            <form action="{{ route('bills.markAs', $bill) }}" method="POST" class="inline">
                                @csrf
                                <input type="hidden" name="status" value="sent">
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-500 to-cyan-600 text-white rounded-xl font-semibold text-sm hover:from-blue-600 hover:to-cyan-700 transition-all duration-300 shadow-lg mr-3">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                    </svg>
                                    {{ __('messages.Mark as Sent') }}
                                </button>
                            </form>
                        @endif

                        @if($bill->status === 'sent')
                            <form action="{{ route('bills.markAs', $bill) }}" method="POST" class="inline">
                                @csrf
                                <input type="hidden" name="status" value="paid">
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-xl font-semibold text-sm hover:from-green-600 hover:to-emerald-700 transition-all duration-300 shadow-lg mr-3">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    {{ __('messages.Mark as Paid') }}
                                </button>
                            </form>
                        @endif
                    </div>

                    <div class="space-x-3">
                        @if($bill->status === 'draft')
                            <form action="{{ route('bills.destroy', $bill) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-xl font-semibold text-sm transition-all duration-300">
                                    {{ __('messages.Delete') }}
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
