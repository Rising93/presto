<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function create()
    {
        return view('article.create');
    }

    public function showCategory(Category $category)
    {
        $articles=Article::where('category_id', $category->id)
            ->orderBy('created_at', 'desc')
            ->paginate(6);
        return view('article.category', compact('category', 'articles'));
    }

    public function showArticle(Article $article)
    {
        return view('article.show', compact('article'));
    }

    public function indexArticle()
    {
        
        $articles=Article::where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(6);
        return view('article.index', compact('articles'));

      

    }

}
