<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Setting;

class AboutController extends Controller
{
    public function index()
    {
        if (Setting::get('maintenance_mode') === 'true') {
            return redirect('/');
        }

        $page = Page::where('slug', 'about')->first();

        $content = [
            'section_label' => '/ MANIFESTO',
            'about_title' => 'More than cleaning.<br>It\'s <span class="highlight">restoration</span>.',
            'body' => 'Clean Touch was founded with a simple idea: that a clean home should feel like a sanctuary, not a showroom. We use eco-safe products. We take our time. We believe the small details — the dust-free baseboard, the streak-free mirror, the smell of fresh air — add up to something meaningful.',
            'body_2' => 'Every home has a story, and we\'re honored to be a part of it. Whether it\'s a weekly refresh or a seasonal deep clean, our approach is the same: meticulous, respectful, and thorough. We\'re not happy until you can feel the difference.',
            'stat_1_num' => '11+',
            'stat_1_label' => 'years in print',
            'stat_2_num' => '5000+',
            'stat_2_label' => 'homes featured',
            'stat_3_num' => '100%',
            'stat_3_label' => 'eco-friendly ink',
            'quote' => '"We don\'t just clean spaces — we restore how they feel."',
            'quote_author' => '— founder\'s note',
        ];

        if ($page && $page->content) {
            $decoded = json_decode($page->content, true);
            if (is_array($decoded)) {
                $content = array_merge($content, $decoded);
            }
        }

        return view('about', compact('content'));
    }
}
