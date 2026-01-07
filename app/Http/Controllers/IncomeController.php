<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Category;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function index()
    {
        $business = auth()->user()->business;
        $incomes = Income::where('business_id', $business->id)
            ->with('category')
            ->orderByDesc('date')
            ->orderByDesc('created_at')
            ->paginate(20);

        return view('incomes.index', compact('incomes'));
    }

    public function create()
    {
        $business = auth()->user()->business;
        $categories = Category::where('business_id', $business->id)
            ->where('type', 'income')
            ->orderBy('name')
            ->get();

        return view('incomes.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
            'category_id' => 'nullable|exists:categories,id',
            'payment_method' => 'required|in:cash,bank_transfer,mobile_money,cheque,other',
            'reference_number' => 'nullable|string|max:100',
            'notes' => 'nullable|string|max:1000',
        ]);

        $business = auth()->user()->business;

        Income::create([
            'business_id' => $business->id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'amount' => $request->amount,
            'date' => $request->date,
            'payment_method' => $request->payment_method,
            'reference_number' => $request->reference_number ?: Income::generateReferenceNumber(),
            'notes' => $request->notes,
            'created_by' => auth()->id(),
        ]);

        return redirect()->route('incomes.index')->with('success', 'Income recorded successfully.');
    }

    public function show(Income $income)
    {
        $this->authorize('view', $income);
        return view('incomes.show', compact('income'));
    }

    public function edit(Income $income)
    {
        $this->authorize('update', $income);
        $business = auth()->user()->business;
        $categories = Category::where('business_id', $business->id)
            ->where('type', 'income')
            ->orderBy('name')
            ->get();

        return view('incomes.edit', compact('income', 'categories'));
    }

    public function update(Request $request, Income $income)
    {
        $this->authorize('update', $income);

        $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
            'category_id' => 'nullable|exists:categories,id',
            'payment_method' => 'required|in:cash,bank_transfer,mobile_money,cheque,other',
            'reference_number' => 'nullable|string|max:100',
            'notes' => 'nullable|string|max:1000',
        ]);

        $income->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'amount' => $request->amount,
            'date' => $request->date,
            'payment_method' => $request->payment_method,
            'reference_number' => $request->reference_number ?: ($income->reference_number ?: Income::generateReferenceNumber()),
            'notes' => $request->notes,
        ]);

        return redirect()->route('incomes.index')->with('success', 'Income updated successfully.');
    }

    public function destroy(Income $income)
    {
        $this->authorize('delete', $income);
        $income->delete();

        return redirect()->route('incomes.index')->with('success', 'Income deleted successfully.');
    }
}
