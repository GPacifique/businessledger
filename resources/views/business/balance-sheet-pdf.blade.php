<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Financial Report - {{ $business->name }}</title>
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
        .section {
            margin-bottom: 25px;
        }
        .section-title {
            font-size: 14px;
            font-weight: bold;
            color: #6366f1;
            margin-bottom: 10px;
            padding-bottom: 5px;
            border-bottom: 2px solid #e5e7eb;
        }
        .summary-grid {
            width: 100%;
            margin-bottom: 20px;
        }
        .summary-grid td {
            width: 33.33%;
            padding: 10px;
            vertical-align: top;
        }
        .summary-box {
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
        }
        .summary-box.green {
            background: #ecfdf5;
            border-color: #10b981;
        }
        .summary-box.red {
            background: #fef2f2;
            border-color: #ef4444;
        }
        .summary-box.blue {
            background: #eff6ff;
            border-color: #6366f1;
        }
        .summary-box .label {
            font-size: 10px;
            color: #666;
            margin-bottom: 5px;
        }
        .summary-box .value {
            font-size: 16px;
            font-weight: bold;
        }
        .summary-box.green .value { color: #10b981; }
        .summary-box.red .value { color: #ef4444; }
        .summary-box.blue .value { color: #6366f1; }
        table.data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        table.data-table th {
            background: #f3f4f6;
            padding: 10px 8px;
            text-align: left;
            font-size: 10px;
            text-transform: uppercase;
            color: #666;
            border-bottom: 2px solid #e5e7eb;
        }
        table.data-table td {
            padding: 8px;
            border-bottom: 1px solid #e5e7eb;
        }
        table.data-table tr:nth-child(even) {
            background: #f9fafb;
        }
        .text-right {
            text-align: right;
        }
        .text-green { color: #10b981; }
        .text-red { color: #ef4444; }
        .text-blue { color: #6366f1; }
        .font-bold { font-weight: bold; }
        .two-column {
            width: 100%;
        }
        .two-column td {
            width: 50%;
            vertical-align: top;
            padding: 0 10px;
        }
        .two-column td:first-child {
            padding-left: 0;
        }
        .two-column td:last-child {
            padding-right: 0;
        }
        .footer {
            margin-top: 30px;
            padding-top: 15px;
            border-top: 1px solid #e5e7eb;
            text-align: center;
            color: #999;
            font-size: 9px;
        }
        .page-break {
            page-break-after: always;
        }
        .profit { color: #10b981; }
        .loss { color: #ef4444; }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>{{ $business->name }}</h1>
            <h2>Financial Report</h2>
            <p>Generated on {{ now()->format('F d, Y \a\t g:i A') }}</p>
            <p>Report Period: All Time | Current Month: {{ now()->format('F Y') }} | Current Year: {{ now()->format('Y') }}</p>
        </div>

        <!-- Overall Summary -->
        <div class="section">
            <div class="section-title">Financial Summary (All Time)</div>
            <table class="summary-grid">
                <tr>
                    <td>
                        <div class="summary-box green">
                            <div class="label">TOTAL INCOME</div>
                            <div class="value">{{ number_format($totalIncome, 0) }} RWF</div>
                        </div>
                    </td>
                    <td>
                        <div class="summary-box red">
                            <div class="label">TOTAL EXPENSES</div>
                            <div class="value">{{ number_format($totalExpenses, 0) }} RWF</div>
                        </div>
                    </td>
                    <td>
                        <div class="summary-box blue">
                            <div class="label">NET PROFIT/LOSS</div>
                            <div class="value {{ $netProfit >= 0 ? 'profit' : 'loss' }}">{{ number_format($netProfit, 0) }} RWF</div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <!-- Monthly Summary -->
        <div class="section">
            <div class="section-title">{{ now()->format('F Y') }} Summary (Current Month)</div>
            <table class="summary-grid">
                <tr>
                    <td>
                        <div class="summary-box green">
                            <div class="label">MONTHLY INCOME</div>
                            <div class="value">{{ number_format($monthlyIncome[date('n') - 1], 0) }} RWF</div>
                        </div>
                    </td>
                    <td>
                        <div class="summary-box red">
                            <div class="label">MONTHLY EXPENSES</div>
                            <div class="value">{{ number_format($monthlyExpenses[date('n') - 1], 0) }} RWF</div>
                        </div>
                    </td>
                    <td>
                        <div class="summary-box blue">
                            <div class="label">MONTHLY PROFIT/LOSS</div>
                            <div class="value {{ $monthlyProfit[date('n') - 1] >= 0 ? 'profit' : 'loss' }}">{{ number_format($monthlyProfit[date('n') - 1], 0) }} RWF</div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <!-- Yearly Summary -->
        <div class="section">
            <div class="section-title">{{ now()->format('Y') }} Summary (Current Year)</div>
            <table class="summary-grid">
                <tr>
                    <td>
                        <div class="summary-box green">
                            <div class="label">YEARLY INCOME</div>
                            <div class="value">{{ number_format($yearlyIncome, 0) }} RWF</div>
                        </div>
                    </td>
                    <td>
                        <div class="summary-box red">
                            <div class="label">YEARLY EXPENSES</div>
                            <div class="value">{{ number_format($yearlyExpenses, 0) }} RWF</div>
                        </div>
                    </td>
                    <td>
                        <div class="summary-box blue">
                            <div class="label">YEARLY PROFIT/LOSS</div>
                            <div class="value {{ $yearlyProfit >= 0 ? 'profit' : 'loss' }}">{{ number_format($yearlyProfit, 0) }} RWF</div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <!-- 6 Month Trend -->
        <div class="section">
            <div class="section-title">6-Month Financial Trend</div>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Month</th>
                        <th class="text-right">Income</th>
                        <th class="text-right">Expenses</th>
                        <th class="text-right">Profit/Loss</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($monthlyData as $data)
                        @php $profit = $data['income'] - $data['expenses']; @endphp
                        <tr>
                            <td>{{ $data['month'] }}</td>
                            <td class="text-right text-green">{{ number_format($data['income'], 0) }} RWF</td>
                            <td class="text-right text-red">{{ number_format($data['expenses'], 0) }} RWF</td>
                            <td class="text-right font-bold {{ $profit >= 0 ? 'text-blue' : 'text-red' }}">{{ number_format($profit, 0) }} RWF</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Category Breakdown -->
        <div class="section">
            <div class="section-title">Category Breakdown</div>
            <table class="two-column">
                <tr>
                    <td>
                        <h4 style="margin-bottom: 10px; color: #10b981;">Income by Category</h4>
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th class="text-right">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($incomeByCategory as $category)
                                    <tr>
                                        <td>{{ $category['category'] }}</td>
                                        <td class="text-right text-green font-bold">{{ number_format($category['total'], 0) }} RWF</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" style="text-align: center; color: #999;">No data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </td>
                    <td>
                        <h4 style="margin-bottom: 10px; color: #ef4444;">Expenses by Category</h4>
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th class="text-right">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($expensesByCategory as $category)
                                    <tr>
                                        <td>{{ $category['category'] }}</td>
                                        <td class="text-right text-red font-bold">{{ number_format($category['total'], 0) }} RWF</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" style="text-align: center; color: #999;">No data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </td>
                </tr>
            </table>
        </div>

        <!-- Recent Transactions -->
        <div class="section">
            <div class="section-title">Recent Transactions (Last 10)</div>
            <table class="two-column">
                <tr>
                    <td>
                        <h4 style="margin-bottom: 10px; color: #10b981;">Recent Income</h4>
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th class="text-right">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentIncomes as $income)
                                    <tr>
                                        <td>{{ $income->date->format('M d') }}</td>
                                        <td>{{ Str::limit($income->title, 20) }}</td>
                                        <td class="text-right text-green">+{{ number_format($income->amount, 0) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" style="text-align: center; color: #999;">No data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </td>
                    <td>
                        <h4 style="margin-bottom: 10px; color: #ef4444;">Recent Expenses</h4>
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th class="text-right">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentExpenses as $expense)
                                    <tr>
                                        <td>{{ $expense->date->format('M d') }}</td>
                                        <td>{{ Str::limit($expense->title, 20) }}</td>
                                        <td class="text-right text-red">-{{ number_format($expense->amount, 0) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" style="text-align: center; color: #999;">No data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </td>
                </tr>
            </table>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>This is an automatically generated balance sheet for {{ $business->name }}.</p>
            <p>Generated by Fintrack &copy; {{ now()->format('Y') }} | Report ID: {{ strtoupper(Str::random(8)) }}</p>
        </div>
    </div>
</body>
</html>