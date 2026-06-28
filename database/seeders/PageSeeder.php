<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        Page::updateOrCreate(['slug' => 'about'], [
            'title' => 'About',
            'meta_description' => 'Learn more about Clean Touch — eco-friendly professional cleaning services based in Vancouver, WA and Portland, OR.',
            'content' => '<h3 class="about__title">More than cleaning.<br>It\'s <span class="highlight">restoration</span>.</h3>
<p class="about__body">Clean Touch was founded with a simple idea: that a clean home should feel like a sanctuary, not a showroom. We use eco-safe products. We take our time. We believe the small details — the dust-free baseboard, the streak-free mirror, the smell of fresh air — add up to something meaningful.</p>
<p class="about__body">Every home has a story, and we\'re honored to be a part of it. Whether it\'s a weekly refresh or a seasonal deep clean, our approach is the same: meticulous, respectful, and thorough. We\'re not happy until you can feel the difference.</p>
<p class="about__body">Our team is trained, bonded, and insured. Every cleaner goes through a rigorous onboarding process so you can trust the person walking through your door. We use only eco-friendly, pet-safe products — because a clean home shouldn\'t come at the expense of your family\'s health or the planet.</p>
<h3>Service Area</h3>
<p>We proudly serve Vancouver, WA; Portland, OR; Beaverton, OR; and Gresham, OR. Whether you need a one-time deep clean or recurring weekly maintenance, we\'ll work around your schedule.</p>
<h3>Our Promise</h3>
<p>If you\'re not thrilled with a single corner of your home, we\'ll make it right. No questions asked. That\'s the Clean Touch guarantee.</p>',
            'is_published' => true,
        ]);
    }
}
