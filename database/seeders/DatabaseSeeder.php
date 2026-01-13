<?php

namespace Database\Seeders;

use App\Models\Business;
use App\Models\Category;
use App\Models\Income;
use App\Models\Expense;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed subscription plans first
        $this->call(SubscriptionPlanSeeder::class);

        // Create System Admin first (no business required)
        $systemAdmin = User::create([
            'name' => 'System Admin',
            'email' => 'admin@businessledger.com',
            'password' => Hash::make('password'),
            'role' => 'system_admin',
            'account_status' => 'active',
            'email_verified_at' => now(),
        ]);

        // Create Business 1 Admin (without business_id first)
        $businessAdmin1 = User::create([
            'name' => 'John Smith',
            'email' => 'john@techstore.com',
            'password' => Hash::make('password'),
            'role' => 'business_admin',
            'account_status' => 'active',
            'email_verified_at' => now(),
        ]);

        // Create Approved Business 1 (created_by businessAdmin1)
        $business1 = Business::create([
            'name' => 'Tech Store',
            'slug' => 'tech-store',
            'status' => 'approved',
            'created_by' => $businessAdmin1->id,
            'approved_by' => $systemAdmin->id,
        ]);

        // Update businessAdmin1 with business_id
        $businessAdmin1->update(['business_id' => $business1->id]);

        // Business 1 Staff
        User::create([
            'name' => 'Alice Manager',
            'email' => 'alice@techstore.com',
            'password' => Hash::make('password'),
            'role' => 'manager',
            'business_id' => $business1->id,
            'account_status' => 'active',
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Bob Accountant',
            'email' => 'bob@techstore.com',
            'password' => Hash::make('password'),
            'role' => 'accountant',
            'business_id' => $business1->id,
            'account_status' => 'active',
            'email_verified_at' => now(),
        ]);

        // Create Business 2 Admin (without business_id first)
        $businessAdmin2 = User::create([
            'name' => 'Jane Doe',
            'email' => 'jane@fashionhub.com',
            'password' => Hash::make('password'),
            'role' => 'business_admin',
            'account_status' => 'active',
            'email_verified_at' => now(),
        ]);

        // Create Approved Business 2
        $business2 = Business::create([
            'name' => 'Fashion Hub',
            'slug' => 'fashion-hub',
            'status' => 'approved',
            'created_by' => $businessAdmin2->id,
            'approved_by' => $systemAdmin->id,
        ]);

        // Update businessAdmin2 with business_id
        $businessAdmin2->update(['business_id' => $business2->id]);

        // Business 2 Staff
        User::create([
            'name' => 'Charlie Manager',
            'email' => 'charlie@fashionhub.com',
            'password' => Hash::make('password'),
            'role' => 'manager',
            'business_id' => $business2->id,
            'account_status' => 'active',
            'email_verified_at' => now(),
        ]);

        // Create Pending Business Admin (without business_id first)
        $pendingAdmin1 = User::create([
            'name' => 'Mike Pending',
            'email' => 'mike@newbusiness.com',
            'password' => Hash::make('password'),
            'role' => 'business_admin',
            'account_status' => 'active',
            'email_verified_at' => now(),
        ]);

        // Create Pending Business
        $pendingBusiness = Business::create([
            'name' => 'New Electronics',
            'slug' => 'new-electronics',
            'status' => 'pending',
            'created_by' => $pendingAdmin1->id,
        ]);

        // Update pendingAdmin1 with business_id
        $pendingAdmin1->update(['business_id' => $pendingBusiness->id]);

        // Regular user (no business)
        User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'account_status' => 'active',
            'email_verified_at' => now(),
        ]);

        // ===== Create Income Categories for Business 1 =====
        $incomeCategories1 = [
            Category::create([
                'business_id' => $business1->id,
                'name' => 'Sales Revenue',
                'type' => 'income',
                'icon' => 'shopping-cart',
                'color' => '#10B981',
                'is_active' => true,
            ]),
            Category::create([
                'business_id' => $business1->id,
                'name' => 'Service Income',
                'type' => 'income',
                'icon' => 'wrench',
                'color' => '#3B82F6',
                'is_active' => true,
            ]),
            Category::create([
                'business_id' => $business1->id,
                'name' => 'Interest Income',
                'type' => 'income',
                'icon' => 'trending-up',
                'color' => '#8B5CF6',
                'is_active' => true,
            ]),
            Category::create([
                'business_id' => $business1->id,
                'name' => 'Other Income',
                'type' => 'income',
                'icon' => 'plus-circle',
                'color' => '#6B7280',
                'is_active' => true,
            ]),
        ];

        // ===== Create Expense Categories for Business 1 =====
        $expenseCategories1 = [
            Category::create([
                'business_id' => $business1->id,
                'name' => 'Rent',
                'type' => 'expense',
                'icon' => 'home',
                'color' => '#EF4444',
                'is_active' => true,
            ]),
            Category::create([
                'business_id' => $business1->id,
                'name' => 'Salaries',
                'type' => 'expense',
                'icon' => 'users',
                'color' => '#F59E0B',
                'is_active' => true,
            ]),
            Category::create([
                'business_id' => $business1->id,
                'name' => 'Utilities',
                'type' => 'expense',
                'icon' => 'zap',
                'color' => '#EC4899',
                'is_active' => true,
            ]),
            Category::create([
                'business_id' => $business1->id,
                'name' => 'Supplies',
                'type' => 'expense',
                'icon' => 'package',
                'color' => '#14B8A6',
                'is_active' => true,
            ]),
            Category::create([
                'business_id' => $business1->id,
                'name' => 'Marketing',
                'type' => 'expense',
                'icon' => 'megaphone',
                'color' => '#8B5CF6',
                'is_active' => true,
            ]),
            Category::create([
                'business_id' => $business1->id,
                'name' => 'Transport',
                'type' => 'expense',
                'icon' => 'truck',
                'color' => '#6366F1',
                'is_active' => true,
            ]),
        ];

        // ===== Create Sample Incomes for Business 1 =====
        $today = Carbon::today();

        // This month incomes
        Income::create([
            'business_id' => $business1->id,
            'category_id' => $incomeCategories1[0]->id, // Sales Revenue
            'created_by' => $businessAdmin1->id,
            'title' => 'Laptop sale - Customer A',
            'amount' => 1200000,
            'date' => $today->copy()->subDays(2),
            'payment_method' => 'mobile_money',
            'reference_number' => 'INV-001',
            'notes' => 'Sold 1 Laptop Pro 15',
        ]);

        Income::create([
            'business_id' => $business1->id,
            'category_id' => $incomeCategories1[0]->id, // Sales Revenue
            'created_by' => $businessAdmin1->id,
            'title' => 'Multiple electronics sale',
            'amount' => 450000,
            'date' => $today->copy()->subDays(5),
            'payment_method' => 'cash',
            'reference_number' => 'INV-002',
        ]);

        Income::create([
            'business_id' => $business1->id,
            'category_id' => $incomeCategories1[1]->id, // Service Income
            'created_by' => $businessAdmin1->id,
            'title' => 'Computer repair service',
            'amount' => 50000,
            'date' => $today->copy()->subDays(7),
            'payment_method' => 'cash',
        ]);

        Income::create([
            'business_id' => $business1->id,
            'category_id' => $incomeCategories1[0]->id, // Sales Revenue
            'created_by' => $businessAdmin1->id,
            'title' => 'Accessories sale',
            'amount' => 180000,
            'date' => $today->copy()->subDays(10),
            'payment_method' => 'bank_transfer',
            'reference_number' => 'INV-003',
        ]);

        // Last month incomes
        Income::create([
            'business_id' => $business1->id,
            'category_id' => $incomeCategories1[0]->id,
            'created_by' => $businessAdmin1->id,
            'title' => 'Monthly wholesale order',
            'amount' => 2500000,
            'date' => $today->copy()->subMonth()->subDays(5),
            'payment_method' => 'bank_transfer',
            'reference_number' => 'INV-LM-001',
        ]);

        Income::create([
            'business_id' => $business1->id,
            'category_id' => $incomeCategories1[2]->id, // Interest Income
            'created_by' => $businessAdmin1->id,
            'title' => 'Bank interest',
            'amount' => 15000,
            'date' => $today->copy()->subMonth()->endOfMonth(),
            'payment_method' => 'bank_transfer',
        ]);

        // ===== Create Sample Expenses for Business 1 =====

        // This month expenses
        Expense::create([
            'business_id' => $business1->id,
            'category_id' => $expenseCategories1[0]->id, // Rent
            'created_by' => $businessAdmin1->id,
            'title' => 'Monthly shop rent',
            'amount' => 300000,
            'date' => $today->copy()->startOfMonth(),
            'payment_method' => 'bank_transfer',
            'vendor' => 'Kigali Properties Ltd',
            'is_recurring' => true,
            'recurring_frequency' => 'monthly',
        ]);

        Expense::create([
            'business_id' => $business1->id,
            'category_id' => $expenseCategories1[1]->id, // Salaries
            'created_by' => $businessAdmin1->id,
            'title' => 'Staff salaries - January',
            'amount' => 800000,
            'date' => $today->copy()->subDays(3),
            'payment_method' => 'bank_transfer',
            'is_recurring' => true,
            'recurring_frequency' => 'monthly',
        ]);

        Expense::create([
            'business_id' => $business1->id,
            'category_id' => $expenseCategories1[2]->id, // Utilities
            'created_by' => $businessAdmin1->id,
            'title' => 'Electricity bill',
            'amount' => 45000,
            'date' => $today->copy()->subDays(8),
            'payment_method' => 'mobile_money',
            'vendor' => 'REG',
        ]);

        Expense::create([
            'business_id' => $business1->id,
            'category_id' => $expenseCategories1[2]->id, // Utilities
            'created_by' => $businessAdmin1->id,
            'title' => 'Internet subscription',
            'amount' => 50000,
            'date' => $today->copy()->subDays(1),
            'payment_method' => 'mobile_money',
            'vendor' => 'MTN Business',
            'is_recurring' => true,
            'recurring_frequency' => 'monthly',
        ]);

        Expense::create([
            'business_id' => $business1->id,
            'category_id' => $expenseCategories1[3]->id, // Supplies
            'created_by' => $businessAdmin1->id,
            'title' => 'Office supplies',
            'amount' => 35000,
            'date' => $today->copy()->subDays(12),
            'payment_method' => 'cash',
        ]);

        Expense::create([
            'business_id' => $business1->id,
            'category_id' => $expenseCategories1[4]->id, // Marketing
            'created_by' => $businessAdmin1->id,
            'title' => 'Facebook ads campaign',
            'amount' => 100000,
            'date' => $today->copy()->subDays(15),
            'payment_method' => 'card',
            'vendor' => 'Meta',
        ]);

        // Last month expenses
        Expense::create([
            'business_id' => $business1->id,
            'category_id' => $expenseCategories1[0]->id, // Rent
            'created_by' => $businessAdmin1->id,
            'title' => 'Monthly shop rent - December',
            'amount' => 300000,
            'date' => $today->copy()->subMonth()->startOfMonth(),
            'payment_method' => 'bank_transfer',
            'vendor' => 'Kigali Properties Ltd',
        ]);

        Expense::create([
            'business_id' => $business1->id,
            'category_id' => $expenseCategories1[5]->id, // Transport
            'created_by' => $businessAdmin1->id,
            'title' => 'Delivery fuel costs',
            'amount' => 75000,
            'date' => $today->copy()->subMonth()->subDays(10),
            'payment_method' => 'cash',
        ]);

        // ===== Create Categories for Business 2 =====
        $incomeCategories2 = [
            Category::create([
                'business_id' => $business2->id,
                'name' => 'Clothing Sales',
                'type' => 'income',
                'icon' => 'shopping-bag',
                'color' => '#10B981',
                'is_active' => true,
            ]),
            Category::create([
                'business_id' => $business2->id,
                'name' => 'Accessories Sales',
                'type' => 'income',
                'icon' => 'gift',
                'color' => '#3B82F6',
                'is_active' => true,
            ]),
        ];

        $expenseCategories2 = [
            Category::create([
                'business_id' => $business2->id,
                'name' => 'Rent',
                'type' => 'expense',
                'icon' => 'home',
                'color' => '#EF4444',
                'is_active' => true,
            ]),
            Category::create([
                'business_id' => $business2->id,
                'name' => 'Stock Purchase',
                'type' => 'expense',
                'icon' => 'package',
                'color' => '#F59E0B',
                'is_active' => true,
            ]),
        ];

        // Sample incomes for Business 2
        Income::create([
            'business_id' => $business2->id,
            'category_id' => $incomeCategories2[0]->id,
            'created_by' => $businessAdmin2->id,
            'title' => 'Weekend clothing sales',
            'amount' => 650000,
            'date' => $today->copy()->subDays(3),
            'payment_method' => 'cash',
        ]);

        Income::create([
            'business_id' => $business2->id,
            'category_id' => $incomeCategories2[1]->id,
            'created_by' => $businessAdmin2->id,
            'title' => 'Bags and accessories',
            'amount' => 180000,
            'date' => $today->copy()->subDays(6),
            'payment_method' => 'mobile_money',
        ]);

        // Sample expenses for Business 2
        Expense::create([
            'business_id' => $business2->id,
            'category_id' => $expenseCategories2[0]->id,
            'created_by' => $businessAdmin2->id,
            'title' => 'Shop rent - January',
            'amount' => 400000,
            'date' => $today->copy()->startOfMonth(),
            'payment_method' => 'bank_transfer',
            'is_recurring' => true,
            'recurring_frequency' => 'monthly',
        ]);

        Expense::create([
            'business_id' => $business2->id,
            'category_id' => $expenseCategories2[1]->id,
            'created_by' => $businessAdmin2->id,
            'title' => 'New collection purchase',
            'amount' => 1200000,
            'date' => $today->copy()->subDays(10),
            'payment_method' => 'bank_transfer',
            'vendor' => 'Fashion Wholesale Ltd',
        ]);
    }
}
