<nav x-data="{ open: false, scrolled: false }"
     @scroll.window="scrolled = (window.scrollY > 20)"
     @keydown.window.escape="open = false"
     :class="scrolled ? 'bg-white/80 dark:bg-surface-900/80 backdrop-blur-xl shadow-sm border-surface-200/50 dark:border-surface-800/50' : ''"
     class="fixed top-0 left-0 right-0 z-50 border-b border-transparent backdrop-blur-[0px] transition duration-300"
     style="-webkit-transform: translateZ(0); transform: translateZ(0)">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center gap-2.5 group">
                    <div class="w-9 h-9 bg-gradient-to-br from-primary-500 to-accent-500 rounded-xl flex items-center justify-center text-white font-bold text-sm shadow-lg shadow-primary-500/25 group-hover:scale-110 group-hover:rotate-3 transition-all duration-300">J</div>
                    <span class="font-heading font-bold text-lg text-surface-900 dark:text-white">JinoConklin</span>
                </a>
            </div>

            <div class="hidden md:flex items-center gap-1">
                <a href="{{ route('home') }}" class="px-3 py-2 rounded-lg text-sm font-medium text-surface-600 dark:text-surface-300 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-primary-50 dark:hover:bg-primary-950/50 transition-all {{ request()->routeIs('home') ? 'text-primary-600 dark:text-primary-400 bg-primary-50 dark:bg-primary-950/50' : '' }}">Home</a>
                <a href="{{ route('portfolio.index') }}" class="px-3 py-2 rounded-lg text-sm font-medium text-surface-600 dark:text-surface-300 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-primary-50 dark:hover:bg-primary-950/50 transition-all {{ request()->routeIs('portfolio.*') ? 'text-primary-600 dark:text-primary-400 bg-primary-50 dark:bg-primary-950/50' : '' }}">Portfolio</a>
                <a href="{{ route('about') }}" class="px-3 py-2 rounded-lg text-sm font-medium text-surface-600 dark:text-surface-300 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-primary-50 dark:hover:bg-primary-950/50 transition-all {{ request()->routeIs('about') ? 'text-primary-600 dark:text-primary-400 bg-primary-50 dark:bg-primary-950/50' : '' }}">About</a>
                <a href="{{ route('contact.index') }}" class="px-3 py-2 rounded-lg text-sm font-medium text-surface-600 dark:text-surface-300 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-primary-50 dark:hover:bg-primary-950/50 transition-all {{ request()->routeIs('contact.*') ? 'text-primary-600 dark:text-primary-400 bg-primary-50 dark:bg-primary-950/50' : '' }}">Contact</a>
            </div>

            <div class="hidden md:flex items-center gap-2">
                <button onclick="toggleTheme()" class="p-2 rounded-lg text-surface-400 dark:text-surface-500 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-primary-50 dark:hover:bg-primary-950/50 transition-all" aria-label="Toggle theme">
                    <svg class="w-5 h-5 dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
                    <svg class="w-5 h-5 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                </button>

                <a href="{{ route('search') }}" class="p-2 rounded-lg text-surface-400 dark:text-surface-500 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-primary-50 dark:hover:bg-primary-950/50 transition-all" aria-label="Search">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </a>

                @auth
                    @if(auth()->user()->hasRole('admin'))
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary btn-sm">Admin</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-sm font-medium text-surface-500 dark:text-surface-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors px-2">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-medium text-surface-600 dark:text-surface-300 hover:text-primary-600 dark:hover:text-primary-400 transition-colors px-2">Log in</a>
                    @if(\App\Models\Setting::get('registration_enabled') !== 'false')
                    <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Register</a>
                    @endif
                @endauth
            </div>

            <button @click="open = !open" class="md:hidden p-2 rounded-lg text-surface-600 dark:text-surface-300 hover:bg-primary-50 dark:hover:bg-primary-950/50 transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

    <div x-show="open" @click="open = false" x-transition.opacity.duration.200 class="fixed inset-0 z-40 md:hidden bg-black/30"></div>
    <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2" class="relative z-50 md:hidden bg-white dark:bg-surface-800 border-t border-surface-200 dark:border-surface-700 shadow-xl">
        <div class="px-4 py-3 space-y-1 max-w-6xl mx-auto">
            <a href="{{ route('home') }}" @click="open = false" class="block px-3 py-2.5 rounded-lg text-sm font-medium {{ request()->routeIs('home') ? 'text-primary-600 dark:text-primary-400 bg-primary-50 dark:bg-primary-950/50' : 'text-surface-600 dark:text-surface-300 hover:bg-primary-50 dark:hover:bg-primary-950/50 hover:text-primary-600 dark:hover:text-primary-400' }} transition-all">Home</a>
            <a href="{{ route('portfolio.index') }}" @click="open = false" class="block px-3 py-2.5 rounded-lg text-sm font-medium {{ request()->routeIs('portfolio.*') ? 'text-primary-600 dark:text-primary-400 bg-primary-50 dark:bg-primary-950/50' : 'text-surface-600 dark:text-surface-300 hover:bg-primary-50 dark:hover:bg-primary-950/50 hover:text-primary-600 dark:hover:text-primary-400' }} transition-all">Portfolio</a>
            <a href="{{ route('about') }}" @click="open = false" class="block px-3 py-2.5 rounded-lg text-sm font-medium {{ request()->routeIs('about') ? 'text-primary-600 dark:text-primary-400 bg-primary-50 dark:bg-primary-950/50' : 'text-surface-600 dark:text-surface-300 hover:bg-primary-50 dark:hover:bg-primary-950/50 hover:text-primary-600 dark:hover:text-primary-400' }} transition-all">About</a>
            <a href="{{ route('contact.index') }}" @click="open = false" class="block px-3 py-2.5 rounded-lg text-sm font-medium {{ request()->routeIs('contact.*') ? 'text-primary-600 dark:text-primary-400 bg-primary-50 dark:bg-primary-950/50' : 'text-surface-600 dark:text-surface-300 hover:bg-primary-50 dark:hover:bg-primary-950/50 hover:text-primary-600 dark:hover:text-primary-400' }} transition-all">Contact</a>
            <hr class="my-2 border-surface-200 dark:border-surface-700">
            <a href="{{ route('search') }}" @click="open = false" class="block px-3 py-2.5 rounded-lg text-sm font-medium text-surface-600 dark:text-surface-300 hover:bg-primary-50 dark:hover:bg-primary-950/50 hover:text-primary-600 dark:hover:text-primary-400 transition-all">Search</a>

            <div class="flex items-center gap-2 px-3 py-2">
                <button onclick="toggleTheme()" class="p-1.5 rounded-lg text-surface-400 dark:text-surface-500 hover:text-primary-600 dark:hover:text-primary-400 transition-all">
                    <svg class="w-5 h-5 dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
                    <svg class="w-5 h-5 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                </button>
                <span class="text-sm text-surface-500 dark:text-surface-400">Toggle theme</span>
            </div>

            @auth
                @if(auth()->user()->hasRole('admin'))
                <a href="{{ route('admin.dashboard') }}" @click="open = false" class="block px-3 py-2.5 rounded-lg text-sm font-medium text-primary-600 dark:text-primary-400 bg-primary-50 dark:bg-primary-950/50">Admin</a>
                @endif
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" @click="open = false" class="block w-full text-left px-3 py-2.5 rounded-lg text-sm font-medium text-surface-600 dark:text-surface-300 hover:bg-surface-50 dark:hover:bg-surface-700 transition-all">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" @click="open = false" class="block px-3 py-2.5 rounded-lg text-sm font-medium text-surface-600 dark:text-surface-300 hover:bg-surface-50 dark:hover:bg-surface-700 transition-all">Log in</a>
                @if(\App\Models\Setting::get('registration_enabled') !== 'false')
                <a href="{{ route('register') }}" @click="open = false" class="block px-3 py-2.5 rounded-lg text-sm font-medium text-primary-600 dark:text-primary-400 bg-primary-50 dark:bg-primary-950/50">Register</a>
                @endif
            @endauth
        </div>
    </div>
</nav>
