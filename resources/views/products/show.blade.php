<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product Details') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold">{{ $product->name }}</h1>
        <p class="text-gray-700">{{ $product->description }}</p>
        <p class="text-gray-700">Category: {{ $product->category->name }}</p>
        <p class="text-gray-700">Price: €{{ $product->price }}</p>
        @if($product->image)
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="img-fluid mt-2">
        @endif
    </div>
</x-app-layout>
