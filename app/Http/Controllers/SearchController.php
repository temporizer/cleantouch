<?php

namespace App\Http\Controllers;

use App\Models\PortfolioItem;
use App\Models\Page;
use App\Models\Setting;

class SearchController extends Controller
{
    public function index()
    {
        if (Setting::get('maintenance_mode') === 'true') {
            return redirect('/');
        }

        $query = request('q');
        $results = [];

        if ($query) {
            $portfolioResults = PortfolioItem::published()->search($query)->get()->map(fn($item) => [
                'type' => 'portfolio',
                'title' => $item->title,
                'slug' => $item->slug,
                'excerpt' => $item->description,
                'url' => route('portfolio.show', $item->slug),
            ]);

            $pageResults = Page::published()->search($query)->get()->map(fn($page) => [
                'type' => 'page',
                'title' => $page->title,
                'slug' => $page->slug,
                'excerpt' => $page->content,
                'url' => route('page.show', $page->slug),
            ]);

            $results = $portfolioResults->merge($pageResults);
        }

        return view('search', compact('query', 'results'));
    }
}
