<?php

use App\Http\Controllers\PostController;
use App\Livewire\CreatePost;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::resource("/posts", PostController::class)
    ->only(['index', 'show'])
    ->middleware(['auth', 'verified']);

require __DIR__ . '/auth.php';
