<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Lending
        </h2>
    </x-slot>

    <div class="container mx-auto py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <form action="{{ route('lendings.update', $lending->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="product_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Product ID</label>
                            <input type="text" id="product_id" name="product_id" value="{{ old('product_id', $lending->product_id) }}" class="form-input mt-1 block w-full shadow-sm sm:text-sm rounded-md">
                        </div>

                        <div class="mb-4">
                            <label for="lender_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Lender ID</label>
                            <input type="text" id="lender_id" name="lender_id" value="{{ old('lender_id', $lending->lender_id) }}" class="form-input mt-1 block w-full shadow-sm sm:text-sm rounded-md">
                        </div>

                        <div class="mb-4">
                            <label for="borrower_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Borrower ID</label>
                            <input type="text" id="borrower_id" name="borrower_id" value="{{ old('borrower_id', $lending->borrower_id) }}" class="form-input mt-1 block w-full shadow-sm sm:text-sm rounded-md">
                        </div>

                        <div class="mb-4">
                            <label for="start_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Start Date</label>
                            <input type="date" id="start_date" name="start_date" value="{{ old('start_date', $lending->start_date) }}" class="form-input mt-1 block w-full shadow-sm sm:text-sm rounded-md">
                        </div>

                        <div class="mb-4">
                            <label for="end_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">End Date</label>
                            <input type="date" id="end_date" name="end_date" value="{{ old('end_date', $lending->end_date) }}" class="form-input mt-1 block w-full shadow-sm sm:text-sm rounded-md">
                        </div>

                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                            <select id="status" name="status" class="form-select mt-1 block w-full shadow-sm sm:text-sm rounded-md">
                                <option value="pending" {{ old('status', $lending->status) === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="accepted" {{ old('status', $lending->status) === 'accepted' ? 'selected' : '' }}>Accepted</option>
                                <option value="returned" {{ old('status', $lending->status) === 'returned' ? 'selected' : '' }}>Returned</option>
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo disabled:opacity-25 transition ease-in-out duration-150">
                                Update Lending
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
