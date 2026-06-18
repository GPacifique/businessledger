<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <div class="p-2 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl shadow-lg shadow-indigo-500/25">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
            </div>
            <h2 class="font-bold text-2xl bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                {{ __('messages.Edit Bill') }}: {{ $bill->bill_number }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/80 backdrop-blur-lg overflow-hidden rounded-2xl shadow-xl border border-white/20">
                <div class="p-8">
                    <form action="{{ route('bills.update', $bill) }}" method="POST" id="billForm">
                        @csrf
                        @method('PUT')

                        <!-- Customer Information -->
                        <div class="mb-8">
                            <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center">
                                <span class="w-8 h-8 rounded-lg bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center mr-3">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </span>
                                Customer Information
                            </h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="customer_name" class="block text-sm font-medium text-gray-700 mb-2">Customer Name *</label>
                                    <input type="text" id="customer_name" name="customer_name" value="{{ old('customer_name', $bill->customer_name) }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200">
                                    @error('customer_name')<span class="text-red-600 text-sm mt-1">{{ $message }}</span>@enderror
                                </div>

                                <div>
                                    <label for="customer_email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                    <input type="email" id="customer_email" name="customer_email" value="{{ old('customer_email', $bill->customer_email) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200">
                                    @error('customer_email')<span class="text-red-600 text-sm mt-1">{{ $message }}</span>@enderror
                                </div>

                                <div>
                                    <label for="customer_phone" class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
                                    <input type="text" id="customer_phone" name="customer_phone" value="{{ old('customer_phone', $bill->customer_phone) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200">
                                    @error('customer_phone')<span class="text-red-600 text-sm mt-1">{{ $message }}</span>@enderror
                                </div>

                                <div>
                                    <label for="customer_address" class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                                    <textarea id="customer_address" name="customer_address" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200">{{ old('customer_address', $bill->customer_address) }}</textarea>
                                    @error('customer_address')<span class="text-red-600 text-sm mt-1">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

                        <hr class="my-8 border-gray-200">

                        <!-- Bill Details -->
                        <div class="mb-8">
                            <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center">
                                <span class="w-8 h-8 rounded-lg bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center mr-3">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </span>
                                Bill Details
                            </h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="bill_date" class="block text-sm font-medium text-gray-700 mb-2">Bill Date *</label>
                                    <input type="date" id="bill_date" name="bill_date" value="{{ old('bill_date', $bill->bill_date->format('Y-m-d')) }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200">
                                    @error('bill_date')<span class="text-red-600 text-sm mt-1">{{ $message }}</span>@enderror
                                </div>

                                <div>
                                    <label for="due_date" class="block text-sm font-medium text-gray-700 mb-2">Due Date *</label>
                                    <input type="date" id="due_date" name="due_date" value="{{ old('due_date', $bill->due_date->format('Y-m-d')) }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200">
                                    @error('due_date')<span class="text-red-600 text-sm mt-1">{{ $message }}</span>@enderror
                                </div>

                                <div>
                                    <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status *</label>
                                    <select id="status" name="status" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200">
                                        <option value="draft" {{ old('status', $bill->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                                        <option value="sent" {{ old('status', $bill->status) === 'sent' ? 'selected' : '' }}>Sent</option>
                                        <option value="paid" {{ old('status', $bill->status) === 'paid' ? 'selected' : '' }}>Paid</option>
                                        <option value="overdue" {{ old('status', $bill->status) === 'overdue' ? 'selected' : '' }}>Overdue</option>
                                        <option value="cancelled" {{ old('status', $bill->status) === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                    @error('status')<span class="text-red-600 text-sm mt-1">{{ $message }}</span>@enderror
                                </div>

                                <div>
                                    <label for="tax_rate" class="block text-sm font-medium text-gray-700 mb-2">Tax Rate (%) *</label>
                                    <input type="number" id="tax_rate" name="tax_rate" value="{{ old('tax_rate', $bill->tax_rate) }}" step="0.01" min="0" max="100" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200" onchange="calculateTotals()">
                                    @error('tax_rate')<span class="text-red-600 text-sm mt-1">{{ $message }}</span>@enderror
                                </div>

                                <div>
                                    <label for="discount_amount" class="block text-sm font-medium text-gray-700 mb-2">Discount (RWF) *</label>
                                    <input type="number" id="discount_amount" name="discount_amount" value="{{ old('discount_amount', $bill->discount_amount) }}" step="0.01" min="0" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200" onchange="calculateTotals()">
                                    @error('discount_amount')<span class="text-red-600 text-sm mt-1">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div>
                                <label for="notes" class="block text-sm font-medium text-gray-700 mb-2 mt-6">Notes</label>
                                <textarea id="notes" name="notes" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200">{{ old('notes', $bill->notes) }}</textarea>
                            </div>
                        </div>

                        <hr class="my-8 border-gray-200">

                        <!-- Line Items -->
                        <div class="mb-8">
                            <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center">
                                <span class="w-8 h-8 rounded-lg bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center mr-3">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </span>
                                Line Items
                            </h3>

                            <div id="itemsContainer" class="space-y-4 mb-4">
                                @foreach($bill->lineItems as $index => $item)
                                    <div class="item-row grid grid-cols-12 gap-4 p-4 bg-gradient-to-br from-indigo-50 to-purple-50 rounded-xl border border-indigo-100">
                                        <input type="text" name="items[{{ $index }}][description]" value="{{ $item->description }}" placeholder="Item description" required class="col-span-5 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                        <input type="number" name="items[{{ $index }}][quantity]" value="{{ $item->quantity }}" placeholder="Qty" step="0.01" min="0.01" required class="col-span-2 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent" onchange="calculateTotals()">
                                        <input type="number" name="items[{{ $index }}][unit_price]" value="{{ $item->unit_price }}" placeholder="Unit Price" step="0.01" min="0" required class="col-span-3 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent" onchange="calculateTotals()">
                                        <button type="button" onclick="removeItem(this)" class="col-span-2 px-3 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition duration-200">Remove</button>
                                    </div>
                                @endforeach
                            </div>

                            <button type="button" onclick="addItem()" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-indigo-500 to-purple-600 border border-transparent rounded-lg font-semibold text-sm text-white hover:from-indigo-600 hover:to-purple-700 transition-all duration-300 shadow-lg shadow-indigo-500/25 hover:shadow-xl hover:-translate-y-0.5">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Add Line Item
                            </button>
                        </div>

                        <hr class="my-8 border-gray-200">

                        <!-- Summary -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                            <div class="p-4 bg-gradient-to-br from-indigo-50 to-purple-50 rounded-xl border border-indigo-100">
                                <p class="text-sm text-gray-600 mb-2">Subtotal</p>
                                <p class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600" id="subtotalDisplay">0 RWF</p>
                            </div>
                            <div class="p-4 bg-gradient-to-br from-blue-50 to-cyan-50 rounded-xl border border-blue-100">
                                <p class="text-sm text-gray-600 mb-2">Tax</p>
                                <p class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-600" id="taxDisplay">0 RWF</p>
                            </div>
                            <div class="p-4 bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl border border-green-100">
                                <p class="text-sm text-gray-600 mb-2">Total</p>
                                <p class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-emerald-600" id="totalDisplay">0 RWF</p>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="flex justify-between">
                            <a href="{{ route('bills.show', $bill) }}" class="inline-flex items-center px-6 py-2.5 bg-gray-500 hover:bg-gray-600 text-white rounded-xl font-semibold transition-all duration-300 shadow-lg hover:shadow-xl">
                                {{ __('messages.Cancel') }}
                            </a>
                            <button type="submit" class="inline-flex items-center px-6 py-2.5 bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white rounded-xl font-semibold transition-all duration-300 shadow-lg shadow-indigo-500/25 hover:shadow-xl hover:-translate-y-0.5">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                {{ __('messages.Save Changes') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        let itemCount = {{ $bill->lineItems->count() }};

        function addItem() {
            const container = document.getElementById('itemsContainer');
            const newRow = document.createElement('div');
            newRow.className = 'item-row grid grid-cols-12 gap-4 p-4 bg-gradient-to-br from-indigo-50 to-purple-50 rounded-xl border border-indigo-100';
            newRow.innerHTML = `
                <input type="text" name="items[${itemCount}][description]" placeholder="Item description" required class="col-span-5 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                <input type="number" name="items[${itemCount}][quantity]" placeholder="Qty" value="1" step="0.01" min="0.01" required class="col-span-2 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent" onchange="calculateTotals()">
                <input type="number" name="items[${itemCount}][unit_price]" placeholder="Unit Price" step="0.01" min="0" required class="col-span-3 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent" onchange="calculateTotals()">
                <button type="button" onclick="removeItem(this)" class="col-span-2 px-3 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition duration-200">Remove</button>
            `;
            container.appendChild(newRow);
            itemCount++;
            calculateTotals();
        }

        function removeItem(btn) {
            btn.closest('.item-row').remove();
            calculateTotals();
        }

        function calculateTotals() {
            let subtotal = 0;
            document.querySelectorAll('.item-row').forEach(row => {
                const quantity = parseFloat(row.querySelector('input[name*="quantity"]').value) || 0;
                const unitPrice = parseFloat(row.querySelector('input[name*="unit_price"]').value) || 0;
                subtotal += quantity * unitPrice;
            });

            const taxRate = parseFloat(document.getElementById('tax_rate').value) || 0;
            const discount = parseFloat(document.getElementById('discount_amount').value) || 0;
            const tax = subtotal * (taxRate / 100);
            const total = subtotal + tax - discount;

            document.getElementById('subtotalDisplay').textContent = new Intl.NumberFormat('en-RW', {
                style: 'currency',
                currency: 'RWF',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            }).format(subtotal);

            document.getElementById('taxDisplay').textContent = new Intl.NumberFormat('en-RW', {
                style: 'currency',
                currency: 'RWF',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            }).format(tax);

            document.getElementById('totalDisplay').textContent = new Intl.NumberFormat('en-RW', {
                style: 'currency',
                currency: 'RWF',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            }).format(total);
        }

        // Calculate initial totals
        calculateTotals();
    </script>
</x-app-layout>
