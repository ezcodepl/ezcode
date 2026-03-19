<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

Route::get('/', function () {
    return view('home');
});

Route::get('/o-mnie', function () {
    return view('o-mnie');
});


Route::get('/oferta', function () {
    return view('oferta');
});


Route::get('/projekty', function () {
    return view('projekty');
});


Route::get('/blog', function () {
    return view('blog');
});



Route::apiResource('portfolio', PortfolioController::class);

// publiczne
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{id}', [PostController::class, 'show']);

// admin
Route::get('/admin/posts', [PostController::class, 'adminIndex']);
Route::post('/posts', [PostController::class, 'store']);
Route::put('/posts/{id}', [PostController::class, 'update']);
Route::delete('/posts/{id}', [PostController::class, 'destroy']);