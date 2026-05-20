<nav x-data="{ open: false }"
     @keydown.window.escape="open = false"
     class="zine-nav">
    <div class="zine__inner py-3 flex items-center justify-between flex-wrap">
        <div class="flex items-center gap-8">
            <a href="{{ route('home') }}" class="font-zine-display text-2xl tracking-[3px] text-zine-black hover:text-zine-green transition-colors">
                CLEAN TOUCH
            </a>

            <div class="hidden md:flex items-center gap-1">
                <a href="{{ route('home') }}" class="px-3 py-2 text-sm font-zine-body text-zine-gray hover:text-zine-black transition-colors {{ request()->routeIs('home') ? 'text-zine-black' : '' }}">Home</a>
                <a href="{{ route('portfolio.index') }}" class="px-3 py-2 text-sm font-zine-body text-zine-gray hover:text-zine-black transition-colors {{ request()->routeIs('portfolio.*') ? 'text-zine-black' : '' }}">Portfolio</a>
                <a href="{{ route('about') }}" class="px-3 py-2 text-sm font-zine-body text-zine-gray hover:text-zine-black transition-colors {{ request()->routeIs('about') ? 'text-zine-black' : '' }}">About</a>
                <a href="{{ route('contact.index') }}" class="px-3 py-2 text-sm font-zine-body text-zine-gray hover:text-zine-black transition-colors {{ request()->routeIs('contact.*') ? 'text-zine-black' : '' }}">Contact</a>
                <a href="{{ route('search') }}" class="px-3 py-2 text-sm font-zine-body text-zine-gray hover:text-zine-black transition-colors {{ request()->routeIs('search') ? 'text-zine-black' : '' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </a>
            </div>
        </div>

        <div class="hidden md:flex items-center gap-3">
            @auth
                @if(auth()->user()->hasRole('admin'))
                <a href="{{ route('admin.dashboard') }}" class="btn-zine text-sm py-1.5 px-4">Admin</a>
                @endif
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm font-zine-body text-zine-gray hover:text-zine-black transition-colors px-2">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-sm font-zine-body text-zine-gray hover:text-zine-black transition-colors px-2">Log in</a>
                @if(\App\Models\Setting::get('registration_enabled') !== 'false')
                <a href="{{ route('register') }}" class="btn-zine text-sm py-1.5 px-4">Register</a>
                @endif
            @endauth
        </div>

        <button @click="open = !open" class="md:hidden p-2 text-zine-black hover:text-zine-green transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <div x-show="open" @click="open = false" x-transition.opacity.duration.200 class="fixed inset-0 z-40 md:hidden bg-black/30"></div>
    <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2" class="relative z-50 md:hidden bg-white border-t border-zine-black/8 shadow-xl">
        <div class="px-4 py-3 space-y-1 max-w-6xl mx-auto">
            <a href="{{ route('home') }}" @click="open = false" class="block px-3 py-2.5 text-sm font-zine-body {{ request()->routeIs('home') ? 'text-zine-black' : 'text-zine-gray hover:text-zine-black' }} transition-colors">Home</a>
            <a href="{{ route('portfolio.index') }}" @click="open = false" class="block px-3 py-2.5 text-sm font-zine-body {{ request()->routeIs('portfolio.*') ? 'text-zine-black' : 'text-zine-gray hover:text-zine-black' }} transition-colors">Portfolio</a>
            <a href="{{ route('about') }}" @click="open = false" class="block px-3 py-2.5 text-sm font-zine-body {{ request()->routeIs('about') ? 'text-zine-black' : 'text-zine-gray hover:text-zine-black' }} transition-colors">About</a>
            <a href="{{ route('contact.index') }}" @click="open = false" class="block px-3 py-2.5 text-sm font-zine-body {{ request()->routeIs('contact.*') ? 'text-zine-black' : 'text-zine-gray hover:text-zine-black' }} transition-colors">Contact</a>
            <hr class="my-2 border-zine-black/8">
            <a href="{{ route('search') }}" @click="open = false" class="block px-3 py-2.5 text-sm font-zine-body text-zine-gray hover:text-zine-black transition-colors">Search</a>

            @auth
                @if(auth()->user()->hasRole('admin'))
                <a href="{{ route('admin.dashboard') }}" @click="open = false" class="block px-3 py-2.5 text-sm font-zine-display tracking-wider text-zine-black bg-zine-green/10">Admin</a>
                @endif
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" @click="open = false" class="block w-full text-left px-3 py-2.5 text-sm font-zine-body text-zine-gray hover:text-zine-black transition-colors">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" @click="open = false" class="block px-3 py-2.5 text-sm font-zine-body text-zine-gray hover:text-zine-black transition-colors">Log in</a>
                @if(\App\Models\Setting::get('registration_enabled') !== 'false')
                <a href="{{ route('register') }}" @click="open = false" class="block px-3 py-2.5 text-sm font-zine-display tracking-wider text-zine-black bg-zine-green/10">Register</a>
                @endif
            @endauth
        </div>
    </div>
</nav>
