<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'url',
        'image',
        'description',
        'school',
        'address',
        'latitude',
        'longitude',
        'date',
        'start_time',
        'end_time'
    ];

    /**
     * Get the post that owns the comment.
     */
    public function user() {
        return $this->belongsTo('App\User');
    }
}
