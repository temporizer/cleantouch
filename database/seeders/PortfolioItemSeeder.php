<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\PortfolioItem;
use Illuminate\Database\Seeder;

class PortfolioItemSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all()->keyBy('name');

        $items = [
            // Web Development (2)
            [
                'category' => 'Web Development',
                'title' => 'JinoConklin.com Portfolio',
                'description' => 'The very site you\'re browsing. A Laravel-powered portfolio and business site with a playful, premium design and full admin panel.',
                'content' => '<p>This portfolio site was built from the ground up using <strong>Laravel 13</strong> with <strong>Jetstream (Livewire)</strong> and <strong>PostgreSQL</strong>. It features a fully responsive design with dark mode, a custom admin panel for managing portfolio items, categories, users, and site settings.</p><p>Key features include PostgreSQL full-text search, a contact form with email notifications, maintenance mode toggle, soft deletes on all major models, and a beautiful light/dark theme with custom Tailwind CSS components.</p><p>The design language is playful yet professional — with gradient text, animated floating elements, glass-morphism navigation, and a cohesive color palette built around indigo and rose accents.</p>',
                'is_published' => true,
                'published_at' => now()->subDays(2),
            ],
            [
                'category' => 'Web Development',
                'title' => 'TaskFlow Project Manager',
                'description' => 'A full-stack task management app with real-time collaboration, kanban boards, and team workspaces.',
                'content' => '<p>TaskFlow is a comprehensive project management tool built with <strong>Laravel</strong> for the backend and <strong>Livewire</strong> for reactive UI components. It supports multiple workspaces, kanban-style boards, task assignments, due dates, file attachments, and activity logging.</p><p>The app features real-time updates via Laravel Echo and WebSockets, drag-and-drop task reordering, Markdown support in task descriptions, and a clean, distraction-free interface.</p><p>Authentication includes team-based access control with Spatie permissions, email notifications for task assignments, and a dashboard with project analytics.</p>',
                'is_published' => true,
                'published_at' => now()->subDays(5),
            ],

            // UI/UX Design (2)
            [
                'category' => 'UI/UX Design',
                'title' => 'Bloom Dashboard Redesign',
                'description' => 'A complete UX overhaul of an analytics dashboard, improving clarity, navigation, and user engagement.',
                'content' => '<p>The Bloom Dashboard redesign focused on reducing cognitive load while surfacing the most important metrics at a glance. Through user research and iterative prototyping, I simplified a complex data-heavy interface into something approachable and even enjoyable to use.</p><p>The new design features a customizable widget layout, contextual tooltips, progressive disclosure for advanced metrics, and a cohesive color system that makes data visualization immediately readable.</p><p>User testing showed a <strong>40% reduction</strong> in time-to-insight and a significant increase in daily active usage after the redesign launched.</p>',
                'is_published' => true,
                'published_at' => now()->subDays(10),
            ],
            [
                'category' => 'UI/UX Design',
                'title' => 'Weather App Interface',
                'description' => 'A playful, personality-rich weather app concept with micro-animations and delightful interactions.',
                'content' => '<p>Weather apps are often functional but forgettable. This concept explores how personality and delight can make even checking the forecast an enjoyable moment.</p><p>The interface features fluid micro-animations that reflect current weather conditions — gentle snowflakes in winter, raindrops with ripples, and warm sun rays with subtle glow effects. Each weather state has its own color palette and animation set.</p><p>The design also includes thoughtful details like "weather moments" — contextual messages that celebrate good weather or offer a cozy vibe on stormy days. All built as a static prototype in Figma with principle animations exported via Lottie.</p>',
                'is_published' => true,
                'published_at' => now()->subDays(14),
            ],

            // Branding & Identity (2)
            [
                'category' => 'Branding & Identity',
                'title' => 'Local Coffee Co. Brand Kit',
                'description' => 'Complete brand identity for an artisanal coffee company, from logo to packaging to digital presence.',
                'content' => '<p>Local Coffee Co. needed a brand that captured their commitment to craft, community, and quality. The identity centers around a warm, hand-drawn logomark inspired by coffee blossom petals and steam swirls.</p><p>The full brand kit includes: primary and secondary logos, a custom color palette of warm terracottas and deep browns, typography system with a paired serif/sans-serif combination, pattern library, business card and stationery designs, packaging concepts, social media templates, and brand guidelines documentation.</p><p>The brand extends seamlessly from the physical products (bags, cups, merch) to the digital experience (website, app, social), creating a cohesive presence that customers recognize instantly.</p>',
                'is_published' => true,
                'published_at' => now()->subDays(7),
            ],
            [
                'category' => 'Branding & Identity',
                'title' => 'TechStartup Logo Suite',
                'description' => 'A modular logo system with multiple variations for a B2B SaaS startup entering a crowded market.',
                'content' => '<p>A growing B2B SaaS company needed a logo system that could flex across contexts — from a tiny favicon to a massive conference banner. Rather than a single logo, I delivered a modular system with distinct variations for different use cases.</p><p>The suite includes: a primary horizontal lockup for headers, a vertical stacked version for square spaces, an icon-only mark for app icons and social avatars, a monoline version for small sizes, and an animated variant for video intros and loading states.</p><p>Each variation maintains brand recognition while adapting to its medium. The system was delivered with usage rules, clear space specifications, and do\'s and don\'ts for each variation.</p>',
                'is_published' => true,
                'published_at' => now()->subDays(9),
            ],

            // Creative Projects (2)
            [
                'category' => 'Creative Projects',
                'title' => 'Generative Art Explorer',
                'description' => 'An interactive creative coding playground where users can explore generative art through tweakable parameters.',
                'content' => '<p>Generative Art Explorer is a browser-based creative tool built with <strong>p5.js</strong> and <strong>Vue.js</strong> that lets anyone become a generative artist. It features a growing collection of algorithms — from flowing organic forms to geometric patterns — each with adjustable parameters exposed through a clean UI.</p><p>Users can tweak colors, scale, complexity, speed, and randomness in real-time, with every change instantly updating the canvas. Pieces can be exported as high-resolution PNGs or SVG files.</p><p>Behind the scenes, the algorithms range from simple Perlin noise flows to complex L-systems and reaction-diffusion simulations. The project is open-source and includes a gallery where users can share their creations.</p>',
                'is_published' => true,
                'published_at' => now()->subDays(3),
            ],
            [
                'category' => 'Creative Projects',
                'title' => 'CSS Animation Playground',
                'description' => 'An interactive collection of CSS animations and effects, live-editable and shareable.',
                'content' => '<p>The CSS Animation Playground is a passion project that showcases the power of modern CSS — no JavaScript required. It features over 50 interactive examples of animations, transitions, 3D transforms, clipping paths, filters, and blending modes.</p><p>Each example comes with a live code editor where you can tweak values and see results instantly. The playground also includes a "remix" feature that generates a shareable URL with your customizations preserved.</p><p>Popular experiments include: morphing geometric shapes, 3D card flips with parallax, liquid-like blob effects using border-radius, shimmering gradient text, and a particle system built entirely with CSS custom properties and keyframes.</p>',
                'is_published' => true,
                'published_at' => now()->subDays(6),
            ],

            // Mobile Apps (2)
            [
                'category' => 'Mobile Apps',
                'title' => 'FitTrack Health App',
                'description' => 'A cross-platform health tracking app with workout logging, progress visualization, and social features.',
                'content' => '<p>FitTrack was built with <strong>React Native</strong> for iOS and Android, with a Laravel backend powering the API. It provides comprehensive workout tracking — from rep-by-rep logging for weightlifting to route mapping for running and cycling.</p><p>Key features include: custom workout builder with a library of 300+ exercises, progress charts with trend analysis, social feeds where friends can share achievements, goal setting with reminders, and Apple Health / Google Fit integration.</p><p>The app prioritizes offline-first functionality, allowing complete workout logging without connectivity. Data syncs seamlessly when the connection is restored.</p>',
                'is_published' => true,
                'published_at' => now()->subDays(11),
            ],
            [
                'category' => 'Mobile Apps',
                'title' => 'CommunityMarket iOS App',
                'description' => 'A local marketplace app connecting neighbors for buying, selling, and swapping goods within their community.',
                'content' => '<p>CommunityMarket is a React Native app built to strengthen local economies by making it easy to buy, sell, and swap within walking distance. The app features a map-based discovery interface, secure in-app messaging, and a reputation system with verified reviews.</p><p>Smart listings use AI to auto-categorize items and suggest fair prices based on local market data. Safety features include location privacy controls, verified user badges, and an emergency contact integration.</p><p>The backend runs on Laravel with PostgreSQL, handling image optimization, scheduled listing promotions, and push notifications for nearby items matching user preferences.</p>',
                'is_published' => true,
                'published_at' => now()->subDays(15),
            ],
        ];

        foreach ($items as $item) {
            PortfolioItem::create([
                'title' => $item['title'],
                'description' => $item['description'],
                'content' => $item['content'],
                'category_id' => $categories[$item['category']]->id,
                'is_published' => $item['is_published'],
                'published_at' => $item['published_at'],
            ]);
        }
    }
}
