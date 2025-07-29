<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UselessController;

Route::get('/', function () {
    return view('index');
})->name('home');






Route::get('/user', [UselessController::class, 'user'])->name('user');
Route::get('/login', [UselessController::class, 'login'])->name('login');
Route::get('/register', [UselessController::class, 'register'])->name('register');
Route::get('/blog', [UselessController::class, 'singleBlog'])->name('blog');
Route::get('/categories', [UselessController::class, 'categories'])->name('categories');
