@extends('components.layout.layout')

    <x-slot:title>
        {{ $category->name }} | Category
    </x-slot>
<!-- Header/Navigation -->
    
    @section('content')


        <!-- Main Content -->
        <!-- Page Header with Search -->
    <section class="bg-gradient-to-r from-blue-500 to-purple-600 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-6 md:mb-0">
                    <h2 class="text-3xl md:text-4xl font-bold mb-2">{{ $category->name }}</h2>
                    <p class="text-lg">{{ $category->description }}</p>
                </div>
                
                <div class="w-full md:w-auto">
                    <div class="relative">
                        <input type="text" placeholder="Search in {{ $category->name }}..." 
                               class="w-full md:w-64 lg:w-96 px-4 py-3 rounded-md text-gray-800 pr-10">
                        <button class="absolute right-3 top-3 text-gray-500 hover:text-blue-600">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Breadcrumbs -->
    <div class="container mx-auto px-4 py-4">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                        <i class="fas fa-home mr-2"></i>
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                        <a href="#" class="ml-1 md:ml-2 text-sm font-medium text-gray-700 hover:text-blue-600">Categories</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                        <span class="ml-1 md:ml-2 text-sm font-medium text-blue-600">{{ $category->name }}</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8 flex flex-col lg:flex-row gap-8">
        <!-- Articles Section -->
        <main class="lg:w-2/3">
            <!-- Category Filters -->
            <div class="bg-white rounded-lg shadow p-4 mb-6">
                <div class="flex flex-wrap gap-2">
                    <button class="bg-blue-600 text-white px-3 py-1 rounded-full text-sm">All</button>
                    @foreach ($childCategories as $childCategory)
                        <a href={{ route('category.show', $childCategory->id) }}><button class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm hover:bg-gray-200 transition">{{ $childCategory->name }}</button></a>
                    @endforeach
                    
                    
                </div>
            </div>

            <!-- Sort Options -->
            <div class="flex justify-between items-center mb-6">
                <p class="text-gray-600">Showing 12 of 48 articles</p>
                <div class="flex items-center">
                    <span class="text-gray-600 mr-2">Sort by:</span>
                    <select class="border rounded-md px-3 py-1 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option>Newest First</option>
                        <option>Oldest First</option>
                        <option>Most Popular</option>
                        <option>Most Comments</option>
                    </select>
                </div>
            </div>

            <!-- Article List -->
            <div class="space-y-6">
                @foreach ($category->posts as $post)
                    <article class="bg-white rounded-lg shadow-md hover:shadow-lg transition overflow-hidden flex flex-col md:flex-row">
                    <img src="https://placehold.co/480x200/png" 
                         alt={{ $category->name }} 
                         class="md:w-1/3 h-48 md:h-auto object-cover">
                    <div class="p-6 md:w-2/3">
                        <div class="flex items-center text-sm text-gray-500 mb-2">
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-md text-xs">{{ $category->name }}</span>
                            <span class="mx-2">•</span>
                            <span>{{ $post->created_at->format('Y-m-d') }}</span>
                            <span class="mx-2">•</span>
                            <span>5 min read</span>
                        </div>
                        <h3 class="text-xl font-bold mb-2 text-gray-800">{{ $post->title }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($post->content, 100, '...') }}</p>
                        <div class="flex justify-between items-center">
                            <div class="flex space-x-2">
                                @foreach ($post->categories as $postCategory)
                                    <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded-md text-xs">#{{ $postCategory->name }}</span>
                                @endforeach
                            </div>
                            <a href={{ route('posts.show', $post->id) }} class="text-blue-600 font-medium hover:text-blue-800 transition">Read More</a>
                        </div>
                    </div>
                </article>
                @endforeach
                

            {{ $posts->links() }}
        </main>
        
        <!-- Sidebar -->
        <aside class="lg:w-1/3 space-y-8">
            <!-- About Widget -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-xl font-bold mb-4 text-gray-800">About Web Development</h3>
                <p class="text-gray-600 mb-4">Web Development covers everything from frontend frameworks to backend technologies, performance optimization, and the latest web standards.</p>
                <button class="text-blue-600 font-medium hover:text-blue-800 transition">
                    Read More <i class="fas fa-arrow-right ml-1"></i>
                </button>
            </div>
            
            <!-- Popular Posts -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-xl font-bold mb-4 text-gray-800">Popular in Web Dev</h3>
                <div class="space-y-4">
                    <!-- Post 1 -->
                    <div class="flex items-start">
                        <img src="https://placehold.co/480x200/png" 
                             alt="Web Development" 
                             class="w-16 h-16 object-cover rounded-md mr-3">
                        <div>
                            <h4 class="font-medium text-gray-800">Future of Web Development</h4>
                            <p class="text-sm text-gray-500">May 15, 2023 • 1.2K views</p>
                        </div>
                    </div>
                    
                    <!-- Post 2 -->
                    <div class="flex items-start">
                        <img src="https://placehold.co/480x200/png" 
                             alt="React" 
                             class="w-16 h-16 object-cover rounded-md mr-3">
                        <div>
                            <h4 class="font-medium text-gray-800">React 18 Features</h4>
                            <p class="text-sm text-gray-500">July 5, 2023 • 980 views</p>
                        </div>
                    </div>
                    
                    <!-- Post 3 -->
                    <div class="flex items-start">
                        <img src="https://placehold.co/480x200/png" 
                             alt="TypeScript" 
                             class="w-16 h-16 object-cover rounded-md mr-3">
                        <div>
                            <h4 class="font-medium text-gray-800">TypeScript 5.0</h4>
                            <p class="text-sm text-gray-500">June 22, 2023 • 850 views</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Subcategories -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-xl font-bold mb-4 text-gray-800">Subcategories</h3>
                <div class="space-y-2">
                    <a href="#" class="flex justify-between items-center p-2 hover:bg-gray-100 rounded-md transition">
                        <span class="text-gray-700">JavaScript</span>
                        <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-full">24</span>
                    </a>
                    <a href="#" class="flex justify-between items-center p-2 hover:bg-gray-100 rounded-md transition">
                        <span class="text-gray-700">React</span>
                        <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-full">18</span>
                    </a>
                    <a href="#" class="flex justify-between items-center p-2 hover:bg-gray-100 rounded-md transition">
                        <span class="text-gray-700">Vue.js</span>
                        <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-full">12</span>
                    </a>
                    <a href="#" class="flex justify-between items-center p-2 hover:bg-gray-100 rounded-md transition">
                        <span class="text-gray-700">Angular</span>
                        <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-full">9</span>
                    </a>
                    <a href="#" class="flex justify-between items-center p-2 hover:bg-gray-100 rounded-md transition">
                        <span class="text-gray-700">CSS & Design</span>
                        <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-full">15</span>
                    </a>
                    <a href="#" class="flex justify-between items-center p-2 hover:bg-gray-100 rounded-md transition">
                        <span class="text-gray-700">Performance</span>
                        <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-full">7</span>
                    </a>
                </div>
            </div>
            
            <!-- Newsletter Widget -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-xl font-bold mb-4 text-gray-800">Web Dev Newsletter</h3>
                <p class="text-gray-600 mb-4">Get the latest web development articles, tutorials, and news delivered to your inbox.</p>
                <form class="space-y-4">
                    <input type="email" placeholder="Your email address" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">
                        Subscribe
                    </button>
                </form>
            </div>
            
            <!-- Tags Widget -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-xl font-bold mb-4 text-gray-800">Popular Tags</h3>
                <div class="flex flex-wrap gap-2">
                    <a href="#" class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm hover:bg-gray-200 transition">#javascript</a>
                    <a href="#" class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm hover:bg-gray-200 transition">#react</a>
                    <a href="#" class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm hover:bg-gray-200 transition">#vue</a>
                    <a href="#" class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm hover:bg-gray-200 transition">#angular</a>
                    <a href="#" class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm hover:bg-gray-200 transition">#css</a>
                    <a href="#" class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm hover:bg-gray-200 transition">#html</a>
                    <a href="#" class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm hover:bg-gray-200 transition">#webcomponents</a>
                    <a href="#" class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm hover:bg-gray-200 transition">#performance</a>
                </div>
            </div>
        </aside>
    </div>

        

    @endsection
  

