<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#1e3093">
    <meta name="format-detection" content="telephone=no">
    @php
        if (! \Artesaos\SEOTools\Facades\SEOMeta::getTitleSession()) {
            \Artesaos\SEOTools\Facades\SEOTools::setTitle(data_get($profile ?? null, 'nama', config('app.name', 'THORXup')));

            if ($desc = data_get($profile ?? null, 'deskripsi')) {
                \Artesaos\SEOTools\Facades\SEOTools::setDescription(\Illuminate\Support\Str::limit(strip_tags($desc), 155));
            }
        }

        if (request()->routeIs('fallback')) {
            \Artesaos\SEOTools\Facades\SEOTools::setTitle('Halaman Tidak Ditemukan', false);
            \Artesaos\SEOTools\Facades\SEOMeta::setRobots('noindex, nofollow');
        }

        $embedCode = function ($value) {
            $value = is_string($value) ? trim($value) : '';

            // Field ini untuk tag HTML/script. Teks biasa (mis. salah ketik) tidak boleh tampil di halaman.
            return str_contains($value, '<') ? $value : '';
        };
    @endphp
    {!! SEO::generate() !!}
    <link rel="sitemap" type="application/xml" href="{{ route('sitemap') }}">
    @if($favicon = data_get($profile ?? null, 'favicon'))
        <link rel="icon" type="image/png" href="{{ asset('storage/' . $favicon) }}">
    @else
        <link rel="icon" href="{{ asset('favicon.ico') }}">
    @endif
    {!! $embedCode(data_get($siteSetting ?? null, 'gsc_verification')) !!}
    {!! $embedCode(data_get($siteSetting ?? null, 'ga4_code')) !!}
    {!! $embedCode(data_get($siteSetting ?? null, 'gtm_head_code')) !!}
    {!! $embedCode(data_get($siteSetting ?? null, 'custom_head_scripts')) !!}

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&display=swap" rel="stylesheet" />

    @if(request()->routeIs('home') && isset($heroCarousels) && $heroCarousels->first()?->image)
        <link rel="preload" as="image" href="{{ asset('storage/' . $heroCarousels->first()->image) }}" fetchpriority="high">
    @endif

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
    @stack('styles')
</head>
<body class="bg-surface-container-low font-body-md text-on-surface antialiased">
    {!! $embedCode(data_get($siteSetting ?? null, 'gtm_body_code')) !!}

    {{-- 5. Header --}}
    <x-header />

    {{-- 6. Konten Halaman --}}
    <main class="w-full pt-20 bg-surface-container-low min-h-screen">
        @yield('content')
    </main>

   {{-- 7. Footer --}}
    <x-footer />

    @if($wa = data_get($profile ?? null, 'whatsapp'))
        <x-floating-whatsapp :phone="$wa" />
    @endif

    {!! $embedCode(data_get($siteSetting ?? null, 'custom_body_scripts')) !!}
    @stack('scripts')
</body>
</html>
