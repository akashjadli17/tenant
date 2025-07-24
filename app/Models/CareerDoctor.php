<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerDoctor extends Model
{
    use HasFactory;

    protected $table = 'career_doctor';

    protected $fillable = [
        'job_profile',
        'speciality',
        'experience',
        'location',
        'job_description',
        'status', 
    ];
}
