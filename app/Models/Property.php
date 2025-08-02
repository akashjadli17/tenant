<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{

    protected $fillable = [
        'type', 'name', 'description', 'thumbnail',
        'country', 'state', 'city', 'zip_code', 'address'
    ];


    public function units() {
        return $this->hasMany(Unit::class);
    }

    public function images() {
        return $this->hasMany(PropertyImage::class);
    }

}