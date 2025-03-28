<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a Book</title>
</head>
<body>
    <h1>Add a New Book</h1>
    <form action="/books" method="POST">
        @csrf
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required>
        <br>
        <label for="author">Author:</label>
        <input type="text" name="author" id="author" required>
        <br>
        <button type="submit">Add Book</button>
    </form>
    <a href="/books">Back to List</a>
</body>
</html>