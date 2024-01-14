<x-app-layout>
    <div class="container">
        <h2>Add Author</h2>

        <form method="POST" action="{{ route('authors.store') }}">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Author Name" required>
            </div>

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
            </div>

            <div class="form-group">
                <label for="bio">Bio</label>
                <textarea class="form-control" id="bio" name="bio" rows="3" placeholder="Author Bio"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Add Author</button>
        </form>
    </div>
</x-app-layout>
