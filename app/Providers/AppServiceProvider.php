<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Expense;
use App\Models\Income;
use App\Models\User;
use App\Policies\CategoryPolicy;
use App\Policies\ExpensePolicy;
use App\Policies\IncomePolicy;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Fix for MySQL older versions - limit default string length
        Schema::defaultStringLength(191);

        // Bind 'staff' route parameter to User model
        Route::model('staff', User::class);

        // Register policies
        Gate::policy(Income::class, IncomePolicy::class);
        Gate::policy(Expense::class, ExpensePolicy::class);
        Gate::policy(Category::class, CategoryPolicy::class);
        Gate::policy(User::class, UserPolicy::class);
    }
}
