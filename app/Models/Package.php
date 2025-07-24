<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_type',
        'title',
        'package_image',
        'original_price',
        'discounted_price',
        'features',
        'status',
    ];

    protected $casts = [
        'features' => 'array', // Cast JSON column to array
    ];
}
