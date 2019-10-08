<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\Article;
use App\Profile;
use App\Utility;
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
        $utility = Utility::find(1);
        $profile = Profile::find(1);
        $articles = Article::orderBy('id', 'desc')->paginate(15);
        $announcements = Announcement::all();
        return view('home', compact('title', 'articles', 'utility', 'profile', 'announcements'));
    }

    public function search(Request $request)
    {
        $title = 'Cari';
        $request->validate([
            'search' => 'required'
        ]);
        $search = $request->search;
        $articles = Article::search($search);
        return view('search', compact('title', 'search', 'articles'));
    }

    public function about()
    {
        $profile = Profile::find(1);
        $title = 'Tentang Kami';
        return view('profile.show', compact('title', 'profile'));
    }
}
