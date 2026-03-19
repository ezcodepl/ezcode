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
        return Portfolio::with('images')->latest()->get();
    }

    // ➕ dodawanie projektu + zdjęcia
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'technology' => 'nullable|string',
            'url' => 'nullable|url',
            'images.*' => 'image|max:2048'
        ]);

        $portfolio = Portfolio::create($request->only([
            'title',
            'description',
            'technology',
            'url'
        ]));

        // upload zdjęć
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('portfolio', 'public');

                PortfolioImage::create([
                    'portfolio_id' => $portfolio->id,
                    'image_path' => $path
                ]);
            }
        }

        return response()->json($portfolio->load('images'), 201);
    }

    // 🔍 jeden projekt
    public function show($id)
    {
        return Portfolio::with('images')->findOrFail($id);
    }

    // ✏️ update
    public function update(Request $request, $id)
    {
        $portfolio = Portfolio::findOrFail($id);

        $portfolio->update($request->only([
            'title',
            'description',
            'technology',
            'url'
        ]));

        // dodanie nowych zdjęć
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('portfolio', 'public');

                PortfolioImage::create([
                    'portfolio_id' => $portfolio->id,
                    'image_path' => $path
                ]);
            }
        }

        return response()->json($portfolio->load('images'));
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
}