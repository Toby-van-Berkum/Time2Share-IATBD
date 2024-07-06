<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="name" class="block text-gray-900 dark:text-gray-100">Product Name</label>
                        <input type="text" name="name" class="form-control w-full" value="{{ $product->name }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-gray-900 dark:text-gray-100">Description</label>
                        <textarea name="description" class="form-control w-full" required>{{ $product->description }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label for="category_id" class="block text-gray-900 dark:text-gray-100">Category</label>
                        <select name="category_id" class="form-control w-full" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="price" class="block text-gray-900 dark:text-gray-100">Price</label>
                        <input type="number" name="price" class="form-control w-full" value="{{ $product->price }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="image" class="block text-gray-900 dark:text-gray-100">Product Image</label>
                        <input type="file" name="image" class="form-control w-full text-gray-600 dark:text-gray-400">
                        @if($product->image)
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="img-fluid mt-2">
                        @endif
                    </div>
                    <div class="flex justify-between">
                        <x-primary-button type="submit">{{ __('Update Product') }}</x-primary-button>
                        <!-- Delete Product Form -->
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <x-danger-button type="submit">
                                {{ __('Delete Product') }}
                            </x-danger-button>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
