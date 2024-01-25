<x-app-layout>
    <div class="container">
        <h2>Edit User Role</h2>

        <form method="POST" action="{{ route('admin.update', $user) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="is_admin">Role:</label>
                <select name="is_admin" id="is_admin" class="form-control">
                    <option value="1" {{ $user->is_admin ? 'selected' : '' }}>Admin</option>
                    <option value="0" {{ $user->is_admin ? '' : 'selected' }}>User</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Role</button>
        </form>

        <a href="{{ route('admin.index') }}" class="btn btn-secondary mt-3">Back to Users List</a>
    </div>
</x-app-layout>
