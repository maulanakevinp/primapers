<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sub_category_id', 'title', 'description', 'caption', 'photo'
    ];

    public function subcategories()
    {
        return $this->belongsTo('App\Category');
    }
}
