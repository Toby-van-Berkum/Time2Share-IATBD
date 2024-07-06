<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Analytics') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-x-auto bg-white shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="bg-gray-200 p-6 rounded-lg shadow-lg">
                            <h3 class="text-lg font-semibold mb-4">Users</h3>
                            <p class="text-3xl font-bold">{{ $userCount }}</p>
                        </div>
                        <div class="bg-gray-200 p-6 rounded-lg shadow-lg">
                            <h3 class="text-lg font-semibold mb-4">Products</h3>
                            <p class="text-3xl font-bold">{{ $productCount }}</p>
                        </div>
                        <div class="bg-gray-200 p-6 rounded-lg shadow-lg">
                            <h3 class="text-lg font-semibold mb-4">Active Lendings</h3>
                            <p class="text-3xl font-bold">{{ $activeLendingsCount }}</p>
                        </div>
                        <div class="bg-gray-200 p-6 rounded-lg shadow-lg">
                            <h3 class="text-lg font-semibold mb-4">Accepted Lendings</h3>
                            <p class="text-3xl font-bold">{{ $acceptedLendingsCount }}</p>
                        </div>
                        <div class="bg-gray-200 p-6 rounded-lg shadow-lg">
                            <h3 class="text-lg font-semibold mb-4">Returned Lendings</h3>
                            <p class="text-3xl font-bold">{{ $returnedLendingsCount }}</p>
                        </div>
                        <!-- Add more statistics as needed -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
