<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListController;


Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/list/{id}', [ListController::class, 'show'])->name('list.show');
