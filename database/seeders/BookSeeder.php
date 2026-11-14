<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        // Create genres first
        $genres = [
            'Fantasy',
            'Dystopian',
            'Fiction',
            'Sci-Fi',
            'Mystery',
        ];

        $genreIds = [];

        foreach ($genres as $name) {
            $genre = Genre::firstOrCreate(['name' => $name]);
            $genreIds[$name] = $genre->id;
        }

        // Create at least 20 books
        $books = [
            ['The Hobbit', 'J.R.R. Tolkien', 'Fantasy', 15.99, 1937, true],
            ['The Fellowship of the Ring', 'J.R.R. Tolkien', 'Fantasy', 18.50, 1954, true],
            ['The Two Towers', 'J.R.R. Tolkien', 'Fantasy', 17.50, 1954, true],
            ['The Return of the King', 'J.R.R. Tolkien', 'Fantasy', 19.99, 1955, false],

            ['1984', 'George Orwell', 'Dystopian', 12.50, 1949, true],
            ['Animal Farm', 'George Orwell', 'Dystopian', 10.99, 1945, true],
            ['Brave New World', 'Aldous Huxley', 'Dystopian', 13.25, 1932, false],
            ['Fahrenheit 451', 'Ray Bradbury', 'Dystopian', 11.75, 1953, true],

            ['Pride and Prejudice', 'Jane Austen', 'Fiction', 10.99, 1813, true],
            ['Little Women', 'Louisa May Alcott', 'Fiction', 12.00, 1868, true],
            ['The Great Gatsby', 'F. Scott Fitzgerald', 'Fiction', 11.50, 1925, false],
            ['To Kill a Mockingbird', 'Harper Lee', 'Fiction', 14.25, 1960, true],

            ['The Martian', 'Andy Weir', 'Sci-Fi', 14.25, 2011, false],
            ['Dune', 'Frank Herbert', 'Sci-Fi', 16.50, 1965, true],
            ['Project Hail Mary', 'Andy Weir', 'Sci-Fi', 18.99, 2021, true],
            ['Enders Game', 'Orson Scott Card', 'Sci-Fi', 13.50, 1985, false],

            ['The Silent Patient', 'Alex Michaelides', 'Mystery', 13.75, 2019, true],
            ['Gone Girl', 'Gillian Flynn', 'Mystery', 14.50, 2012, true],
            ['The Da Vinci Code', 'Dan Brown', 'Mystery', 15.25, 2003, false],
            ['Murder on the Orient Express', 'Agatha Christie', 'Mystery', 12.99, 1934, true],
        ];

        foreach ($books as $book) {
            Book::updateOrCreate(
                ['title' => $book[0]],
                [
                    'author' => $book[1],
                    'genre_id' => $genreIds[$book[2]],
                    'price' => $book[3],
                    'year' => $book[4],
                    'is_available' => $book[5],
                ]
            );
        }
    }
}
