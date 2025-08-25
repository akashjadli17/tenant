<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'package_type',
        'price',
<<<<<<< HEAD
        'interval',
        'interval_count',
        'auto_renews',
        'trial_days',
        'total_cycles',
=======
>>>>>>> 5020873c18cec238c14327fd31a614a8599b6212
        'billing_cycle',
        'currency',
        'features',
        'status'
    ];

    protected $casts = [
<<<<<<< HEAD
        'features'       => 'array',
        'auto_renews'    => 'boolean',
        'interval_count' => 'integer',
        'trial_days'     => 'integer',
        'total_cycles'   => 'integer',
=======
        'features' => 'array', // Auto decode JSON
>>>>>>> 5020873c18cec238c14327fd31a614a8599b6212
    ];
}
