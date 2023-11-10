<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AdminController;


Route::get('/', [PageController::class, 'index'])->name('homepage');
Route::get('/pokedex/php', [ApiController::class, 'pokedexApiPhp'])->name('pokedex.pokemon_php');
Route::get('/pokedex/js', [ApiController::class, 'pokedexApiJs'])->name('pokedex.pokemon_js')->middleware('revisor');
Route::get('/create_user', [AdminController::class, 'index'])->name('admin.users')->middleware('admin');
Route::get('/create_category', [AdminController::class, 'categories'])->name('admin.categories')->middleware('admin');


