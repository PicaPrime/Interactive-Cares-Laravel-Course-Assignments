<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    use AuthorizesRequests;

    public function index(Request $request)
    {
        $this->authorize('viewAny', Post::class);

        $query = Post::with('category')->latest();

        // apply text search on title or slug
        if($search = $request->query('search')){
            $query->where(function($q) use ($search){
                $q->where('title', 'like', '%{$search}%')
                ->orWhere('slug', 'like', '%{$search}%');
            });    
        }

        // apply category filter
        if ($categoryId = $request->query('category_id')) {
            $query->where('category_id', $categoryId);
        }

        $posts = $query->paginate(10)->withQueryString();

        $categories = Category::all();

        return view('post.index', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        $categories = Category::all();
        return view('post.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:posts,slug',
            'content' => 'required|string',
            'category_id' => 'nullable|exists:categories,id',
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png,gif|max:2024',
            'status' => 'required|in:draft,published',
        ]);

        // dd($validated);

        // Alternative: Store with custom name
        // $file = $request->file('thumbnail');
        // $filename = time() . '_' . $file->getClientOriginalName();
        // $thumbnailPath = $file->storeAs('thumbnails', $filename, 'public');

        $imageName = time() . '.' . $request->thumbnail->extension();
        $thumbnailPath = $request->file('thumbnail')->storeAs('thumbnails', $imageName, 'public');

        Post::create([
            'title' => $validated['title'],
            'user_id' => Auth::user()->id,
            'slug' => $validated['slug'],
            'content' => $validated['content'],
            'category_id' => $validated['category_id'],
            'thumbnail' => $thumbnailPath,
            'status' => $validated['status'] ?? 'draft',
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $this->authorize('view', $post);

        $categories = Category::with('posts')->get();

        $relatedPosts = $post->category->posts()->take(2)->get();

        // dd($relatedPosts);

        $popularPosts = Post::take(3)->get();

        return view('post.show', compact('post', 'categories', 'relatedPosts', 'popularPosts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        $categories = Category::all();
        $postCategoryIds = $post->categories->pluck('id')->toArray();
        // dd($categories);
        // dd($postCategoryIds);
        return view('post.edit', compact('post', 'categories', 'postCategoryIds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post->update($validated);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }

    public function postAccordingToCategory()
    {
        $categories = Category::with('posts')->get();
        return view('post.postsAccordingToCategory', compact('categories'));
    }

    public function publish(Post $post)
    {
        $post->update(['status' => 'published']);
        return redirect()->back()->with('success', 'Post published successfully.');
    }

    public function unPublish(Post $post)
    {
        $post->update(['status' => 'draft']);
        return redirect()->back()->with('success', 'Post unpublished successfully.');
    }
}
