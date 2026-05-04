<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\BillItem;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class BillController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $business = $user->business;

        if (!$business) {
            return redirect()->route('dashboard')->with('error', 'No business assigned to your account.');
        }

        $query = Bill::where('business_id', $business->id)->with('createdBy');

        // Filter by status
        if ($request->filled('status')) {
            $query->byStatus($request->status);
        }

        // Search by bill number or customer name
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('bill_number', 'like', '%' . $search . '%')
                  ->orWhere('customer_name', 'like', '%' . $search . '%')
                  ->orWhere('customer_email', 'like', '%' . $search . '%');
            });
        }

        $bills = $query
            ->orderByDesc('bill_date')
            ->orderByDesc('created_at')
            ->paginate(20);

        $statuses = ['draft' => 'Draft', 'sent' => 'Sent', 'paid' => 'Paid', 'overdue' => 'Overdue', 'cancelled' => 'Cancelled'];

        return view('bills.index', compact('bills', 'statuses'));
    }

    public function create()
    {
        $business = auth()->user()->business;
        $billNumber = Bill::generateBillNumber();

        return view('bills.create', compact('business', 'billNumber'));
    }

    public function store(Request $request)
    {
        $business = auth()->user()->business;

        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'nullable|email|max:255',
            'customer_phone' => 'nullable|string|max:20',
            'customer_address' => 'nullable|string|max:1000',
            'bill_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:bill_date',
            'status' => 'required|in:draft,sent',
            'tax_rate' => 'required|numeric|min:0|max:100',
            'discount_amount' => 'required|numeric|min:0',
            'notes' => 'nullable|string',
            'items' => 'required|array|min:1',
            'items.*.description' => 'required|string|max:255',
            'items.*.quantity' => 'required|numeric|min:0.01',
            'items.*.unit_price' => 'required|numeric|min:0',
        ]);

        $bill = Bill::create([
            'business_id' => $business->id,
            'bill_number' => $request->bill_number,
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'customer_address' => $request->customer_address,
            'bill_date' => $request->bill_date,
            'due_date' => $request->due_date,
            'status' => $request->status,
            'tax_rate' => $request->tax_rate,
            'discount_amount' => $request->discount_amount,
            'total' => 0,
            'notes' => $request->notes,
            'created_by' => auth()->id(),
        ]);
        $billUrl = route('bills.show', $bill->id);

$qrImage = QrCode::format('png')
    ->size(300)
    ->generate($billUrl);

$fileName = 'qrcodes/bill-'.$bill->id.'.png';

Storage::disk('public')->put($fileName, $qrImage);

$bill->update([
    'qr_code' => $fileName
]);

        // Create bill items
        foreach ($request->items as $item) {
            BillItem::create([
                'bill_id' => $bill->id,
                'description' => $item['description'],
                'quantity' => $item['quantity'],
                'unit_price' => $item['unit_price'],
            ]);
        }

        $bill->calculateTotals();

        return redirect()->route('bills.show', $bill)->with('success', 'Bill created successfully.');
    }

    public function show(Bill $bill)
    {
        $this->authorize('view', $bill);
        $bill->load('lineItems', 'createdBy');

        return view('bills.show', compact('bill'));
    }

    public function edit(Bill $bill)
    {
        $this->authorize('update', $bill);
        $bill->load('lineItems');

        return view('bills.edit', compact('bill'));
    }

    public function update(Request $request, Bill $bill)
    {
        $this->authorize('update', $bill);

        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'nullable|email|max:255',
            'customer_phone' => 'nullable|string|max:20',
            'customer_address' => 'nullable|string|max:1000',
            'bill_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:bill_date',
            'status' => 'required|in:draft,sent,paid,overdue,cancelled',
            'tax_rate' => 'required|numeric|min:0|max:100',
            'discount_amount' => 'required|numeric|min:0',
            'notes' => 'nullable|string',
            'items' => 'required|array|min:1',
            'items.*.description' => 'required|string|max:255',
            'items.*.quantity' => 'required|numeric|min:0.01',
            'items.*.unit_price' => 'required|numeric|min:0',
        ]);

        $bill->update([
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'customer_address' => $request->customer_address,
            'bill_date' => $request->bill_date,
            'due_date' => $request->due_date,
            'status' => $request->status,
            'tax_rate' => $request->tax_rate,
            'discount_amount' => $request->discount_amount,
            'notes' => $request->notes,
        ]);

        // Delete existing items and create new ones
        $bill->lineItems()->delete();
        foreach ($request->items as $item) {
            BillItem::create([
                'bill_id' => $bill->id,
                'description' => $item['description'],
                'quantity' => $item['quantity'],
                'unit_price' => $item['unit_price'],
            ]);
        }

        $bill->calculateTotals();

        return redirect()->route('bills.show', $bill)->with('success', 'Bill updated successfully.');
    }

    public function destroy(Bill $bill)
    {
        $this->authorize('delete', $bill);
        $bill->delete();

        return redirect()->route('bills.index')->with('success', 'Bill deleted successfully.');
    }

    public function markAs(Request $request, Bill $bill)
    {
        $this->authorize('update', $bill);

        $request->validate([
            'status' => 'required|in:sent,paid,overdue,cancelled',
        ]);

        $bill->update(['status' => $request->status]);

        return redirect()->route('bills.show', $bill)->with('success', 'Bill status updated to ' . $request->status);
    }

    public function download(Bill $bill)
    {
        $this->authorize('view', $bill);
        $bill->load('lineItems', 'createdBy', 'business');

        $pdf = Pdf::loadView('bills.bill-pdf', compact('bill'));
        $pdf->setPaper('a4', 'portrait');

        $filename = 'bill-' . $bill->bill_number . '-' . now()->format('Y-m-d') . '.pdf';

        return $pdf->download($filename);
    }
}
