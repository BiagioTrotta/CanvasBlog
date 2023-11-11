<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GoogleAuthController;

Route::get('/', [PageController::class, 'index'])->name('homepage');
Route::get('/pokedex/php', [ApiController::class, 'pokedexApiPhp'])->name('pokedex.pokemon_php');
Route::get('/pokedex/js', [ApiController::class, 'pokedexApiJs'])->name('pokedex.pokemon_js')->middleware('revisor');
Route::get('/create_user', [AdminController::class, 'index'])->name('admin.users')->middleware('admin');
Route::get('/create_category', [AdminController::class, 'categories'])->name('admin.categories')->middleware('admin');
Route::get('/create_article', [AdminController::class, 'articles'])->name('admin.articles')->middleware('admin');

Route::get('/api/people', [ApiController::class, 'peopleApi'])->name('api.people');

Route::get ('auth/google', [GoogleAuthController::class,'redirect'])->name('google-auth');
Route::get ('auth/google/call-back', [GoogleAuthController::class,'callbackGoogle'])->name('');
