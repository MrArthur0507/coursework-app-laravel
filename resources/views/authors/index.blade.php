<x-app-layout>
    <h1>Authors</h1>

    <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Bio</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($authors as $author)
            <tr>
                <td>{{ $author->name }}</td>
                <td>{{ $author->email }}</td>
                <td>{{ $author->bio }}</td>
                <td>
                    <a href="{{ route('authors.show', $author) }}">Show</a>
                    <form method="POST" action="{{ route('authors.destroy', $author) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <a href="{{ route('authors.create') }}">Create Author</a>
</x-app-layout>
