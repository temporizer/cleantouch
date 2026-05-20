<x-app-layout>
    <div class="pt-28 pb-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="badge badge-primary mb-3">Search</span>
                <h1 class="text-4xl md:text-5xl font-heading font-bold text-surface-900 dark:text-white mb-6">Find Something</h1>

                <form method="GET" action="{{ route('search') }}" class="max-w-xl mx-auto">
                    <div class="relative">
                        <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-surface-400 dark:text-surface-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        <input type="text" name="q" value="{{ $query }}" placeholder="Search portfolio and pages..." class="input pl-12 pr-4 py-3.5 text-base">
                    </div>
                </form>
            </div>

            @if($query)
            <div class="text-center mb-8">
                <p class="text-surface-500 dark:text-surface-400">
                    @if($results->isNotEmpty())
                        Found <span class="font-semibold text-surface-900 dark:text-white">{{ $results->count() }}</span> {{ Str::plural('result', $results->count()) }} for "<span class="font-medium text-surface-900 dark:text-white">{{ $query }}</span>"
                    @else
                        No results for "<span class="font-medium text-surface-900 dark:text-white">{{ $query }}</span>"
                    @endif
                </p>
            </div>

            @if($results->isNotEmpty())
            <div class="space-y-4">
                @foreach($results as $result)
                <a href="{{ $result['url'] }}" class="block card-hover p-5 group">
                    <div class="flex items-start gap-4">
                        <div class="w-11 h-11 rounded-xl flex items-center justify-center flex-shrink-0 {{ $result['type'] === 'portfolio' ? 'bg-primary-50 dark:bg-primary-950/50 text-primary-600 dark:text-primary-400' : 'bg-accent-50 dark:bg-accent-950/50 text-accent-600 dark:text-accent-400' }}">
                            @if($result['type'] === 'portfolio')
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            @else
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-2 mb-1">
                                <span class="badge {{ $result['type'] === 'portfolio' ? 'badge-primary' : 'badge-accent' }}">{{ ucfirst($result['type']) }}</span>
                                <h3 class="font-heading font-semibold text-surface-900 dark:text-white group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors truncate">{{ $result['title'] }}</h3>
                            </div>
                            @if($result['excerpt'])
                            <p class="text-sm text-surface-500 dark:text-surface-400 line-clamp-2 mt-1">{{ Str::limit(strip_tags($result['excerpt']), 150) }}</p>
                            @endif
                        </div>
                        <svg class="w-5 h-5 text-surface-300 dark:text-surface-600 group-hover:text-primary-500 dark:group-hover:text-primary-400 group-hover:translate-x-1 transition-all flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </div>
                </a>
                @endforeach
            </div>
            @else
            <div class="text-center py-16">
                <div class="w-20 h-20 bg-surface-100 dark:bg-surface-800 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-surface-300 dark:text-surface-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <h3 class="text-lg font-heading font-semibold text-surface-900 dark:text-white mb-2">Nothing found</h3>
                <p class="text-surface-500 dark:text-surface-400">Try a different search term or <a href="{{ route('portfolio.index') }}" class="text-primary-600 dark:text-primary-400 hover:underline">browse the portfolio</a>.</p>
            </div>
            @endif
            @endif
        </div>
    </div>
</x-app-layout>
