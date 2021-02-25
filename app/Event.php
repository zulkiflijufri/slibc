<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'image',
        'plan',
        'description',
        'location',
        'start_date',
        'end_date',
    ];
}
