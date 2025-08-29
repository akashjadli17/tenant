<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = [
        'property_id',
        'name',
        'bedroom',
        'kitchen',
        'bath',
        'cabins',
        'capacity',
        'size_sqft',
        'rent',
        'rent_type',
        'rent_duration',
        'deposit_type',
        'deposit_amount',
        'late_fee_type',
        'late_fee_amount',
        'incident_receipt_amount',
        'notes',
        'unit_type',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
