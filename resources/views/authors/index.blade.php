<x-app-layout>
    <div class="container">
        <h2>All Authors</h2>

        <div class="row">
            @foreach($authors as $author)
                <div class="card" style="width: 18rem; margin: 10px;">
                    {{-- Assuming you have an image URL stored in the database --}}
                    <img class="card-img-top" src="{{ $author->image_url }}" alt="Author Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $author->name }}</h5>
                        <p class="card-text">{{ $author->bio }}</p>
                        <a href="{{ route('authors.show', ['author' => $author->id]) }}" class="btn btn-primary">View Profile</a>
                        <a href="{{ route('authors.edit', ['author' => $author->id]) }}" class="btn btn-secondary">Edit</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
