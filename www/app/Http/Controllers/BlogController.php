<?php

namespace App\Http\Controllers;

use App\Models\Post; // Import modelu Post
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Wyświetlanie listy postów (index)
     */
    public function index()
    {
        $posts = Post::latest()->paginate(9);
        return view('blog', compact('posts'));
    }

    /**
     * Wyświetlanie pojedynczego posta
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->with('user')->firstOrFail(); // tylko user relacja
        return view('blog-show', compact('post'));
    }
}
