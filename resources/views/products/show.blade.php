<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $product->name }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Flex Container for Leave/Edit Review and Rating Summary -->
            <div class="flex flex-col sm:flex-row sm:space-x-6">
                <!-- Leave/Edit Review Panel -->
                @if($userReview = $reviews->firstWhere('reviewer_id', Auth::id()))
                    <div class="flex-1">
                        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                            <div class="max-w-xl">
                                <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">
                                    {{ __('Edit Your Review') }}
                                </h3>
                                @if(session('error'))
                                    <div class="bg-red-500 text-white p-4 mb-4 rounded">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('reviews.update', $userReview->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-4">
                                        <label for="rating" class="block text-gray-900 dark:text-gray-100">{{ __('Rating') }}</label>
                                        <select name="rating" id="rating" class="form-control w-full" required>
                                            <option value="1" {{ $userReview->rating == 1 ? 'selected' : '' }}>1 Star</option>
                                            <option value="2" {{ $userReview->rating == 2 ? 'selected' : '' }}>2 Stars</option>
                                            <option value="3" {{ $userReview->rating == 3 ? 'selected' : '' }}>3 Stars</option>
                                            <option value="4" {{ $userReview->rating == 4 ? 'selected' : '' }}>4 Stars</option>
                                            <option value="5" {{ $userReview->rating == 5 ? 'selected' : '' }}>5 Stars</option>
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label for="comment" class="block text-gray-900 dark:text-gray-100">{{ __('Comment') }}</label>
                                        <textarea name="comment" id="comment" class="form-control w-full" rows="4" required>{{ $userReview->comment }}</textarea>
                                    </div>
                                    <div class="flex justify-between">
                                        <x-primary-button>{{ __('Update Review') }}</x-primary-button>
                                    </div>
                                </form>
                                <form method="POST" action="{{ route('reviews.destroy', $userReview->id) }}" onsubmit="return confirm('{{ __('Are you sure you want to delete this review?') }}');">
                                    @csrf
                                    @method('DELETE')
                                    <div class="mt-4">
                                        <x-danger-button>{{ __('Delete Review') }}</x-danger-button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Leave a Review Panel -->
                    <div class="flex-1">
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
                                <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">
                                    {{ __('Leave a Review') }}
                                </h3>
                                <form method="POST" action="{{ route('reviews.store', $product->id) }}">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="rating" class="block text-gray-900 dark:text-gray-100">{{ __('Rating') }}</label>
                                        <select name="rating" id="rating" class="form-control w-full" required>
                                            <option value="1">1 Star</option>
                                            <option value="2">2 Stars</option>
                                            <option value="3">3 Stars</option>
                                            <option value="4">4 Stars</option>
                                            <option value="5">5 Stars</option>
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label for="comment" class="block text-gray-900 dark:text-gray-100">{{ __('Comment') }}</label>
                                        <textarea name="comment" id="comment" class="form-control w-full" rows="4" required></textarea>
                                    </div>
                                    <x-primary-button>{{ __('Submit Review') }}</x-primary-button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Rating Summary Panel as Table -->
                <div class="flex-1">
                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        <div class="max-w-xl">
                            <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">
                                {{ __('Rating Summary') }}
                            </h3>
                            @if ($totalRatings > 0)
                                <div class="table w-full border-collapse">
                                    <div class="table-row-group">
                                        <!-- Average Rating and Total Ratings -->
                                        <div class="table-row">
                                            <div class="table-cell p-4 border-b dark:border-gray-700">
                                                <div class="text-4xl text-yellow-500 font-semibold">{{ round($averageRating, 1) }}</div>
                                                <div class="text-sm text-gray-600 dark:text-gray-400">{{ __('Average Rating') }}</div>
                                            </div>
                                            <div class="table-cell p-4 border-b dark:border-gray-700">
                                                <div class="text-xl text-gray-800 dark:text-gray-200">{{ $totalRatings }}</div>
                                                <div class="text-sm text-gray-600 dark:text-gray-400">{{ __('Total Ratings') }}</div>
                                            </div>
                                        </div>
                                        <!-- Rating Bars -->
                                        @foreach([5, 4, 3, 2, 1] as $stars)
                                            <div class="table-row">
                                                <div class="table-cell p-4 border-b dark:border-gray-700">
                                                    <div class="flex items-center">
                                                        <div class="w-8 h-8 bg-yellow-500 rounded-full mr-2"></div>
                                                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full">
                                                            @php
                                                                $percent = ($ratingsCount[$stars] ?? 0) / $totalRatings * 100;
                                                            @endphp
                                                            <div class="h-2 bg-yellow-500 rounded-full" style="width: {{ $percent }}%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="table-cell p-4 border-b dark:border-gray-700">
                                                    <div class="text-sm text-gray-600 dark:text-gray-400">{{ $stars }} {{ __('Stars') }}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <p class="text-gray-600 dark:text-gray-400">{{ __('No ratings yet.') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reviews Panel -->
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">
                        {{ __('Reviews') }}
                    </h3>
                    @foreach($reviews as $index => $review)
                        <div class="mb-4">
                            <div class="flex items-center mb-2">
                                <span class="font-semibold text-gray-600 dark:text-gray-400">{{ $review->reviewer->name }}</span>
                                <span class="ml-2 text-yellow-500">{{ str_repeat('★', $review->rating) . str_repeat('☆', 5 - $review->rating) }}</span>
                            </div>
                            <p class="text-gray-600 dark:text-gray-400">{{ $review->comment }}</p>
                            @if ($index < count($reviews) - 1)
                                <div class="border-b border-gray-200 dark:border-gray-700 my-4"></div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
