<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\WatchController;

Auth::routes();
Route::get('/', [
    IndexController::class,'home'
])->name('homepage');

Route::get('/danh-muc/{id}', [
    IndexController::class,'category'
])->name('category');

Route::get('/the-loai/{id}', [
    IndexController::class,'genre'
])->name('genre');

Route::get('/phim/{id}', [
    IndexController::class,'movie'
])->name('movie');

Route::get('/xem-phim/{id}', [
    IndexController::class,'watch'
])->name('watch');

Route::get('/search',[
    IndexController::class,'search'
])->name('search');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//route admin

Route::resource('/category', CategoryController::class);
Route::resource('/genre', GenreController::class);
Route::resource('/movie', MovieController::class);

