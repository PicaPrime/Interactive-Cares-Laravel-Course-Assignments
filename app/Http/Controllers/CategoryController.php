<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index(){
        $categories = Category::paginate(10);
        return view('category.index', compact('categories'));
    }
    public function create(){
        $categories = Category::all();
        return view('category.create', [
            'categories' => $categories
        ]);
    }


    public function store(Request $request){
        dump($request->all());
        $validated = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|alpha_dash|unique:categories,slug',
            'category_id' => 'nullable|exists:categories,id',
            'description' => 'required|string',
        ]);
        // dd($request->all());
        // dd($validated);

        Category::create($validated);

        return redirect()->route('category.index')->with('success', 'Category created successfully!');
    }


    public function show(Category $category){
        $posts = $category->posts()->paginate(10);
        $childCategories = $category->children;  
        return view('category.show', compact('category', 'posts', 'childCategories'));
    }
}
