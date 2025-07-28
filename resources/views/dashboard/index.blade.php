@extends('layouts.dashboard')

@section('content')
<div class="p-6">
    <!-- Page Header -->
    <x-dashboard.main.page-header 
        title="Dashboard" 
        icon="dashboard" 
    />

    <!-- Statistics Grid -->
    <x-dashboard.main.stats-grid 
        :stats="[
            'total_posts' => $stats['total_posts'] ?? 0,
            'total_users' => $stats['total_users'] ?? 0,
            'total_comments' => $stats['total_comments'] ?? 0,
            'total_contributors' => $stats['total_contributors'] ?? 0
        ]"
    />

    <!-- Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <x-dashboard.main.recent-posts :posts="$recentPosts ?? collect()" viewAllUrl="{{ route('dashboard.posts') }}" />
        <x-dashboard.main.recent-users :users="$recentUsers ?? collect()" viewAllUrl="{{ route('dashboard.users') }}" />
    </div>
</div>
@endsection
