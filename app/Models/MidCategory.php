<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MidCategory extends Model
{
    protected $fillable = ['top_category_id', 'name', 'image'];

    public function topCategory()
    {
        return $this->belongsTo(TopCategory::class);
    }

    public function lowCategories()
    {
        return $this->hasMany(LowCategory::class);
    }
}
