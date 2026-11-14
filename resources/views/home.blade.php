
@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-slate-100 py-12 px-4">
    <div class="max-w-6xl mx-auto">

        <!-- Welcome Section -->
        <div class="bg-gradient-to-r from-indigo-700 to-blue-500 rounded-3xl p-10 md:p-14 text-white shadow-xl">
            <p class="text-blue-100 uppercase tracking-widest text-sm font-semibold mb-3">
                Welcome to BookTracker
            </p>

            <h1 class="text-4xl md:text-5xl font-extrabold mb-5">
                Your World of Books,
                <span class="text-yellow-300">All in One Place.</span>
            </h1>

            <p class="text-blue-100 text-lg max-w-2xl leading-relaxed mb-8">
                Explore a collection of books from different genres.
                Discover book information and manage your collection
                easily in one convenient place.
            </p>

            <a href="{{ route('books.index') }}"
               class="inline-block bg-yellow-400 hover:bg-yellow-300 text-indigo-900 font-bold px-8 py-4 rounded-xl shadow-lg transition duration-300">
                Browse Books &rarr;
            </a>
        </div>

        <!-- Statistics -->
        <div class="mt-10">
            <h2 class="text-2xl font-bold text-slate-800 mb-6">
                Library Overview
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Total Books -->
                <div class="bg-white rounded-2xl p-7 shadow-md border-l-8 border-indigo-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-slate-500 font-medium">Total Books</p>
                            <h3 class="text-4xl font-extrabold text-indigo-700 mt-2">
                                {{ $bookCount }}
                            </h3>
                            <p class="text-sm text-slate-400 mt-2">
                                Books in your collection
                            </p>
                        </div>

                        <div class="bg-indigo-100 rounded-full p-5 text-3xl">
                            📚
                        </div>
                    </div>
                </div>

                <!-- Total Genres -->
                <div class="bg-white rounded-2xl p-7 shadow-md border-l-8 border-emerald-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-slate-500 font-medium">Total Genres</p>
                            <h3 class="text-4xl font-extrabold text-emerald-600 mt-2">
                                {{ $genreCount }}
                            </h3>
                            <p class="text-sm text-slate-400 mt-2">
                                Available book categories
                            </p>
                        </div>

                        <div class="bg-emerald-100 rounded-full p-5 text-3xl">
                            🏷️
                        </div>
                    </div>
                </div>

            </div>
        </div>


<!-- Student Profile -->
<div class="mt-12 bg-white rounded-3xl shadow-lg p-8 md:p-10">
    <div class="text-center mb-8">
        <p class="text-indigo-600 font-semibold uppercase tracking-widest text-sm">
            About the Developer
        </p>
        <h2 class="text-3xl font-bold text-slate-800 mt-2">
            Student Profile
        </h2>
    </div>

    <div class="flex flex-col md:flex-row items-center justify-center gap-8">

        <!-- Profile Photo -->
        <div class="flex-shrink-0">
            <img
                src="{{ asset('images/princesa.jpg') }}"
                alt="Princesa Villanueva"
                class="w-40 h-40 rounded-full object-cover border-4 border-indigo-500 shadow-md"
            >
        </div>

        <!-- Student Information -->
        <div class="text-center md:text-left">
            <h3 class="text-2xl font-bold text-slate-800">
                Princesa Villanueva
            </h3>

            <p class="text-indigo-600 font-semibold mt-2">
                Bachelor of Science in Information Technology
            </p>

            <div class="mt-4 space-y-2 text-slate-600">
                <p><strong>Course:</strong> BSIT</p>
                <p><strong>Year Level:</strong> 4th Year</p>
                <p><strong>Section:</strong> C</p>
            </div>
        </div>

    </div>
</div>

        <!-- Bottom Message -->
        <div class="mt-10 text-center text-slate-500">
            <p class="text-sm">
                Discover your next favorite read with BookTracker.
            </p>
        </div>

    </div>
</div>
@endsection
