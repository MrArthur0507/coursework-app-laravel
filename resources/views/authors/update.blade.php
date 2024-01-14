<x-app-layout>
    <div class="container">
        <h2>Edit Author</h2>

        <form method="POST" action="{{ route('authors.update', $author->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $author->name }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $author->email }}" required>
            </div>

            <div class="form-group">
                <label for="bio">Bio</label>
                <textarea class="form-control" id="bio" name="bio" rows="3">{{ $author->bio }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Author</button>
        </form>
    </div>
</x-app-layout>
