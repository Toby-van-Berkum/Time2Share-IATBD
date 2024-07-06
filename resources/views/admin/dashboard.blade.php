<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Panel') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-4">
                <a href="{{ route('admin.users') }}" class="bg-white shadow rounded-lg overflow-hidden hover:bg-gray-100">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="text-center">
                            <i class="fas fa-users text-gray-500 h-12 w-12 mx-auto"></i>
                            <h5 class="text-xl font-medium text-gray-900 mt-2">Users</h5>
                            <p class="text-gray-500 mt-1">Manage users and their accounts.</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('admin.products') }}" class="bg-white shadow rounded-lg overflow-hidden hover:bg-gray-100">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="text-center">
                            <i class="fas fa-box-open text-gray-500 h-12 w-12 mx-auto"></i>
                            <h5 class="text-xl font-medium text-gray-900 mt-2">Products</h5>
                            <p class="text-gray-500 mt-1">Manage products and their details.</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('admin.lendings') }}" class="bg-white shadow rounded-lg overflow-hidden hover:bg-gray-100">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="text-center">
                            <i class="fas fa-shopping-cart text-gray-500 h-12 w-12 mx-auto"></i>
                            <h5 class="text-xl font-medium text-gray-900 mt-2">Lendings</h5>
                            <p class="text-gray-500 mt-1">Manage customer lendings and transactions.</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('admin.categories') }}" class="bg-white shadow rounded-lg overflow-hidden hover:bg-gray-100">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="text-center">
                            <i class="fas fa-list-alt text-gray-500 h-12 w-12 mx-auto"></i>
                            <h5 class="text-xl font-medium text-gray-900 mt-2">Categories</h5>
                            <p class="text-gray-500 mt-1">Manage product categories and classifications.</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('admin.analytics') }}" class="bg-white shadow rounded-lg overflow-hidden hover:bg-gray-100">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="text-center">
                            <i class="fas fa-chart-line text-gray-500 h-12 w-12 mx-auto"></i>
                            <h5 class="text-xl font-medium text-gray-900 mt-2">Analytics</h5>
                            <p class="text-gray-500 mt-1">View detailed reports and analytics.</p>
                        </div>
                    </div>
                </a>
                <div class="bg-gray-400 shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="text-center">
                            <i class="fas fa-cogs text-gray-500 h-12 w-12 mx-auto"></i>
                            <h5 class="text-xl font-medium text-gray-600 mt-2">Settings</h5>
                            <p class="text-gray-600 mt-1">Configure site settings and manage user roles.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
