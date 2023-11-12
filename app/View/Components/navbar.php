<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class navbar extends Component
{
    public $nav;
    public $nav2;
    public $nav3;

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
        ];
        return view('components.navbar');
    }
}
