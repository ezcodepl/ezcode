<?php

//namespace App\Http\Controllers;

//use App\Models\Post;
//use Illuminate\Http\Request;
 
// class PostController extends Controller
// {
//     // 📄 lista postów (tylko opublikowane)
//     public function index()
//     {
//         return Post::with('user')
//             ->where('status', 'published')
//             ->whereDate('date_public', '<=', now())
//             ->latest()
//             ->get();
//     }

//     // 🛠️ lista wszystkich (admin)
//     public function adminIndex()
//     {
//        // return Post::with('user')->latest()->get();
//         $posts = Post::with('user')->latest()->get();
//         return view('admin.posts.index', compact('posts'));
//     }

//     // ➕ dodawanie posta
//     public function store(Request $request)
//     {
//         $request->validate([
//             'title' => 'required|string|max:255',
//             'content' => 'required|string',
//             'date_public' => 'nullable|date',
//             'status' => 'required|in:draft,published,archived',
//         ]);

//         $post = Post::create([
//             ...$request->only(['title', 'content', 'date_public', 'status']),
//             'user_id' => auth()->id() ?? 1 // fallback jeśli brak auth
//         ]);

//         return response()->json($post, 201);
//     }

//     // 🔍 jeden post
//     public function show($id)
//     {
//         $post = Post::with('user')->findOrFail($id);

//         // blokada dla nieopublikowanych
//         if ($post->status !== 'published') {
//             abort(403);
//         }

//         return $post;
//     }

//     // ✏️ update
//     public function update(Request $request, $id)
//     {
//         $post = Post::findOrFail($id);

//         $request->validate([
//             'title' => 'sometimes|string|max:255',
//             'content' => 'sometimes|string',
//             'date_public' => 'nullable|date',
//             'status' => 'in:draft,published,archived',
//         ]);

//         $post->update($request->only([
//             'title',
//             'content',
//             'date_public',
//             'status'
//         ]));

//         return response()->json($post);
//     }

//     // ❌ usuwanie
//     public function destroy($id)
//     {
//         Post::findOrFail($id)->delete();

//         return response()->json(['message' => 'Deleted']);
//     }
// }



namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // lista postów dla admina
    public function adminIndex()
    {
        $posts = Post::with('user')->latest()->get();
        return view('admin.posts.index', compact('posts'));
    }

    // formularz dodawania
    public function create()
    {
        return view('admin.posts.create');
    }

    // zapis nowego posta
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'date_public' => 'nullable|date',
            'status' => 'required|in:draft,published,archived',
        ]);

        Post::create([
            ...$request->only(['title', 'content', 'date_public', 'status']),
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('admin.posts.index')->with('success', 'Post dodany!');
    }

    // formularz edycji
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    // aktualizacja
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'date_public' => 'nullable|date',
            'status' => 'required|in:draft,published,archived',
        ]);

        $post->update($request->only(['title', 'content', 'date_public', 'status']));

        return redirect()->route('admin.posts.index')->with('success', 'Post zaktualizowany!');
    }

    // usuwanie
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Post usunięty!');
    }
    public function uploadImage(Request $request)
{
    $request->validate([
        'file' => 'required|image|max:2048'
    ]);

    $path = $request->file('file')->store('posts', 'public');

    return response()->json(['location' => "/storage/$path"]);
}

public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }
}