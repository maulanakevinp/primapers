<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subcategory_id', 'title', 'description', 'caption', 'photo'
    ];

    public function subcategory()
    {
        return $this->belongsTo('App\Subcategory');
    }

    public static function getByCategory($id)
    {
        return DB::table('articles')
            ->join('subcategories', 'subcategories.id', '=', 'articles.subcategory_id')
            ->join('categories', 'categories.id', '=', 'subcategories.category_id')
            ->where('category_id', '=', $id)
            ->orderBy('articles.id', 'desc')->paginate(15);
    }
}
