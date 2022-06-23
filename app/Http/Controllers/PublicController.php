<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home() {
        $articles = Article::where('is_accepted', true)->take(6)->orderBy('created_at', 'desc')->get();

        return view('welcome', compact('articles'));
    }

    public function categoryShow(Category $category)
    {
        return view('categoryShow', compact('category'));
    }

    public function searchArticles(Request $request)
    {
        $articles = Article::search($request->searched)->where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(6);
        
        return view('article.index', compact('articles'));
    }

    public function setLanguage($lang)
    {
        session()->put('locale', $lang);
        return redirect()->back();
    }

    public function profile(){
        return view('profile');
    }
}
