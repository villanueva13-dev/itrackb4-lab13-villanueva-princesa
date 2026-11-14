# ITRACKB4 Laboratory Activity 10 — Your Own Lookup Table

## Project Subject

This project uses **Books** as its subject. It demonstrates how to create and use a lookup table in Laravel Eloquent. The `books` table stores book records, while the `genres` table stores the available book genres.

## Database Design

The project uses two related tables:

**Books Table**
- `id`: Primary key.
- `title`: Book title.
- `author`: Book author.
- `genre_id`: Foreign key referencing the `genres` table.
- `price`: Book price.
- `year`: Publication year.
- `is_available`: Availability status.
- `description`: Optional book description.

**Genres Table**
- `id`: Primary key.
- `name`: Genre name.
- `created_at` and `updated_at`: Timestamps.

The `genre` text column was replaced with `genre_id`, which connects each book to a record in the `genres` lookup table.

## Part G: Questions & Answers

### G1. Which column did you convert into a lookup table, and why?

I converted the `genre` column into a separate `genres` lookup table. I did this because book genres come from a fixed list of categories. Using a lookup table avoids repeating genre names and makes the records easier to manage and maintain.

### G2. What number did Screenshot 6 show, and why exactly?

Screenshot 6 showed **6 database queries**. One query retrieved the five books, while five additional queries retrieved the genre of each book separately. This is called the N+1 Query Problem. After using eager loading with `with('genre')`, Screenshot 7 showed only 2 queries.

### G3. What breaks if the `belongsTo` method is plural?

The relationship method should be named `genre()` because each book belongs to one genre. If it is named `genres()`, code that uses `genre` or `with('genre')` will not find the relationship and may produce an undefined relationship error. The relationship name must be consistent throughout the application.

---

# ITRACKB4 Laboratory Activity 11 — Finish Your Own CRUD

## Project Subject

This project uses **Books** as its subject. It demonstrates the complete CRUD operations (Create, Read, Update, and Delete) using Laravel resource routes, route model binding, and Eloquent.

## Part G: Questions & Answers

### G1. What are the two requirements for Laravel route model binding to work?

Laravel route model binding requires a model type hint in the controller method and a parameter name that matches the route parameter. In this project, `Book $book` matches the `{book}` parameter in the resource route, allowing Laravel to automatically retrieve the correct book record.

### G2. Why does clicking a Delete link open the detail page instead of deleting the record?

An ordinary HTML link sends a GET request. Laravel matches the GET request to the `books.show` route, which displays the book details. Deleting a record requires a DELETE request, so the form must use `@method('DELETE')`.

### G3. Why is `old('title', $book->title)` better than using only `old('title')`?

The `old()` function retrieves the previously entered value after validation fails. The second argument, `$book->title`, provides the existing title when the edit page first loads. This ensures that the form displays the saved information instead of appearing blank.

## Part H – Reflection Questions

### 1. Understanding the Exception
The top file in the error trace belongs to Laravel's framework, which handles the method call. However, the actual mistake was in my `BookController.php` file, specifically in the `index()` method, where I accidentally used `Book::withh('genre')` instead of `Book::with('genre')`.

### 2. Logging and Debugging
Using `Log::info()` with the book ID helps identify which book record was saved or updated. Unlike an error page, the log keeps a record that can help developers track application activities and investigate problems.

### 3. Handling Errors
A 403 error is appropriate when a user is not allowed to perform an action, such as deleting the last book in a genre. A redirect with a message is more suitable for ordinary recoverable form or input errors because the user can correct the information and try again.



---

# ITRACKB4 Laboratory Activity 13 — Open the Front Door

## Project Subject

This project uses **Books** as its subject. It demonstrates a Laravel BookTracker application with a homepage, navigation menu, live database counts, search, filtering, sorting, and pagination.

## Features

- **Homepage:** Displays a welcome message and student profile.
- **Live Counts:** Shows the total number of books and genres.
- **Profile Photo:** Displays the developer's photo on the homepage.
- **Navigation:** Provides responsive navigation links for Home and Books.
- **Book Catalog:** Displays available book records with their genre information.
- **Pagination:** Shows 10 books per page.
- **Search:** Allows users to search by book title or author.
- **Genre Filter:** Allows users to filter books by genre.
- **Sorting:** Supports approved sorting columns: title, author, year, and price.
- **Invalid Sort Handling:** Uses the default title sorting when an unsupported sort value is provided.
- **CRUD Operations:** Allows users to create, view, update, and delete book records.

## Database

The project uses two related tables:

- `books` — stores book information.
- `genres` — stores the available book genres.

Each book is connected to a genre through the `genre_id` foreign key.

## Running the Project

1. Clone or download the repository.
2. Open the project folder in the terminal.
3. Install the dependencies:

   ```bash
   composer install
   ```

4. Configure the database in the `.env` file.
5. Run the migrations:

   ```bash
   php artisan migrate
   ```

6. Seed the database:

   ```bash
   php artisan db:seed --class=BookSeeder
   ```

7. Start the Laravel development server:

   ```bash
   php artisan serve
   ```

8. Open `http://127.0.0.1:8000` in your browser.

## Search, Filter, Sorting, and Pagination

The BookTracker catalog supports searching by title or author and filtering by genre. Users can sort records using the approved columns: `title`, `author`, `year`, and `price`.

Pagination displays 10 records per page and preserves the current query parameters when navigating between pages.
