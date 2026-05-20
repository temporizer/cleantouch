<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PortfolioItem;
use App\Models\Page;

class SearchController extends Controller
{
    public function index()
    {
        request()->validate(['q' => 'required|string|min:2']);

        $query = request('q');

        $portfolioResults = PortfolioItem::published()->search($query)->get()->map(fn($item) => [
            'type' => 'portfolio',
            'title' => $item->title,
            'slug' => $item->slug,
            'excerpt' => $item->description,
        ]);

        $pageResults = Page::published()->search($query)->get()->map(fn($page) => [
            'type' => 'page',
            'title' => $page->title,
            'slug' => $page->slug,
            'excerpt' => $page->content,
        ]);

        return response()->json([
            'data' => $portfolioResults->merge($pageResults),
        ]);
    }
}
