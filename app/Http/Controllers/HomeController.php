<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = 'Home';
        $articles = Article::orderBy('id', 'desc')->paginate(15);
        return view('home', compact('title', 'articles'));
    }
}
