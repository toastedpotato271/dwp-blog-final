@extends('dashboard.layout')

@section('title', 'Add User')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-10 sm:px-6 lg:px-8">
    <div class="pb-5 border-b border-gray-200">
        <h3 class="text-lg leading-6 font-medium text-gray-900">Add New User</h3>
        <p class="mt-2 text-sm text-gray-500">Create a new user account with admin or contributor role.</p>
    </div>
    
    @if(session('error'))
        <div class="mt-4 bg-red-50 border-l-4 border-red-400 p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-red-700">{{ session('error') }}</p>
                </div>
            </div>
        </div>
    @endif

    <form class="mt-6 space-y-8 divide-y divide-gray-200" method="POST" action="{{ route('dashboard.users.store') }}">
        @csrf
        
        <div class="space-y-6">
            <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900">Account Information</h3>
                <p class="mt-1 text-sm text-gray-500">User account details.</p>
            </div>

            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                <!-- Name -->
                <div class="sm:col-span-3">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <div class="mt-1">
                        <input type="text" name="name" id="name" value="{{ old('name') }}" 
                            class="shadow-sm focus:ring-green-500 focus:border-green-500 block w-full sm:text-sm border-gray-300 rounded-md @error('name') border-red-300 @enderror">
                    </div>
                    @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="sm:col-span-3">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <div class="mt-1">
                        <input type="email" name="email" id="email" value="{{ old('email') }}" 
                            class="shadow-sm focus:ring-green-500 focus:border-green-500 block w-full sm:text-sm border-gray-300 rounded-md @error('email') border-red-300 @enderror">
                    </div>
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="sm:col-span-3">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="mt-1">
                        <input type="password" name="password" id="password"
                            class="shadow-sm focus:ring-green-500 focus:border-green-500 block w-full sm:text-sm border-gray-300 rounded-md @error('password') border-red-300 @enderror">
                    </div>
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Confirmation -->
                <div class="sm:col-span-3">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <div class="mt-1">
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="shadow-sm focus:ring-green-500 focus:border-green-500 block w-full sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>

                <!-- User Role -->
                <div class="sm:col-span-6">
                    <fieldset>
                        <legend class="text-base font-medium text-gray-700">User Role</legend>
                        <div class="mt-4 space-y-4">
                            @foreach($roles as $role)
                            <div class="flex items-center">
                                <input id="{{ strtolower($role->display_name) }}" 
                                       name="roles[]" 
                                       type="checkbox" 
                                       value="{{ $role->id }}" 
                                       class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded"
                                       {{ in_array($role->id, old('roles', [])) ? 'checked' : '' }}>
                                <label for="{{ strtolower($role->display_name) }}" class="ml-3 block text-sm font-medium text-gray-700">
                                    {{ $role->display_name }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                        @error('roles')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </fieldset>
                </div>
            </div>
        </div>

        <div class="pt-5">
            <div class="flex justify-end">
                <a href="{{ route('dashboard.users') }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Cancel
                </a>
                <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Create User
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
