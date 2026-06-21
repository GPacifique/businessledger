<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Account;
use App\Models\TransactionCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    /**
     * Display a listing of transactions.
     */
    public function index()
    {
        $transactions = Transaction::with([
            'account',
            'category'
        ])
        ->latest()
        ->paginate(20);

        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a transaction.
     */
    public function create()
    {
        $accounts = Account::orderBy('name')->get();

        $categories = TransactionCategory::orderBy('name')->get();

        return view(
            'transactions.create',
            compact('accounts', 'categories')
        );
    }

    /**
     * Store a newly created transaction.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'account_id' => 'required|exists:accounts,id',
            'transaction_category_id' => 'required|exists:transaction_categories,id',
            'type' => 'required|in:income,expense,transfer',
            'amount' => 'required|numeric|min:0',
            'transaction_date' => 'required|date',
            'description' => 'nullable|string|max:1000',
        ]);

        $validated['transaction_number'] =
            'TRX-' . strtoupper(Str::random(10));

        Transaction::create($validated);

        return redirect()
            ->route('transactions.index')
            ->with('success', 'Transaction created successfully.');
    }

    /**
     * Display the specified transaction.
     */
    public function show(Transaction $transaction)
    {
        $transaction->load([
            'account',
            'category'
        ]);

        return view('transactions.show', compact('transaction'));
    }

    /**
     * Show the form for editing a transaction.
     */
    public function edit(Transaction $transaction)
    {
        $accounts = Account::orderBy('name')->get();

        $categories = TransactionCategory::orderBy('name')->get();

        return view(
            'transactions.edit',
            compact(
                'transaction',
                'accounts',
                'categories'
            )
        );
    }

    /**
     * Update the specified transaction.
     */
    public function update(
        Request $request,
        Transaction $transaction
    ) {
        $validated = $request->validate([
            'account_id' => 'required|exists:accounts,id',
            'transaction_category_id' => 'required|exists:transaction_categories,id',
            'type' => 'required|in:income,expense,transfer',
            'amount' => 'required|numeric|min:0',
            'transaction_date' => 'required|date',
            'description' => 'nullable|string|max:1000',
        ]);

        $transaction->update($validated);

        return redirect()
            ->route('transactions.index')
            ->with('success', 'Transaction updated successfully.');
    }

    /**
     * Remove the specified transaction.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()
            ->route('transactions.index')
            ->with('success', 'Transaction deleted successfully.');
    }
}
