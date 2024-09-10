<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-8 text-gray-900" style="background-color: #FEFAE0;">
                    <h1 class="text-3xl font-bold mb-4">Edit Book</h1>

                    <form method="POST" action="{{ route('books.update', $book->id) }}" enctype="multipart/form-data"
                        class="form">
                        @csrf
                        @method('PUT')

                        <!-- Title -->
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" name="title" id="title" class="block w-full mt-1"
                                value="{{ old('title', $book->title) }}" required>
                        </div>

                        <!-- Author -->
                        <div class="mb-4">
                            <label for="author" class="block text-sm font-medium text-gray-700">Author</label>
                            <input type="text" name="author" id="author" class="block w-full mt-1"
                                value="{{ old('author', $book->author) }}" required>
                        </div>

                        <!-- Image -->
                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700">Book Cover</label>
                            <input type="file" name="image" id="image" class="block w-full mt-1">
                            @if ($book->image)
                                <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }} cover"
                                    class="w-32 mt-2">
                            @endif
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description" class="block w-full mt-1">{{ old('description', $book->description) }}</textarea>
                        </div>

                        <!-- Rating -->
                        <div class="mb-4">
                            <label for="rating" class="block text-sm font-medium text-gray-700">Rating</label>
                            <input type="number" name="rating" id="rating" class="block w-full mt-1" min="1"
                                max="5" value="{{ old('rating', $book->rating) }}">
                        </div>

                        <!-- Quotes -->
                        <div class="mb-4">
                            <label for="quotes" class="block text-sm font-medium text-gray-700">Quotes</label>
                            <textarea name="quotes[]" id="quotes" class="block w-full mt-1">{{ old('quotes[0]', $book->quotes->pluck('content')->first()) }}</textarea>
                            <textarea name="quotes[]" id="quotes" class="block w-full mt-1">{{ old('quotes[1]', $book->quotes->pluck('content')->skip(1)->first()) }}</textarea>
                            <!-- Add more inputs if you need more quotes -->
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="px-4 py-2 button-edit">
                                Update Book
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
