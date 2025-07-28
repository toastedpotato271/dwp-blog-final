{{-- 
    Users Management Content Section Component
    
    Props:
    - users: Collection of users
    - roles: Collection of roles for filtering
    - currentRole: Current role filter (optional)
    - currentStatus: Current status filter (optional)
--}}

@props([
    'users',
    'roles' => null,
    'currentRole' => null,
    'currentStatus' => null
])

<div class="bg-white rounded-lg shadow-sm border border-gray-100">
    <!-- Filters Section -->
    <div class="p-6 border-b border-gray-100">
        <x-dashboard.users.filters 
            :roles="$roles"
            :currentRole="$currentRole"
            :currentStatus="$currentStatus"
        />
    </div>

    <!-- Users Table -->
    <div class="overflow-x-auto">
        <x-dashboard.users.table :users="$users" />
    </div>
</div>
