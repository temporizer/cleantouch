<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PortfolioItem;
use App\Http\Resources\PortfolioResource;

class PortfolioController extends Controller
{
    public function index()
    {
        $items = PortfolioItem::published()
            ->when(request('category'), fn($q, $cat) => $q->where('category_id', $cat))
            ->latest()
            ->paginate(request('per_page', 12));

        return PortfolioResource::collection($items);
    }

    public function show($slug)
    {
        $item = PortfolioItem::published()->where('slug', $slug)->firstOrFail();
        return new PortfolioResource($item);
    }
}
