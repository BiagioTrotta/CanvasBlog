<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;


class CreateArticle extends Component
{
    public $article;
    public $title;
    public $description;
    public $image;
    public $body;
    public $isAccepted = false;

    protected $rules = [
        'title' => 'required|max:50',
        'description' => 'required|max:150',
        'image' => 'nullable|max:250',
        'body' => 'required',
        'isAccepted' => 'boolean',
    ];

    protected $messages = [
        // Aggiungi eventuali messaggi personalizzati per la validazione
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    protected $listeners = [
        'editArticle'
    ];

    public function createArticle()
    {
        $this->validate();

        if ($this->article) {
            $this->article->update([
                'title' => $this->title,
                'description' => $this->description,
                'image' => $this->image,
                'body' => $this->body,
                'is_accepted' => $this->isAccepted,
            ]);

            session()->flash('success', 'Articolo modificato con successo.');
        } else {
            Article::create([
                'title' => $this->title,
                'description' => $this->description,
                'image' => $this->image,
                'body' => $this->body,
                'is_accepted' => $this->isAccepted,
            ]);

            session()->flash('success', 'Articolo creato con successo.');
        }

        $this->newArticle();
        $this->dispatch('loadArticles');
    }

    public function mount()
    {
        $this->newArticle();
    }

    public function newArticle()
    {
        $this->article = '';
        $this->title = '';
        $this->description = '';
        $this->image = '';
        $this->body = '';
        $this->isAccepted = false;
    }

    public function editArticle($article_id)
    {
        $this->article = Article::find($article_id);
        $this->title = $this->article->title;
        $this->description = $this->article->description;
        $this->image = $this->article->image;
        $this->body = $this->article->body;
        $this->isAccepted = $this->article->is_accepted;
    }

    public function render()
    {
        return view('livewire.create-article');
    }
}
