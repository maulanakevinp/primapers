<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Artikel";
        $articles = Article::paginate(15);
        return view('article.index', compact('title', 'articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Artikel";
        $subtitle = "Add New Article";
        $categories = Category::all();
        return view('article.create', compact('title', 'subtitle', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'sub_category' => 'required',
            'category' => 'required',
            'title' => 'required',
            'caption' => 'required',
            'description' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,gif,webp|max:2048'
        ]);

        $file = $request->file('photo');
        $file_name = time() . "_" . $file->getClientOriginalName();
        $file->move(public_path('img/article'), $file_name);

        Article::create([
            'subcategory_id' => $request->sub_category,
            'title' => $request->title,
            'caption' => $request->caption,
            'description' => $request->description,
            'photo' => $file_name
        ]);

        return redirect('/article')->with('success', 'Artikel baru berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Artikel';
        $subtitle = 'Edit Article';
        $article = Article::find($id);
        $categories = Category::all();
        $sub_categories = Subcategory::where('category_id', $article->subcategory->category_id)->get();
        return view('article.edit', compact('title', 'subtitle', 'article', 'categories', 'sub_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        $request->validate([
            'sub_category' => 'required',
            'category' => 'required',
            'title' => 'required',
            'caption' => 'required',
            'description' => 'required',
            'photo' => 'image|mimes:jpeg,png,gif,webp|max:2048'
        ]);

        $file = $request->file('photo');
        $photo = $article->photo;
        if (!empty($file)) {
            $file_name = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('img/article'), $file_name);
            File::delete(public_path('img/article/' . $article->photo));
            $photo = $file_name;
        }

        Article::where('id', $id)->update([
            'subcategory_id' => $request->sub_category,
            'title' => $request->title,
            'caption' => $request->caption,
            'description' => $request->description,
            'photo' => $photo
        ]);

        return redirect('/article')->with('success', 'Artikel baru berhasil diperbarui');
    }

    public function destroy($id)
    {
        $article = Article::onlyTrashed()->where('id', $id);
        $image = DB::table('articles')->where('id', $id)->first();
        $delete = File::delete(public_path('img/article/' . $image->photo));

        if ($delete) {
            $article->forceDelete();
            return redirect('/article')->with('success', 'Artikel berhasil dihapus');
        } else {
            return redirect('/article')->with('failed', 'Artikel tidak berhasil dihapus');
        }
    }

    public function softdelete($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect('/article')->with('success', 'Artikel berhasil diarsipkan');
    }

    public function trash()
    {
        $title = 'Artikel';
        $subtitle = 'Artikel Arsip';
        $articles = Article::onlyTrashed()->get();
        return view('article.trash', compact('title', 'subtitle', 'articles'));
    }

    public function restore($id)
    {
        $article = Article::onlyTrashed()->where('id', $id);
        $article->restore();
        return redirect('/article')->with('success', 'Artikel berhasil kembalikan');
    }

    public function restoreAll()
    {
        $article = Article::onlyTrashed();
        $article->restore();
        return redirect('/article')->with('success', 'Artikel berhasil kembalikan semua');
    }

    public function show($id, $title)
    {
        $article = Article::where('id', $id)->where('title', str_replace('-', ' ', $title))->first();
        $articles = Article::where('subcategory_id', $article->subcategory_id)->get();
        if (empty($article)) {
            return abort(404, 'Not Found');
        }
        return view('article.show', compact('article', 'articles'));
    }

    public function showByCategory($id, $title)
    {
        $category = Category::where('id', $id)->where('category', str_replace('-', ' ', $title))->first();
        $articles = Article::getByCategory($id);
        if (empty($category)) {
            return abort(404, 'Not Found');
        }
        return view('article.show-category', compact('category', 'articles'));
    }

    public function showBySubcategory($id, $title)
    {
        $subcategory = Subcategory::where('id', $id)->where('sub_category', str_replace('-', ' ', $title))->first();
        $articles = Article::where('subcategory_id', $id)->paginate(15);
        if (empty($subcategory)) {
            return abort(404, 'Not Found');
        }
        return view('article.show-subcategory', compact('subcategory', 'articles'));
    }
}
