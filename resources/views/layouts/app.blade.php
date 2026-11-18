<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- 1. Fallback SEO Otomatis --}}
    @php
        if (! \Artesaos\SEOTools\Facades\SEOTools::getTitle()) {
            \Artesaos\SEOTools\Facades\SEOTools::setTitle(data_get($profile, 'nama', config('app.name', 'Thorxup')));
            if ($desc = data_get($profile, 'deskripsi')) { \Artesaos\SEOTools\Facades\SEOTools::setDescription(\Illuminate\Support\Str::limit(strip_tags($desc), 155));
            }
        }
    @endphp
    {!! SEO::generate() !!}

    {{-- 2. Favicon Dinamis --}}
    @if($favicon = data_get($profile, 'favicon'))
        <link rel="icon" type="image/png" href="{{ asset('storage/' . $favicon) }}">
    @else
        <link rel="icon" href="{{ asset('favicon.ico') }}">
    @endif

    {{-- 3. Google Search Console, GA4, GTM Head & Custom Head Scripts --}}
    {!! data_get($siteSetting, 'gsc_verification') !!}
    {!! data_get($siteSetting, 'ga4_code') !!}
    {!! data_get($siteSetting, 'gtm_head_code') !!}
    {!! data_get($siteSetting, 'custom_head_scripts') !!}

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet" />

    {{-- Tailwind & Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "secondary-fixed-dim": "#bbc3ff", "on-secondary-fixed-variant": "#354187", "secondary-fixed": "#dee0ff",
                        "on-error-container": "#93000a", "primary": "#1e3093", "primary-fixed-dim": "#bbc3ff",
                        "surface-container": "#f0eded", "inverse-surface": "#303030", "primary-container": "#3949ab",
                        "surface-container-low": "#f5f3f2", "on-primary-fixed-variant": "#2c3c9e", "on-secondary-fixed": "#01105b",
                        "surface-container-lowest": "#ffffff", "secondary": "#4d59a0", "on-error": "#ffffff",
                        "inverse-primary": "#bbc3ff", "outline": "#767684", "tertiary-fixed-dim": "#bdc7d4",
                        "background": "#fbf9f8", "on-primary": "#ffffff", "on-secondary-container": "#354187",
                        "surface-tint": "#4555b7", "secondary-container": "#a5b1ff", "on-tertiary": "#ffffff",
                        "surface-bright": "#fbf9f8", "surface-variant": "#e4e2e1", "inverse-on-surface": "#f3f0f0",
                        "on-surface": "#1b1c1c", "on-surface-variant": "#454652", "primary-fixed": "#dee0ff",
                        "error-container": "#ffdad6", "on-primary-fixed": "#000e5e", "surface-dim": "#dcd9d9",
                        "on-background": "#1b1c1c", "surface-container-highest": "#e4e2e1", "on-primary-container": "#bbc3ff",
                        "surface": "#fbf9f8", "tertiary-fixed": "#d9e3f0", "surface-container-high": "#eae8e7",
                        "tertiary": "#333d47", "on-secondary": "#ffffff", "error": "#ba1a1a",
                        "outline-variant": "#c6c5d4", "tertiary-container": "#4a545e", "on-tertiary-container": "#bec8d4",
                        "on-tertiary-fixed-variant": "#3e4852", "on-tertiary-fixed": "#131d26"
                    },
                    borderRadius: { "DEFAULT": "1rem", "lg": "2rem", "xl": "3rem", "full": "9999px" },
                    spacing: {
                        "space-lg": "1.5rem", "gutter-sm": "1rem", "margin": "3rem", "space-md": "1rem",
                        "space-xl": "2.5rem", "margin-mobile": "1.25rem", "space-2xl": "4rem",
                        "gutter": "1.5rem", "space-sm": "0.5rem", "space-xs": "0.25rem"
                    },
                    fontFamily: {
                        "body-lg": ["Inter"], "headline-lg-mobile": ["Plus Jakarta Sans"], "label-lg": ["Inter"],
                        "display-hero": ["Plus Jakarta Sans"], "headline-md": ["Plus Jakarta Sans"], "headline-sm": ["Plus Jakarta Sans"],
                        "display-hero-mobile": ["Plus Jakarta Sans"], "label-md": ["Inter"], "headline-lg": ["Plus Jakarta Sans"],
                        "body-md": ["Inter"], "body-sm": ["Inter"], "label-spec": ["Inter"]
                    },
                    fontSize: {
                        "body-lg": ["18px", { "lineHeight": "28px", "fontWeight": "400" }],
                        "headline-lg-mobile": ["28px", { "lineHeight": "36px", "letterSpacing": "-0.01em", "fontWeight": "700" }],
                        "label-lg": ["14px", { "lineHeight": "20px", "letterSpacing": "0.01em", "fontWeight": "600" }],
                        "display-hero": ["56px", { "lineHeight": "64px", "letterSpacing": "-0.03em", "fontWeight": "800" }],
                        "headline-md": ["24px", { "lineHeight": "32px", "letterSpacing": "-0.01em", "fontWeight": "700" }],
                        "headline-sm": ["18px", { "lineHeight": "26px", "letterSpacing": "0em", "fontWeight": "600" }],
                        "display-hero-mobile": ["36px", { "lineHeight": "44px", "letterSpacing": "-0.02em", "fontWeight": "800" }],
                        "label-md": ["12px", { "lineHeight": "16px", "letterSpacing": "0.02em", "fontWeight": "600" }],
                        "headline-lg": ["36px", { "lineHeight": "44px", "letterSpacing": "-0.02em", "fontWeight": "700" }],
                        "body-md": ["15px", { "lineHeight": "24px", "fontWeight": "400" }],
                        "body-sm": ["13px", { "lineHeight": "20px", "fontWeight": "400" }],
                        "label-spec": ["11px", { "lineHeight": "14px", "letterSpacing": "0.06em", "fontWeight": "700" }]
                    }
                }
            }
        };
    </script>
    @stack('styles')
</head>
<body class="bg-surface font-body-md text-on-surface antialiased">
    {{-- 4. GTM Noscript Body --}}
    {!! data_get($siteSetting, 'gtm_body_code') !!}

    {{-- 5. Header --}}
    <x-header />

    {{-- 6. Konten Halaman --}}
    <main class="w-full pt-20 bg-surface min-h-screen">
        @yield('content')
    </main>

   {{-- 7. Footer --}}
    <x-footer />

    {{-- 8. Floating WhatsApp --}}
    @if($wa = data_get($profile, 'whatsapp'))
        <x-floating-whatsapp :phone="$wa" />
    @endif

    {{-- 9. Custom Scripts Sebelum Penutup Body --}}
    {!! data_get($siteSetting, 'custom_body_scripts') !!}
    @stack('scripts')
</body>
</html>