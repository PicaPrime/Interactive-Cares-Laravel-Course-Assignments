@extends('components.layout.withoutNav')

<x-slot:title>
    Create Post
</x-slot:title>

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md mb-8 max-w-3xl mx-auto">
        <h2 class="text-xl font-bold mb-4 text-gray-800">Create New Post</h2>
        <form action={{ route('posts.store') }} method="POST" class="space-y-6">
            @csrf
            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title <span
                        class="text-red-500">*</span></label>
                <input type="text" id="title" name="title" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                    value="{{ $post->title }}">
                @error('title')
                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Content -->
            <div>
                <label for="content" class="block text-sm font-medium text-gray-700">Description <span
                        class="text-red-500">*</span></label>
                <textarea id="content" name="content" required rows="4" value="{{ $post->content }}"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                @error('content')
                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                @enderror
            </div>


            <!-- Categories -->
            {{ dd($categories) }}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Categories <span class="text-red-500">*</span>
                </label>
                <div class="space-y-2">
                    @foreach ($categories as $category)
                        <label class="inline-flex items-center space-x-2">
                            <input type="checkbox" name="categories[]" 
                            {{-- value="{{ $category->id }}" --}}
                                {{-- @if (isset($post) && $post->categories->contains($category->id)) checked @endif --}}
                                class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">
                            <span class="text-gray-700">{{ $category->name }}</span>
                        </label>
                    @endforeach
                </div>
                @error('categories')
                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                @enderror
            </div>


            <!-- Submit Button -->
            <div class="text-right">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-md">
                    Create Category
                </button>
            </div>
        </form>
    </div>

    {{-- @vite('resources/js/create-category-script.js') --}}
@endsection
