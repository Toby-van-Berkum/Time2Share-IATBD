<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Review') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @if(session('error'))
                        <div class="bg-red-500 text-white p-4 mb-4 rounded">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="bg-green-500 text-white p-4 mb-4 rounded">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('reviews.update', $review->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="rating" class="block text-gray-900 dark:text-gray-100">{{ __('Rating') }}</label>
                            <select name="rating" id="rating" class="form-control w-full" required>
                                <option value="1" {{ $review->rating == 1 ? 'selected' : '' }}>1 Star</option>
                                <option value="2" {{ $review->rating == 2 ? 'selected' : '' }}>2 Stars</option>
                                <option value="3" {{ $review->rating == 3 ? 'selected' : '' }}>3 Stars</option>
                                <option value="4" {{ $review->rating == 4 ? 'selected' : '' }}>4 Stars</option>
                                <option value="5" {{ $review->rating == 5 ? 'selected' : '' }}>5 Stars</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="comment" class="block text-gray-900 dark:text-gray-100">{{ __('Comment') }}</label>
                            <textarea name="comment" id="comment" class="form-control w-full" rows="4" required>{{ $review->comment }}</textarea>
                        </div>
                        <x-primary-button>{{ __('Update Review') }}</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
