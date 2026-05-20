<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Setting;

class PageController extends Controller
{
    public function show($slug)
    {
        if (Setting::get('maintenance_mode') === 'true') {
            return redirect('/');
        }

        $page = Page::published()->where('slug', $slug)->firstOrFail();

        return view('page', compact('page'));
    }
}
