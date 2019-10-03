<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'sub_category'
    ];

    public function categories()
    {
        return $this->belongsTo('App\Category');
    }

    public function articles()
    {
        return $this->hasMany('App\Article');
    }
}
