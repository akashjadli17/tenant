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
     * Mass assignable attributes.
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
        'package_started_at',   // added
        'package_renews_at',    // added
        'package_expires_at',
    ];

    /**
     * Attributes hidden for arrays.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Attribute casting.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at'   => 'datetime',
            'package_started_at'  => 'datetime', // added
            'package_renews_at'   => 'datetime', // added
            'package_expires_at'  => 'datetime',
            'password'            => 'hashed',
        ];
    }

    /* =========================
     |  Relationships
     |=========================*/
    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }

    /* =========================
     |  Helpers / Accessors
     |=========================*/

    // role check
    public function isAdmin(): bool
    {
        return $this->user_type === 'admin';
    }

    public function hasPackage(): bool
    {
        return !is_null($this->package_id);
    }

    /**
     * Days until the package expires.
     * Returns:
     *   null -> unknown (no expiry date)
     *   0    -> already expired (or expires today)
     *   >0   -> days remaining
     *   <0   -> days in the past (shouldn't happen if you clamp to 0 in UI)
     */
    public function daysUntilPackageExpires(): ?int
    {
        if (is_null($this->package_expires_at)) {
            return null;
        }

        return now()->diffInDays($this->package_expires_at, false);
    }

    /**
     * Whether to show the package chooser on dashboard.
     * True when:
     *  - user never chose a package, or
     *  - expiry date missing, or
     *  - already expired, or
     *  - within N days of expiring
     */
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
