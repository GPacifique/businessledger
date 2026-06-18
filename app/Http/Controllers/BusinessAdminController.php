<?php

namespace App\Http\Controllers;
use App\Models\Business;
use App\Models\Income;
use App\Models\Expense;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;

class BusinessAdminController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        $business = $user->business;

        if (!$business) {
            return redirect()->route('dashboard')->with('error', 'No business assigned to your account.');
        }

        $today = Carbon::today();
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        // Calculate stats
        $todayIncome = Income::where('business_id', $business->id)
            ->whereDate('date', $today)
            ->sum('amount');

        $todayExpenses = Expense::where('business_id', $business->id)
            ->whereDate('date', $today)
            ->sum('amount');

        $monthIncome = Income::where('business_id', $business->id)
            ->whereBetween('date', [$startOfMonth, $endOfMonth])
            ->sum('amount');

        $monthExpenses = Expense::where('business_id', $business->id)
            ->whereBetween('date', [$startOfMonth, $endOfMonth])
            ->sum('amount');

        $totalIncome = Income::where('business_id', $business->id)->sum('amount');
        $totalExpenses = Expense::where('business_id', $business->id)->sum('amount');

        $staffCount = User::where('business_id', $business->id)
            ->where('id', '!=', $user->id)
            ->count();

        $stats = [
            'today_income' => $todayIncome,
            'today_expenses' => $todayExpenses,
            'month_income' => $monthIncome,
            'month_expenses' => $monthExpenses,
            'total_income' => $totalIncome,
            'total_expenses' => $totalExpenses,
            'balance' => $totalIncome - $totalExpenses,
            'staff_count' => $staffCount,
        ];

        // Recent transactions
        $recentIncomes = Income::where('business_id', $business->id)
            ->with('category')
            ->orderByDesc('date')
            ->orderByDesc('created_at')
            ->take(5)
            ->get();

        $recentExpenses = Expense::where('business_id', $business->id)
            ->with('category')
            ->orderByDesc('date')
            ->orderByDesc('created_at')
            ->take(5)
            ->get();
 $monthlyData = [];

    for ($i = 5; $i >= 0; $i--) {
        $monthDate = Carbon::now()->subMonths($i);

        $income = Income::where('business_id', $business->id)
            ->whereYear('date', $monthDate->year)
            ->whereMonth('date', $monthDate->month)
            ->sum('amount');

        $expense = Expense::where('business_id', $business->id)
            ->whereYear('date', $monthDate->year)
            ->whereMonth('date', $monthDate->month)
            ->sum('amount');

        $monthlyData[] = [
            'month' => $monthDate->format('M'),
            'income' => $income,
            'expense' => $expense,
            'profit' => $income - $expense
        ];
 }
    // Income grouped by category
$incomeByCategory = Income::where('business_id', $business->id)
    ->with('category')
    ->get()
    ->groupBy(function ($income) {
        return $income->category->name ?? 'Uncategorized';
    })
    ->map(function ($items, $category) {
        return [
            'category' => $category,
            'total' => $items->sum('amount')
        ];
    })
    ->values();


// Expenses grouped by category (if you also have expense chart)
$expenseByCategory = Expense::where('business_id', $business->id)
    ->with('category')
    ->get()
    ->groupBy(function ($expense) {
        return $expense->category->name ?? 'Uncategorized';
    })
    ->map(function ($items, $category) {
        return [
            'category' => $category,
            'total' => $items->sum('amount')
        ];
    })
    ->values();
   
        return view('dashboard.business-admin', compact(
            'business',
            'stats',
            'recentIncomes',
            'recentExpenses',
            'monthlyData',
            'incomeByCategory',
            'expenseByCategory'
        ));         
        
    }

    public function downloadBalanceSheet()
    {
        $user = auth()->user();
        $business = $user->business;

        if (!$business) {
            return redirect()->route('business.dashboard')->with('error', 'No business assigned to your account.');
        }

        // Calculate totals
        $totalIncome = $business->incomes()->sum('amount');
        $totalExpenses = $business->expenses()->sum('amount');
        $netProfit = $totalIncome - $totalExpenses;

        // Monthly calculations for current year
        $currentYear = Carbon::now()->year;
        $monthlyIncome = [];
        $monthlyExpenses = [];
        $monthlyProfit = [];

        for ($month = 1; $month <= 12; $month++) {
            $income = $business->incomes()
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $month)
                ->sum('amount');

            $expense = $business->expenses()
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $month)
                ->sum('amount');

            $monthlyIncome[] = $income;
            $monthlyExpenses[] = $expense;
            $monthlyProfit[] = $income - $expense;
        }

        // Yearly totals
        $yearlyIncome = array_sum($monthlyIncome);
        $yearlyExpenses = array_sum($monthlyExpenses);
        $yearlyProfit = $yearlyIncome - $yearlyExpenses;

        // Income by category
        $incomeByCategory = $business->incomes()
            ->with('category')
            ->selectRaw('category_id, SUM(amount) as total')
            ->groupBy('category_id')
            ->get()
            ->map(function ($item) {
                return [
                    'category' => $item->category->name ?? 'Uncategorized',
                    'total' => $item->total
                ];
            });

        // Expenses by category
        $expensesByCategory = $business->expenses()
            ->with('category')
            ->selectRaw('category_id, SUM(amount) as total')
            ->groupBy('category_id')
            ->get()
            ->map(function ($item) {
                return [
                    'category' => $item->category->name ?? 'Uncategorized',
                    'total' => $item->total
                ];
            });

        // Monthly data for charts (last 6 months)
        $monthlyData = [];
        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $monthStart = $month->copy()->startOfMonth();
            $monthEnd = $month->copy()->endOfMonth();

            $monthlyData[] = [
                'month' => $month->format('M Y'),
                'income' => $business->incomes()->whereBetween('date', [$monthStart, $monthEnd])->sum('amount'),
                'expenses' => $business->expenses()->whereBetween('date', [$monthStart, $monthEnd])->sum('amount'),
            ];
        }

        // Recent transactions
        $recentIncomes = $business->incomes()
            ->with('category')
            ->orderByDesc('date')
            ->take(10)
            ->get();

        $recentExpenses = $business->expenses()
            ->with('category')
            ->orderByDesc('date')
            ->take(10)
            ->get();

        $pdf = Pdf::loadView('business.balance-sheet-pdf', compact(
            'business',
            'totalIncome',
            'totalExpenses',
            'netProfit',
            'monthlyIncome',
            'monthlyExpenses',
            'monthlyProfit',
            'yearlyIncome',
            'yearlyExpenses',
            'yearlyProfit',
            'incomeByCategory',
            'expensesByCategory',
            'monthlyData',
            'recentIncomes',
            'recentExpenses'
        ));

        $pdf->setPaper('a4', 'portrait');

        $filename = Str::slug($business->name) . '-balance-sheet-' . now()->format('Y-m-d') . '.pdf';

        return $pdf->download($filename);
    }
}
