<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Redirect based on user role
        return redirect()->intended($this->getRedirectRouteForUser($request->user()));
    }

    /**
     * Get the appropriate redirect route based on user role.
     */
    protected function getRedirectRouteForUser($user): string
    {
        return match ($user->role) {
            'system_admin' => route('admin.dashboard', absolute: false),
            'business_admin' => route('business.dashboard', absolute: false),
            'seller' => route('seller.dashboard', absolute: false),
            'accountant' => route('accountant.dashboard', absolute: false),
            default => route('dashboard', absolute: false),
        };
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
