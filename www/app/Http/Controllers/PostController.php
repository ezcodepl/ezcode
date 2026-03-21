<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // Lista postów dla admina
    public function adminIndex()
    {
        $posts = Post::with('user')->latest()->get();
        return view('admin.posts.index', compact('posts'));
    }

    // Formularz dodawania
    public function create()
    {
        return view('admin.posts.create');
    }

    // Zapis nowego posta
    public function store(Request $request)
    {
        // 1. Walidacja wszystkich pól przesyłanych z formularza
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'content'     => 'required|string',
            'excerpt'     => 'nullable|string',
            'category'    => 'required|string',
            'read_time'   => 'required|string',
            'status'      => 'required|in:draft,published,archived',
            'date_public' => 'nullable|date',
            'thumbnail' => 'nullable|file|mimetypes:image/jpeg,image/png,image/webp,image/avif|max:2048',
        ]);

        // 2. Transakcja dla zachowania spójności (Post + Obrazek)
        return DB::transaction(function () use ($request, $data) {
            
            // Tworzenie posta z generowaniem sluga
            $post = Post::create([
                'user_id'     => auth()->id() ?? 1,
                'title'       => $data['title'],
                'slug'        => Str::slug($data['title']),
                'content'     => $data['content'],
                'excerpt'     => $data['excerpt'],
                'category'    => $data['category'],
                'read_time'   => $data['read_time'],
                'status'      => $data['status'],
                'date_public' => $data['date_public'],
            ]);

            // 3. Obsługa miniatury i zapis do tabeli post_images
            if ($request->hasFile('thumbnail')) {
                $path = $request->file('thumbnail')->store('posts/thumbnails', 'public');

                PostImage::create([
                    'post_id'      => $post->id,
                    'path'         => $path,
                    'is_thumbnail' => true,
                ]);
            }

            return redirect()->route('admin.posts.index')->with('success', 'Post dodany pomyślnie!');
        });
    }

    // Formularz edycji
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    // Aktualizacja
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'content'     => 'required|string',
            'excerpt'     => 'nullable|string',
            'category'    => 'required|string',
            'read_time'   => 'required|string',
            'status'      => 'required|in:draft,published,archived',
            'date_public' => 'nullable|date',
            'thumbnail'   => 'nullable|image|max:2048',
        ]);

        DB::transaction(function () use ($request, $post, $data) {
            $post->update([
                'title'       => $data['title'],
                'slug'        => Str::slug($data['title']),
                'content'     => $data['content'],
                'excerpt'     => $data['excerpt'],
                'category'    => $data['category'],
                'read_time'   => $data['read_time'],
                'status'      => $data['status'],
                'date_public' => $data['date_public'],
            ]);

            if ($request->hasFile('thumbnail')) {
                // Opcjonalnie: usuń stare zdjęcie z tabeli post_images i dysku
                $oldImage = PostImage::where('post_id', $post->id)->where('is_thumbnail', true)->first();
                if ($oldImage) {
                    Storage::disk('public')->delete($oldImage->path);
                    $oldImage->delete();
                }

                $path = $request->file('thumbnail')->store('posts/thumbnails', 'public');
                PostImage::create([
                    'post_id'      => $post->id,
                    'path'         => $path,
                    'is_thumbnail' => true,
                ]);
            }
        });

        return redirect()->route('admin.posts.index')->with('success', 'Post zaktualizowany!');
    }

    // Usuwanie
    public function destroy(Post $post)
    {
        // Tutaj warto dodać usuwanie plików graficznych z dysku przed delete()
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Post usunięty!');
    }

    // Upload obrazków bezpośrednio z TinyMCE (drag & drop w edytorze)
    public function uploadImage(Request $request)
    {
        $request->validate([
            'file' => 'required|image|max:2048'
        ]);

        $path = $request->file('file')->store('posts/content', 'public');

        return response()->json(['location' => "/storage/$path"]);
    }

    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }
    
}