<?php

namespace App\Policies;

use App\Models\Expense;
use App\Models\User;

class ExpensePolicy
{
    /**
     * Determine if the user can view any expenses.
     */
    public function viewAny(User $user): bool
    {
        return $user->business_id !== null;
    }

    /**
     * Determine if the user can view the expense.
     */
    public function view(User $user, Expense $expense): bool
    {
        return $user->business_id === $expense->business_id;
    }

    /**
     * Determine if the user can create expenses.
     */
    public function create(User $user): bool
    {
        return $user->business_id !== null;
    }

    /**
     * Determine if the user can update the expense.
     */
    public function update(User $user, Expense $expense): bool
    {
        return $user->business_id === $expense->business_id;
    }

    /**
     * Determine if the user can delete the expense.
     */
    public function delete(User $user, Expense $expense): bool
    {
        return $user->business_id === $expense->business_id;
    }
}
