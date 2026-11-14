<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('books', BookController::class);

Route::get('/books-catalog', function () {
    return redirect()->route('books.index');
})->name('books.catalog');