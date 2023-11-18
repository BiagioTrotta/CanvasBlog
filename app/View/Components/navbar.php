<?php

namespace App\View\Components;

use Closure;
use App\Models\Article;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class navbar extends Component
{
    public $nav;
    public $nav2;
    public $nav3;

    public $countRevisior;

    public function __construct()
    {
        //
    }

    public function render(): View|Closure|string
    {
        $this->nav =
            [
                route('homepage') => 'Home',
                route('articles.index') => 'Articles',
                route('admin.articles') => 'Add Article',
            ];
        $this->nav2 =
        [
            route('pokedex.pokemon_php') => 'Pokedex_PHP',
            route('pokedex.pokemon_js') => 'Pokedex_JS',
        ];

        $this->nav3 =
        [
            route('admin.users') => 'Create User',
            route('admin.categories') => 'Create Category',
            route('admin.status') => 'Status Articles',
        ];

        return view('components.navbar');
    }
}
