<x-app-layout>
    <div class="container">
        <h2>Author Details</h2>

        <div>
            <strong>ID:</strong> {{ $author->id }}<br>
            <strong>Name:</strong> {{ $author->name }}<br>
            <strong>Email:</strong> {{ $author->email }}<br>
            <strong>Bio:</strong> {{ $author->bio ?? 'N/A' }}<br>
        </div>

        <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-warning">Edit</a>
    </div>
</x-app-layout>
