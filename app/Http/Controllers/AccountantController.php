<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Expense;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AccountantController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        $business = $user->business;

        if (!$business || $business->status !== 'approved') {
            return view('dashboard.user', compact('business'));
        }

        $today = Carbon::today();
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        // Today stats
        $todayIncome = Income::where('business_id', $business->id)
            ->whereDate('date', $today)
            ->sum('amount');

        $todayExpenses = Expense::where('business_id', $business->id)
            ->whereDate('date', $today)
            ->sum('amount');

        // Monthly stats
        $monthIncome = Income::where('business_id', $business->id)
            ->whereBetween('date', [$startOfMonth, $endOfMonth])
            ->sum('amount');

        $monthExpenses = Expense::where('business_id', $business->id)
            ->whereBetween('date', [$startOfMonth, $endOfMonth])
            ->sum('amount');

        // All time totals
        $totalIncome = Income::where('business_id', $business->id)->sum('amount');
        $totalExpenses = Expense::where('business_id', $business->id)->sum('amount');
        $netProfit = $totalIncome - $totalExpenses;

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

        // Category stats for this month
        $categoryStats = [];

        $incomeCategories = Income::where('business_id', $business->id)
            ->whereBetween('date', [$startOfMonth, $endOfMonth])
            ->selectRaw('category_id, SUM(amount) as total')
            ->groupBy('category_id')
            ->with('category')
            ->get();

        foreach ($incomeCategories as $item) {
            $categoryStats[] = [
                'name' => $item->category->name ?? 'Uncategorized',
                'type' => 'income',
                'total' => $item->total,
            ];
        }

        $expenseCategories = Expense::where('business_id', $business->id)
            ->whereBetween('date', [$startOfMonth, $endOfMonth])
            ->selectRaw('category_id, SUM(amount) as total')
            ->groupBy('category_id')
            ->with('category')
            ->get();

        foreach ($expenseCategories as $item) {
            $categoryStats[] = [
                'name' => $item->category->name ?? 'Uncategorized',
                'type' => 'expense',
                'total' => $item->total,
            ];
        }

        return view('dashboard.accountant', compact(
            'business',
            'todayIncome',
            'todayExpenses',
            'monthIncome',
            'monthExpenses',
            'totalIncome',
            'totalExpenses',
            'netProfit',
            'recentIncomes',
            'recentExpenses',
            'categoryStats'
        ));
    }
}
