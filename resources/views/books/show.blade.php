<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-lg sm:rounded-lg relative">
                <div class="p-8 text-gray-900"
                    style="background-color: #FEFAE0; border-radius: 16px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">

                    <!-- Edit Button in top-right corner -->
                    <a href="{{ route('books.edit', $book->id) }}" class="absolute top-4 right-4 px-4 py-2 button-filter">
                        Edit
                    </a>

                    <div class="flex">
                        @if ($book->image)
                            <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }} cover"
                                class="w-48 h-64 object-cover rounded-md mr-8 shadow-md">
                        @endif
                        <div>
                            <h1 class="text-4xl font-bold text-gray-800">{{ $book->title }}</h1>
                            <p class="text-md text-gray-500 mt-2">by <span class="italic">{{ $book->author }}</span></p>
                            <p class="mt-4 text-gray-700 leading-relaxed">{{ $book->description }}</p>

                            <!-- Rating -->
                            <p class="mt-4 text-lg font-semibold">
                                <strong>Rating:</strong>
                                <span class="text-yellow-500 text-xl">{{ str_repeat('⭐', $book->rating) }}</span>
                            </p>

                            <!-- Review -->
                            @if ($book->review)
                                <div class="mt-6">
                                    <strong class="text-lg">Review:</strong>
                                    <p class="text-gray-700 mt-2 leading-relaxed">{{ $book->review }}</p>
                                </div>
                            @endif

                            <!-- Quotes -->
                            @if ($book->quotes->isNotEmpty())
                                <div class="mt-6">
                                    <h3 class="text-xl font-semibold">Quotes:</h3>
                                    <ul class="list-disc list-inside mt-2 space-y-1">
                                        @foreach ($book->quotes as $quote)
                                            <li class="quotes text-gray-600 italic">
                                                "{{ $quote->content }}"
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
