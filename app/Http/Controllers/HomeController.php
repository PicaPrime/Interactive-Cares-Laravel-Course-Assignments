<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        // $featuredPosts = Post::oldest()->take(3);
        $featuredPosts = Post::with('category')->oldest()->take(3);
        $recentPosts = Post::with('category')->latest()->take(3);

        $categories = Category::withCount('posts')->get();

        return view('index', [
            'featuredPosts' => $featuredPosts,
            'recentPosts' => $recentPosts,
            'categories' => $categories,
        ]);
    }
}
