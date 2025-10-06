@extends('components.layout.withoutNav')

<x-slot:title>
    Update | Category
</x-slot>


@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md mb-8 max-w-3xl mx-auto">
        <h2 class="text-xl font-bold mb-4 text-gray-800">Create New Category</h2>
        <form action="{{ route('categories.update', $category->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Title <span
                        class="text-red-500">*</span></label>
                <input type="text" id="name" name="name" required value="{{ $category->name }}"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                @error('name')
                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Slug -->
            <div>
                <label for="slug" class="block text-sm font-medium text-gray-700">Slug <span
                        class="text-red-500">*</span></label>
                <input type="text" id="slug" name="slug" required value="{{ $category->slug }}"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                @error('slug')
                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Parent Category -->
            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700">Parent
                    Category <span class="text-red-500">*</span></label>
                <select id="category_id" name="category_id"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 bg-white focus:ring-blue-500 focus:border-blue-500">
                    @if ($category->parent != null)
                        {
                        <option value="{{ $category->parent->id }}">{{ $category->parent->name }}</option>
                        }
                    @else
                        {
                        <option value="">Select Parent Category</option>
                        }
                    @endif


                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach


                    {{-- 
                                    <option value="web-development">Web Development</option>
                                    <option value="react">React</option>
                                    <option value="typescript">TypeScript</option> --}}
                    <!-- Add more options dynamically here -->
                </select>
                @error('category_id')
                    <span class="text-red-500 text-xs mt-a block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description <span
                        class="text-red-500">*</span></label>
                <textarea id="description" name="description" rows="4" value="{{ $category->description }}"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                @error('description')
                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="text-right">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-md">
                    Update Category
                </button>
            </div>
        </form>
    </div>
@endsection
