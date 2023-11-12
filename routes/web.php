<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\ArticlesController;

Route::get('/', [PageController::class, 'index'])->name('homepage');

Route::get('/articles', [ArticlesController::class, 'index'])->name('articles.index');
Route::get('/articles/{article}', [ArticlesController::class, 'show'])->name('articles.show');

//Route Api
Route::get('/pokedex/php', [ApiController::class, 'pokedexApiPhp'])->name('pokedex.pokemon_php');
Route::get('/pokedex/js', [ApiController::class, 'pokedexApiJs'])->name('pokedex.pokemon_js')->middleware('revisor');
Route::get('/api/people', [ApiController::class, 'peopleApi'])->name('api.people');

//Route Livewire Create
Route::get('/create_user', [AdminController::class, 'index'])->name('admin.users')->middleware('admin');
Route::get('/create_category', [AdminController::class, 'categories'])->name('admin.categories')->middleware('admin');
Route::get('/create_article', [AdminController::class, 'articles'])->name('admin.articles')->middleware('auth');


//Sezione socialite
Route::get('auth/google', [GoogleController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleController::class, 'callbackGoogle']);
