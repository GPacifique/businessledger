<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'business_id',
        'account_status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function incomes()
    {
        return $this->hasMany(Income::class, 'created_by');
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class, 'created_by');
    }

    public function isSystemAdmin(): bool
    {
        return $this->role === 'system_admin';
    }

    public function isBusinessAdmin(): bool
    {
        return $this->role === 'business_admin';
    }

    /**
     * Alias for isBusinessAdmin for backward compatibility
     */
    public function isShopAdmin(): bool
    {
        return $this->isBusinessAdmin();
    }

    public function isManager(): bool
    {
        return $this->role === 'manager';
    }

    public function isSeller(): bool
    {
        return $this->role === 'seller';
    }

    public function isAccountant(): bool
    {
        return $this->role === 'accountant';
    }
    public function businesses()
{
    return $this->belongsToMany(Business::class);
}
}
