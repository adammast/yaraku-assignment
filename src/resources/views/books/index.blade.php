@extends('components.layout')

@section('title', 'Book List')

@section('content')
    <h1 class="mb-4">Books</h1>
    <table id="booksTable" class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this book?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#booksTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true, // Show info text (e.g., "Showing 1 to 10 of 50 books")
                "lengthMenu": [5, 10, 25, 50, 100], // Dropdown for number of items per page
                "columnDefs": [
                    { "orderable": false, "targets": [2, 3] } // Disable sorting for Edit & Delete columns
                ]
            });
        });
    </script>
@endsection