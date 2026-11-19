<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
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
    @php
        $canonicalUrl = 'https://' . preg_replace('/^www\./i', '', (string) parse_url(url()->current(), PHP_URL_HOST))
            . parse_url(url()->current(), PHP_URL_PATH)
            . (parse_url(url()->current(), PHP_URL_QUERY) ? '?' . parse_url(url()->current(), PHP_URL_QUERY) : '');
    @endphp
    <link rel="canonical" href="{{ $canonicalUrl }}">
    @php
        $seoTitle = \Artesaos\SEOTools\Facades\SEOMeta::getTitle() ?: 'THORXup';
        $seoDescription = \Artesaos\SEOTools\Facades\SEOMeta::getDescription()
            ?: 'THORXup menghadirkan heavy machinery, hydraulic systems, powertrain, dan spare parts industri.';
        $seoImage = request()->routeIs('home') && isset($heroCarousels) && $heroCarousels->first()?->image
            ? asset('storage/' . $heroCarousels->first()->image)
            : (data_get($profile ?? null, 'logo')
                ? asset('storage/' . data_get($profile, 'logo'))
                : asset('favicon.ico'));
    @endphp
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ data_get($profile ?? null, 'nama', 'THORXup') }}">
    <meta property="og:title" content="{{ $seoTitle }}">
    <meta property="og:description" content="{{ $seoDescription }}">
    <meta property="og:url" content="{{ $canonicalUrl }}">
    <meta property="og:image" content="{{ $seoImage }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $seoTitle }}">
    <meta name="twitter:description" content="{{ $seoDescription }}">
    <meta name="twitter:image" content="{{ $seoImage }}">
    <link rel="sitemap" type="application/xml" href="{{ route('sitemap') }}">
    @if($favicon = data_get($profile ?? null, 'favicon'))
        <link rel="icon" type="image/png" href="{{ asset('storage/' . $favicon) }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('storage/' . $favicon) }}">
    @elseif($profileLogo = data_get($profile ?? null, 'logo'))
        <link rel="icon" type="image/png" href="{{ asset('storage/' . $profileLogo) }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('storage/' . $profileLogo) }}">
    @else
        <link rel="icon" href="{{ asset('favicon.ico') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon.ico') }}">
    @endif
    {!! $embedCode(data_get($siteSetting ?? null, 'gsc_verification')) !!}
    {!! $embedCode(data_get($siteSetting ?? null, 'ga4_code')) !!}
    {!! $embedCode(data_get($siteSetting ?? null, 'gtm_head_code')) !!}
    {!! $embedCode(data_get($siteSetting ?? null, 'custom_head_scripts')) !!}

    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet" media="print" onload="this.media='all'" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=admin_panel_settings,arrow_back,arrow_forward,calendar_month,call,check_circle,chevron_left,chevron_right,close,expand_more,folder_open,handshake,location_on,mail,person,play_arrow,play_circle,precision_manufacturing,print,schedule,search,send,shield,shopping_bag,south_east,store,support_agent,swap_horiz,verified,verified_user,visibility&display=swap" rel="stylesheet" media="print" onload="this.media='all'" />

    @if(request()->routeIs('home') && isset($heroCarousels) && $heroCarousels->first()?->image)
        <link rel="preload" as="image" href="{{ asset('storage/' . $heroCarousels->first()->image) }}" fetchpriority="high">
    @endif

    @php
        $vite = app(\Illuminate\Foundation\Vite::class);
        $appCssUrl = $vite->asset('resources/css/app.css');
    @endphp
    <link rel="preload" href="{{ $appCssUrl }}" as="style" crossorigin>
    <link rel="stylesheet" href="{{ $appCssUrl }}" media="print" onload="this.media='all'">
    <noscript><link rel="stylesheet" href="{{ $appCssUrl }}"></noscript>
    @vite(['resources/js/app.js'])
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
