<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{

    protected $fillable = [
        'type', 'name', 'description', 'thumbnail',
        'country', 'state', 'city', 'zip_code', 'address', 'added_by', 'owner_id'
    ];


    public function units() {
        return $this->hasMany(Unit::class);
    }

    public function images() {
        return $this->hasMany(PropertyImage::class);
    }

    public function owner()     { return $this->belongsTo(User::class, 'owner_id'); }
    public function creator()   { return $this->belongsTo(User::class, 'added_by'); }
}