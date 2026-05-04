<?php

namespace App\Http\Controllers;
use App\Models\Business;
use App\Models\Income;
use App\Models\Expense;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
    }
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
}
