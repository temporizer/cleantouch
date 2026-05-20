<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
use App\Models\PortfolioItem;
use App\Models\Setting;

class AboutController extends Controller
{
    public function index()
    {
        if (Setting::get('maintenance_mode') === 'true') {
            return redirect('/');
        }

        $page = Page::published()->where('slug', 'about')->first();

        $stats = [
            'portfolio' => PortfolioItem::published()->count(),
            'categories' => Category::count(),
            'years' => 3,
            'coffee' => '∞',
        ];

        return view('about', compact('page', 'stats'));
    }
}
