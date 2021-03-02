<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'image',
        'content',
        'category_id',
    ];

    public function getTitleAttribute($value)
    {
        return ucwords($value);
    }

    public function getContentAttribute($value)
    {
        return ucfirst($value);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
