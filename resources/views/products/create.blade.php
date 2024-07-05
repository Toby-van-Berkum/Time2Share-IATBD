<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create New Product') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-8">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Product Name</label>
                <input type="text" name="name" class="form-control w-full" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description</label>
                <textarea name="description" class="form-control w-full" required></textarea>
            </div>
            <div class="mb-4">
                <label for="category_id" class="block text-gray-700">Category</label>
                <select name="category_id" class="form-control w-full" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="price" class="block text-gray-700">Price</label>
                <input type="number" name="price" step="0.01" class="form-control w-full" required>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700">Product Image</label>
                <input type="file" name="image" class="form-control w-full">
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create Product</button>
        </form>
    </div>
</x-app-layout>
