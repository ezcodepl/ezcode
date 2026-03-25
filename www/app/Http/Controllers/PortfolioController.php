<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\PortfolioImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    // 📄 lista projektów

    public function index()
    {
        $projects = Portfolio::with('images')->latest()->get();

        return view('admin.portfolio.index', compact('projects'));
    }

    // ➕ dodawanie projektu + zdjęcia
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'technology' => 'nullable|string',
            'url' => 'nullable|url',
            'image_path' => 'nullable|image|max:2048'
        ]);

        $portfolio = Portfolio::create($request->only([
            'title',
            'description',
            'technology',
            'url'
        ]));

        // upload miniatury
        if ($request->hasFile('image_path')) {
            $path = $request->file('image_path')->store('portfolio', 'public');

            PortfolioImage::create([
                'portfolio_id' => $portfolio->id,
                'image_path' => $path
            ]);
        }

        return response()->json($portfolio->load('images'), 201);
    }

    // 🔍 jeden projekt
    public function show($id)
    {
        $portfolio = Portfolio::with('images')->findOrFail($id);

        return view('admin.portfolio.show', compact('portfolio'));
    }

    // ✏️ update
    public function update(Request $request, $id)
    {
        $portfolio = Portfolio::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'technology' => 'nullable|string',
            'url' => 'nullable|url',
            'image_path' => 'nullable|image|max:2048'
        ]);

        $portfolio->update([
            'title' => $request->title,
            'description' => $request->description,
            'technology' => $request->technology,
            'url' => $request->url,
        ]);

        if ($request->hasFile('image_path')) {
            $path = $request->file('image_path')->store('portfolio', 'public');

            $portfolio->images()->create([
                'image_path' => $path
            ]);
        }

        return redirect()
            ->route('admin.portfolio.index')
            ->with('success', 'Projekt został zaktualizowany');
    }

    // ❌ usuwanie projektu + zdjęć
    public function destroy($id)
    {
        $portfolio = Portfolio::with('images')->findOrFail($id);

        foreach ($portfolio->images as $image) {
            Storage::disk('public')->delete($image->image_path);
        }

        $portfolio->delete();

        return response()->json(['message' => 'Deleted']);
    }
    public function create()
    {
        // zwraca widok formularza tworzenia projektu
        return view('admin.portfolio.create');
    }
    public function edit($id)
    {
        $portfolio = Portfolio::with('images')->findOrFail($id);

        return view('admin.portfolio.edit', compact('portfolio'));
    }

    public function view()
{
    $projects = Portfolio::with('images')->latest()->get();

    return view('projekty', compact('projects'));
}
public function view_detail($id)
{
    $portfolio = Portfolio::with('images')->findOrFail($id);

    return view('projekty-show', compact('portfolio'));
}


}