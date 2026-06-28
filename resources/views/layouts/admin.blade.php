<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Admin' }} — Clean Touch</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Caveat:wght@400;600;700&family=IBM+Plex+Mono:wght@300;400;600&display=swap" rel="stylesheet">

    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>[x-cloak] { display: none !important; }</style>
</head>
<body class="antialiased min-h-screen">
    <div class="flex min-h-screen"
         x-data="{ sidebarOpen: false }"
         @keydown.window.escape="sidebarOpen = false">
        <!-- Mobile overlay -->
        <div x-show="sidebarOpen" x-transition.opacity.duration.200
             @click="sidebarOpen = false"
             class="fixed inset-0 z-20 bg-black/50 lg:hidden"></div>

        <!-- Sidebar -->
        <aside :class="sidebarOpen ? 'flex' : 'hidden'"
               class="w-64 bg-zine-black text-white flex-shrink-0 lg:flex flex-col fixed h-screen z-30"
               x-cloak>
            <div class="p-5 border-b border-white/10">
                <a href="{{ route('home') }}" class="flex items-center gap-2.5 group">
                    <div class="flex items-center justify-center w-9 h-9 bg-zine-green rounded text-zine-black font-zine-display text-base font-bold">CT</div>
                    <div>
                        <span class="font-zine-display text-sm tracking-wider">Admin</span>
                        <span class="block text-[11px] text-white/40">Dashboard</span>
                    </div>
                </a>
            </div>

            <nav class="flex-1 p-3 space-y-0.5 overflow-y-auto">
                <div class="text-[11px] font-medium text-white/30 uppercase tracking-wider px-3 pb-1 pt-2 font-zine-body">Main</div>
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 text-sm font-zine-display tracking-wider {{ request()->routeIs('admin.dashboard') ? 'bg-zine-green text-zine-black' : 'text-white/60 hover:bg-white/10 hover:text-white' }} transition-all duration-200">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('admin.portfolio.index') }}" class="flex items-center gap-3 px-3 py-2.5 text-sm font-zine-display tracking-wider {{ request()->routeIs('admin.portfolio.*') ? 'bg-zine-green text-zine-black' : 'text-white/60 hover:bg-white/10 hover:text-white' }} transition-all duration-200">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <span>Portfolio</span>
                </a>

                <a href="{{ route('admin.categories.index') }}" class="flex items-center gap-3 px-3 py-2.5 text-sm font-zine-display tracking-wider {{ request()->routeIs('admin.categories.*') ? 'bg-zine-green text-zine-black' : 'text-white/60 hover:bg-white/10 hover:text-white' }} transition-all duration-200">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                    <span>Categories</span>
                </a>

                <div class="text-[11px] font-medium text-white/30 uppercase tracking-wider px-3 pb-1 pt-4 font-zine-body">Content</div>
                <a href="{{ route('admin.emails.index') }}" class="flex items-center gap-3 px-3 py-2.5 text-sm font-zine-display tracking-wider {{ request()->routeIs('admin.emails.*') ? 'bg-zine-green text-zine-black' : 'text-white/60 hover:bg-white/10 hover:text-white' }} transition-all duration-200">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    <span>Messages</span>
                    @php($unread = \App\Models\ContactMessage::unread()->count())
                    @if($unread > 0)
                    <span class="ml-auto bg-zine-yellow text-zine-black text-[11px] px-2 py-0.5 font-zine-display tracking-wider">{{ $unread }}</span>
                    @endif
                </a>

                <a href="{{ route('admin.analytics.index') }}" class="flex items-center gap-3 px-3 py-2.5 text-sm font-zine-display tracking-wider {{ request()->routeIs('admin.analytics.*') ? 'bg-zine-green text-zine-black' : 'text-white/60 hover:bg-white/10 hover:text-white' }} transition-all duration-200">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"/></svg>
                    <span>Analytics</span>
                </a>

                <div class="text-[11px] font-medium text-white/30 uppercase tracking-wider px-3 pb-1 pt-4 font-zine-body">System</div>
                <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 px-3 py-2.5 text-sm font-zine-display tracking-wider {{ request()->routeIs('admin.users.*') ? 'bg-zine-green text-zine-black' : 'text-white/60 hover:bg-white/10 hover:text-white' }} transition-all duration-200">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    <span>Users</span>
                </a>

                <a href="{{ route('admin.settings.edit') }}" class="flex items-center gap-3 px-3 py-2.5 text-sm font-zine-display tracking-wider {{ request()->routeIs('admin.settings.*') ? 'bg-zine-green text-zine-black' : 'text-white/60 hover:bg-white/10 hover:text-white' }} transition-all duration-200">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    <span>Settings</span>
                </a>
            </nav>

            <div class="p-3 border-t border-white/10 space-y-0.5">
                <a href="{{ route('home') }}" class="flex items-center gap-3 px-3 py-2.5 text-sm font-zine-display tracking-wider text-white/40 hover:bg-white/10 hover:text-white transition-all duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    View Site
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col lg:pl-64">
            <!-- Top Bar -->
            <header class="admin-bar">
                <div class="flex items-center gap-3">
                    <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden p-2 rounded text-white/60 hover:text-white hover:bg-white/10 transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                    <span class="font-zine-display text-[1.1rem] tracking-[2px] text-zine-green">{{ $title ?? 'Admin' }}</span>
                </div>

                <div class="flex items-center gap-4">
                    @if(session('success'))
                    <div class="text-xs text-zine-green" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)">
                        {{ session('success') }}
                    </div>
                    @endif
                    <span class="text-white/50 text-[11px] hidden sm:block">{{ auth()->user()?->name }}</span>
                    <a href="{{ route('profile.show') }}" class="admin-bar__btn">Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="admin-bar__btn">Logout</button>
                    </form>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 p-6">
                {{ $slot }}
            </main>
        </div>
    </div>

    @livewireScripts
    @stack('scripts')
</body>
</html>
