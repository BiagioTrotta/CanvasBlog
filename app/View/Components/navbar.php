<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class navbar extends Component
{
    public $nav;

    public function __construct()
    {
        //
    }

    public function render(): View|Closure|string
    {
        $this->nav =
            [
                route('homepage') => 'Home',
                route('pokedex.pokemon') => 'Pokedex',
            ];
        return view('components.navbar');
    }
}
