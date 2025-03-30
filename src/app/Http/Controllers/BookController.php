<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

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

    // Delete a book
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }

    // Show form to edit book details
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }


    // Update an existing book in the database then redirect to the index page
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
        ]);

        $book->update($request->all());

        return redirect()->route('books.index');
    }

    // Export CSV
    public function exportCsv(Request $request)
    {
        $columns = $request->input('columns', ['title', 'author']);

        $books = Book::all($columns);

        $response = new StreamedResponse(function () use ($books, $columns) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, $columns);

            foreach ($books as $book) {
                fputcsv($handle, $book->only($columns));
            }

            fclose($handle);
        });

        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="books.csv"');

        return $response;
    }

    // Export XML
    public function exportXml(Request $request)
    {
        $columns = $request->input('columns', ['title', 'author']);
        $books = Book::all($columns);

        $xml = new \SimpleXMLElement('<books/>');

        foreach ($books as $book) {
            $bookElement = $xml->addChild('book');
            foreach ($columns as $column) {
                $bookElement->addChild($column, htmlspecialchars($book->$column));
            }
        }

        return response($xml->asXML(), 200)
            ->header('Content-Type', 'application/xml')
            ->header('Content-Disposition', 'attachment; filename="books.xml"');
    }
}
