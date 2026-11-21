<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Schema;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'age',
        'address',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
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

    const ROLE_PASIEN = 'pasien';
    const ROLE_PERAWAT = 'perawat';
    const ROLE_ADMIN = 'admin';

    public function isPasien()
    {
        try {
            if (!Schema::hasColumn('users', 'role')) {
                return true;
            }
            return $this->role === self::ROLE_PASIEN;
        } catch (\Exception $e) {
            return true;
        }
    }

    public function isPerawat()
    {
        try {
            if (!Schema::hasColumn('users', 'role')) {
                return false;
            }
            return $this->role === self::ROLE_PERAWAT;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function isAdmin()
    {
        try {
            if (!Schema::hasColumn('users', 'role')) {
                return false;
            }
            return $this->role === self::ROLE_ADMIN;
        } catch (\Exception $e) {
            return false;
        }
    }
}