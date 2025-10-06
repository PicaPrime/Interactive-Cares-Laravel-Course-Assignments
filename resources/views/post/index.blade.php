@extends('components.layout.withoutNav')

@section('content')
    @if (session('success'))
        <div id="flash-message" class="fixed bottom-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg">
            {{ session('success') }}
        </div>

        <script>
            setTimeout(() => {
                let flash = document.getElementById('flash-message');
                if (flash) {
                    flash.style.display = 'none';
                }
            }, 3000);
        </script>
    @endif

    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl px-4 py-8 font-bold text-blue-500">All Posts</h2>
        <a href={{ route('posts.create') }}
            class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-md flex items-center">
            <i class="fas fa-plus mr-2"></i>
            Create Post
        </a>
    </div>


    <div class="container mx-auto px-4 py-8">
        <form method="GET" action="{{ route('posts.index') }}" class="mb-4 flex items-center gap-2">
            <input type="text" name="search" value="{{ request('search') }}"
                placeholder="Search posts with title or slug..."
                class="border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">

            <select name="category_id"
                class="border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">All categories</option>
                @if (!empty($categories))
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}</option>
                    @endforeach
                @endif
            </select>

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">
                Search
            </button>
        </form>
        <div class="bg-white shadow rounded-lg overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Category</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Created At</th>
                        <th class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($posts as $post)
                        <tr>
                            <a href={{ route('posts.show', $post->id) }}>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $post->title }}
                                </td>
                            </a>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                @if ($post->category)
                                    <span
                                        class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded mr-1 mb-1">
                                        {{ $post->category->name }}
                                    </span>
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $post->created_at->format('Y-m-d') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                @can('view', $post)
                                    <a href="{{ route('posts.show', $post->id) }}"
                                        class="text-indigo-600 hover:text-indigo-900 mr-2">View</a>
                                @endcan
                                @can('update', $post)
                                    <a href="{{ route('posts.edit', $post->id) }}"
                                        class="text-green-600 hover:text-green-900 mr-2">Edit</a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                @endcan

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">No posts found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
