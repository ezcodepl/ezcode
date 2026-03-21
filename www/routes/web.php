<?php


use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;

Route::get('/', [HomeController::class, 'index']);// Frontend - widok pojedynczego posta
Route::get('/post/{post}', [HomeController::class, 'show'])->name('posts.show');
// Strona główna
// Route::get('/', function () {
//     return view('home');
// })->name('home');
Route::get('/o-mnie', function () { return view('o-mnie'); })->name('o-mnie');
Route::get('/oferta', function () { return view('oferta'); })->name('oferta');

Route::get('/projekty', function () { return view('projekty'); })->name('projekty');

//Route::get('/blog', function () { return view('blog'); })->name('blog');
Route::get('/blog', function () {
    $posts = \App\Models\Post::all();
    return view('blog', ['posts' => $posts]);
});


Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog-show');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');

// Dashboard (auth + verified)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile (auth)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth routes
require __DIR__.'/auth.php';



// Admin routes (auth + admin)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('posts', [PostController::class, 'adminIndex'])->name('posts.index');
    Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
      Route::get('posts/{post}/show', [PostController::class, 'show'])->name('posts.show');
    Route::put('posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    Route::post('posts/upload-image', [PostController::class, 'uploadImage'])->name('posts.uploadImage');

    Route::post('logout', function () {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    })->name('logout');
});