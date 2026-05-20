<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Web Development', 'description' => 'Full-stack web applications built with Laravel, Livewire, and modern tooling. From RESTful APIs to reactive SPAs, each project is crafted with performance and maintainability in mind.'],
            ['name' => 'UI/UX Design', 'description' => 'Clean, playful interfaces designed with users in mind. Every pixel is placed with intention, balancing aesthetics with usability to create delightful digital experiences.'],
            ['name' => 'Branding & Identity', 'description' => 'Logos, color systems, typography, and brand guidelines that tell a story. Cohesive visual identities that resonate with audiences and stand the test of time.'],
            ['name' => 'Creative Projects', 'description' => 'Experimental side projects and passion builds that push creative boundaries. Generative art, interactive experiences, and playful web experiments.'],
            ['name' => 'Mobile Apps', 'description' => 'Cross-platform mobile experiences built with modern frameworks. Native-feeling apps that prioritize performance, accessibility, and user delight.'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
