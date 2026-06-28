<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageContentController extends Controller
{
    public function save(Request $request, $slug)
    {
        if (!in_array($slug, ['home', 'about'])) {
            return response()->json(['success' => false, 'error' => 'Invalid slug'], 404);
        }

        $data = $request->json()->all();

        $page = Page::firstOrNew(['slug' => $slug]);
        $page->title = $slug === 'home' ? 'Home' : 'About';
        $page->slug = $slug;
        $page->content = json_encode($data);
        $page->is_published = true;
        $page->save();

        return response()->json(['success' => true]);
    }
}
