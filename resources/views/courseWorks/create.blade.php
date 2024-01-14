<x-app-layout>
    <div class="container">
        <h2>Add Coursework</h2>

        <form method="POST" action="{{ route('courseworks.store') }}">
            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Coursework Title" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Coursework Description" required></textarea>
            </div>

            <div class="form-group">
                <label for="author_id">Author</label>
                <select class="form-control" id="author_id" name="author_id" required>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="manager_id">Manager</label>
                <select class="form-control" id="manager_id" name="manager_id" required>
                    @foreach($managers as $manager)
                        <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Add Coursework</button>
        </form>
    </div>
</x-app-layout>
