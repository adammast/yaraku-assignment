<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Book;

class BookTest extends TestCase
{
    use RefreshDatabase; // Ensures a fresh database for each test

    public function testBooksAreDisplayed()
    {
        factory(Book::class, 3)->create();

        $response = $this->get('/books');

        $response->assertStatus(200)
            ->assertViewIs('books.index')
            ->assertSee(Book::first()->title);
    }

    public function testBookCanBeCreated()
    {
        $bookData = [
            'title' => 'Adventures of Tom Sawyer',
            'author' => 'Mark Twain',
        ];

        $response = $this->withoutMiddleware()->post('/books', $bookData);

        $this->assertDatabaseHas('books', $bookData);

        $response->assertRedirect('/books');
    }

    public function testBookCreationFailsWithMissingFields()
    {
        $response = $this->withoutMiddleware()->post('/books', []);

        $response->assertSessionHasErrors(['title', 'author']);

        $this->assertEquals(0, Book::count());
    }

    public function testBookCanBeDeleted()
    {
        $book = factory(Book::class)->create();

        $response = $this->withoutMiddleware()->delete("/books/{$book->id}");

        $this->assertDatabaseMissing('books', ['id' => $book->id]);
        $response->assertRedirect('/books');
    }

    public function testBookCanBeUpdated()
    {
        $book = factory(Book::class)->create();

        $updatedData = [
            'title' => 'Updated Title',
            'author' => 'Updated Author',
        ];

        $response = $this->withoutMiddleware()->put("/books/{$book->id}", $updatedData);

        $this->assertDatabaseHas('books', $updatedData);
        $response->assertRedirect('/books');
    }
}
