<x-app-layout>
    <div class="container">
        <h2>CourseWork Details</h2>

        <div>
            <strong>ID:</strong> {{ $coursework->id }}<br>
            <strong>Title:</strong> {{ $coursework->title }}<br>
            <strong>Description:</strong> {{ $coursework->description }}<br>
            <strong>Author:</strong> {{ $coursework->author->name }}<br>
            <strong>Manager:</strong> {{ $coursework->manager->name }}<br>
            <strong>Image:</strong>

        </div>
        @if($coursework->image_path)
            <img src="{{ asset('storage/' . $coursework->image_path) }}" alt="CourseWork Image" style="width: 200px; height: 200px;">
        @else
            No Image
        @endif
        <a href="{{ route('courseworks.edit', $coursework->id) }}" class="btn btn-warning">Edit</a>
    </div>
</x-app-layout>
