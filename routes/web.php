<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/home', [LandingController::class, 'index'])->name('home');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Dashboard routes without auth middleware for easy access
Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::get('/posts', [DashboardController::class, 'posts'])->name('posts');
    Route::get('/users', [DashboardController::class, 'users'])->name('users');
    Route::get('/analytics', [DashboardController::class, 'analytics'])->name('analytics');
    
    // Post management routes
    Route::post('/posts/{post}/toggle-status', [DashboardController::class, 'togglePostStatus'])->name('posts.toggleStatus');
    Route::delete('/posts/{post}', [DashboardController::class, 'deletePost'])->name('posts.delete');
    Route::post('/posts/bulk', [DashboardController::class, 'bulkPostActions'])->name('posts.bulk');
    
    // User management routes
    Route::delete('/users/{user}', [DashboardController::class, 'deleteUser'])->name('users.delete');
    Route::put('/users/{user}/role', [DashboardController::class, 'updateUserRole'])->name('users.updateRole');
});

// Add a route alias for the main dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('roles', RoleController::class);
    Route::resource('posts', PostController::class);
});
