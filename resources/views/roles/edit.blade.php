<a href="{{ route('roles.index') }}">← Back to Roles</a>

<form action="{{ route('roles.update', $role->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <h2>Edit Role</h2>
        <p>Make updates to the role details below.</p>
    </div>

    <div>
        <label for="role_name">Role Name</label>
        <input type="text" id="role_name" name="role_name" value="{{ $role->role_name }}" required>
    </div>

    <div>
        <label for="description">Description</label>
        <textarea id="description" name="description" rows="4" required>{{ $role->description }}</textarea>
    </div>

    <div>
        <button type="submit">💾 Save Changes</button>
    </div>
</form>
