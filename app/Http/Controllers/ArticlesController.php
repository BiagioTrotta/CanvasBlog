<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticlesController extends Controller
{
    public function index()
    {
        $title = 'Articles';
        $articles = Article::all();
        return view('articles.index', compact('articles','title'));
    }

    public function show(Article $article)
    {
        $title = $article->title;
        return view('articles.show', compact('article', 'title'));
    }

    public function status()
    {
        $title = 'Articles Status';
        return view('admin.status', compact('title')); 
    }
}
