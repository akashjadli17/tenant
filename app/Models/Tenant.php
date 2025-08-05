<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Property;
use App\Models\Unit;
class Tenant extends Model
{
    
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'phone_number', 'total_family_member', 'profile',
        'country', 'state', 'city', 'zip_code', 'address',
        'property_id', 'unit_id', 'lease_start_date', 'lease_end_date'
    ];

    protected $hidden = ['password'];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function documents()
    {
        return $this->hasMany(TenantDocument::class);
    }

    protected $casts = [
        'lease_start_date' => 'date',
        'lease_end_date' => 'date',
    ];

}
