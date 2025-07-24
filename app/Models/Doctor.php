<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    // Specify the table name if it's not the plural of the model name
    protected $table = 'doctor_details';

    // Allow mass assignment for these fields
    protected $fillable = [
        'image',
        'dr_name',
        'dr_introduction',
        'phone',
        'email',
        'speciality',
        'experience',
        'degree',
    ];
}
