<x-app-layout>
    <div class="container">
        <h2>Add Manager</h2>

        <form method="POST" action="{{ route('managers.store') }}">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Manager Name">
            </div>

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
            </div>

            <div class="form-group">
                <label for="department">Department</label>
                <input type="text" class="form-control" id="department" name="department" placeholder="Manager Department">
            </div>

            <button type="submit" class="btn btn-primary">Add Manager</button>
        </form>
    </div>
</x-app-layout>
