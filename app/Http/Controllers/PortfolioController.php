<?php

namespace App\Http\Controllers;

use App\Models\PortfolioItem;
use App\Models\Category;
use App\Models\Setting;

class PortfolioController extends Controller
{
    public function index()
    {
        if (Setting::get('maintenance_mode') === 'true') {
            return redirect('/');
        }

        if (Setting::get('show_portfolio_in_nav') === 'false') {
            return redirect('/');
        }

        $categoryId = request('category');
        $portfolio = PortfolioItem::published()
            ->when($categoryId, fn($q) => $q->where('category_id', $categoryId))
            ->paginate(12);

        $categories = Category::all();

        return view('portfolio.index', compact('portfolio', 'categories', 'categoryId'));
    }

    public function show($slug)
    {
        if (Setting::get('maintenance_mode') === 'true') {
            return redirect('/');
        }

        if (Setting::get('show_portfolio_in_nav') === 'false') {
            return redirect('/');
        }

        $item = PortfolioItem::published()->where('slug', $slug)->firstOrFail();

        return view('portfolio.show', compact('item'));
    }
}
