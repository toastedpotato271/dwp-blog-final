<a href="{{ route('roles.index') }}">← Back to Roles</a>

<div>
    <h2>Role Details</h2>
    <p>This is a read-only view of the selected role.</p>

    <form action="{{ route('roles.store') }}" method="POST">
        @csrf

        <div>
            <label for="role_name">Role Name</label>
            <input type="text" id="role_name" name="role_name" value="{{ $role->role_name }}" disabled>
        </div>

        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="4" disabled>{{ $role->description }}</textarea>
        </div>
    </form>
</div>
