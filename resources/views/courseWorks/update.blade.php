<x-app-layout>
    <div class="container">
        <h2>Edit CourseWork</h2>

        <form method="POST" action="{{ route('courseWorks.update', $coursework->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $coursework->title }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ $coursework->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="author_id">Author</label>
                <select class="form-control" id="author_id" name="author_id" required>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}" {{ $author->id == $coursework->author_id ? 'selected' : '' }}>
                            {{ $author->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="manager_id">Manager</label>
                <select class="form-control" id="manager_id" name="manager_id" required>
                    @foreach($managers as $manager)
                        <option value="{{ $manager->id }}" {{ $manager->id == $coursework->manager_id ? 'selected' : '' }}>
                            {{ $manager->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
                @if($coursework->image_path)
                    <p>Existing Image: <a href="{{ asset($coursework->image_path) }}" target="_blank">{{ $coursework->image_path }}</a></p>
                @endif
            </div>

            <div class="form-group">
                <label for="file">File</label>
                <input type="file" class="form-control-file" id="file" name="file">
                @if($coursework->file_path)
                    <p>Existing File: <a href="{{ asset($coursework->file_path) }}" target="_blank">{{ $coursework->file_path }}</a></p>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update CourseWork</button>
        </form>
    </div>
</x-app-layout>
