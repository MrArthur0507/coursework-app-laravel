<x-app-layout>
    <div class="container">
        <h2>{{ $author->name }}</h2>

        <div class="card" style="width: 18rem; margin: 10px;">
            {{-- Assuming you have an image URL stored in the database --}}
            <img class="card-img-top" src="{{ $author->image_url }}" alt="Author Image">
            <div class="card-body">
                <h5 class="card-title">{{ $author->name }}</h5>
                <p class="card-text">{{ $author->bio }}</p>
                <a href="{{ route('authors.edit', ['author' => $author->id]) }}" class="btn btn-secondary">Edit</a>
            </div>
        </div>
    </div>
</x-app-layout>
