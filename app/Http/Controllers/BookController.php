<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Quote;

class BookController extends Controller
{

    public function dashboard(Request $request): View
    {
        $rating = $request->query('rating');
        $query = Book::with('user')->latest();

        if ($rating) {
            $query->where('rating', $rating);
        }

        $books = $query->get();

        return view('dashboard', compact('books'));
    }

    public function index(): View
    {
        $books = Book::with('user')->latest()->get();
        return view('books.index', compact('books'));


    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'description' => 'required|string',
            'review' => 'nullable|string',
            'rating' => 'required|integer|min:1|max:5',
            'genre' => 'required|string|max:255',
            'reading_status' => 'required|string|in:to_read,reading,finished',
            'quotes' => 'nullable|array',
            'quotes.*' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('book_images', 'public');
        }

        $book = $request->user()->books()->create($validated);

        if (!empty($validated['quotes'])) {
            foreach ($validated['quotes'] as $quoteContent) {
                if (!empty($quoteContent)) {
                    $quote = new Quote();
                    $quote->content = $quoteContent;
                    $quote->book_id = $book->id;
                    $quote->save();
                }
            }
        }

        return redirect(route('books.index'));
    }
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book): View
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book): RedirectResponse
    {
        // Validate the incoming request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
            'review' => 'nullable|string',
            'rating' => 'required|integer|min:1|max:5',
            'genre' => 'required|string|max:255',
            'reading_status' => 'required|string|in:to_read,reading,finished',
            'quotes' => 'nullable|array',
            'quotes.*' => 'nullable|string|max:255',
        ]);

        // If a new image is uploaded, store it
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('book_images', 'public');
        }

        // Update the book with validated data
        $book->update($validated);

        // Update quotes if provided
        $book->quotes()->delete(); // Remove old quotes

        if (!empty($validated['quotes'])) {
            foreach ($validated['quotes'] as $quoteContent) {
                if (!empty($quoteContent)) {
                    $quote = new Quote();
                    $quote->content = $quoteContent;
                    $quote->book_id = $book->id;
                    $quote->save();
                }
            }
        }

        // Redirect back to the book detail page with a success message
        return redirect()->route('books.show', $book)->with('success', 'Book updated successfully');
    }


}
