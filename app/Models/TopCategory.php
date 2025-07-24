<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopCategory extends Model
{
    protected $fillable = ['gender_id', 'name'];

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function midCategories()
    {
        return $this->hasMany(MidCategory::class);
    }
}
