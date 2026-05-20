<x-app-layout>
    <div class="pt-28 pb-20">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <a href="{{ route('portfolio.index') }}" class="inline-flex items-center text-sm text-surface-500 dark:text-surface-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors mb-8 group">
                <svg class="w-4 h-4 mr-1.5 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                Back to Portfolio
            </a>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    @if($item->thumbnail)
                    <div class="aspect-[16/9] rounded-2xl overflow-hidden mb-8 shadow-lg">
                        <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}" class="w-full h-full object-cover">
                    </div>
                    @endif

                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-heading font-bold text-surface-900 dark:text-white mb-4">{{ $item->title }}</h1>

                    @if($item->description)
                    <p class="text-lg text-surface-500 dark:text-surface-400 leading-relaxed mb-8">{{ $item->description }}</p>
                    @endif

                    @if($item->content)
                    <div class="prose prose-lg prose-surface dark:prose-invert max-w-none mb-10">
                        {!! $item->content !!}
                    </div>
                    @endif

                    @if($item->images && count($item->images) > 0)
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach($item->images as $image)
                        <div class="aspect-square rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all hover:-translate-y-0.5">
                            <img src="{{ asset('storage/' . $image) }}" alt="" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <div class="sticky top-24 space-y-6">
                        <div class="card p-6">
                            <h4 class="font-heading font-semibold text-sm text-surface-900 dark:text-white uppercase tracking-wider mb-4">Project Details</h4>
                            <dl class="space-y-4">
                                @if($item->category)
                                <div>
                                    <dt class="text-xs font-medium text-surface-400 dark:text-surface-500 uppercase tracking-wider">Category</dt>
                                    <dd class="mt-1"><span class="badge badge-primary">{{ $item->category->name }}</span></dd>
                                </div>
                                @endif
                                <div>
                                    <dt class="text-xs font-medium text-surface-400 dark:text-surface-500 uppercase tracking-wider">Status</dt>
                                    <dd class="mt-1">
                                        @if($item->is_published)
                                        <span class="badge badge-success">Published</span>
                                        @else
                                        <span class="badge badge-default">Draft</span>
                                        @endif
                                    </dd>
                                </div>
                                @if($item->published_at)
                                <div>
                                    <dt class="text-xs font-medium text-surface-400 dark:text-surface-500 uppercase tracking-wider">Published</dt>
                                    <dd class="mt-1 text-sm text-surface-700 dark:text-surface-300">{{ $item->published_at->format('F j, Y') }}</dd>
                                </div>
                                @endif
                            </dl>
                        </div>

                        <div class="card p-6">
                            <h4 class="font-heading font-semibold text-sm text-surface-900 dark:text-white uppercase tracking-wider mb-3">Like what you see?</h4>
                            <p class="text-sm text-surface-500 dark:text-surface-400 mb-4">Let's work together on your next project.</p>
                            <a href="{{ route('contact.index') }}" class="btn btn-primary w-full justify-center">
                                Get in Touch
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
