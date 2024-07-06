<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Reviews for ') . $user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-4xl mx-auto">
                    <h3 class="text-lg font-semibold mb-4">{{ __('Leave a Review') }}</h3>
                    <form action="{{ route('reviews.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="reviewee_id" value="{{ $user->id }}">
                        <div class="mb-4">
                            <label for="rating" class="block text-gray-700 dark:text-gray-300">{{ __('Rating') }}</label>
                            <select name="rating" id="rating" class="form-control w-full">
                                @for ($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="comment" class="block text-gray-700 dark:text-gray-300">{{ __('Comment') }}</label>
                            <textarea name="comment" id="comment" rows="3" class="form-control w-full" required></textarea>
                        </div>
                        <x-primary-button>{{ __('Submit Review') }}</x-primary-button>
                    </form>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-4xl mx-auto">
                    <h3 class="text-lg font-semibold mb-4">{{ __('Reviews') }}</h3>
                    @if ($reviews->isNotEmpty())
                        <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($reviews as $review)
                                <li class="py-4">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-1">
                                            <div class="flex items-center">
                                                <span class="text-lg font-semibold">{{ __('Rating') }}:</span>
                                                <div class="ml-2 flex">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= $review->rating)
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                                                                <path fill-rule="evenodd" d="M10 2a.75.75 0 0 1 .68.43l1.97 4.46a.75.75 0 0 0 .59.44l4.88.56a.75.75 0 0 1 .42 1.28l-3.63 3.55a.75.75 0 0 0-.22.67l.85 4.93a.75.75 0 0 1-1.09.79L10 16.66l-4.47 2.36a.75.75 0 0 1-1.1-.8l.85-4.93a.75.75 0 0 0-.22-.67L.18 8.27a.75.75 0 0 1 .42-1.28l4.88-.56a.75.75 0 0 0 .59-.44l1.97-4.46A.75.75 0 0 1 10 2z" clip-rule="evenodd" />
                                                            </svg>
                                                        @else
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-300" viewBox="0 0 20 20" fill="currentColor">
                                                                <path fill-rule="evenodd" d="M10 2a.75.75 0 0 1 .68.43l1.97 4.46a.75.75 0 0 0 .59.44l4.88.56a.75.75 0 0 1 .42 1.28l-3.63 3.55a.75.75 0 0 0-.22.67l.85 4.93a.75.75 0 0 1-1.09.79L10 16.66l-4.47 2.36a.75.75 0 0 1-1.1-.8l.85-4.93a.75.75 0 0 0-.22-.67L.18 8.27a.75.75 0 0 1 .42-1.28l4.88-.56a.75.75 0 0 0 .59-.44l1.97-4.46A.75.75 0 0 1 10 2z" clip-rule="evenodd" />
                                                            </svg>
                                                        @endif
                                                    @endfor
                                                </div>
                                            </div>
                                            <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">{{ $review->comment }}</div>
                                        </div>
                                        @if (Auth::id() === $review->reviewer_id)
                                            <div class="flex space-x-2">
                                                <a href="{{ route('reviews.edit', $review) }}" class="text-blue-600 dark:text-blue-400 hover:underline">{{ __('Edit') }}</a>
                                                <form action="{{ route('reviews.destroy', $review) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 dark:text-red-400 hover:underline">{{ __('Delete') }}</button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                                        {{ __('Reviewed by ') . $review->reviewer->name }}
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>{{ __('No reviews yet.') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
