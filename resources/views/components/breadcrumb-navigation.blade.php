@props([
    'items' => [],
    'homeLabel' => 'Home',
    'homeUrl' => null,
    'align' => 'start',
    'jsonLd' => true,
])

@php
    $homeUrl = $homeUrl ?: route('home');

    $crumbs = collect($items)
        ->map(function ($item) {
            if (is_string($item)) {
                return [
                    'label' => trim($item),
                    'url' => null,
                    'hide_on_mobile' => false,
                ];
            }

            return [
                'label' => trim((string) data_get($item, 'label', '')),
                'url' => data_get($item, 'url'),
                'hide_on_mobile' => (bool) (data_get($item, 'hide_on_mobile') ?? data_get($item, 'hideOnMobile') ?? false),
            ];
        })
        ->filter(fn (array $crumb) => $crumb['label'] !== '')
        ->values();

    // Beranda selalu menjadi item pertama.
    $crumbs->prepend([
        'label' => $homeLabel,
        'url' => $homeUrl,
        'hide_on_mobile' => false,
    ]);

    $alignment = $align === 'center' ? 'justify-center' : 'justify-start';

    $breadcrumbSchema = $jsonLd ? [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => $crumbs->values()->map(fn (array $crumb, int $index) => array_filter([
            '@type' => 'ListItem',
            'position' => $index + 1,
            'name' => $crumb['label'],
            'item' => filled($crumb['url']) ? url($crumb['url']) : null,
        ], fn ($value) => ! is_null($value)))->all(),
    ] : null;

    $jsonFlags = JSON_UNESCAPED_SLASHES
        | JSON_UNESCAPED_UNICODE
        | JSON_HEX_TAG
        | JSON_HEX_AMP
        | JSON_HEX_APOS
        | JSON_HEX_QUOT;
@endphp

<nav aria-label="Breadcrumb"
    {{ $attributes->class([
        'flex flex-wrap items-center gap-space-xs text-on-surface-variant font-label-md text-label-md',
        $alignment,
    ]) }}>
    @foreach ($crumbs as $crumb)
        @if (! $loop->first)
            <span aria-hidden="true"
                class="select-none {{ $crumb['hide_on_mobile'] ? 'hidden sm:inline' : '' }}">/</span>
        @endif

        @if (! $loop->last && filled($crumb['url']))
            <a href="{{ $crumb['url'] }}"
                class="hover:text-primary transition-colors {{ $crumb['hide_on_mobile'] ? 'hidden sm:inline' : '' }}">{{ $crumb['label'] }}</a>
        @else
            <span @class([
                'text-primary font-bold' => $loop->last,
                'min-w-0 max-w-full truncate' => $loop->last,
                'hidden sm:inline' => $crumb['hide_on_mobile'],
            ]) @if ($loop->last) aria-current="page" @endif>{{ $crumb['label'] }}</span>
        @endif
    @endforeach
</nav>

@if ($breadcrumbSchema)
    <script type="application/ld+json">{!! json_encode($breadcrumbSchema, $jsonFlags) !!}</script>
@endif
