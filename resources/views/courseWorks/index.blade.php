<x-app-layout>
    <div class="container">
        <h2>CourseWorks List</h2>

        <div class="row">
            @foreach($courseworks as $coursework)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if($coursework->image_path)
                            <img src="{{ asset('storage/' . $coursework->image_path) }}" class="card-img-top" alt="CourseWork Image">
                        @else
                            <img src="{{asset('storage/images/default.jpg')}}" class="card-img-top" alt="Default Image">
                        @endif

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $coursework->title }}</h5>
                            <p class="card-text">{{ $coursework->description }}</p>
                            <p class="card-text mt-auto"><strong>Author:</strong> {{ $coursework->author->name }}</p>
                            <p class="card-text"><strong>Manager:</strong> {{ $coursework->manager->name }}</p>
                            <a href="{{ route('courseWorks.show', $coursework->id) }}" class="btn btn-primary mt-auto">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</x-app-layout>
