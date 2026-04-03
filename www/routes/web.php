<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PortfolioController;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

// Strona główna
Route::get('/', [HomeController::class, 'index'])->name('home');

// Pojedynczy post
Route::get('/post/{post}', [HomeController::class, 'show'])->name('posts.show');

// Statyczne strony
Route::view('/o-mnie', 'o-mnie')->name('o-mnie');
Route::view('/oferta', 'oferta')->name('oferta');

// Portfolio - frontend
Route::get('/projekty', [PortfolioController::class, 'view'])->name('projekty.view');
Route::get('/projekty/{id}', [PortfolioController::class, 'view_detail'])->name('projekty-show');

// Blog - frontend
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog-show');


/*
|--------------------------------------------------------------------------
| Dashboard & Profile Routes (auth)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';


/*
|--------------------------------------------------------------------------
| Admin Routes (auth + admin)
|--------------------------------------------------------------------------
| Wszystkie trasy w tej grupie wymagają zalogowania (auth) oraz 
| dodatkowej weryfikacji uprawnień administratora (middleware admin).
| Dostępne pod adresem: TwojaDomena.pl/admin/...
|
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    // Portfolio CRUD
    Route::resource('portfolio', PortfolioController::class);

    // Posts CRUD
    Route::get('posts', [PostController::class, 'adminIndex'])->name('posts.index');
    Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::get('posts/{post}/show', [PostController::class, 'show'])->name('posts.show');
    Route::put('posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    Route::post('posts/upload-image', [PostController::class, 'uploadImage'])->name('posts.uploadImage');


Route::get('settings', [\App\Http\Controllers\Admin\SettingsController::class, 'index'])->name('settings');


    // Admin logout
    Route::post('logout', function () {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    })->name('logout');
});