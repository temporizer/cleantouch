<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageContent;
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
        $page->is_published = true;
        $page->save();

        foreach ($data as $key => $value) {
            PageContent::updateOrCreate(
                ['page_id' => $page->id, 'key' => $key],
                ['value' => $value]
            );
        }

        $page->content = json_encode(PageContent::where('page_id', $page->id)->pluck('value', 'key')->toArray());
        $page->save();

        return response()->json(['success' => true]);
    }
}
