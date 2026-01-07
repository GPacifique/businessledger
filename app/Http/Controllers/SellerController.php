<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Expense;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SellerController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        $business = $user->business;

        if (!$business || $business->status !== 'approved') {
            return view('dashboard.user', compact('business'));
        }

        $today = Carbon::today();
        $weekStart = Carbon::now()->startOfWeek();

        // Today's stats
        $todayIncome = Income::where('business_id', $business->id)
            ->whereDate('date', $today)
            ->sum('amount');

        $todayExpenses = Expense::where('business_id', $business->id)
            ->whereDate('date', $today)
            ->sum('amount');

        $todayBalance = $todayIncome - $todayExpenses;

        // Weekly entries by this user
        $weeklyEntries = Income::where('business_id', $business->id)
            ->where('created_by', $user->id)
            ->whereBetween('date', [$weekStart, $today])
            ->count()
            + Expense::where('business_id', $business->id)
            ->where('created_by', $user->id)
            ->whereBetween('date', [$weekStart, $today])
            ->count();

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

        return view('dashboard.seller', compact(
            'business',
            'todayIncome',
            'todayExpenses',
            'todayBalance',
            'weeklyEntries',
            'recentIncomes',
            'recentExpenses'
        ));
    }
}
