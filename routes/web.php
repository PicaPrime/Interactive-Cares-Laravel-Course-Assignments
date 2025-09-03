<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UselessController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/posts/category-wise', [PostController::class, 'postAccordingToCategory'])->name('posts.categoryWise');
Route::resource('posts', PostController::class);



Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/{category}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/create', [CategoryController::class, 'store'])->name('category.store');
Route::post('/category/{category}', [CategoryController::class, 'delete'])->name('category.destroy');


Route::get('/user', [UselessController::class, 'user'])->name('user');
Route::get('/login', [UselessController::class, 'login'])->name('login');
Route::get('/register', [UselessController::class, 'register'])->name('register');
Route::get('/blog', [UselessController::class, 'singleBlog'])->name('blog');
Route::get('/categories', [UselessController::class, 'categories'])->name('categories');


