<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_type',
        'price',
        'billing_cycle',
        'currency',
        'features',
        'status'
    ];

    protected $casts = [
        'features' => 'array', // Auto decode JSON
    ];
}
