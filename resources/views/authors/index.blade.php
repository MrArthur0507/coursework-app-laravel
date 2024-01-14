<x-app-layout>
    <div class="container">
        <h2>Authors List</h2>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Bio</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($authors as $author)
                <tr>
                    <td>{{ $author->id }}</td>
                    <td>{{ $author->name }}</td>
                    <td>{{ $author->email }}</td>
                    <td>{{ $author->bio }}</td>
                    <td>
                        <a href="{{ route('authors.show', $author->id) }}" class="btn btn-info">Show</a>
                        <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('authors.destroy', $author->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this author?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
