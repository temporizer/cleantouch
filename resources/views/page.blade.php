<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">{{ $page->title }}</h1>

            @if($page->content)
            <div class="prose dark:prose-invert max-w-none">
                {!! $page->content !!}
            </div>
            @endif
        </div>
    </div>
</x-app-layout>
