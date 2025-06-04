<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Book List</title>
</head>
<body>
    <h1>List All Books</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->judul }}</td>
                    <td>{{ $book->penulis }}</td>
                    <td>{{ $book->is_available ? 'Available' : 'Not Available' }}</td>
                    <td>
                        <button action="{{ route('book.edit', $book->id)}}">Edit</button>
                        <!-- <button onclick="">Edit</button> -->
                        <!-- <button onclick="deleteBook({{ $book->id }})">Delete</button> -->
                         <form action="{{ route('posts.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <form method="POST" action="{{ route('post.store') }}">
        @csrf
        <label for="judul">Nama Buku</label>
        <input type="text" name="judul" id="judul">

        <label for="penulis">Penulis</label>
        <input type="text" name="penulis" id="penulis">

        <div>
            <label for="is_available">Status</label>
            <select name="is_available" id="is_available">
                <option value="1">Available</option>
                <option value="0">Not Available</option>
            </select>
        </div>

        <button type="submit">Add Book</button>
    </form>
</body>
</html>