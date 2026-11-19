@props([
    'image' => null,
    'date' => null,
    'readTime' => null,
    'title' => null,
    'excerpt' => null,
    'author' => 'Admin',
    'authorInitials' => 'AD',
    'docRef' => null,
    'url' => '#',
])

<article
    class="group bg-surface-container-lowest rounded-md overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col md:flex-row">
    <div
        class="md:w-5/12 relative overflow-hidden bg-surface-container-high shrink-0 aspect-[16/9]">
        @if ($image)
            <img alt="{{ $title }}" loading="lazy" decoding="async"
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-out"
                src="{{ $image }}" />
        @endif
        <div class="absolute top-space-sm left-space-sm"></div>
    </div>
    <div class="md:w-7/12 flex-1 md:flex-none p-space-md md:p-space-lg flex flex-col justify-between">
        <div>
            <div
                class="flex flex-wrap items-center gap-space-sm text-on-surface-variant font-label-md text-label-md mb-space-xs">
                <span class="flex items-center gap-1 font-semibold text-primary">
                    <span class="material-symbols-outlined text-[16px]" aria-hidden="true">admin_panel_settings</span>
                    {{ $author }}
                </span>
                @if ($date || $readTime)
                    <span class="hidden md:inline">
                        @if ($date)
                            <span>{{ $date }}</span>
                        @endif
                        @if ($date && $readTime)
                            <span>•</span>
                        @endif
                        @if ($readTime)
                            <span>{{ $readTime }}</span>
                        @endif
                    </span>
                @endif
            </div>
            <h2
                class="font-headline-sm text-headline-sm font-bold text-on-surface group-hover:text-primary transition-colors leading-snug line-clamp-2">
                <a href="{{ $url }}">{{ $title }}</a>
            </h2>
            @if ($excerpt)
                <p
                    class="font-body-md text-body-md text-on-surface-variant mt-space-xs leading-relaxed line-clamp-2 md:line-clamp-3">
                    {{ $excerpt }}
                </p>
            @endif
        </div>
        <div class="mt-space-md pt-space-sm flex flex-wrap items-center justify-between gap-space-xs">
            @if ($docRef)
                <span
                    class="font-label-spec text-label-spec text-on-surface-variant uppercase tracking-wider">
                    {{ $docRef }}
                </span>
            @endif
            <a class="inline-flex items-center gap-1 font-label-lg text-label-lg font-bold text-primary group-hover:translate-x-1 transition-transform"
                href="{{ $url }}">
                <span class="md:hidden">Read</span><span
                    class="hidden md:inline">Read Full Article</span>
                <span class="material-symbols-outlined text-[18px]" aria-hidden="true">arrow_forward</span>
            </a>
        </div>
    </div>
</article>
