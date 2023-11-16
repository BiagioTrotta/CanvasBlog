<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class ArticleList extends Component
{
    use WithPagination;

    public $articles;

    protected $listeners = [
        'loadArticles'
    ];

    public function mount()
    {
        $this->loadArticles();
    }

    public function loadArticles()
    {
        $this->articles = Article::all(); 
    }

    public function editArticle($article_id)
    {
        $this->dispatch('editArticle', $article_id);
    }

    public function deleteArticle($article_id)
    {
        $article = Article::find($article_id);
        $article->delete();
        session()->flash('success', 'Article successfully deleted.');
        $this->loadArticles();
    }

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.article-list', [
            'articoli' => Article::paginate(4),
        ]);
    }
    
}
