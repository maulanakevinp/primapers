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

    public static function search($search)
    {
        return DB::table('articles')
            ->join('subcategories', 'subcategories.id', '=', 'articles.subcategory_id')
            ->join('categories', 'categories.id', '=', 'subcategories.category_id')
            ->where('articles.title', 'like', '%' . $search . '%')
            ->orwhere('articles.caption', 'like', '%' . $search . '%')
            ->orwhere('articles.description', 'like', '%' . $search . '%')
            ->orwhere('categories.category', 'like', '%' . $search . '%')
            ->orwhere('subcategories.sub_category', 'like', '%' . $search . '%')
            ->orderBy('articles.id', 'desc')->paginate(15);
    }
}
