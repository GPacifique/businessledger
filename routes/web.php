<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BusinessAdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\AccountantController;
use App\Http\Controllers\SystemAdminController;
use App\Http\Controllers\LanguageController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;

// Language switch route
Route::get('language/{locale}', [LanguageController::class, 'switch'])->name('language.switch');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = auth()->user();

    // System admin dashboard
    if ($user->role === 'system_admin') {
        return redirect()->route('admin.dashboard');
    }

    // Business admin dashboard
    if ($user->role === 'business_admin') {
        return redirect()->route('business.dashboard');
    }

    // Seller dashboard
    if ($user->role === 'seller') {
        return redirect()->route('seller.dashboard');
    }

    // Accountant dashboard
    if ($user->role === 'accountant') {
        return redirect()->route('accountant.dashboard');
    }

    // User with pending business or no business - show under review
    $business = $user->business;
    return view('dashboard.user', compact('business'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // System Admin Routes - Only accessible by system_admin
    Route::middleware(RoleMiddleware::class.':system_admin')->group(function () {
        Route::get('/admin/dashboard', [SystemAdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::post('/admin/businesses/{business}/approve', [SystemAdminController::class, 'approveBusiness'])->name('admin.businesses.approve');
        Route::post('/admin/businesses/{business}/reject', [SystemAdminController::class, 'rejectBusiness'])->name('admin.businesses.reject');
        Route::get('/admin/businesses/create', [SystemAdminController::class, 'createBusiness'])->name('admin.businesses.create');
        Route::post('/admin/businesses', [SystemAdminController::class, 'storeBusiness'])->name('admin.businesses.store');
        Route::get('/admin/users', [SystemAdminController::class, 'listUsers'])->name('admin.users.index');
    });

    // Business Admin Routes - Only accessible by business_admin
    Route::middleware(RoleMiddleware::class.':business_admin')->group(function () {
        Route::get('/business/dashboard', [BusinessAdminController::class, 'dashboard'])->name('business.dashboard');
    });

    // Seller Routes - Only accessible by seller
    Route::middleware(RoleMiddleware::class.':seller')->group(function () {
        Route::get('/seller/dashboard', [SellerController::class, 'dashboard'])->name('seller.dashboard');
    });

    // Accountant Routes - Only accessible by accountant
    Route::middleware(RoleMiddleware::class.':accountant')->group(function () {
        Route::get('/accountant/dashboard', [AccountantController::class, 'dashboard'])->name('accountant.dashboard');
    });

    // Resource routes for business operations
    Route::resource('incomes', IncomeController::class);
    Route::resource('expenses', ExpenseController::class);
    Route::resource('categories', CategoryController::class)->except(['show']);
    Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
    Route::resource('staff', StaffController::class);
});

require __DIR__.'/auth.php';
