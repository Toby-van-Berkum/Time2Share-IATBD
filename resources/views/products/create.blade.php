<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create New Product') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-900 dark:text-gray-100">Product Name</label>
                        <input type="text" name="name" class="form-control w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-gray-900 dark:text-gray-100">Description</label>
                        <textarea name="description" class="form-control w-full" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="category_id" class="block text-gray-900 dark:text-gray-100">Category</label>
                        <select name="category_id" class="form-control w-full" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="price" class="block text-gray-900 dark:text-gray-100">Price</label>
                        <input type="number" name="price" step="0.01" class="form-control w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="image" class="block text-gray-900 dark:text-gray-100">Product Image</label>
                        <input type="file" name="image" class="form-control w-full text-gray-600 dark:text-gray-400">
                    </div>
                    <img id="image-preview" alt="image-preview" class="mb-4 mt-4 hidden max-w-xs rounded">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create Product</button>
                </form>
            </div>
        </div>
    </div>
    @push('scripts')
    <script src="{{ asset('js/image-preview.js') }}" defer></script>
    @endpush
</x-app-layout>
