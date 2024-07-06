<x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Profile') }}
      </h2>
    </x-slot>
  
    <div class="container mx-auto py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
  
        <div class="bg-gray-100 dark:bg-gray-900 rounded-lg shadow p-8 mb-8">
          </div>
  
        <div class="border-b border-gray-300 dark:border-gray-700 pb-4 mb-4">
          <h3 class="text-lg font-semibold mb-2">{{ __('Reviews Given') }}</h3>
          @forelse ($givenReviews as $review)
            <div class="bg-white dark:bg-gray-900 rounded-lg shadow p-4 mb-4">
              <p class="text-lg font-semibold">{{ __('Rating') }}: {{ $review->rating }}</p>
              <p>{{ __('Comment') }}: {{ $review->comment }}</p>
              <p>{{ __('Reviewee') }}: {{ $review->reviewee->name }}</p>
            </div>
          @empty
            <p>{{ __('No reviews given yet.') }}</p>
          @endforelse
        </div>
  
        <div class="border-b border-gray-300 dark:border-gray-700 pb-4 mb-4">
          <h3 class="text-lg font-semibold mb-2">{{ __('Reviews Received') }}</h3>
          @forelse ($receivedReviews as $review)
            <div class="bg-white dark:bg-gray-900 rounded-lg shadow p-4 mb-4">
              <p class="text-lg font-semibold">{{ __('Rating') }}: {{ $review->rating }}</p>
              <p>{{ __('Comment') }}: {{ $review->comment }}</p>
              <p>{{ __('Reviewer') }}: {{ $review->reviewer->name }}</p>
            </div>
          @empty
            <p>{{ __('No reviews received yet.') }}</p>
          @endforelse
        </div>
      </div>
    </div>
  </x-app-layout>
  