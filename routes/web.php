<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UselessController;
use App\Http\Controllers\PostController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth', 'verified')->name('dashboard');



Route::middleware('auth')->group(function (){
    Route::get('posts/category', [PostController::class, 'postAccordingToCategory'])->name('posts.category');

    Route::resource('posts', PostController::class);
    
    Route::patch('posts/{post}/publish', [PostController::class, 'publish'])->name('posts.publish');
    
    Route::resource('categories', CategoryController::class);
});


require __DIR__.'/auth.php';



