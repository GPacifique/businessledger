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
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\ContactSubmissionController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BillController;
use App\Models\ContactSubmission;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\TransactionCategoryController;
Route::resource(
    'transactions',
    TransactionController::class
);

Route::resource(
    'accounts',
    AccountController::class
);

Route::resource(
    'transaction-categories',
    TransactionCategoryController::class
);
// Language switch route
Route::get('language/{locale}', [LanguageController::class, 'switch'])->name('language.switch');

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Static pages
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/testimonials', [PageController::class, 'testimonials'])->name('testimonials');

// Properties routes
Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');
Route::get('/properties/{id}', [PropertyController::class, 'show'])->name('properties.show');

// Contact form handler for landing page
Route::post('/contact', function (Illuminate\Http\Request $request) {
    // Validate the form data
    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'nullable|string|max:20',
        'subject' => 'required|string|max:255',
        'message' => 'required|string|max:1000',
    ]);

    // Save to database
    ContactSubmission::create($validated);

    // Redirect back with success message
    return redirect('/')->with('success', 'Thank you for your message! We will contact you soon.');
})->name('contact.submit');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // System Admin Routes - Only accessible by system_admin
    Route::middleware(RoleMiddleware::class.':system_admin')->group(function () {
        Route::get('/admin/dashboard', [SystemAdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/admin/contact-submissions', [ContactSubmissionController::class, 'index'])->name('admin.contact-submissions.index');
        Route::get('/admin/contact-submissions/{contactSubmission}', [ContactSubmissionController::class, 'show'])->name('admin.contact-submissions.show');
        Route::delete('/admin/contact-submissions/{contactSubmission}', [ContactSubmissionController::class, 'destroy'])->name('admin.contact-submissions.destroy');
        Route::post('/admin/businesses/{business}/approve', [SystemAdminController::class, 'approveBusiness'])->name('admin.businesses.approve');
        Route::post('/admin/businesses/{business}/reject', [SystemAdminController::class, 'rejectBusiness'])->name('admin.businesses.reject');
        Route::get('/admin/businesses/create', [SystemAdminController::class, 'createBusiness'])->name('admin.businesses.create');
        Route::post('/admin/businesses', [SystemAdminController::class, 'storeBusiness'])->name('admin.businesses.store');
        Route::get('/admin/businesses/{business}', [SystemAdminController::class, 'showBusinessFinancials'])->name('admin.businesses.show');
        Route::get('/admin/businesses/{business}/balance-sheet', [SystemAdminController::class, 'downloadBalanceSheet'])->name('admin.businesses.balance-sheet');
        Route::get('/admin/businesses/{business}/edit', [SystemAdminController::class, 'editBusiness'])->name('admin.businesses.edit');
        Route::put('/admin/businesses/{business}', [SystemAdminController::class, 'updateBusiness'])->name('admin.businesses.update');
        Route::delete('/admin/businesses/{business}', [SystemAdminController::class, 'destroyBusiness'])->name('admin.businesses.destroy');
        Route::get('/admin/users', [SystemAdminController::class, 'listUsers'])->name('admin.users.index');
        Route::get('/admin/users/{user}/edit', [SystemAdminController::class, 'editUser'])->name('admin.users.edit');
        Route::put('/admin/users/{user}', [SystemAdminController::class, 'updateUser'])->name('admin.users.update');
        Route::delete('/admin/users/{user}', [SystemAdminController::class, 'destroyUser'])->name('admin.users.destroy');
    });

    // Business Admin Routes - Only accessible by business_admin
    Route::middleware(RoleMiddleware::class.':business_admin')->group(function () {
        Route::get('/business/dashboard', [BusinessAdminController::class, 'dashboard'])->name('business.dashboard');
        Route::get('/business/balance-sheet', [BusinessAdminController::class, 'downloadBalanceSheet'])->name('business.balance-sheet');
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
    Route::resource('bills', BillController::class);
    Route::post('bills/{bill}/mark-as', [BillController::class, 'markAs'])->name('bills.markAs');
    Route::get('bills/{bill}/download', [BillController::class, 'download'])->name('bills.download');
    Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
    Route::resource('staff', StaffController::class);

    // Subscription Routes
    Route::prefix('subscriptions')->name('subscriptions.')->group(function () {
        Route::get('/plans', [SubscriptionController::class, 'plans'])->name('plans');
        Route::get('/notifications', [SubscriptionController::class, 'notifications'])->name('notifications');
        Route::post('/notifications/{notification}/read', [SubscriptionController::class, 'markNotificationRead'])->name('notifications.read');
        Route::post('/notifications/read-all', [SubscriptionController::class, 'markAllNotificationsRead'])->name('notifications.read-all');
        Route::get('/{business}', [SubscriptionController::class, 'show'])->name('show');
        Route::get('/{business}/subscribe', [SubscriptionController::class, 'create'])->name('create');
        Route::post('/{business}/subscribe', [SubscriptionController::class, 'store'])->name('store');
        Route::get('/renew/{subscription}', [SubscriptionController::class, 'renew'])->name('renew');
        Route::post('/renew/{subscription}', [SubscriptionController::class, 'processRenewal'])->name('process-renewal');
        Route::post('/{subscription}/cancel', [SubscriptionController::class, 'cancel'])->name('cancel');
    });
});

require __DIR__.'/auth.php';
