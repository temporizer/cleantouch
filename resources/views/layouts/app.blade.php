<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'Clean Touch') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Caveat:wght@400;600;700&family=IBM+Plex+Mono:wght@300;400;600&display=swap" rel="stylesheet">

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
    </main>

    @livewireScripts
</body>
</html>
