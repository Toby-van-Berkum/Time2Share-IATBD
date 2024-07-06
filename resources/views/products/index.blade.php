<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>
    
    <div class="container mx-auto py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <form method="GET" action="{{ route('products.index') }}" class="mb-6 flex flex-col sm:flex-row justify-between items-center">
                    <div class="flex items-center space-x-4">
                        <select name="category" class="border rounded px-4 py-2">
                            <option value="">{{ __('All Categories') }}</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <select name="sort" class="border rounded px-4 py-2">
                            <option value="">{{ __('Sort By') }}</option>
                            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>
                                {{ __('Price: Low to High') }}
                            </option>
                            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>
                                {{ __('Price: High to Low') }}
                            </option>
                            <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>
                                {{ __('Name: A to Z') }}
                            </option>
                            <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>
                                {{ __('Name: Z to A') }}
                            </option>
                        </select>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            {{ __('Apply') }}
                        </button>
                    </div>
                    <div class="flex justify-end mt-4 sm:mt-0">
                        <a href="{{ route('products.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                            {{ __('Add Product') }}
                        </a>
                    </div>
                </form>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach($products as $product)
                    <a href="{{ route('products.show', $product) }}" class="bg-white rounded shadow overflow-hidden flex flex-col h-96 hover:shadow-lg transition-shadow duration-300">
                        <div class="flex-grow flex items-center justify-center overflow-hidden">
                            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="max-w-full max-h-full object-cover">
                        </div>
                        <div class="p-4 flex flex-col">
                            <p class="text-xl font-bold mb-2">{{ $product->name }}</p>
                            <p class="text-sm text-gray-700 mb-4 break-words">{{ Str::limit($product->description, 75, '...') }}</p>
                            <p class="mb-4">€{{ $product->price }}</p>
                            <div class="mt-auto flex justify-between">
                                <span class="bg-blue-500 text-white px-2 py-1 rounded text-sm font-bold">{{ $product->user->name }}</span>
                                <span class="bg-green-500 text-white px-2 py-1 rounded text-sm font-bold">{{ $product->category->name }}</span>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
