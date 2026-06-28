<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(auth()->check() && auth()->user()->hasRole('admin'))
    <meta name="page-slug" content="{{ request()->route()->getName() === 'about' ? 'about' : 'home' }}">
    <script>window.__editable = true</script>
    @endif

    <title>{{ $title ?? config('app.name', 'Clean Touch') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Caveat:wght@400;600;700&family=IBM+Plex+Mono:wght@300;400;600&display=swap" rel="stylesheet">

    <x-analytics />
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('layouts.navigation')

    @if (isset($header))
        <header class="page-header">
            <div class="page-header-inner">
                {{ $header }}
            </div>
        </header>
    @endif

    @php
        $colophon = \App\Models\PageContent::whereHas('page', fn($q) => $q->where('slug', 'home'))
            ->pluck('value', 'key')
            ->toArray();
    @endphp

    <main>
        @if(session('success'))
        <div class="fixed top-20 right-4 z-50 max-w-sm">
            <div class="bg-zine-green/10 border border-zine-green/20 text-zine-black px-4 py-3 shadow-lg flex items-center gap-2 font-zine-body text-sm">
                <svg class="w-5 h-5 flex-shrink-0 text-zine-green" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        </div>
        @endif

        @if(session('error'))
        <div class="fixed top-20 right-4 z-50 max-w-sm">
            <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 shadow-lg flex items-center gap-2 font-zine-body text-sm">
                <svg class="w-5 h-5 flex-shrink-0 text-red-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/></svg>
                <span class="font-medium">{{ session('error') }}</span>
            </div>
        </div>
        @endif

        {{ $slot }}

        <!-- COLOPHON -->
        <footer class="colophon section-block" data-editable-slug="home">
            <div class="colophon__inner">
                <div class="colophon__grid">
                    <div class="colophon__col">
                        <h4 data-editable="colophon_site_name">{{ $colophon['colophon_site_name'] ?? 'Clean Touch' }}</h4>
                        <p data-editable="colophon_issue">{{ $colophon['colophon_issue'] ?? 'Volume 1, Issue 2026' }}</p>
                    </div>
                    <div class="colophon__col">
                        <h4 data-editable="colophon_contact_title">{{ $colophon['colophon_contact_title'] ?? 'Contact' }}</h4>
                        <p><a href="tel:+13607199650" data-editable="colophon_phone">{{ $colophon['colophon_phone'] ?? '(360) 719-9650' }}</a><br><a href="mailto:info@cleantouchllc.net" data-editable="colophon_email">{{ $colophon['colophon_email'] ?? 'info@cleantouchllc.net' }}</a></p>
                    </div>
                    <div class="colophon__col">
                        <h4 data-editable="colophon_distribution_title">{{ $colophon['colophon_distribution_title'] ?? 'Distribution' }}</h4>
                        <p data-editable="colophon_locations">{!! $colophon['colophon_locations'] ?? 'Vancouver, WA &middot; Portland, OR &middot; Beaverton, OR &middot; Gresham, OR' !!}</p>
                    </div>
                </div>
                <div class="colophon__bottom">
                    <p data-editable="colophon_copyright">{!! $colophon['colophon_copyright'] ?? '&copy; ' . date('Y') . ' Clean Touch. Printed on recycled electrons.' !!}</p>
                </div>
            </div>
        </footer>
    </main>

    @livewireScripts
    @auth
        @if(auth()->user()->hasRole('admin'))
        <style>
            [data-editable] { cursor: pointer; }
            [data-editable]:hover { outline: 2px dashed #10b981; outline-offset: 2px; border-radius: 2px; }
        </style>
        @vite(['resources/js/quill-inline.js'])
        @endif
    @endauth
</body>
</html>
