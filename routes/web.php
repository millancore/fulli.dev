<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Models\Category;


Route::get('/', [CategoryController::class, 'index'])->name('home');
Route::get('/category/{id}/articles', [CategoryController::class, 'showArticles'])->name('categories.articles');

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.list');
Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
Route::get('/create', [FormularioController::class, 'create'])->name('form.create');
Route::post('/create', [FormularioController::class, 'store'])->name('form.store');
Route::get('/list/{id}', [ListController::class, 'show'])->name('list.show');
