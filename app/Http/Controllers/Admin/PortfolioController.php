<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioItem;
use App\Models\Category;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    public function index()
    {
        $items = PortfolioItem::with('category')->withTrashed()->latest()->get();
        return view('admin.portfolio.index', compact('items'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.portfolio.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'thumbnail' => 'nullable|image|max:5120',
            'images.*' => 'nullable|image|max:5120',
            'is_published' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('portfolio', 'public');
        }

        if ($request->hasFile('images')) {
            $validated['images'] = collect($request->file('images'))
                ->map(fn($file) => $file->store('portfolio', 'public'))
                ->toArray();
        }

        $validated['is_published'] = $request->boolean('is_published');
        if ($validated['is_published']) {
            $validated['published_at'] = now();
        }

        PortfolioItem::create($validated);

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio item created.');
    }

    public function edit(PortfolioItem $portfolioItem)
    {
        $categories = Category::all();
        return view('admin.portfolio.edit', compact('portfolioItem', 'categories'));
    }

    public function update(Request $request, PortfolioItem $portfolioItem)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'thumbnail' => 'nullable|image|max:5120',
            'images.*' => 'nullable|image|max:5120',
            'is_published' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        if ($request->hasFile('thumbnail')) {
            if ($portfolioItem->thumbnail) {
                \Storage::disk('public')->delete($portfolioItem->thumbnail);
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('portfolio', 'public');
        }

        if ($request->hasFile('images')) {
            $validated['images'] = collect($request->file('images'))
                ->map(fn($file) => $file->store('portfolio', 'public'))
                ->toArray();
        }

        $validated['is_published'] = $request->boolean('is_published');
        if ($validated['is_published'] && !$portfolioItem->is_published) {
            $validated['published_at'] = now();
        }

        $portfolioItem->update($validated);

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio item updated.');
    }

    public function destroy(PortfolioItem $portfolioItem)
    {
        $portfolioItem->delete();

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio item deleted.');
    }

    public function restore(PortfolioItem $portfolioItem)
    {
        $portfolioItem->restore();

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio item restored.');
    }

    public function toggleNav(Request $request)
    {
        Setting::set('show_portfolio_in_nav', $request->boolean('show') ? 'true' : 'false');

        return back()->with('success', 'Navigation visibility updated.');
    }

    public function forceDestroy(PortfolioItem $portfolioItem)
    {
        $portfolioItem->forceDelete();

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio item permanently deleted.');
    }
}
