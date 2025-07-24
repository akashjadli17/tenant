<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $fillable = ['name'];

    public function topCategories()
    {
        return $this->hasMany(TopCategory::class);
    }
}
