<?php

namespace App\Http\Controllers;

use App\Models\PortfolioItem;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        if (Setting::get('maintenance_mode') === 'true') {
            return view('maintenance');
        }

        $portfolio = PortfolioItem::published()->limit(6)->get();

        return view('home', compact('portfolio'));
    }
}
