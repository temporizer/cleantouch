<x-app-layout>
    <div class="pt-28 pb-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="badge badge-primary mb-3">About Me</span>
                <h1 class="text-4xl md:text-5xl font-heading font-bold text-surface-900 dark:text-white">About</h1>
                <p class="mt-3 text-surface-500 dark:text-surface-400 max-w-lg mx-auto">A bit about who I am and what I do.</p>
            </div>

            @if($page && $page->content)
            <div class="card p-8 md:p-12 mb-10">
                <div class="prose prose-lg prose-surface dark:prose-invert max-w-none">
                    {!! $page->content !!}
                </div>
            </div>
            @else
            <div class="text-center py-16">
                <div class="w-24 h-24 bg-gradient-to-br from-primary-100 dark:from-primary-950 to-accent-100/50 dark:to-accent-950/50 rounded-3xl flex items-center justify-center mx-auto mb-8 animate-float">
                    <svg class="w-12 h-12 text-primary-500 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                </div>
                <h3 class="text-2xl font-heading font-semibold text-surface-900 dark:text-white mb-3">Getting to know me</h3>
                <p class="text-surface-500 dark:text-surface-400 max-w-md mx-auto leading-relaxed">I'm putting together a proper about page. In the meantime, feel free to browse my portfolio or get in touch!</p>
                <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('portfolio.index') }}" class="btn btn-primary">View Portfolio</a>
                    <a href="{{ route('contact.index') }}" class="btn btn-secondary">Say Hello</a>
                </div>
            </div>
            @endif

            <!-- Stats -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-16">
                <div class="card p-6 text-center">
                    <div class="text-3xl font-heading font-bold text-gradient">{{ $stats['portfolio'] ?? 0 }}+</div>
                    <div class="text-sm text-surface-500 dark:text-surface-400 mt-1">Projects</div>
                </div>
                <div class="card p-6 text-center">
                    <div class="text-3xl font-heading font-bold text-gradient-accent">{{ $stats['categories'] ?? 0 }}</div>
                    <div class="text-sm text-surface-500 dark:text-surface-400 mt-1">Categories</div>
                </div>
                <div class="card p-6 text-center">
                    <div class="text-3xl font-heading font-bold text-gradient">{{ $stats['years'] ?? '1' }}+</div>
                    <div class="text-sm text-surface-500 dark:text-surface-400 mt-1">Years Building</div>
                </div>
                <div class="card p-6 text-center">
                    <div class="text-3xl font-heading font-bold text-gradient-accent">{{ $stats['coffee'] ?? '∞' }}</div>
                    <div class="text-sm text-surface-500 dark:text-surface-400 mt-1">Cups of Coffee</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
