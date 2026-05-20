<x-app-layout>
    <div class="pt-28 pb-20">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="section-title">
                <span class="badge badge-primary">My Work</span>
                <h1 class="text-surface-900 dark:text-white">Portfolio</h1>
                <p class="text-surface-500 dark:text-surface-400">A curated collection of projects I'm proud of.</p>
            </div>

            @if($categories->isNotEmpty())
            <div class="flex flex-wrap justify-center gap-2 mb-12">
                <a href="{{ route('portfolio.index') }}" class="px-5 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ !$categoryId ? 'bg-primary-600 text-white shadow-lg shadow-primary-500/25' : 'bg-surface-100 dark:bg-surface-800 text-surface-600 dark:text-surface-300 hover:bg-surface-200 dark:hover:bg-surface-700' }}">
                    All
                    <span class="ml-1.5 text-xs opacity-70">({{ $portfolio->total() }})</span>
                </a>
                @foreach($categories as $cat)
                <a href="{{ route('portfolio.index', ['category' => $cat->id]) }}" class="px-5 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ $categoryId == $cat->id ? 'bg-primary-600 text-white shadow-lg shadow-primary-500/25' : 'bg-surface-100 dark:bg-surface-800 text-surface-600 dark:text-surface-300 hover:bg-surface-200 dark:hover:bg-surface-700' }}">
                    {{ $cat->name }}
                </a>
                @endforeach
            </div>
            @endif

            @if($portfolio->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($portfolio as $index => $item)
                <a href="{{ route('portfolio.show', $item->slug) }}" class="group card-gradient overflow-hidden animate-fade-in-up" style="opacity:0; animation-delay: {{ $index * 0.06 }}s;">
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

            <div class="mt-12">
                {{ $portfolio->links() }}
            </div>
            @else
            <div class="text-center py-20">
                <div class="w-20 h-20 bg-surface-100 dark:bg-surface-800 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-surface-300 dark:text-surface-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
                <h3 class="text-lg font-heading font-semibold text-surface-900 dark:text-white mb-2">No projects yet</h3>
                <p class="text-surface-500 dark:text-surface-400">Check back soon for some amazing work!</p>
                <a href="{{ route('contact.index') }}" class="btn btn-primary mt-6">Get in Touch</a>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>
