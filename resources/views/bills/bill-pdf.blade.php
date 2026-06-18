<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill {{ $bill->bill_number }} - {{ $bill->business->name }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 11px;
            line-height: 1.4;
            color: #333;
        }
        .container {
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid #6366f1;
            padding-bottom: 20px;
        }
        .header h1 {
            font-size: 24px;
            color: #6366f1;
            margin-bottom: 5px;
        }
        .header h2 {
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
        }
        .header p {
            color: #666;
            font-size: 11px;
        }
        .bill-info {
            display: table;
            width: 100%;
            margin-bottom: 30px;
        }
        .bill-info .left, .bill-info .right {
            display: table-cell;
            width: 50%;
            vertical-align: top;
        }
        .bill-info .section {
            margin-bottom: 15px;
        }
        .bill-info .section-title {
            font-size: 12px;
            font-weight: bold;
            color: #6366f1;
            margin-bottom: 5px;
            text-transform: uppercase;
        }
        .bill-info .section-content {
            line-height: 1.6;
        }
        .bill-details {
            margin-bottom: 30px;
        }
        .bill-details table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .bill-details th {
            background: #f3f4f6;
            padding: 10px 8px;
            text-align: left;
            font-size: 10px;
            text-transform: uppercase;
            color: #666;
            border-bottom: 2px solid #e5e7eb;
        }
        .bill-details td {
            padding: 8px;
            border-bottom: 1px solid #e5e7eb;
        }
        .bill-details tr:nth-child(even) {
            background: #f9fafb;
        }
        .text-right {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .summary {
            margin-top: 20px;
            border-top: 2px solid #e5e7eb;
            padding-top: 15px;
        }
        .summary table {
            width: 200px;
            margin-left: auto;
            border-collapse: collapse;
        }
        .summary td {
            padding: 5px 10px;
        }
        .summary .total-row {
            border-top: 1px solid #e5e7eb;
            font-weight: bold;
            font-size: 12px;
        }
        .status-badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 9px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .status-draft { background: #f3f4f6; color: #666; }
        .status-sent { background: #dbeafe; color: #1e40af; }
        .status-paid { background: #dcfce7; color: #166534; }
        .status-overdue { background: #fee2e2; color: #991b1b; }
        .status-cancelled { background: #fef3c7; color: #92400e; }
        .notes {
            margin-top: 20px;
            padding: 15px;
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
        }
        .notes-title {
            font-size: 12px;
            font-weight: bold;
            color: #6366f1;
            margin-bottom: 8px;
            text-transform: uppercase;
        }
        .footer {
            margin-top: 40px;
            padding-top: 15px;
            border-top: 1px solid #e5e7eb;
            text-align: center;
            color: #999;
            font-size: 9px;
        }
        .qr-code-section {
            text-align: center;
            margin: 20px 0;
            padding: 15px;
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
        }
        .qr-code-section img {
            max-width: 150px;
            height: auto;
        }
        .qr-code-label {
            font-size: 10px;
            color: #666;
            margin-top: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>{{ $bill->business->name }}</h1>
            <h2>Invoice</h2>
            <p>Generated on {{ now()->format('M d, Y \a\t H:i') }}</p>
        </div>

        <!-- Bill Information -->
        <div class="bill-info">
            <div class="left">
                <div class="section">
                    <div class="section-title">From</div>
                    <div class="section-content">
                        <strong>{{ $bill->business->name }}</strong><br>
                        @if($bill->business->address)
                            {{ $bill->business->address }}<br>
                        @endif
                        @if($bill->business->phone)
                            Phone: {{ $bill->business->phone }}<br>
                        @endif
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="section">
                    <div class="section-title">Bill Details</div>
                    <div class="section-content">
                        <strong>Bill #:</strong> {{ $bill->bill_number }}<br>
                        <strong>Bill Date:</strong> {{ $bill->bill_date->format('M d, Y') }}<br>
                        <strong>Due Date:</strong> {{ $bill->due_date->format('M d, Y') }}<br>
                        <strong>Status:</strong> <span class="status-badge status-{{ $bill->status }}">{{ ucfirst($bill->status) }}</span><br>
                        <strong>Created By:</strong> {{ $bill->createdBy->name }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Bill To -->
        <div class="bill-info">
            <div class="left">
                <div class="section">
                    <div class="section-title">Bill To</div>
                    <div class="section-content">
                        <strong>{{ $bill->customer_name }}</strong><br>
                        @if($bill->customer_email)
                            {{ $bill->customer_email }}<br>
                        @endif
                        @if($bill->customer_phone)
                            {{ $bill->customer_phone }}<br>
                        @endif
                        @if($bill->customer_address)
                            {{ $bill->customer_address }}
                        @endif
                    </div>
                </div>
            </div>
        </div>

       

        <!-- Line Items -->
        <div class="bill-details">
            <table>
                <thead>
                    <tr>
                        <th>Description</th>
                        <th class="text-right">Quantity</th>
                        <th class="text-right">Unit Price</th>
                        <th class="text-right">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bill->lineItems as $item)
                        <tr>
                            <td>{{ $item->description }}</td>
                            <td class="text-right">{{ number_format($item->quantity, 2) }}</td>
                            <td class="text-right">{{ number_format($item->unit_price, 0) }} RWF</td>
                            <td class="text-right">{{ number_format($item->total, 0) }} RWF</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Summary -->
        <div class="summary">
            <table>
                <tr>
                    <td>Subtotal:</td>
                    <td class="text-right">{{ number_format($bill->subtotal, 0) }} RWF</td>
                </tr>
                @if($bill->tax_amount > 0)
                    <tr>
                        <td>Tax ({{ $bill->tax_rate }}%):</td>
                        <td class="text-right">{{ number_format($bill->tax_amount, 0) }} RWF</td>
                    </tr>
                @endif
                @if($bill->discount_amount > 0)
                    <tr>
                        <td>Discount:</td>
                        <td class="text-right">-{{ number_format($bill->discount_amount, 0) }} RWF</td>
                    </tr>
                @endif
                <tr class="total-row">
                    <td>Total:</td>
                    <td class="text-right">{{ number_format($bill->total, 0) }} RWF</td>
                </tr>
            </table>
        </div>

        <!-- Notes -->
        @if($bill->notes)
            <div class="notes">
                <div class="notes-title">Notes</div>
                <div>{{ $bill->notes }}</div>
            </div>
       <!-- QR Code -->
        @if($bill->qr_code)
            <div class="qr-code-section">
                <img src="{{ public_path('storage/' . $bill->qr_code) }}" alt="Bill QR Code">
                <div class="qr-code-label">Scan to view bill online</div>
            </div>
        @endif
        <!-- Footer -->
        <div class="footer">
            <p>Thank you for your business!</p>
            <p>This invoice was generated electronically and is valid without signature.</p>
        </div>
    </div>
</body>
</html>
