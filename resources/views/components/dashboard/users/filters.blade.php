{{-- 
    Users Management Filters Component
    
    Props:
    - roles: Collection of roles for filtering
    - currentRole: Current role filter (optional)
    - searchQuery: Current search query (optional)
--}}

@props([
    'roles' => null,
    'currentRole' => null,
    'searchQuery' => ''
])

<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <!-- Search Bar -->
    <div class="flex-1 max-w-md">
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <form method="GET" action="{{ route('dashboard.users') }}" class="flex items-center gap-3">
                <input name="search" type="text" value="{{ $searchQuery }}"
                       placeholder="Search users by name or email..." 
                       class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-green-500 focus:border-green-500 sm:text-sm"
                       onkeydown="if(event.key==='Enter'){this.form.submit();}">
            </form>
        </div>
    </div>

    <!-- Filter Controls -->
    <div class="flex items-center gap-3">
        <!-- Role Filter -->
        @if($roles && $roles->count() > 0)
            <form method="GET" action="{{ route('dashboard.users') }}" class="flex items-center gap-3">
                @if($searchQuery)
                    <input type="hidden" name="search" value="{{ $searchQuery }}">
                @endif
                <select name="role" onchange="this.form.submit()" class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-green-500 focus:border-green-500">
                    <option value="">All Roles</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}" {{ (string)$currentRole === (string)$role->id ? 'selected' : '' }}>
                            {{ $role->display_name }}
                        </option>
                    @endforeach
                </select>
            </form>
        @endif

        <!-- Add User Button -->
        <a href="{{ route('dashboard.users.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Add User
        </a>
    </div>
</div>
