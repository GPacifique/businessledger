<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of accounts.
     */
    public function index()
    {
        $accounts = Account::latest()->paginate(20);

        return view('accounts.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new account.
     */
    public function create()
    {
        return view('accounts.create');
    }

    /**
     * Store a newly created account.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'             => 'required|string|max:255',
            'account_number'   => 'nullable|string|max:255',
            'account_type'     => 'required|in:cash,bank,mobile_money,wallet,other',
            'opening_balance'  => 'required|numeric|min:0',
            'description'      => 'nullable|string',
            'status'           => 'nullable|boolean',
        ]);

        $validated['current_balance'] = $validated['opening_balance'];

        Account::create($validated);

        return redirect()
            ->route('accounts.index')
            ->with('success', 'Account created successfully.');
    }

    /**
     * Display the specified account.
     */
    public function show(Account $account)
    {
        $account->load('transactions');

        return view('accounts.show', compact('account'));
    }

    /**
     * Show the form for editing the account.
     */
    public function edit(Account $account)
    {
        return view('accounts.edit', compact('account'));
    }

    /**
     * Update the specified account.
     */
    public function update(Request $request, Account $account)
    {
        $validated = $request->validate([
            'name'             => 'required|string|max:255',
            'account_number'   => 'nullable|string|max:255',
            'account_type'     => 'required|in:cash,bank,mobile_money,wallet,other',
            'opening_balance'  => 'required|numeric|min:0',
            'current_balance'  => 'required|numeric|min:0',
            'description'      => 'nullable|string',
            'status'           => 'nullable|boolean',
        ]);

        $account->update($validated);

        return redirect()
            ->route('accounts.index')
            ->with('success', 'Account updated successfully.');
    }

    /**
     * Remove the specified account.
     */
    public function destroy(Account $account)
    {
        if ($account->transactions()->count() > 0) {
            return back()->with(
                'error',
                'Cannot delete an account with transactions.'
            );
        }

        $account->delete();

        return redirect()
            ->route('accounts.index')
            ->with('success', 'Account deleted successfully.');
    }
}