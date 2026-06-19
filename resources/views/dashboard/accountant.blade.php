<x-app-layout>

<!--
    FinTrack — Dashboard
    Replicates the supplied dashboard screenshot:
    - Left sidebar nav with active "Dashboard" state
    - Topbar: search, notifications, profile
    - Welcome header + date range pill
    - 4 stat cards (Income / Expenses / Net Profit / Balance)
    - Income vs Expenses line chart + Expense Breakdown donut
    - Recent Transactions list + Cash Flow Overview bar chart
-->

@push('styles')
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
    :root{
        --ft-indigo:#4F46E5;
        --ft-indigo-light:#EEF2FF;
        --ft-bg:#F7F8FC;
        --ft-border:#EEF0F5;
        --ft-text:#1A1D29;
        --ft-muted:#8B8FA3;
        --ft-green:#16A34A;
        --ft-green-bg:#E9FAF0;
        --ft-red:#EF4444;
        --ft-red-bg:#FDECEC;
        --ft-amber:#F59E0B;
        --ft-purple:#A855F7;
        --ft-blue:#3B82F6;
    }
    body{ font-family:'Inter',ui-sans-serif,system-ui,sans-serif; background:var(--ft-bg); color:var(--ft-text); }
    .ft-card{ background:#fff; border:1px solid var(--ft-border); border-radius:18px; }
    .ft-navlink{ display:flex; align-items:center; gap:.75rem; padding:.6rem .9rem; border-radius:10px; color:#5B5F73; font-weight:500; font-size:.9rem; transition:background .15s,color .15s; }
    .ft-navlink:hover{ background:#F4F5FA; color:var(--ft-text); }
    .ft-navlink.active{ background:var(--ft-indigo-light); color:var(--ft-indigo); font-weight:600; }
    .ft-scroll::-webkit-scrollbar{ width:6px; }
    .ft-scroll::-webkit-scrollbar-thumb{ background:#E4E6EF; border-radius:10px; }
</style>
@endpush

<div class="min-h-screen flex" style="background:var(--ft-bg);">

    {{-- ============ SIDEBAR ============ --}}
    <aside class="hidden lg:flex flex-col w-64 shrink-0 bg-white border-r" style="border-color:var(--ft-border);">
        <div class="flex items-center gap-2 px-6 h-20">
            <div class="w-9 h-9 rounded-xl flex items-center justify-center text-white font-extrabold" style="background:var(--ft-indigo);">F</div>
            <span class="text-xl font-extrabold tracking-tight" style="color:var(--ft-text);">FinTrack</span>
        </div>

        <nav class="flex-1 px-4 py-2 space-y-1 overflow-y-auto ft-scroll">
            <a href="{{ route('dashboard') }}" class="ft-navlink active">
                <i data-lucide="layout-grid" class="w-[18px] h-[18px]"></i> Dashboard
            </a>
            <a href="{{ route('incomes.index') ?? '#' }}" class="ft-navlink">
                <i data-lucide="circle-dollar-sign" class="w-[18px] h-[18px]"></i> Income
            </a>
            <a href="{{ route('expenses.index') ?? '#' }}" class="ft-navlink">
                <i data-lucide="credit-card" class="w-[18px] h-[18px]"></i> Expenses
            </a>
            <a href="{{ route('invoices.index') ?? '#' }}" class="ft-navlink">
                <i data-lucide="file-text" class="w-[18px] h-[18px]"></i> Invoices
            </a>
            <a href="{{ route('bills.index') ?? '#' }}" class="ft-navlink">
                <i data-lucide="file-text" class="w-[18px] h-[18px]"></i> Bills
            </a>
            <a href="{{ route('payroll.index') ?? '#' }}" class="ft-navlink">
                <i data-lucide="user-round" class="w-[18px] h-[18px]"></i> Payroll
            </a>
            <a href="{{ route('budgets.index') ?? '#' }}" class="ft-navlink">
                <i data-lucide="pie-chart" class="w-[18px] h-[18px]"></i> Budgets
            </a>
            <a href="{{ route('banking.index') ?? '#' }}" class="ft-navlink">
                <i data-lucide="landmark" class="w-[18px] h-[18px]"></i> Banking
            </a>
            <a href="{{ route('reports.index') ?? '#' }}" class="ft-navlink">
                <i data-lucide="square-check-big" class="w-[18px] h-[18px]"></i> Reports
            </a>
            <a href="{{ route('contacts.index') ?? '#' }}" class="ft-navlink">
                <i data-lucide="user-round" class="w-[18px] h-[18px]"></i> Contacts
            </a>
            <a href="{{ route('settings.index') ?? '#' }}" class="ft-navlink">
                <i data-lucide="settings" class="w-[18px] h-[18px]"></i> Settings
            </a>
        </nav>

        <div class="p-4">
            <div class="rounded-2xl p-4" style="background:var(--ft-indigo-light);">
                <div class="w-9 h-9 rounded-full flex items-center justify-center mb-3" style="background:#fff;">
                    <i data-lucide="crown" class="w-4 h-4" style="color:var(--ft-indigo);"></i>
                </div>
                <p class="font-semibold text-sm" style="color:var(--ft-text);">Go Premium</p>
                <p class="text-xs mt-1 mb-3" style="color:var(--ft-muted);">Unlock all features and grow your business.</p>
                <button type="button" class="w-full text-white text-sm font-semibold py-2.5 rounded-xl" style="background:var(--ft-indigo);">
                    Upgrade Now
                </button>
            </div>
        </div>
    </aside>

    {{-- ============ MAIN ============ --}}
    <div class="flex-1 min-w-0">

        {{-- Topbar --}}
        <header class="flex items-center justify-between h-20 px-6 lg:px-8 bg-white border-b" style="border-color:var(--ft-border);">
            <div class="flex items-center gap-4">
                <button class="lg:hidden p-2 rounded-lg hover:bg-gray-100">
                    <i data-lucide="menu" class="w-5 h-5"></i>
                </button>
                <button class="hidden lg:flex p-2 rounded-lg hover:bg-gray-100">
                    <i data-lucide="menu" class="w-5 h-5"></i>
                </button>
                <div class="relative hidden md:block">
                    <i data-lucide="search" class="w-4 h-4 absolute left-3.5 top-1/2 -translate-y-1/2" style="color:var(--ft-muted);"></i>
                    <input type="text" placeholder="Search something..."
                        class="w-72 pl-10 pr-4 py-2.5 rounded-xl text-sm border-0 focus:ring-2 focus:ring-indigo-200"
                        style="background:var(--ft-bg);">
                </div>
            </div>

            <div class="flex items-center gap-5">
                <button class="relative p-2 rounded-full" style="background:var(--ft-bg);">
                    <i data-lucide="bell" class="w-5 h-5" style="color:var(--ft-text);"></i>
                    <span class="absolute -top-1 -right-1 text-[10px] font-bold text-white w-4 h-4 rounded-full flex items-center justify-center" style="background:var(--ft-red);">3</span>
                </button>
                <div class="flex items-center gap-3 pl-1">
                    <img src="{{ auth()->user()->profile_photo_url ?? 'https://i.pravatar.cc/64?img=12' }}"
                         alt="{{ auth()->user()->name ?? 'John Doe' }}"
                         class="w-10 h-10 rounded-full object-cover">
                    <div class="hidden sm:block leading-tight">
                        <p class="text-sm font-semibold">{{ auth()->user()->name ?? 'John Doe' }}</p>
                        <p class="text-xs" style="color:var(--ft-muted);">Admin</p>
                    </div>
                    <i data-lucide="chevron-down" class="w-4 h-4" style="color:var(--ft-muted);"></i>
                </div>
            </div>
        </header>

        <main class="p-6 lg:p-8 space-y-6">

            {{-- Welcome row --}}
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-bold flex items-center gap-2">
                        Welcome back, {{ explode(' ', auth()->user()->name ?? 'John')[0] }} <span>👋</span>
                    </h1>
                    <p class="text-sm mt-1" style="color:var(--ft-muted);">Here's what's happening with your business today.</p>
                </div>
                <button type="button" class="flex items-center gap-2 px-4 py-2.5 rounded-xl border bg-white text-sm font-medium" style="border-color:var(--ft-border);">
                    <i data-lucide="calendar" class="w-4 h-4" style="color:var(--ft-muted);"></i>
                    {{ $rangeStart ?? 'May 1, 2024' }} - {{ $rangeEnd ?? 'May 31, 2024' }}
                </button>
            </div>

            {{-- Stat cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5">

                <div class="ft-card p-5">
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium" style="color:var(--ft-muted);">Total Income</span>
                        <span class="flex items-center gap-1 text-xs font-semibold px-2 py-0.5 rounded-full" style="color:var(--ft-green);background:var(--ft-green-bg);">
                            <i data-lucide="arrow-up" class="w-3 h-3"></i> {{ $incomeChange ?? '12.5%' }}
                        </span>
                    </div>
                    <div class="flex items-end justify-between mt-3">
                        <p class="text-2xl font-bold">${{ number_format($totalIncome ?? 58750, 2) }}</p>
                        <div class="w-11 h-11 rounded-xl flex items-center justify-center" style="background:var(--ft-green);">
                            <i data-lucide="circle-dollar-sign" class="w-5 h-5 text-white"></i>
                        </div>
                    </div>
                    <p class="text-xs mt-2" style="color:var(--ft-muted);">vs Apr 1 - Apr 30, 2024</p>
                </div>

                <div class="ft-card p-5">
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium" style="color:var(--ft-muted);">Total Expenses</span>
                        <span class="flex items-center gap-1 text-xs font-semibold px-2 py-0.5 rounded-full" style="color:var(--ft-red);background:var(--ft-red-bg);">
                            <i data-lucide="arrow-up" class="w-3 h-3"></i> {{ $expenseChange ?? '8.2%' }}
                        </span>
                    </div>
                    <div class="flex items-end justify-between mt-3">
                        <p class="text-2xl font-bold">${{ number_format($totalExpenses ?? 24850, 2) }}</p>
                        <div class="w-11 h-11 rounded-xl flex items-center justify-center" style="background:var(--ft-red);">
                            <i data-lucide="shopping-cart" class="w-5 h-5 text-white"></i>
                        </div>
                    </div>
                    <p class="text-xs mt-2" style="color:var(--ft-muted);">vs Apr 1 - Apr 30, 2024</p>
                </div>

                <div class="ft-card p-5">
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium" style="color:var(--ft-muted);">Net Profit</span>
                        <span class="flex items-center gap-1 text-xs font-semibold px-2 py-0.5 rounded-full" style="color:var(--ft-green);background:var(--ft-green-bg);">
                            <i data-lucide="arrow-up" class="w-3 h-3"></i> {{ $profitChange ?? '18.7%' }}
                        </span>
                    </div>
                    <div class="flex items-end justify-between mt-3">
                        <p class="text-2xl font-bold">${{ number_format($netProfit ?? 33900, 2) }}</p>
                        <div class="w-11 h-11 rounded-xl flex items-center justify-center" style="background:var(--ft-indigo-light);">
                            <i data-lucide="trending-up" class="w-5 h-5" style="color:var(--ft-indigo);"></i>
                        </div>
                    </div>
                    <p class="text-xs mt-2" style="color:var(--ft-muted);">vs Apr 1 - Apr 30, 2024</p>
                </div>

                <div class="ft-card p-5">
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium" style="color:var(--ft-muted);">Total Balance</span>
                    </div>
                    <div class="flex items-end justify-between mt-3">
                        <p class="text-2xl font-bold">${{ number_format($totalBalance ?? 125430, 2) }}</p>
                        <div class="w-11 h-11 rounded-xl flex items-center justify-center" style="background:var(--ft-blue);">
                            <i data-lucide="credit-card" class="w-5 h-5 text-white"></i>
                        </div>
                    </div>
                    <p class="text-xs mt-2" style="color:var(--ft-muted);">Current Balance</p>
                </div>
            </div>

            {{-- Charts row --}}
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-5">

                {{-- Income vs Expenses --}}
                <div class="ft-card p-5 xl:col-span-2">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="font-semibold">Income vs Expenses</h2>
                        <div class="flex items-center gap-4">
                            <span class="flex items-center gap-1.5 text-xs font-medium" style="color:var(--ft-muted);">
                                <span class="w-2.5 h-2.5 rounded-full" style="background:var(--ft-blue);"></span> Income
                            </span>
                            <span class="flex items-center gap-1.5 text-xs font-medium" style="color:var(--ft-muted);">
                                <span class="w-2.5 h-2.5 rounded-full" style="background:var(--ft-red);"></span> Expenses
                            </span>
                            <button type="button" class="flex items-center gap-1 text-xs font-medium border rounded-lg px-2 py-1" style="border-color:var(--ft-border);">
                                <i data-lucide="chevron-down" class="w-3.5 h-3.5"></i>
                            </button>
                        </div>
                    </div>
                    <div class="h-72">
                        <canvas id="incomeExpenseChart"></canvas>
                    </div>
                </div>

                {{-- Expense Breakdown --}}
                <div class="ft-card p-5">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="font-semibold">Expense Breakdown</h2>
                        <button type="button" class="flex items-center gap-1 text-xs font-medium border rounded-lg px-2.5 py-1.5" style="border-color:var(--ft-border);">
                            This Month <i data-lucide="chevron-down" class="w-3.5 h-3.5"></i>
                        </button>
                    </div>

                    <div class="flex items-center gap-6">
                        <div class="w-36 h-36 shrink-0">
                            <canvas id="expenseDonutChart"></canvas>
                        </div>
                        <ul class="flex-1 space-y-2.5 text-sm">
                            @foreach (($expenseBreakdown ?? [
                                ['label' => 'Operations', 'percent' => 40, 'color' => '#4F46E5'],
                                ['label' => 'Marketing',  'percent' => 20, 'color' => '#16A34A'],
                                ['label' => 'Salaries',   'percent' => 20, 'color' => '#A855F7'],
                                ['label' => 'Utilities',  'percent' => 10, 'color' => '#F59E0B'],
                                ['label' => 'Others',     'percent' => 10, 'color' => '#EF4444'],
                            ]) as $item)
                                <li class="flex items-center justify-between">
                                    <span class="flex items-center gap-2" style="color:var(--ft-text);">
                                        <span class="w-2.5 h-2.5 rounded-full" style="background:{{ $item['color'] }};"></span>
                                        {{ $item['label'] }}
                                    </span>
                                    <span class="font-semibold">{{ $item['percent'] }}%</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="flex items-center justify-between mt-5 pt-4 border-t" style="border-color:var(--ft-border);">
                        <span class="text-sm" style="color:var(--ft-muted);">Total Expenses</span>
                        <span class="font-bold">${{ number_format($totalExpenses ?? 24850, 2) }}</span>
                    </div>
                </div>
            </div>

            {{-- Bottom row --}}
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-5">

                {{-- Recent Transactions --}}
                <div class="ft-card p-5 xl:col-span-2">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="font-semibold">Recent Transactions</h2>
                        <a href="{{ route('transactions.index') ?? '#' }}" class="text-xs font-medium border rounded-lg px-3 py-1.5" style="border-color:var(--ft-border);">
                            View All
                        </a>
                    </div>

                    <ul class="divide-y" style="border-color:var(--ft-border);">
                        @foreach (($transactions ?? [
                            ['name' => 'Client Payment - Acme Inc.',   'meta' => 'May 31, 2024  •  Income',  'amount' => 5600,  'type' => 'in',  'status' => 'Completed'],
                            ['name' => 'Office Supplies - Amazon',     'meta' => 'May 30, 2024  •  Expense', 'amount' => -150,  'type' => 'out', 'status' => 'Completed'],
                            ['name' => 'Invoice Payment - Globex Corp.','meta' => 'May 30, 2024  •  Income',  'amount' => 3200,  'type' => 'in',  'status' => 'Completed'],
                            ['name' => 'Salary - May 2024',            'meta' => 'May 29, 2024  •  Expense', 'amount' => -8500, 'type' => 'out', 'status' => 'Completed'],
                        ]) as $tx)
                            <li class="flex items-center justify-between py-3.5">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl flex items-center justify-center"
                                         style="background:{{ $tx['type'] === 'in' ? 'var(--ft-green-bg)' : 'var(--ft-red-bg)' }};">
                                        <i data-lucide="{{ $tx['type'] === 'in' ? 'arrow-down' : 'arrow-up' }}" class="w-4 h-4"
                                                style="color:{{ $tx['type'] === 'in' ? 'var(--ft-green)' : 'var(--ft-red)' }};"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold">{{ $tx['name'] }}</p>
                                        <p class="text-xs mt-0.5" style="color:var(--ft-muted);">{{ $tx['meta'] }}</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm font-bold" style="color:{{ $tx['amount'] >= 0 ? 'var(--ft-green)' : 'var(--ft-red)' }};">
                                        {{ $tx['amount'] >= 0 ? '+' : '-' }}${{ number_format(abs($tx['amount']), 2) }}
                                    </p>
                                    <p class="text-xs mt-0.5" style="color:var(--ft-muted);">{{ $tx['status'] }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Cash Flow Overview --}}
                <div class="ft-card p-5">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="font-semibold">Cash Flow Overview</h2>
                        <button type="button" class="flex items-center gap-1 text-xs font-medium border rounded-lg px-2.5 py-1.5" style="border-color:var(--ft-border);">
                            This Month <i data-lucide="chevron-down" class="w-3.5 h-3.5"></i>
                        </button>
                    </div>
                    <div class="h-56">
                        <canvas id="cashFlowChart"></canvas>
                    </div>
                    <div class="flex items-center gap-5 mt-4 text-xs font-medium" style="color:var(--ft-muted);">
                        <span class="flex items-center gap-1.5">
                            <span class="w-2.5 h-2.5 rounded-full" style="background:var(--ft-blue);"></span> Cash Inflow
                        </span>
                        <span class="flex items-center gap-1.5">
                            <span class="w-2.5 h-2.5 rounded-full" style="background:var(--ft-red);"></span> Cash Outflow
                        </span>
                    </div>
                </div>
            </div>

        </main>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    if (window.lucide) { lucide.createIcons(); }

    // ---- Income vs Expenses (line) ----
    const ieCtx = document.getElementById('incomeExpenseChart');
    const ieGradientBlue = ieCtx.getContext('2d').createLinearGradient(0, 0, 0, 280);
    ieGradientBlue.addColorStop(0, 'rgba(59,130,246,0.18)');
    ieGradientBlue.addColorStop(1, 'rgba(59,130,246,0)');
    const ieGradientRed = ieCtx.getContext('2d').createLinearGradient(0, 0, 0, 280);
    ieGradientRed.addColorStop(0, 'rgba(239,68,68,0.15)');
    ieGradientRed.addColorStop(1, 'rgba(239,68,68,0)');

    new Chart(ieCtx, {
        type: 'line',
        data: {
            labels: {!! json_encode($monthLabels ?? ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec']) !!},
            datasets: [
                {
                    label: 'Income',
                    data: {!! json_encode($incomeSeries ?? [40,42,46,42,55,52,55,58,62,53,48,62]) !!}.map(v => v * 1000),
                    borderColor: '#3B82F6',
                    backgroundColor: ieGradientBlue,
                    fill: true,
                    tension: 0.4,
                    pointRadius: 3,
                    pointBackgroundColor: '#3B82F6',
                    borderWidth: 2.5,
                },
                {
                    label: 'Expenses',
                    data: {!! json_encode($expenseSeries ?? [28,29,18,25,22,20,28,25,38,28,25,38]) !!}.map(v => v * 1000),
                    borderColor: '#EF4444',
                    backgroundColor: ieGradientRed,
                    fill: true,
                    tension: 0.4,
                    pointRadius: 3,
                    pointBackgroundColor: '#EF4444',
                    borderWidth: 2.5,
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: { mode: 'index', intersect: false },
            plugins: { legend: { display: false } },
            scales: {
                y: {
                    beginAtZero: true,
                    max: 80000,
                    ticks: {
                        stepSize: 20000,
                        callback: v => '$' + (v / 1000) + 'k',
                        color: '#8B8FA3',
                        font: { size: 11 },
                    },
                    grid: { color: '#F1F2F7' },
                },
                x: {
                    ticks: { color: '#8B8FA3', font: { size: 11 } },
                    grid: { display: false },
                },
            },
        },
    });

    // ---- Expense Breakdown (donut) ----
    new Chart(document.getElementById('expenseDonutChart'), {
        type: 'doughnut',
        data: {
            labels: {!! json_encode(array_column($expenseBreakdown ?? [
                ['label' => 'Operations'], ['label' => 'Marketing'], ['label' => 'Salaries'], ['label' => 'Utilities'], ['label' => 'Others']
            ], 'label')) !!},
            datasets: [{
                data: {!! json_encode(array_column($expenseBreakdown ?? [
                    ['percent' => 40], ['percent' => 20], ['percent' => 20], ['percent' => 10], ['percent' => 10]
                ], 'percent')) !!},
                backgroundColor: {!! json_encode(array_column($expenseBreakdown ?? [
                    ['color' => '#4F46E5'], ['color' => '#16A34A'], ['color' => '#A855F7'], ['color' => '#F59E0B'], ['color' => '#EF4444']
                ], 'color')) !!},
                borderWidth: 0,
                cutout: '72%',
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false }, tooltip: { enabled: true } },
        },
    });

    // ---- Cash Flow Overview (bar) ----
    new Chart(document.getElementById('cashFlowChart'), {
        type: 'bar',
        data: {
            labels: {!! json_encode($cashFlowLabels ?? ['May 1-5','May 6-12','May 13-19','May 20-26','May 27-31']) !!},
            datasets: [
                {
                    label: 'Cash Inflow',
                    data: {!! json_encode($cashInflow ?? [38,42,48,40,28]) !!},
                    backgroundColor: '#3B82F6',
                    borderRadius: 4,
                    barPercentage: 0.55,
                },
                {
                    label: 'Cash Outflow',
                    data: {!! json_encode($cashOutflow ?? [-8,-12,-15,-10,-9]) !!},
                    backgroundColor: '#EF4444',
                    borderRadius: 4,
                    barPercentage: 0.55,
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: {
                    ticks: {
                        stepSize: 20,
                        callback: v => (v >= 0 ? '$' + v + 'k' : '-$' + Math.abs(v) + 'k'),
                        color: '#8B8FA3',
                        font: { size: 11 },
                    },
                    grid: { color: '#F1F2F7' },
                },
                x: {
                    ticks: { color: '#8B8FA3', font: { size: 10 } },
                    grid: { display: false },
                },
            },
        },
    });
});
</script>
@endpush

</x-app-layout>