@extends('layouts.app')
@section('content')

<a href="{{ route('roles.create') }}">Create Role</a>

<div>
    <table>
        <thead>
            <tr>
                <th>Role Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($roles as $role)
            <tr class="text-2xl">
                <td>{{ $role->role_name }}</td>
                <td>{{ $role->description }}</td>
                <td>
                    <button onclick="window.location='{{ route('roles.show', $role->id) }}'">Show</button>
                    <button onclick="window.location='{{ route('roles.edit', $role->id) }}'">Edit</button>
                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
