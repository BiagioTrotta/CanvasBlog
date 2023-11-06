<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class navbar extends Component
{
    public $nav;
    public $nav2;
    public function __construct()
    {
        //
    }

    public function render(): View|Closure|string
    {
        $this->nav =
            [
                route('homepage') => 'Home',
            ];
        $this->nav2 =
        [
            route('pokedex.pokemon_php') => 'Pokedex_PHP',
            route('pokedex.pokemon_js') => 'Pokedex_JS',
        ];
        return view('components.navbar');
    }
}
