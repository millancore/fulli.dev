<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\FormularioController;


Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/list/{id}', [ListController::class, 'show'])->name('list.show');
Route::get('/create', [FormularioController::class, 'create'])->name('form.create');
Route::post('/create', [FormularioController::class, 'store'])->name('form.store');
