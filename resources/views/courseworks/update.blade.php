<x-app-layout>
    <div class="container">
        <h2>Edit Coursework</h2>

        <form method="POST" action="{{ route('courseworks.update', $coursework->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $coursework->title }}">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ $coursework->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="author_id">Author</label>
                <select class="form-control" id="author_id" name="author_id">
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}" {{ $coursework->author_id == $author->id ? 'selected' : '' }}>
                            {{ $author->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="manager_id">Manager</label>
                <select class="form-control" id="manager_id" name="manager_id">
                    @foreach($managers as $manager)
                        <option value="{{ $manager->id }}" {{ $coursework->manager_id == $manager->id ? 'selected' : '' }}>
                            {{ $manager->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Coursework</button>
        </form>
    </div>
</x-app-layout>
