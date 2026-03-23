<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $posts = Post::where('status', 'published')->latest()->take(3)->get();
        return view('home', compact('posts'));
    }

    public function show(Post $post) {
        // Wyświetla pojedynczy post
        return view('post.show', compact('post'));
    }
}