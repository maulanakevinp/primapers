<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Utility extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'photo1','photo2','photo3','photo4','photo5','photo6','header','color',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
