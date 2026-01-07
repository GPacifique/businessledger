<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SystemAdminController extends Controller
{
    public function dashboard()
    {
        $totalBusinesses = Business::count();
        $pendingBusinesses = Business::where('status', 'pending')->count();
        $approvedBusinesses = Business::where('status', 'approved')->count();
        $totalUsers = User::count();
        $unassignedUsers = User::whereNull('business_id')->where('role', 'user')->count();

        $pendingBusinessesList = Business::where('status', 'pending')
            ->with('users')
            ->orderByDesc('created_at')
            ->take(10)
            ->get();

        $recentBusinesses = Business::with('users')
            ->orderByDesc('created_at')
            ->take(10)
            ->get();

        return view('dashboard.admin', compact(
            'totalBusinesses', 'pendingBusinesses', 'approvedBusinesses', 'totalUsers',
            'pendingBusinessesList', 'recentBusinesses', 'unassignedUsers'
        ));
    }

    public function approveBusiness(Business $business)
    {
        $business->status = 'approved';
        $business->approved_by = auth()->id();
        $business->approved_at = now();
        $business->save();

        return back()->with('success', 'Business approved successfully.');
    }

    public function rejectBusiness(Business $business)
    {
        $business->status = 'rejected';
        $business->save();

        return back()->with('success', 'Business rejected.');
    }

    public function createBusiness()
    {
        $unassignedUsers = User::whereNull('business_id')
            ->where('role', 'user')
            ->orderBy('name')
            ->get();

        return view('admin.businesses.create', compact('unassignedUsers'));
    }

    public function storeBusiness(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:500',
            'phone' => 'nullable|string|max:20',
            'user_id' => 'required|exists:users,id',
            'status' => 'required|in:pending,approved',
        ]);

        $business = Business::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name) . '-' . Str::random(5),
            'address' => $request->address,
            'phone' => $request->phone,
            'status' => $request->status,
            'created_by' => auth()->id(),
            'approved_by' => $request->status === 'approved' ? auth()->id() : null,
            'approved_at' => $request->status === 'approved' ? now() : null,
        ]);

        // Assign user as business_admin
        $user = User::findOrFail($request->user_id);
        $user->business_id = $business->id;
        $user->role = 'business_admin';
        $user->save();

        return redirect()->route('admin.dashboard')->with('success', 'Business created and assigned to ' . $user->name . ' successfully.');
    }

    public function listUsers()
    {
        $users = User::with('business')
            ->orderByDesc('created_at')
            ->paginate(20);

        return view('admin.users.index', compact('users'));
    }
}
