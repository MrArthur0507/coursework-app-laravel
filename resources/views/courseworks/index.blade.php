<x-app-layout>
    <div class="container">
        <h2>Courseworks List</h2>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Author</th>
                <th>Manager</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($courseworks as $coursework)
                <tr>
                    <td>{{ $coursework->id }}</td>
                    <td>{{ $coursework->title }}</td>
                    <td>{{ $coursework->description }}</td>
                    <td>{{ $coursework->author->name }}</td>
                    <td>{{ $coursework->manager->name }}</td>
                    <td>
                        <a href="{{ route('courseworks.show', $coursework->id) }}" class="btn btn-info">Show</a>
                        <a href="{{ route('courseworks.edit', $coursework->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
