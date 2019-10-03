<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'photo', 'vision', 'mision', 'history', 'about'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
