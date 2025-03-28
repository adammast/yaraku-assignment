<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List</title>
</head>
<body>
    <h1>Books</h1>
    <table border="1">
        <tr>
            <th>Title</th>
            <th>Author</th>
        </tr>
        @foreach ($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
            </tr>
        @endforeach
    </table>
    <a href="/books/create">Add New Book</a>
</body>
</html>