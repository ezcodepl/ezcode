<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    // 📄 lista projektów
    public function index()
    {
        $projects = Portfolio::latest()->get();
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
            'image_desktop' => 'nullable|image|max:2048',
            'image_tablet' => 'nullable|image|max:2048',
            'image_mobile' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['title', 'description', 'technology', 'url']);

        // obsługa uploadu plików
        foreach (['desktop', 'tablet', 'mobile'] as $type) {
            $inputName = "image_$type";
            if ($request->hasFile($inputName)) {
                $data[$inputName] = $request->file($inputName)->store('portfolio_images', 'public');
            }
        }

        $portfolio = Portfolio::create($data);

        return response()->json($portfolio, 201);
    }

    // 🔍 jeden projekt
    public function show($id)
    {
        $portfolio = Portfolio::findOrFail($id);
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
            'image_desktop' => 'nullable|image|max:2048',
            'image_tablet' => 'nullable|image|max:2048',
            'image_mobile' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['title', 'description', 'technology', 'url']);

        // obsługa nowych obrazów
        foreach (['desktop', 'tablet', 'mobile'] as $type) {
            $inputName = "image_$type";
            if ($request->hasFile($inputName)) {
                // usuń stary plik jeśli istnieje
                if ($portfolio->$inputName) {
                    Storage::disk('public')->delete($portfolio->$inputName);
                }
                $data[$inputName] = $request->file($inputName)->store('portfolio_images', 'public');
            }
        }

        $portfolio->update($data);

        return redirect()
            ->route('admin.portfolio.index')
            ->with('success', 'Projekt został zaktualizowany');
    }

    // ❌ usuwanie projektu + zdjęć
    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        // usuń wszystkie pliki
        foreach (['image_desktop', 'image_tablet', 'image_mobile'] as $img) {
            if ($portfolio->$img) {
                Storage::disk('public')->delete($portfolio->$img);
            }
        }

        $portfolio->delete();

        return response()->json(['message' => 'Deleted']);
    }

    public function create()
    {
        return view('admin.portfolio.create');
    }

    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolio.edit', compact('portfolio'));
    }

    public function view()
    {
        $projects = Portfolio::latest()->paginate(6);
        return view('projekty', compact('projects'));
    }

    public function view_detail($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('projekty-show', compact('portfolio'));
    }
}