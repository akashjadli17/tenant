<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class User extends Authenticatable
{
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
        'phone',
        'gender',
        'profile_image',
        'user_type',
        'package_id',
        'package_expires_at',
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
            'package_expires_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }

    // 🔹 Helper: check role
    public function isAdmin()
    {
        return $this->user_type === 'admin';
    }


    public function hasPackage(): bool
    {
        return !is_null($this->package_id);
    }

    public function daysUntilPackageExpires(): ?int
    {
        if (is_null($this->package_expires_at)) {
            return null; // unknown
        }

        // Negative if already expired
        return now()->diffInDays($this->package_expires_at, false);
    }

    
    public function shouldSeePackageChooser(int $withinDays = 10): bool
    {
        if (!$this->hasPackage()) {
            return true;
        }

        if (is_null($this->package_expires_at)) {
            return true;
        }

        if ($this->package_expires_at->isPast()) {
            return true;
        }

        return $this->package_expires_at->lte(now()->addDays($withinDays));
    }

}