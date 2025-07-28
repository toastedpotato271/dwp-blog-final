<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);


Route::middleware('auth')->group(function () {
    // (Auth Users) can access these functions.
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('roles', RoleController::class);
    Route::resource('categories', CategoryController::class);


    Route::resource(name: 'posts', controller: PostController::class); // this one has all our posts functions - call the functions in blade view instead
    Route::resource('comments', controller: CommentController::class); // this one has all our posts functions - call the functions in blade view instead
});


Route::get('/db-check', function () {
    $path = config('database.connections.sqlite.database');
    return response()->json([
        'expected_path' => $path,
        'file_exists' => file_exists($path),
        'realpath' => realpath($path),
        'writable' => is_writable($path),
        'current_posts' => \App\Models\Post::count(),
    ]);
});
