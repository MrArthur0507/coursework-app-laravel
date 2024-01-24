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
        <a href="{{ route('courseWorks.edit', $coursework->id) }}" class="btn btn-warning">Edit</a>
        @if($coursework->file_path)
            <div>
                <strong>File:</strong>
                <a href="{{ route('courseWorks.download', $coursework->id) }}">Download File</a>
            </div>
        @endif
        <h3 class="mb-3">Comments:</h3>

        @forelse($coursework->comments as $comment)
            <div class="card mb-2">
                <div class="card-body">
                    <p class="card-text">{{ $comment->body }} - {{ $comment->user->name }}</p>
                </div>
            </div>
            @if(auth()->user()->isAdmin())
                <form action="{{ route('comments.destroy', $comment->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete Comment</button>
                </form>
            @endif
        @empty
            <p>No comments yet.</p>
        @endforelse

        <form method="POST" action="{{ route('comments.store', ['courseWork' => $coursework->id])}}">
            @csrf

            <div class="form-group mt-4">
                <label for="comment">Add a Comment:</label>
                <textarea class="form-control" name="body" id="comment" rows="3" placeholder="Type your comment here"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Submit Comment</button>
        </form>
    </div>

</x-app-layout>
