<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;


/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }

    return redirect()->route('login');
});


/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

// Login page
Route::get('/login', [AuthController::class, 'showLogin'])
    ->middleware('guest')
    ->name('login');

// Login form
Route::post('/login', [AuthController::class, 'login'])
    ->middleware('guest')
    ->name('login.store');

// Register page
Route::get('/register', [AuthController::class, 'showRegister'])
    ->middleware('guest')
    ->name('register');

// Register form
Route::post('/register', [AuthController::class, 'register'])
    ->middleware('guest')
    ->name('register.store');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | Tasks
    |--------------------------------------------------------------------------
    */

    Route::get('/tasks', [TaskController::class, 'index'])
        ->name('tasks.index');

    Route::post('/tasks', [TaskController::class, 'store'])
        ->name('tasks.store');

    Route::get('/tasks/{task}', [TaskController::class, 'show'])
        ->name('tasks.show');

    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])
        ->name('tasks.edit');

    Route::put('/tasks/{task}', [TaskController::class, 'update'])
        ->name('tasks.update');

    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])
        ->name('tasks.destroy');

    Route::patch('/tasks/{task}/toggle', [TaskController::class, 'toggle'])
        ->name('tasks.toggle');


    /*
    |--------------------------------------------------------------------------
    | Categories
    |--------------------------------------------------------------------------
    */

    Route::get('/categories', [CategoryController::class, 'index'])
        ->name('categories.index');

    Route::post('/categories', [CategoryController::class, 'store'])
        ->name('categories.store');

    Route::get('/categories/{category}', [CategoryController::class, 'show'])
        ->name('categories.show');

    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])
        ->name('categories.edit');

    Route::put('/categories/{category}', [CategoryController::class, 'update'])
        ->name('categories.update');

    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])
        ->name('categories.destroy');


    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */

    // Profile page
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    // Update profile
    Route::put('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    // Password page
    Route::get('/profile/password', [ProfileController::class, 'password'])
        ->name('profile.password');

    // Update password
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])
        ->name('profile.password.update');

    // Delete account
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});
