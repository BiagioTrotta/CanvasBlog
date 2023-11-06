<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ApiController;


Route::get('/', [PageController::class, 'index'])->name('homepage');
Route::get('/pokedex', [ApiController::class, 'pokedexApiPhp'])->name('pokedex.pokemon');
