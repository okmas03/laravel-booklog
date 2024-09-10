<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg" style="background-color: #FEFAE0">
                <div class="p-6 text-gray-900">
                    <!-- Filter Form -->
                    <form method="GET" action="{{ route('dashboard') }}" class="filter-form mb-4">
                        <select name="rating" id="rating" class="input" style="background-color: #ADD8E6">
                            <option value="" {{ request('rating') === null ? 'selected' : '' }}>All Ratings
                            </option>
                            <option value="5" {{ request('rating') == 5 ? 'selected' : '' }}>⭐⭐⭐⭐⭐</option>
                            <option value="4" {{ request('rating') == 4 ? 'selected' : '' }}>⭐⭐⭐⭐</option>
                            <option value="3" {{ request('rating') == 3 ? 'selected' : '' }}>⭐⭐⭐</option>
                            <option value="2" {{ request('rating') == 2 ? 'selected' : '' }}>⭐⭐</option>
                            <option value="1" {{ request('rating') == 1 ? 'selected' : '' }}>⭐</option>
                        </select>
                        <button type="submit" class="button-filter">Filter</button>
                    </form>

                    <!-- Books Grid -->
                    @if ($books->isEmpty())
                        <p>No books available.</p>
                    @else
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-7">
                            @foreach ($books as $book)
                                <a href="{{ route('books.show', $book->id) }}" class="block">
                                    <div class="book">
                                        <div class="cover">
                                            @if ($book->image)
                                                <img src="{{ asset('storage/' . $book->image) }}"
                                                    alt="{{ $book->title }} cover" class="cover-image">
                                            @else
                                                <div class="no-cover">
                                                    <p class="title">{{ $book->title }}</p>
                                                    <p class="author">{{ $book->author }}</p>
                                                    <p class="rating">{{ str_repeat('⭐', $book->rating) }}</p>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="book-info">
                                            <p class="title">{{ $book->title }}</p>
                                            <p class="author">{{ $book->author }}</p>
                                            <p class="rating">{{ str_repeat('⭐', $book->rating) }}</p>
                                            <p class="description">
                                                {{ \Illuminate\Support\Str::limit($book->description, 124, '...') }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
