<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticlesController extends Controller
{
    public function index()
    {
        $title = 'Articles';
        $articles = Article::where('is_accepted', true)->get();
        return view('articles.index', compact('articles','title'));
    }

    public function show(Article $article)
{
    if(auth()->user()->isAdmin || auth()->id() == $article->user_id || $article->is_accepted) {
        $title = $article->title;
        return view('articles.show', compact('article', 'title'));
    } else {
        return abort(403, 'Unauthorized');
    }
}

    public function status()
    {
        $title = 'Articles Status';
        return view('admin.status', compact('title')); 
    }
}
