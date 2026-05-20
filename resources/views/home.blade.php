<x-app-layout>
    <div class="relative overflow-hidden bg-grid">
        <!-- Decorative orbs -->
        <div class="absolute top-0 -left-32 w-[500px] h-[500px] bg-primary-400/20 dark:bg-primary-600/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute top-40 right-0 w-[400px] h-[400px] bg-accent-400/20 dark:bg-accent-600/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-0 left-1/3 w-[300px] h-[300px] bg-primary-300/20 dark:bg-primary-500/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-gradient-to-br from-primary-200/10 to-accent-200/10 dark:from-primary-800/10 dark:to-accent-800/10 rounded-full blur-3xl pointer-events-none"></div>

        <!-- Hero -->
        <section class="relative pt-36 pb-28 md:pt-44 md:pb-36">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <div class="animate-fade-in">
                    <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-primary-50 dark:bg-primary-950/50 border border-primary-100 dark:border-primary-800 text-primary-700 dark:text-primary-300 text-sm font-medium mb-6">
                        <span class="w-1.5 h-1.5 bg-primary-500 dark:bg-primary-400 rounded-full animate-pulse-soft"></span>
                        Welcome to my space
                    </span>

                    <h1 class="text-5xl md:text-7xl lg:text-8xl font-heading font-bold leading-[1.1]">
                        <span class="block text-surface-900 dark:text-white">Hi, I'm</span>
                        <span class="text-gradient">Jino Conklin</span>
                    </h1>

                    <p class="mt-6 text-lg md:text-xl text-surface-500 dark:text-surface-400 max-w-2xl mx-auto leading-relaxed">
                        I craft beautiful, playful digital experiences that make people smile. Web developer, designer, and creative problem solver.
                    </p>

                    <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('portfolio.index') }}" class="btn btn-primary btn-lg group">
                            View My Work
                            <svg class="w-5 h-5 ml-2 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m0-4H3"/></svg>
                        </a>
                        <a href="{{ route('contact.index') }}" class="btn btn-outline-primary btn-lg">Let's Talk</a>
                    </div>
                </div>

                <!-- Floating decorative elements -->
                <div class="relative mt-20 h-16">
                    <div class="absolute left-1/2 top-0 -translate-x-1/2 animate-float">
                        <div class="w-6 h-6 rounded-full bg-primary-400/30 dark:bg-primary-500/20 border border-primary-400/20 dark:border-primary-500/20"></div>
                    </div>
                    <div class="absolute left-1/3 top-4 animate-float" style="animation-delay: 1s;">
                        <div class="w-3 h-3 rounded-full bg-accent-400/30 dark:bg-accent-500/20 border border-accent-400/20 dark:border-accent-500/20"></div>
                    </div>
                    <div class="absolute right-1/3 top-2 animate-float" style="animation-delay: 2s;">
                        <div class="w-4 h-4 rounded bg-primary-300/30 dark:bg-primary-400/20 border border-primary-300/20 dark:border-primary-400/20 rotate-45"></div>
                    </div>
                    <div class="absolute bottom-0 left-1/4 animate-float" style="animation-delay: 0.5s;">
                        <svg class="w-4 h-4 text-primary-300/40 dark:text-primary-400/20" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z"/></svg>
                    </div>
                    <div class="absolute bottom-2 right-1/4 animate-float" style="animation-delay: 1.5s;">
                        <svg class="w-5 h-5 text-accent-300/30 dark:text-accent-400/20" fill="currentColor" viewBox="0 0 20 20"><path d="M11 3a1 1 0 10-2 0v1a1 1 0 102 0V3zM15.657 5.757a1 1 0 00-1.414-1.414l-.707.707a1 1 0 001.414 1.414l.707-.707zM18 10a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zM5.05 6.464A1 1 0 106.464 5.05l-.707-.707a1 1 0 00-1.414 1.414l.707.707zM5 10a1 1 0 01-1 1H3a1 1 0 110-2h1a1 1 0 011 1zM8 16v-1h4v1a2 2 0 11-4 0zM12 14c.015-.34.208-.646.477-.859a4 4 0 10-4.954 0c.27.213.462.519.476.859h4.002z"/></svg>
                    </div>
                </div>
            </div>
        </section>

        <!-- Tools / Skills Bar -->
        <section class="py-12 border-y border-surface-200 dark:border-surface-800 bg-white/50 dark:bg-surface-900/50">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <p class="text-center text-xs font-medium uppercase tracking-widest text-surface-400 dark:text-surface-500 mb-6">Built with</p>
                <div class="flex flex-wrap justify-center gap-8 items-center">
                    <span class="text-sm font-medium text-surface-600 dark:text-surface-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Laravel</span>
                    <span class="text-sm font-medium text-surface-600 dark:text-surface-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Livewire</span>
                    <span class="text-sm font-medium text-surface-600 dark:text-surface-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">PostgreSQL</span>
                    <span class="text-sm font-medium text-surface-600 dark:text-surface-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Tailwind CSS</span>
                    <span class="text-sm font-medium text-surface-600 dark:text-surface-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Alpine.js</span>
                    <span class="text-sm font-medium text-surface-600 dark:text-surface-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Vite</span>
                </div>
            </div>
        </section>

        <!-- Featured Portfolio -->
        @if($portfolio->isNotEmpty())
        <section class="py-24">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="section-title">
                    <span class="badge badge-primary">Featured Work</span>
                    <h2 class="text-surface-900 dark:text-white">Recent Projects</h2>
                    <p class="text-surface-500 dark:text-surface-400">A selection of things I've been working on lately.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($portfolio as $index => $item)
                    <a href="{{ route('portfolio.show', $item->slug) }}" class="group card-gradient overflow-hidden animate-fade-in-up" style="opacity:0; animation-delay: {{ $index * 0.1 }}s;">
                        <div class="aspect-[4/3] relative overflow-hidden">
                            @if($item->thumbnail)
                            <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            @else
                            <div class="w-full h-full bg-gradient-to-br from-primary-100 dark:from-primary-950 to-accent-100/50 dark:to-accent-950/50 flex items-center justify-center">
                                <div class="w-16 h-16 bg-white/60 dark:bg-surface-800/60 rounded-2xl flex items-center justify-center backdrop-blur-sm">
                                    <svg class="w-8 h-8 text-primary-500 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                </div>
                            </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            @if($item->category)
                            <span class="absolute top-3 left-3 badge bg-white/90 dark:bg-surface-800/90 text-surface-700 dark:text-surface-200 backdrop-blur-sm shadow-sm">{{ $item->category->name }}</span>
                            @endif
                        </div>
                        <div class="p-6">
                            <h3 class="font-heading font-semibold text-lg text-surface-900 dark:text-white group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors">{{ $item->title }}</h3>
                            @if($item->description)
                            <p class="mt-2 text-sm text-surface-500 dark:text-surface-400 line-clamp-2">{{ Str::limit($item->description, 100) }}</p>
                            @endif
                            <div class="mt-4 flex items-center text-sm font-medium text-primary-600 dark:text-primary-400 group-hover:translate-x-1 transition-transform">
                                View Project
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m0-4H3"/></svg>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>

                <div class="mt-12 text-center">
                    <a href="{{ route('portfolio.index') }}" class="btn btn-secondary btn-lg">
                        View All Projects
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m0-4H3"/></svg>
                    </a>
                </div>
            </div>
        </section>
        @endif

        <!-- CTA Section -->
        <section class="py-24 bg-surface-50 dark:bg-surface-800/30">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="relative bg-gradient-to-br from-primary-600 via-primary-700 to-primary-900 dark:from-primary-800 dark:via-primary-900 dark:to-surface-900 rounded-3xl p-10 md:p-16 text-center overflow-hidden">
                    <div class="absolute top-0 right-0 w-80 h-80 bg-white/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
                    <div class="absolute bottom-0 left-0 w-60 h-60 bg-accent-500/20 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[400px] h-[400px] bg-white/5 rounded-full blur-3xl"></div>

                    <div class="relative">
                        <span class="badge bg-white/15 text-white border border-white/10 mb-4">Let's Collaborate</span>
                        <h2 class="text-3xl md:text-5xl font-heading font-bold text-white leading-tight">Have a project in mind?</h2>
                        <p class="mt-4 text-lg text-primary-100/80 max-w-xl mx-auto">Let's chat about how we can work together to bring your vision to life.</p>
                        <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center">
                            <a href="{{ route('contact.index') }}" class="inline-flex items-center px-6 py-3.5 bg-white text-primary-700 rounded-xl font-medium hover:bg-primary-50 transition-all shadow-xl shadow-primary-900/20 hover:shadow-2xl hover:shadow-primary-900/30 active:scale-[0.98]">
                                Start a Conversation
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                            </a>
                            <a href="{{ route('portfolio.index') }}" class="inline-flex items-center px-6 py-3.5 bg-white/10 text-white border border-white/20 rounded-xl font-medium hover:bg-white/20 transition-all backdrop-blur-sm">
                                Browse Portfolio
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m0-4H3"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
