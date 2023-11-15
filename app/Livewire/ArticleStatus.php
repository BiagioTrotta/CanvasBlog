<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class ArticleStatus extends Component
{
    public $articles;

    public function mount()
    {
        $this->articles = Article::all();
    }

    public function toggleStatus($articleId)
    {
        $article = Article::find($articleId);

        if ($article) {
            $article->update([
                'is_accepted' => $article->is_accepted === true ? null : true,
            ]);
        }

        $this->articles = Article::all(); // Aggiorna la lista degli articoli dopo la modifica
    }

    public function render()
    {
        return view('livewire.article-status');
    }
}
