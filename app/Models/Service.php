<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'gender_id',
        'top_category_id',
        'mid_category_id',
        'name',
        'image',
        'video',
        'rating',
        'price',
        'duration',
        'highlight_points',
        'overview',
        'how_it_works',
        'faqs',
        'action',
    ];

    protected $casts = [
        'how_it_works' => 'array',
        'faqs' => 'array',
    ];

public function midCategory()
{
    return $this->belongsTo(MidCategory::class);
}


    // ✅ TopCategory via MidCategory
    public function topCategory()
    {
        return $this->hasOneThrough(
            TopCategory::class,
            MidCategory::class,
            'id',                // Foreign key on mid_categories
            'id',                // Foreign key on top_categories
            'mid_category_id',   // Local key on services
            'top_category_id'    // Local key on mid_categories
        );
    }

    // ✅ Gender (via TopCategory or directly, depending on your schema)
public function gender()
{
    return $this->hasOneThrough(
        Gender::class,
        TopCategory::class,
        'id', // top_categories.id
        'id', // genders.id
        'mid_category_id', // services.mid_category_id
        'gender_id' // top_categories.gender_id
    );
}


}
