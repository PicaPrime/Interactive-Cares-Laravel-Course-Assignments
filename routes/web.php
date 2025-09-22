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
})->middleware('auth')->name('dashboard');


Route::middleware('auth')->group(function (){
    Route::resource('posts', PostController::class);
    Route::patch('posts/{post}/publish', [PostController::class, 'publish'])->name('posts.publish');
});

Route::get('/categories', [UselessController::class, 'categories'])->name('categories');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/{category}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/create', [CategoryController::class, 'store'])->name('category.store');
Route::post('/category/{category}', [CategoryController::class, 'delete'])->name('category.destroy');

require __DIR__.'/auth.php';



