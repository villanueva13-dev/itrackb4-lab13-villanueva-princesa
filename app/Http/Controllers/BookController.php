<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class BookController extends Controller
{
    

public function index(Request $request)
{
    $query = Book::with('genre');

    // Search by book title or author
    $search = $request->query('search');

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('title', 'like', "%{$search}%")
              ->orWhere('author', 'like', "%{$search}%");
        });
    }

    // Filter by genre
    $genreId = $request->query('genre_id');

    if ($genreId) {
        $query->where('genre_id', $genreId);
    }

    // Allow only approved sorting columns
    $allowedSorts = ['title', 'author', 'year', 'price'];

    $sort = $request->query('sort', 'title');

    if (!in_array($sort, $allowedSorts)) {
        $sort = 'title';
    }

    $direction = $request->query('direction', 'asc');

    if (!in_array($direction, ['asc', 'desc'])) {
        $direction = 'asc';
    }

    $query->orderBy($sort, $direction);

    $genres = Genre::all();

    $books = $query->paginate(10)->withQueryString();

    return view('books.catalog', compact(
        'books',
        'genres',
        'genreId',
        'search',
        'sort',
        'direction'
    ));
}



public function create()
{
    $genres = Genre::all();

    return view('books.create', compact('genres'));
}

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:3|max:255',
            'author' => 'required|min:3|max:255',
            'genre_id' => 'required|exists:genres,id',
            'price' => 'required|numeric|min:0.99',
            'year' => 'required|integer|min:1800|max:2026',
        ]);

        Book::create($validated + ['is_available' => true]);

        return redirect()->route('books.index')
            ->with('success', 'Book added successfully!');
    }

    public function show(Book $book)
{
    return view('books.details', compact('book'));
}
    public function edit(Book $book)
{
    $genres = Genre::all();

    return view('books.edit', compact('book', 'genres'));
}
public function update(Request $request, Book $book)
{
    $validated = $request->validate([
        'title' => 'required|min:3|max:255',
        'author' => 'required|min:3|max:255',
        'genre_id' => 'required|exists:genres,id',
        'price' => 'required|numeric|min:0.99',
        'year' => 'required|integer|min:1800|max:2026',
    ]);

    $book->update($validated);
    Log::info('Book saved', ['id' => $book->id]);

    return redirect()->route('books.index')
        ->with('success', 'Book updated successfully!');
}

public function destroy(Book $book)
{
    abort_if($book->genre->books()->count() === 1, 403);

    $book->delete();

    return redirect()->route('books.index')
        ->with('success', 'Book deleted successfully!');
}
}