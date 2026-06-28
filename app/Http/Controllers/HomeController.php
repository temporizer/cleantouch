<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        if (Setting::get('maintenance_mode') === 'true') {
            return view('maintenance');
        }

        $page = Page::where('slug', 'home')->first();

        $content = [
            'hero_stamp' => 'VOL. 1 / 2026',
            'hero_title_main' => 'CLEAN TOUCH',
            'hero_title_sub' => 'The Art of Clean',
            'hero_body' => 'This is not your average cleaning company zine. We\'re here to talk about dust, dignity, and the domestic revolution happening one spotless corner at a time.',
            'hero_btn_primary' => 'Read the feature →',
            'hero_btn_secondary' => 'Get a copy',
            'hero_polaroid_label' => 'clean home energy',
            'hero_sticker' => 'EST. 2017',
            'services_header' => '/ WHAT WE DO',
            'services_subtitle' => 'Six essential services. Zero compromises.',
            'service_1_title' => 'Dusting &amp; Polishing',
            'service_1_desc' => 'Every surface, every shelf, every blind — nothing escapes our rag. Non-toxic polishes that protect your furniture.',
            'service_2_title' => 'Vacuuming &amp; Mopping',
            'service_2_desc' => 'Deep cleaning for every floor type. Hardwood, tile, laminate, carpet — we choose the right technique.',
            'service_3_title' => 'Bathroom Cleaning',
            'service_3_desc' => 'Sinks, showers, toilets, mirrors — sanitized and streak-free. Grout gets special attention.',
            'service_4_title' => 'Kitchen Cleaning',
            'service_4_desc' => 'Countertops, appliances, backsplashes — degreased, sanitized, polished. Food-safe and ready.',
            'service_5_title' => 'Window Cleaning',
            'service_5_desc' => 'Interior glass cleaned to a streak-free shine. Sills, tracks, and frames included.',
            'service_6_title' => 'Recurring Maintenance',
            'service_6_desc' => 'Weekly, bi-weekly, or monthly. A schedule that fits your rhythm with consistent quality.',
            'manifesto_label' => '/ MANIFESTO',
            'manifesto_title' => 'More than cleaning.<br>It\'s <span class="highlight">restoration</span>.',
            'manifesto_body' => 'Clean Touch was founded with a simple idea: that a clean home should feel like a sanctuary, not a showroom. We use eco-safe products. We take our time. We believe the small details — the dust-free baseboard, the streak-free mirror, the smell of fresh air — add up to something meaningful.',
            'manifesto_stat_1_num' => '11+',
            'manifesto_stat_1_label' => 'years in print',
            'manifesto_stat_2_num' => '5000+',
            'manifesto_stat_2_label' => 'homes featured',
            'manifesto_stat_3_num' => '100%',
            'manifesto_stat_3_label' => 'eco-friendly ink',
            'manifesto_quote' => '"We don\'t just clean spaces — we restore how they feel."',
            'manifesto_quote_author' => '— founder\'s note',
            'pricing_header' => '/ CLASSIFIEDS',
            'pricing_subtitle' => 'Simple pricing. No hidden fees. No fine print.',
            'pricing_1_tag' => 'FOR SALE',
            'pricing_1_title' => 'Weekly Cleaning',
            'pricing_1_price' => '$150 / visit',
            'pricing_1_desc' => 'Consistent care for homes that like to stay show-ready. One visit every week. Satisfaction guaranteed.',
            'pricing_2_tag' => 'BEST VALUE',
            'pricing_2_title' => 'Bi-Weekly Cleaning',
            'pricing_2_price' => '$120 / visit',
            'pricing_2_desc' => 'A balanced rhythm for homes that need regular attention without overcommitment. Our most popular plan.',
            'pricing_3_tag' => 'FOR SALE',
            'pricing_3_title' => 'Deep Clean',
            'pricing_3_price' => '$200 / visit',
            'pricing_3_desc' => 'A thorough reset — ideal for move-ins, move-outs, or seasonal refresh. Top-to-bottom intensive care.',
            'testimonials_header' => '/ LETTERS TO THE EDITOR',
            'testimonial_1_text' => 'They noticed things I hadn\'t seen in years — baseboards, corners, the tops of picture frames. The house felt different afterwards. Lighter.',
            'testimonial_1_author' => '— Morgan T., Portland',
            'testimonial_2_text' => 'I was skeptical at first, but after the first visit I understood. This isn\'t a cleaning service — it\'s a restoration service for your peace of mind.',
            'testimonial_2_author' => '— Priya K., Vancouver',
            'testimonial_3_text' => 'Our bi-weekly visits have become a ritual. The consistency is remarkable — every time, the same meticulous attention.',
            'testimonial_3_author' => '— James R., Bend',
            'cta_title' => 'Subscribe to <span class="highlight">clean living</span>',
            'cta_body' => 'Reach out for a free quote. No pressure — just a cleaner place to call home.',
            'cta_btn' => 'Get a Free Quote',
            'cta_email' => 'info@cleantouchllc.net',
            'cta_locations' => 'Vancouver &amp; Portland',
            'colophon_site_name' => 'Clean Touch',
            'colophon_issue' => 'Volume 1, Issue 2026',
            'colophon_contact_title' => 'Contact',
            'colophon_phone' => '(360) 719-9650',
            'colophon_email' => 'info@cleantouchllc.net',
            'colophon_distribution_title' => 'Distribution',
            'colophon_locations' => 'Vancouver, WA &middot; Portland, OR &middot; Beaverton, OR &middot; Gresham, OR',
            'colophon_copyright' => '&copy; ' . date('Y') . ' Clean Touch. Printed on recycled electrons.',
        ];

        if ($page && $page->content) {
            $decoded = json_decode($page->content, true);
            if (is_array($decoded)) {
                $content = array_merge($content, $decoded);
            }
        }

        return view('home', compact('content'));
    }
}
