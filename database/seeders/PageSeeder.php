<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\PageContent;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $homeData = [
            'colophon_contact_title' => 'Contact',
            'colophon_copyright' => '© 2026 Clean Touch. Printed on recycled electrons.',
            'colophon_distribution_title' => 'Distribution',
            'colophon_email' => 'info@cleantouchllc.net',
            'colophon_issue' => 'Volume 1, Issue 2026',
            'colophon_locations' => 'Vancouver, WA and Surrounding Areas',
            'colophon_phone' => '(360) 719-9650',
            'colophon_site_name' => 'Clean Touch',
            'cta_body' => 'Reach out for a free quote. No pressure — just a cleaner place to call home.',
            'cta_btn' => 'Get a Free Quote',
            'cta_email' => 'info@cleantouchllc.net',
            'cta_locations' => 'Vancouver &amp; Surrounding Areas',
            'cta_title' => 'Subscribe to <span class="highlight">clean living</span>',
            'hero_body' => 'This is not your average cleaning company.  Its a community-rooted company where clients, interns, and team members alike are valued, empowered, and inspired. We take pride in giving back what matters most:',
            'hero_btn_primary' => 'Giving back quality time',
            'hero_btn_secondary' => 'one eco-friendly cleaning at a time',
            'hero_polaroid_label' => 'clean home energys',
            'hero_stamp' => 'Schedule your calmness',
            'hero_sticker' => 'EST. 2017',
            'hero_title_main' => 'CLEAN TOUCH',
            'hero_title_sub' => 'The Art of Clean',
            'manifesto_body' => "Clean Touch was founded with a simple idea: that a clean home should feel like a sanctuary. We know your home is more than just a place to live\u2014it's where life happens. Our eco-friendly cleaning services help create a healthier environment, giving you peace of mind and more time to spend doing what you love with the people you love.",
            'manifesto_label' => '/ Our commitment',
            'manifesto_quote' => "\"We don't just clean spaces \u2014 we restore how they feel and&nbsp; give families back quality time.\"",
            'manifesto_quote_author' => "\u2014 founder's note",
            'manifesto_stat_1_label' => 'years in business',
            'manifesto_stat_1_num' => '9+',
            'manifesto_stat_2_label' => 'homes featured',
            'manifesto_stat_2_num' => '5000+',
            'manifesto_stat_3_label' => 'eco-friendly',
            'manifesto_stat_3_num' => '100%',
            'manifesto_title' => "More than cleaning.<br>It's <span class=\"highlight\">restoration</span>.",
            'pricing_1_desc' => 'Consistent care for homes that like to stay show-ready. One visit every week. Satisfaction guaranteed.',
            'pricing_1_price' => '$150 / visit',
            'pricing_1_tag' => 'FOR SALE',
            'pricing_1_title' => 'Weekly Cleaning',
            'pricing_2_desc' => 'A balanced rhythm for homes that need regular attention without overcommitment. Our most popular plan.',
            'pricing_2_price' => '$180 / visit',
            'pricing_2_tag' => 'BEST VALUE',
            'pricing_2_title' => 'Bi-Weekly Cleaning',
            'pricing_3_desc' => 'A thorough reset — ideal for move-ins, move-outs, or seasonal refresh. Top-to-bottom intensive care.',
            'pricing_3_price' => '$80 / an hour',
            'pricing_3_tag' => 'FOR SALE',
            'pricing_3_title' => 'Deep Clean',
            'pricing_header' => '/ Base price&amp;nbsp;',
            'pricing_subtitle' => 'Simple pricing. Schedule your free consultation. No fine print.',
            'service_1_desc' => 'Every surface, every shelf, every blind — nothing escapes our dusting.&nbsp;',
            'service_1_title' => 'Dusting Every Clean',
            'service_2_desc' => 'Deep cleaning for every floor type. Hardwood, tile, laminate, carpet — we have proven techniques.',
            'service_2_title' => 'Vacuuming &amp; Mopping',
            'service_3_desc' => 'Sinks, showers, toilets, mirrors — sanitized and streak-free. Always with our non-toxic cleaner.',
            'service_3_title' => 'Bathroom Cleaning',
            'service_4_desc' => 'Countertops, appliances, backsplashes — degreased, sanitized, polished. Food-safe and ready.',
            'service_4_title' => 'Kitchen Cleaning',
            'service_5_desc' => 'Other project upon inquiry.',
            'service_5_title' => 'Ask About our other services',
            'service_6_desc' => 'Weekly, bi-weekly, or monthly. A schedule that fits your rhythm with consistent quality.',
            'service_6_title' => 'Recurring Maintenance',
            'services_header' => '/ WHAT WE DO',
            'services_subtitle' => 'Six essential services. Zero compromises.',
            'testimonial_1_author' => '— Morgan T., Vancouver',
            'testimonial_1_text' => "They noticed things I hadn't seen in years — baseboards, corners, the tops of picture frames. The house felt different afterwards. Lighter.",
            'testimonial_2_author' => '— Priya K., Vancouver',
            'testimonial_2_text' => "I was skeptical at first, but after the first visit I understood. This isn't a cleaning service — it's a restoration service for your peace of mind.",
            'testimonial_3_author' => '— James R., Battleground',
            'testimonial_3_text' => 'Our bi-weekly visits have become a ritual. The consistency is remarkable — every time, the same meticulous attention.',
            'testimonials_header' => '/ Reviews',
        ];

        $aboutData = [
            'section_label' => '/ MANIFESTO',
            'about_title' => "More than cleaning.<br>It's <span class=\"highlight\">restoration</span>.",
            'body' => 'Clean Touch was founded with a simple idea: that a clean home should feel like a sanctuary, not a showroom. We use eco-safe products. We take our time. We believe the small details — the dust-free baseboard, the streak-free mirror, the smell of fresh air — add up to something meaningful.',
            'body_2' => "Every home has a story, and we're honored to be a part of it. Whether it's a weekly refresh or a seasonal deep clean, our approach is the same: meticulous, respectful, and thorough. We're not happy until you can feel the difference.",
            'stat_1_num' => '9+',
            'stat_1_label' => 'years in print',
            'stat_2_num' => '5000+',
            'stat_2_label' => 'homes featured',
            'stat_3_num' => '100%',
            'stat_3_label' => 'eco-friendly ink',
            'quote' => "\"We don't just clean spaces \u2014 we restore how they feel and&nbsp; give families back quality time.\"",
            'quote_author' => "\u2014 founder's note",
        ];

        foreach ([
            ['slug' => 'home', 'title' => 'Home', 'data' => $homeData, 'meta_desc' => 'Clean Touch — professional cleaning services in Vancouver, WA and Portland, OR.'],
            ['slug' => 'about', 'title' => 'About', 'data' => $aboutData, 'meta_desc' => 'Learn more about Clean Touch — eco-friendly cleaning services.'],
        ] as $pageDef) {
            $page = Page::updateOrCreate(['slug' => $pageDef['slug']], [
                'title' => $pageDef['title'],
                'content' => json_encode($pageDef['data']),
                'meta_description' => $pageDef['meta_desc'],
                'is_published' => true,
            ]);

            foreach ($pageDef['data'] as $key => $value) {
                PageContent::updateOrCreate(
                    ['page_id' => $page->id, 'key' => $key],
                    ['value' => $value]
                );
            }
        }
    }
}
