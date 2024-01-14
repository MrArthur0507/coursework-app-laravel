<x-app-layout>
    <div class="container">
        <h2>Manager Details</h2>

        <div>
            <strong>ID:</strong> {{ $manager->id }}<br>
            <strong>Name:</strong> {{ $manager->name }}<br>
            <strong>Email:</strong> {{ $manager->email }}<br>
            <strong>Department:</strong> {{ $manager->department }}<br>
        </div>

        <a href="{{ route('managers.edit', $manager->id) }}" class="btn btn-warning">Edit</a>
    </div>
</x-app-layout>
