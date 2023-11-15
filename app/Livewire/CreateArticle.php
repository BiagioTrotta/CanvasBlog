<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class CreateArticle extends Component
{
    use WithFileUploads;

    public $article;
    public $title;
    public $description;
    public $image;  // Aggiunto campo per il caricamento dell'immagine
    public $body;
    public $isAccepted = false;

    protected $rules = [
        'title' => 'required|max:50',
        'description' => 'required|max:150',
        'image' => 'nullable|image|max:1024',  // Aggiunto il supporto per il caricamento di immagini (max size 1MB)
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
            'image' => $this->uploadImage($this->article->id),
            'body' => $this->body,
            'is_accepted' => $this->isAccepted,
        ]);

        session()->flash('success', 'Article modified successfully.');
    } else {
        $newArticle = Article::create([
            'user_id' => auth()->id(),
            'title' => $this->title,
            'description' => $this->description,
            'body' => $this->body,
            'is_accepted' => $this->isAccepted,
        ]);

        // Recupera l'id dell'articolo appena creato
        $articleId = $newArticle->id;

        $newArticle->update([ 'image' => $this->uploadImage($articleId), ]);

        session()->flash('success', 'Article created successfully.');
    }

    $this->newArticle();
    $this->dispatch('loadArticles');
}

    private function uploadImage($articleId = null)
    {
        if ($this->image) {
        $articleFolder = $articleId ? "{$articleId}" : uniqid();
        $imageName = 'img_article.jpg'; 

        return $this->image->storeAs("public/images/images_articles/{$articleFolder}", $imageName);
    }

    return null;
    }


    public function mount()
    {
        $this->newArticle();
    }

    public function newArticle()
    {
        $this->article = null;
        $this->title = '';
        $this->description = '';
        $this->image = null;
        $this->body = '';
        $this->isAccepted = false;
    }

    public function editArticle($article_id)
    {
        $this->article = Article::find($article_id);
        $this->title = $this->article->title;
        $this->description = $this->article->description;
        $this->body = $this->article->body;
        $this->isAccepted = $this->article->is_accepted;
    }

    public function render()
    {
        return view('livewire.create-article');
    }
}
