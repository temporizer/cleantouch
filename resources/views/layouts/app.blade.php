<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700|plus-jakarta-sans:500,600,700,800" rel="stylesheet" />

    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        if (localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        }
    </script>
    <style>[x-cloak] { display: none !important; }</style>
</head>
<body class="bg-white text-surface-900 dark:bg-surface-900 dark:text-surface-100 transition-colors duration-300 min-h-screen">
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
        <div class="toast" role="alert">
            <div class="toast-content toast-success dark:toast-success">
                <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                <span class="text-sm font-medium">{{ session('success') }}</span>
            </div>
        </div>
        @endif

        @if(session('error'))
        <div class="toast" role="alert">
            <div class="toast-content toast-error dark:toast-error">
                <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/></svg>
                <span class="text-sm font-medium">{{ session('error') }}</span>
            </div>
        </div>
        @endif

        {{ $slot }}
    </main>

    <footer class="border-t border-surface-200 dark:border-surface-800 bg-surface-50 dark:bg-surface-950/50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
                <div class="lg:col-span-2">
                    <a href="{{ route('home') }}" class="flex items-center gap-2.5 group mb-4">
                        <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-accent-500 rounded-xl flex items-center justify-center text-white font-bold text-sm shadow-lg shadow-primary-500/25 group-hover:scale-110 transition-transform duration-300">J</div>
                        <div>
                            <span class="font-heading font-bold text-lg text-surface-900 dark:text-white">JinoConklin</span>
                            <span class="block text-xs text-surface-400 dark:text-surface-500">Design & Development</span>
                        </div>
                    </a>
                    <p class="text-sm text-surface-500 dark:text-surface-400 leading-relaxed max-w-md">
                        Crafting digital experiences with care and creativity. Based somewhere on the internet, building for everyone.
                    </p>
                </div>

                <div>
                    <h4 class="font-heading font-semibold text-sm text-surface-900 dark:text-white mb-4 uppercase tracking-wider">Explore</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('portfolio.index') }}" class="text-sm text-surface-500 dark:text-surface-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-primary-500 dark:bg-primary-400"></span>Portfolio</a></li>
                        <li><a href="{{ route('about') }}" class="text-sm text-surface-500 dark:text-surface-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-primary-500 dark:bg-primary-400"></span>About</a></li>
                        <li><a href="{{ route('contact.index') }}" class="text-sm text-surface-500 dark:text-surface-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-primary-500 dark:bg-primary-400"></span>Contact</a></li>
                        <li><a href="{{ route('search') }}" class="text-sm text-surface-500 dark:text-surface-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-primary-500 dark:bg-primary-400"></span>Search</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-heading font-semibold text-sm text-surface-900 dark:text-white mb-4 uppercase tracking-wider">Connect</h4>
                    <ul class="space-y-3">
                        @auth
                            @if(auth()->user()->hasRole('admin'))
                            <li><a href="{{ route('admin.dashboard') }}" class="text-sm text-surface-500 dark:text-surface-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Admin Panel</a></li>
                            @endif
                            <li><a href="{{ route('profile.show') }}" class="text-sm text-surface-500 dark:text-surface-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Profile</a></li>
                        @else
                            <li><a href="{{ route('login') }}" class="text-sm text-surface-500 dark:text-surface-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Log in</a></li>
                        @endauth
                    </ul>
                    <button onclick="toggleTheme()" class="mt-6 inline-flex items-center gap-2 text-sm text-surface-500 dark:text-surface-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">
                        <svg class="w-4 h-4 dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
                        <svg class="w-4 h-4 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        <span class="dark:hidden">Dark Mode</span>
                        <span class="hidden dark:inline">Light Mode</span>
                    </button>
                </div>
            </div>

            <div class="mt-12 pt-8 border-t border-surface-200 dark:border-surface-800 flex flex-col sm:flex-row justify-between items-center gap-4">
                <p class="text-sm text-surface-400 dark:text-surface-500">&copy; {{ date('Y') }} JinoConklin. Built with Laravel + Tailwind.</p>
                <div class="flex items-center gap-4 text-sm text-surface-400 dark:text-surface-500">
                    <a href="#" class="hover:text-primary-600 dark:hover:text-primary-400 transition-colors">GitHub</a>
                    <a href="#" class="hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Twitter</a>
                    <a href="#" class="hover:text-primary-600 dark:hover:text-primary-400 transition-colors">LinkedIn</a>
                </div>
            </div>
        </div>
    </footer>

    @livewireScripts

    <script>
        function toggleTheme() {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        }

        document.querySelectorAll('.fixed.top-20').forEach(el => {
            setTimeout(() => {
                el.style.transition = 'opacity 0.5s, transform 0.5s';
                el.style.opacity = '0';
                el.style.transform = 'translateY(-10px)';
                setTimeout(() => el.remove(), 500);
            }, 4000);
        });
    </script>
</body>
</html>
