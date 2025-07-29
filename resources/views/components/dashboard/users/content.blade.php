{{-- 
    Users Management Content Section Component
    
    Props:
    - users: Collection of users
    - roles: Collection of roles for filtering
    - currentRole: Current role filter (optional)
    - searchQuery: Current search query (optional)
--}}

@props([
    'users',
    'roles' => null,
    'currentRole' => null,
    'searchQuery' => ''
])

<div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
    <!-- Filters Section -->
    <div class="p-6 border-b border-gray-200">
        <x-dashboard.users.filters 
            :roles="$roles"
            :currentRole="$currentRole"
            :searchQuery="$searchQuery"
        />
    </div>

    <!-- Users Table Section -->
    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="align-middle inline-block min-w-full">
                <x-dashboard.users.table :users="$users" :roles="$roles" />
            </div>
        </div>
    </div>
</div>

