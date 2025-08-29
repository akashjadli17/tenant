<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'package_type',
        'price',
        'interval',
        'interval_count',
        'auto_renews',
        'trial_days',
        'total_cycles',
        'billing_cycle',
        'currency',
        'features',
        'status'
    ];

    protected $casts = [
        'features'       => 'array',
        'auto_renews'    => 'boolean',
        'interval_count' => 'integer',
        'trial_days'     => 'integer',
        'total_cycles'   => 'integer',
    ];

    // Always encode array before saving
    public function setFeaturesAttribute($value)
    {
        $this->attributes['features'] = is_array($value) ? json_encode($value) : $value;
    }

    // Always decode JSON when retrieving
    public function getFeaturesAttribute($value)
    {
        return json_decode($value, true) ?? [];
    }
}