<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LoginController;
use App\Models\Category;
use App\Models\Admin;
use App\Models\Article;
use Illuminate\Support\Facades\Hash;

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/article/{id}',[ArticleController::class, 'show'])->name('article.show');

Route::get('/list/{id}', [ListController::class, 'show'])->name('list.show');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');



Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/create', [FormularioController::class, 'create'])->name('form.create');
    Route::post('/create', [FormularioController::class, 'store'])->name('form.store');
    Route::get('/articles', [CategoryController::class, 'index'])->name('articles.list');
    Route::get('/articles/{article}/edit', [FormularioController::class, 'edit'])->name('articles.edit');
    Route::put('/articles/{article}', [FormularioController::class, 'update'])->name('articles.update');
    Route::delete('/articles/{article}', [FormularioController::class, 'destroy'])->name('articles.destroy');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});