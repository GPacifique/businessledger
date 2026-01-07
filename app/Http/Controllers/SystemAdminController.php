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

    public function editBusiness(Business $business)
    {
        $unassignedUsers = User::whereNull('business_id')
            ->where('role', 'user')
            ->orderBy('name')
            ->get();

        return view('admin.businesses.edit', compact('business', 'unassignedUsers'));
    }

    public function updateBusiness(Request $request, Business $business)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:500',
            'phone' => 'nullable|string|max:20',
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $business->name = $request->name;
        $business->address = $request->address;
        $business->phone = $request->phone;

        if ($request->status === 'approved' && $business->status !== 'approved') {
            $business->approved_by = auth()->id();
            $business->approved_at = now();
        }
        $business->status = $request->status;
        $business->save();

        return redirect()->route('admin.dashboard')->with('success', 'Business updated successfully.');
    }

    public function destroyBusiness(Business $business)
    {
        // Remove business association from users
        User::where('business_id', $business->id)->update([
            'business_id' => null,
            'role' => 'user'
        ]);

        $business->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Business deleted successfully.');
    }

    public function editUser(User $user)
    {
        $businesses = Business::where('status', 'approved')->orderBy('name')->get();
        return view('admin.users.edit', compact('user', 'businesses'));
    }

    public function updateUser(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:user,seller,accountant,business_admin,system_admin',
            'business_id' => 'nullable|exists:businesses,id',
            'account_status' => 'required|in:active,suspended',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->business_id = $request->business_id;
        $user->account_status = $request->account_status;
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function destroyUser(User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->with('error', 'You cannot delete your own account.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
