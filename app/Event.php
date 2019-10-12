<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'school',
        'address',
        'latitude',
        'longitude',
        'date',
        'start_time',
        'end_time'
    ];
}
