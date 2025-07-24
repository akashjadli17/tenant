<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

   protected $fillable = ['name', 'price', 'max_data_mb', 'max_properties', 'duration_months', 'is_active'];

    protected $casts = [
        
    ];
}
