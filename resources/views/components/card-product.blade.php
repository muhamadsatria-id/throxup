@props([
    'image' => null,
    'category' => null,
    'title' => null,
    'url' => '#',
])

<div
    class="bg-surface-container-lowest rounded-md overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group">
    <div class="relative h-40 md:h-52 bg-surface-container overflow-hidden rounded-t-DEFAULT">
        @if ($image)
            <img alt="{{ $title }}" loading="lazy" decoding="async"
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                src="{{ $image }}" />
        @endif
    </div>
    <div class="p-space-md md:p-space-lg flex-1 flex flex-col justify-between">
        <div>
            @if ($category)
                <span
                    class="font-label-spec text-label-spec uppercase text-secondary font-semibold tracking-wider">{{ $category }}</span>
            @endif
            @if ($title)
                <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold mt-1 line-clamp-2">
                    {{ $title }}</h3>
            @endif
        </div>
        <div class="mt-space-md md:mt-space-lg pt-space-xs">
            <a class="inline-flex items-center gap-1 font-label-lg text-label-lg text-primary hover:text-primary-container font-bold transition-colors group-hover:translate-x-1 duration-200"
                href="{{ $url }}">
                <span class="md:hidden">Details</span><span class="hidden md:inline">View Details</span>
                <span class="material-symbols-outlined text-[18px]">chevron_right</span>
            </a>
        </div>
    </div>
</div>
