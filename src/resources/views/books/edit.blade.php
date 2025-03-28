<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
</head>
<body>
    <h1>Edit Book</h1>
    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="{{ old('title', $book->title) }}" required>
        <br>
        <label for="author">Author:</label>
        <input type="text" name="author" id="author" value="{{ old('author', $book->author) }}" required>
        <br>
        <button type="submit">Update Book</button>
    </form>
    <a href="/books">Back to List</a>
</body>
</html>