@extends('layouts.dashboard')

@section('content')
<div class="p-6">
    <!-- Page Header -->
    <x-dashboard.main.page-header 
        title="Users Management" 
        subtitle="Manage user accounts, roles, and permissions." 
        icon="users" 
    />

    <!-- Users Content -->
    <x-dashboard.users.content 
        :users="$users ?? collect()"
        :roles="$roles ?? collect()"
        :currentRole="request()->query('role')"
        :searchQuery="request()->query('search')"
    />
</div>
@endsection
