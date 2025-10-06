@extends('components.layout.withoutNav')

    <x-slot:title>
        Category List
    </x-slot:title>

    @section('content')
        
       <div>
        @foreach ($categories as $category)
            <h2 class="text-2xl font-bold mb-4 text-gray-800">{{ $category->name }}</h2>
            @if ($category->posts && $category->posts->count())
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                    @foreach ($category->posts as $post)
                        <div class="bg-white shadow rounded-lg p-4">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $post->title }}</h3>
                            <p class="text-gray-700 mb-4">{{ Str::limit($post->content, 100) }}</p>
                            <a href="{{ route('posts.show', $post->id) }}"
                                class="text-blue-600 hover:text-blue-800 font-medium">Read More</a>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500 mb-8">No posts available in this category.</p>
            @endif
            
        @endforeach
       </div>

    @endsection
                    