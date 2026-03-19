<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/posts', [PostController::class, 'adminIndex']);
});

Route::get('/check', function() {
    dd(auth()->user()->is_admin, auth()->user());
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function() {
    Route::get('posts', [PostController::class, 'adminIndex'])->name('posts.index');
    Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});

Route::post('admin/posts/upload-image', [PostController::class, 'uploadImage'])->name('admin.posts.uploadImage');

Route::post('/admin/logout', function () {
    auth()->logout(); // wylogowuje użytkownika z sesji
    request()->session()->invalidate(); // unieważnia sesję
    request()->session()->regenerateToken(); // regeneruje CSRF token
    return redirect('/login'); // przekierowanie po logout
})->name('admin.logout')->middleware('auth');