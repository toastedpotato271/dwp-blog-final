@extends('layouts.master')

@section('content')
<div class="container mx-auto mb-10 bg-white p-6 rounded-lg w-full max-w-md">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Role</h1>

    <!-- Display Validation Errors -->
    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Whoops!</strong>
        <span class="block sm:inline">There were some problems with your input.</span>
        <ul class="mt-2 list-disc list-inside">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')
        <!-- Use PUT method for updates -->

        <div class="mb-4">
            <label for="role_name" class="block text-gray-700 text-lg font-bold mb-2">Role Name</label>
            <input type="text" id="role_name" name="role_name" value="{{ old('role_name', $role->role_name) }}" required
                class="appearance-none border rounded-2xl w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-lg font-bold mb-2">Description</label>
            <textarea type="text" id="description" name="description"
                required
                class="h-50 resize-none appearance-none border rounded-2xl w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500">{{ old('description', $role->description) }}
            </textarea>
        </div>

        <div class="flex justify-between items-center mt-6">
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-2xl focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
                Update
            </button>
            <a href="{{ route('roles.index') }}"
                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-2xl transition duration-150 ease-in-out">
                <x-tabler-x />
            </a>
        </div>
    </form>
</div>
@endsection