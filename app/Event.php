<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'image',
        'plan',
        'slug',
        'description',
        'location',
        'start_date',
        'end_date',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getPlanAttribute($value)
    {
        return ucwords($value);
    }

    public function getDescriptionAttribute($value)
    {
        return ucfirst($value);
    }

    public function getLocationAttribute($value)
    {
        return ucwords($value);
    }
}
