<?php

namespace App\Policies;

use App\Models\Bill;
use App\Models\User;

class BillPolicy
{
    public function viewAny(User $user): bool
    {
        return in_array($user->role, ['business_admin', 'accountant', 'seller']);
    }

    public function view(User $user, Bill $bill): bool
    {
        return $user->business_id === $bill->business_id && 
               in_array($user->role, ['business_admin', 'accountant', 'seller']);
    }

    public function create(User $user): bool
    {
        return in_array($user->role, ['business_admin', 'accountant']) && $user->business_id;
    }

    public function update(User $user, Bill $bill): bool
    {
        return $user->business_id === $bill->business_id && 
               in_array($user->role, ['business_admin', 'accountant']) &&
               $bill->status !== 'paid';
    }

    public function delete(User $user, Bill $bill): bool
    {
        return $user->business_id === $bill->business_id && 
               in_array($user->role, ['business_admin', 'accountant']) &&
               $bill->status === 'draft';
    }
}
