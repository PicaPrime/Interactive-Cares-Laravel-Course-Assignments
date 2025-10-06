<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Category::class, 'category');
    }


    public function index(Request $request)
    {
        $query = Category::with('parent');

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('slug', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $categories = $query->paginate(10);

        return view('category.index', compact('categories'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('category.create', [
            'categories' => $categories
        ]);
    }

    public function edit(Category $category)
    {
        $categories = Category::all();

        return view('category.edit', [
            'category' => $category,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'slug' => "required|alpha_dash|unique:categories,slug,{$category->id}",
            'category_id' => 'nullable|exists:categories,id',
            'description' => 'nullable|string',
        ]);


        $category->update($validated);

        return redirect()->route('categories.index')->with('success', 'Category Updated Successfully');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|alpha_dash|unique:categories,slug',
            'category_id' => 'nullable|exists:categories,id',
            'description' => 'nullable|string',
        ]);

        Category::create($validated);

        return redirect()->route('categories.index')->with('success', 'Category created successfully!');
    }


    public function show(Category $category)
    {
        $posts = $category->posts()->paginate(10);
        $childCategories = $category->children;
        return view('category.show', compact('category', 'posts', 'childCategories'));
    }


    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('message', 'Category Deleted Successfully');
    }
}
