<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Display all books
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    // Show form to create a new book
    public function create()
    {
        return view('books.create');
    }

    // Store a new book in the database then redirect to the index page
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
        ]);

        Book::create($request->all());

        return redirect()->route('books.index');
    }
}
