<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'heading',
        'slug',
        'image',
        'author',
        'short_description',
        'description',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'status',
    ];
}
?>
