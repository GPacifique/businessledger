<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Determine if the user can view any staff members.
     */
    public function viewAny(User $user): bool
    {
        return in_array($user->role, ['business_admin', 'system_admin']);
    }

    /**
     * Determine if the user can view the staff member.
     */
    public function view(User $user, User $model): bool
    {
        // System admin can view anyone
        if ($user->role === 'system_admin') {
            return true;
        }

        // Business admin can view staff in their business
        return $user->role === 'business_admin' && $user->business_id === $model->business_id;
    }

    /**
     * Determine if the user can create staff members.
     */
    public function create(User $user): bool
    {
        return in_array($user->role, ['business_admin', 'system_admin']);
    }

    /**
     * Determine if the user can update the staff member.
     */
    public function update(User $user, User $model): bool
    {
        // System admin can update anyone
        if ($user->role === 'system_admin') {
            return true;
        }

        // Business admin can update staff in their business (but not themselves or other admins)
        return $user->role === 'business_admin'
            && $user->business_id === $model->business_id
            && $model->role !== 'business_admin'
            && $model->role !== 'system_admin';
    }

    /**
     * Determine if the user can delete the staff member.
     */
    public function delete(User $user, User $model): bool
    {
        // System admin can delete anyone except themselves
        if ($user->role === 'system_admin') {
            return $user->id !== $model->id;
        }

        // Business admin can delete staff in their business (but not themselves or other admins)
        return $user->role === 'business_admin'
            && $user->business_id === $model->business_id
            && $model->role !== 'business_admin'
            && $model->role !== 'system_admin'
            && $user->id !== $model->id;
    }
}
