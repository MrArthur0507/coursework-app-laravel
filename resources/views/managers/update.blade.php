<x-app-layout>
    <div class="container">
        <h2>Edit Manager</h2>

        <form method="POST" action="{{ route('managers.update', $manager->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $manager->name }}">
            </div>

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $manager->email }}">
            </div>

            <div class="form-group">
                <label for="department">Department</label>
                <input type="text" class="form-control" id="department" name="department" value="{{ $manager->department }}">
            </div>

            <button type="submit" class="btn btn-primary">Update Manager</button>
        </form>
    </div>
</x-app-layout>
