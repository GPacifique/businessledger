<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Expense;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $business = auth()->user()->business;

        $startDate = $request->get('start_date', Carbon::now()->startOfMonth()->toDateString());
        $endDate = $request->get('end_date', Carbon::now()->endOfMonth()->toDateString());

        // Income by category
        $incomeByCategory = Income::where('business_id', $business->id)
            ->whereBetween('date', [$startDate, $endDate])
            ->selectRaw('category_id, SUM(amount) as total')
            ->groupBy('category_id')
            ->with('category')
            ->get();

        // Expense by category
        $expenseByCategory = Expense::where('business_id', $business->id)
            ->whereBetween('date', [$startDate, $endDate])
            ->selectRaw('category_id, SUM(amount) as total')
            ->groupBy('category_id')
            ->with('category')
            ->get();

        // Totals
        $totalIncome = Income::where('business_id', $business->id)
            ->whereBetween('date', [$startDate, $endDate])
            ->sum('amount');

        $totalExpenses = Expense::where('business_id', $business->id)
            ->whereBetween('date', [$startDate, $endDate])
            ->sum('amount');

        // Daily summary
        $dailyIncome = Income::where('business_id', $business->id)
            ->whereBetween('date', [$startDate, $endDate])
            ->selectRaw('DATE(date) as day, SUM(amount) as total')
            ->groupBy('day')
            ->orderBy('day')
            ->pluck('total', 'day');

        $dailyExpenses = Expense::where('business_id', $business->id)
            ->whereBetween('date', [$startDate, $endDate])
            ->selectRaw('DATE(date) as day, SUM(amount) as total')
            ->groupBy('day')
            ->orderBy('day')
            ->pluck('total', 'day');

        // Monthly stats (current month)
        $monthlyIncome = Income::where('business_id', $business->id)
            ->whereMonth('date', Carbon::now()->month)
            ->whereYear('date', Carbon::now()->year)
            ->sum('amount');

        $monthlyExpenses = Expense::where('business_id', $business->id)
            ->whereMonth('date', Carbon::now()->month)
            ->whereYear('date', Carbon::now()->year)
            ->sum('amount');

        // Yearly stats (current year)
        $yearlyIncome = Income::where('business_id', $business->id)
            ->whereYear('date', Carbon::now()->year)
            ->sum('amount');

        $yearlyExpenses = Expense::where('business_id', $business->id)
            ->whereYear('date', Carbon::now()->year)
            ->sum('amount');

        return view('reports.index', compact(
            'startDate',
            'endDate',
            'incomeByCategory',
            'expenseByCategory',
            'totalIncome',
            'totalExpenses',
            'dailyIncome',
            'dailyExpenses',
            'monthlyIncome',
            'monthlyExpenses',
            'yearlyIncome',
            'yearlyExpenses'
        ));
    }
}
