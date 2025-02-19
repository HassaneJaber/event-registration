<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth;

// Home route
Route::get('/', function () {
    return view('home');
})->name('home');

// Dashboard route (requires authentication & email verification)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Public event routes (accessible to everyone)
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');
Route::post('/events/{id}/register', [EventController::class, 'register'])->name('events.register');
Route::get('/events/{id}/attendees', [EventController::class, 'attendees'])->name('events.attendees');

// Authentication routes
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// Authenticated user routes (Profile management)
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin-only routes for event creation
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/admin/events/store', [EventController::class, 'store'])->name('events.store');
});

// Remove duplicate Auth::routes()
Auth::routes();
