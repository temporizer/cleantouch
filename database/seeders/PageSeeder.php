<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        Page::create([
            'title' => 'About',
            'meta_description' => 'Learn more about Jino Conklin — a web developer, designer, and creative problem solver who crafts playful digital experiences.',
            'content' => '<h2>Hey there, I\'m Jino</h2>
<p>I\'m a web developer and designer based somewhere between code and creativity. I\'ve been building things on the internet for over a decade, and I still get excited every time I solve a problem with a well-placed keyframe animation or a thoughtfully structured database query.</p>
<p>My journey started with curiosity — taking apart HTML pages to see how they worked, then gradually moving up the stack to CSS, JavaScript, PHP, and eventually full-fledged Laravel applications. Along the way I fell in love with the craft of turning complex requirements into simple, beautiful interfaces that people genuinely enjoy using.</p>
<h3>What I Do</h3>
<p>I specialize in full-stack Laravel development with modern front-end tooling. My typical stack includes Laravel, Livewire, PostgreSQL, and Tailwind CSS — but I\'m equally comfortable with React Native for mobile, Vue.js for interactive UIs, or a plain HTML/CSS/JS approach when that\'s the right tool.</p>
<p>Beyond code, I care deeply about design. I believe the best digital experiences are those that <em>feel</em> as good as they work — where every interaction has intention, every transition has purpose, and every pixel has a reason to be where it is.</p>
<h3>My Approach</h3>
<p>I work best with people who value quality and aren\'t afraid to iterate. Every project starts with understanding the <strong>why</strong> — what are we really trying to accomplish here? From there, I move through wireframes, prototypes, and code, always keeping the end-user experience at the center of every decision.</p>
<p>I\'m available for freelance projects, contract work, and select collaborations. If you have something in mind — big or small — I\'d love to hear about it.</p>
<p class="mt-4"><em>When I\'m not building things, you\'ll probably find me experimenting with generative art, learning a new animation technique, or enjoying a good cup of coffee.</em></p>',
            'is_published' => true,
        ]);
    }
}
