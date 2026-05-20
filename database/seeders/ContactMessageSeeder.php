<?php

namespace Database\Seeders;

use App\Models\ContactMessage;
use Illuminate\Database\Seeder;

class ContactMessageSeeder extends Seeder
{
    public function run(): void
    {
        $messages = [
            [
                'name' => 'Sarah Mitchell',
                'email' => 'sarah@example.com',
                'subject' => 'Project Inquiry — E-commerce Redesign',
                'message' => "Hi Jino,\n\nI came across your portfolio and I'm really impressed with your work on the Bloom Dashboard redesign. We're looking for a designer/developer to help redesign our e-commerce platform. The project would involve both UI/UX design and front-end implementation.\n\nWould you be available for a call next week to discuss? I'd love to share our vision and see if there's a fit.\n\nBest,\nSarah",
                'is_read' => false,
            ],
            [
                'name' => 'Marcus Chen',
                'email' => 'marcus.chen@example.org',
                'subject' => 'Collaboration on Open Source Project',
                'message' => "Hey Jino!\n\nI've been following your work on the CSS Animation Playground — it's awesome! I'm building an open-source component library and I'd love to collaborate on adding some of those animation patterns as drop-in components.\n\nLet me know if you're interested!\n\nCheers,\nMarcus",
                'is_read' => false,
            ],
            [
                'name' => 'Emily Rodriguez',
                'email' => 'emily.r@example.com',
                'subject' => 'Branding Project for New Startup',
                'message' => "Hello Jino,\n\nI'm launching a sustainable fashion marketplace and I need a full brand identity — logo, color palette, typography, and some initial web designs. Your Local Coffee Co. brand kit is exactly the kind of thoughtful, cohesive work I'm looking for.\n\nCould we set up a brief chat to discuss scope and pricing?\n\nThanks!\nEmily",
                'is_read' => true,
            ],
            [
                'name' => 'David Park',
                'email' => 'david.park@example.net',
                'subject' => 'Freelance Opportunity — Laravel Dev',
                'message' => "Hi Jino,\n\nWe're a small agency looking for a Laravel developer for an ongoing contract. The project is a custom CRM for real estate agents. Your experience with Laravel and Livewire seems like a great match.\n\nWould you be open to a 30-min call to talk details?\n\nBest,\nDavid",
                'is_read' => false,
            ],
            [
                'name' => 'Aisha Patel',
                'email' => 'aisha@example.co',
                'subject' => 'Just saying hi!',
                'message' => "Hi Jino!\n\nNo project or business — just wanted to say I love your work! The Generative Art Explorer is such a cool concept. I've been sharing it with my design classmates.\n\nKeep making awesome stuff!\n\nAisha",
                'is_read' => true,
            ],
            [
                'name' => 'Tom Baker',
                'email' => 'tom.baker@example.com',
                'subject' => 'Bug Report — Contact Form',
                'message' => "Hey,\n\nJust wanted to let you know that the contact form on your site seems to work great — this is just a test to make sure! ☺️\n\nI'm actually reaching out because I'm interested in a mobile app concept I'd like to discuss.\n\nCheers,\nTom",
                'is_read' => true,
            ],
            [
                'name' => 'Lena Johansson',
                'email' => 'lena.j@example.se',
                'subject' => 'Speaking Request — Web Development Conference',
                'message' => "Hello Jino,\n\nI'm organizing NordWeb 2026 in Stockholm and we'd love to have you speak about your experience building creative web experiences with Laravel. Your session on the CSS Animation Playground's architecture would be a fantastic fit for our front-end track.\n\nThe conference is in September. Happy to cover travel and accommodation.\n\nLooking forward to hearing from you!\n\nLena",
                'is_read' => false,
            ],
            [
                'name' => 'Carlos Mendez',
                'email' => 'carlos@example.mx',
                'subject' => 'Question About Your Workflow',
                'message' => "Hi Jino,\n\nI'm a junior developer trying to improve my design workflow. Your site is beautiful — I'm curious about your process. Do you design in Figma first and then code, or do you go straight to the browser?\n\nAny tips would be hugely appreciated!\n\nThanks,\nCarlos",
                'is_read' => true,
            ],
            [
                'name' => 'Priya Singh',
                'email' => 'priya.singh@example.in',
                'subject' => 'Partnership Opportunity',
                'message' => "Dear Jino,\n\nI'm the founder of a digital agency based in Mumbai. We're looking for a design/development partner with strong Laravel skills to handle overflow work and occasional collaboration. Your portfolio shows exactly the quality level our clients expect.\n\nWould you be open to discussing a retainer arrangement?\n\nWarmly,\nPriya",
                'is_read' => false,
            ],
            [
                'name' => 'James Wilson',
                'email' => 'james@example.org',
                'subject' => 'Quick Question About TaskFlow',
                'message' => "Hi Jino,\n\nI'm evaluating project management tools for my team. Is TaskFlow available as a SaaS product, or was it a client project? If it's available, I'd love a demo.\n\nThanks,\nJames",
                'is_read' => true,
            ],
            [
                'name' => 'Yuki Tanaka',
                'email' => 'yuki@example.jp',
                'subject' => 'Translation & Localization Request',
                'message' => "Hello Jino,\n\nI'm a big fan of your Generative Art Explorer project. I'd like to help translate the interface into Japanese to make it more accessible to developers in Japan. I'm a front-end developer and translator.\n\nI've already forked the repo and started working on a Japanese locale file. Would you be open to a PR?\n\nBest,\nYuki",
                'is_read' => false,
            ],
            [
                'name' => 'Olivia Foster',
                'email' => 'olivia@example.com',
                'subject' => 'Thank You!',
                'message' => "Hi Jino!\n\nJust wanted to say thank you for the CSS Animation Playground — I used several of your techniques in a recent client project and they were a huge hit. I've credited you in the project write-up!\n\nHope we can work together someday.\n\nXO,\nOlivia",
                'is_read' => true,
            ],
        ];

        foreach ($messages as $message) {
            ContactMessage::create($message);
        }
    }
}
