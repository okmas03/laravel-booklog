<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data" class="form">
            @csrf

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">{{ __('Title') }}</label>
                <input type="text" name="title" id="title" placeholder="Enter book title" class="input"
                    value="{{ old('title') }}">
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <!-- Author -->
            <div class="mt-4">
                <label for="author" class="block text-sm font-medium text-gray-700">{{ __('Author') }}</label>
                <input type="text" name="author" id="author" placeholder="Enter author's name" class="input"
                    value="{{ old('author') }}">
                <x-input-error :messages="$errors->get('author')" class="mt-2" />
            </div>

            <!-- Image (Optional) -->
            <div class="mt-4">
                <label for="image"
                    class="block text-sm font-medium text-gray-700">{{ __('Book Cover (Optional)') }}</label>
                <input type="file" name="image" id="image" class="input">
                <x-input-error :messages="$errors->get('image')" class="mt-2" />
            </div>

            <!-- Rating -->
            <div class="mt-4">
                <label for="rating" class="block text-sm font-medium text-gray-700">{{ __('Rating') }}</label>
                <select name="rating" id="rating" class="input">
                    <option value="5" {{ old('rating') == 5 ? 'selected' : '' }}>⭐⭐⭐⭐⭐</option>
                    <option value="4" {{ old('rating') == 4 ? 'selected' : '' }}>⭐⭐⭐⭐</option>
                    <option value="3" {{ old('rating') == 3 ? 'selected' : '' }}>⭐⭐⭐</option>
                    <option value="2" {{ old('rating') == 2 ? 'selected' : '' }}>⭐⭐</option>
                    <option value="1" {{ old('rating') == 1 ? 'selected' : '' }}>⭐</option>
                </select>
                <x-input-error :messages="$errors->get('rating')" class="mt-2" />
            </div>

            <!-- Description -->
            <div class="mt-4">
                <label for="description"
                    class="block text-sm font-medium text-gray-700">{{ __('Description') }}</label>
                <textarea name="description" id="description" rows="6" placeholder="Enter a brief description of the book"
                    class="input-higher">{{ old('description') }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <!-- Review (Optional) -->
            <div class="mt-4">
                <label for="review"
                    class="block text-sm font-medium text-gray-700">{{ __('Review (Optional)') }}</label>
                <textarea name="review" id="review" rows="4" placeholder="Write your review" class="input-higher">{{ old('review') }}</textarea>
                <x-input-error :messages="$errors->get('review')" class="mt-2" />
            </div>

            <!-- Genre -->
            <div class="mt-4">
                <label for="genre" class="block text-sm font-medium text-gray-700">{{ __('Genre') }}</label>
                <select name="genre" id="genre" class="input">
                    <option value="" {{ old('genre') === null ? 'selected' : '' }}>Select a Genre</option>
                    <option value="fiction" {{ old('genre') == 'fiction' ? 'selected' : '' }}>Fiction</option>
                    <option value="non-fiction" {{ old('genre') == 'non-fiction' ? 'selected' : '' }}>Non-Fiction
                    </option>
                    <option value="mystery" {{ old('genre') == 'mystery' ? 'selected' : '' }}>Mystery</option>
                    <option value="fantasy" {{ old('genre') == 'fantasy' ? 'selected' : '' }}>Fantasy</option>
                    <option value="sci-fi" {{ old('genre') == 'sci-fi' ? 'selected' : '' }}>Sci-Fi</option>
                </select>
                <x-input-error :messages="$errors->get('genre')" class="mt-2" />
            </div>

            <!-- Reading Status -->
            <div class="mt-4">
                <label for="reading_status"
                    class="block text-sm font-medium text-gray-700">{{ __('Reading Status') }}</label>
                <select name="reading_status" id="reading_status" class="input">
                    <option value="to_read" {{ old('reading_status') == 'to_read' ? 'selected' : '' }}>To Read</option>
                    <option value="reading" {{ old('reading_status') == 'reading' ? 'selected' : '' }}>Reading</option>
                    <option value="finished" {{ old('reading_status') == 'finished' ? 'selected' : '' }}>Finished
                    </option>
                </select>
                <x-input-error :messages="$errors->get('reading_status')" class="mt-2" />
            </div>

            <!-- Quotes (Optional) -->
            <div id="quotes-container" class="mt-4">
                <label for="quotes"
                    class="block text-sm font-medium text-gray-700">{{ __('Quotes (Optional)') }}</label>
                <div class="flex items-center">
                    <textarea name="quotes[]" id="quotes" rows="3" placeholder="Enter your favorite quotes from the book"
                        class="input-higher">{{ old('quotes') }}</textarea>
                    <button type="button" id="add-quote" class="button-add">Add <br> Quote</button>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end mt-4">
                <button class="button-confirm">Add Book</button>
            </div>
        </form>

        <script>
            document.getElementById('add-quote').addEventListener('click', function() {
                const container = document.getElementById('quotes-container');
                const textarea = document.createElement('textarea');
                textarea.name = 'quotes[]';
                textarea.rows = 3;
                textarea.placeholder = 'Enter your favorite quotes from the book';
                textarea.classList.add('input', 'mt-4');
                container.appendChild(textarea);
            });
        </script>
    </div>
</x-app-layout>
