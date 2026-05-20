<x-app-layout>
    <div class="zine py-12">
        <div class="zine__inner">
            <h1 class="font-zine-display text-3xl md:text-4xl tracking-[2px] text-zine-black mb-6">{{ $page->title }}</h1>

            @if($page->content)
            <div class="font-zine-body text-sm text-zine-black/70 leading-relaxed max-w-[700px] space-y-4">
                {!! $page->content !!}
            </div>
            @endif
        </div>
    </div>
</x-app-layout>
