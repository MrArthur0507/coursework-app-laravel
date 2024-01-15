<x-app-layout>
    <div class="container">
        <h2>CourseWork Details</h2>

        <div>
            <strong>ID:</strong> {{ $coursework->id }}<br>
            <strong>Title:</strong> {{ $coursework->title }}<br>
            <strong>Description:</strong> {{ $coursework->description }}<br>
            <strong>Author:</strong> {{ $coursework->author->name }}<br>
            <strong>Manager:</strong> {{ $coursework->manager->name }}<br>
        </div>

        <a href="{{ route('courseworks.edit', $coursework->id) }}" class="btn btn-warning">Edit</a>
    </div>
</x-app-layout>
