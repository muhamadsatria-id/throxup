@extends('layouts.app')
@section('content')
<!-- BREADCRUMB STRIP -->
<section class="w-full bg-surface-container-low shadow-sm relative overflow-hidden">
    <div class="max-w-[1360px] mx-auto px-margin-mobile lg:px-margin pt-space-lg pb-space-md relative z-10">
        <!-- Breadcrumb Navigation -->
        <nav aria-label="Breadcrumb"
            class="flex flex-wrap items-center justify-start gap-space-xs text-on-surface-variant font-label-md text-label-md">
            <a class="hover:text-primary transition-colors" data-path="home" href="#">Home</a>
            <span aria-hidden="true">/</span>
            <a class="hover:text-primary transition-colors hidden sm:inline" data-path="news" href="#">News &amp;
                Insights</a>
            <span aria-hidden="true" class="hidden sm:inline">/</span>
            <span class="text-primary font-bold min-w-0 max-w-full truncate" aria-current="page">{{ $news->judul }}</span>
        </nav>
    </div>
</section>
<!-- MAIN EDITORIAL CONTENT GRID -->
<section class="w-full py-space-xl bg-surface-container-low">
    <div class="max-w-[1360px] mx-auto px-margin-mobile lg:px-margin">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter items-start">
            <!-- LEFT COLUMN: ARTICLE DETAIL (~70% width -> 8 cols) -->
            <article class="lg:col-span-8 flex flex-col gap-space-lg">
                <!-- ARTICLE HEADER -->
                <header class="flex flex-col gap-space-md">

                    <h1
                        class="font-headline-lg text-2xl md:text-3xl lg:text-headline-lg text-on-surface font-extrabold tracking-tight leading-tight">
                        {{ $news->judul }}
                    </h1>
                    <!-- AUTHOR & TIMELINE META -->
                    <div
                        class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-md py-space-sm bg-surface-container-low">
                        <div class="flex items-center gap-space-md">
                            <div
                                class="w-12 h-12 rounded-full bg-primary text-on-primary flex items-center justify-center font-bold shadow-sm">
                                <span class="material-symbols-outlined text-[24px]">person</span>
                            </div>
                            <div class="flex flex-col">
                                <span class="font-label-lg text-label-lg text-on-surface font-semibold flex items-center gap-1">
                                    by {{ $news->author?->name ?? 'Admin' }}
                                    <span class="material-symbols-outlined text-primary text-[16px]"
                                        title="Verified Lead Engineer">verified</span>
                                </span>
                                <div class="flex items-center gap-1.5 text-on-surface-variant font-label-md text-label-md">
                                    <span class="material-symbols-outlined text-[15px]">schedule</span>
                                    <span>{{ optional($news->published_at)->format('d M Y') }}</span>
                                    <span>•</span>
                                    <span>5 min read</span>
                                </div>
                            </div>
                        </div>
                        <!-- TECHNICAL PART PILL -->

                    </div>
                    <!-- KEYWORD HASHTAGS -->
                    <div class="flex flex-wrap gap-2 pt-space-xs">
                        <span
                            class="px-3 py-1 rounded-full bg-surface-container-low text-primary font-label-spec text-label-spec font-semibold transition-all hover:bg-primary hover:text-on-primary cursor-pointer">#HydraulicSystems</span>
                        <span
                            class="px-3 py-1 rounded-full bg-surface-container-low text-primary font-label-spec text-label-spec font-semibold transition-all hover:bg-primary hover:text-on-primary cursor-pointer">#FuelEfficiency</span>
                        <span
                            class="px-3 py-1 rounded-full bg-surface-container-low text-primary font-label-spec text-label-spec font-semibold transition-all hover:bg-primary hover:text-on-primary cursor-pointer">#HeavyMachinery</span>
                        <span
                            class="px-3 py-1 rounded-full bg-surface-container-low text-primary font-label-spec text-label-spec font-semibold transition-all hover:bg-primary hover:text-on-primary cursor-pointer">#ExcavatorTechnology</span>
                        <span
                            class="px-3 py-1 rounded-full bg-surface-container-low text-primary font-label-spec text-label-spec font-semibold transition-all hover:bg-primary hover:text-on-primary cursor-pointer">#IndustrialEngineering</span>
                        <span
                            class="px-3 py-1 rounded-full bg-surface-container-low text-primary font-label-spec text-label-spec font-semibold transition-all hover:bg-primary hover:text-on-primary cursor-pointer">#OEMComponents</span>
                    </div>
                </header>
                <!-- PRIMARY FEATURED IMAGE & CAPTION -->
                <figure class="flex flex-col gap-space-xs">
                    <div
                        class="relative w-full aspect-[16/9] rounded-DEFAULT overflow-hidden bg-surface-container shadow-md">
                        <img class="w-full h-full object-cover"
                            data-alt="High precision industrial hydraulic test bench featuring electro-proportional variable displacement pumps, manifold blocks, steel braided high pressure hoses rated for 3900 PSI, digital pressure transducers, and electric motor coupling inside an engineering assembly shop with warm technical overhead lighting."
                            src="{{ $news->thumbnail ? asset('storage/' . $news->thumbnail) : '' }}">

                    </div>
                    <figcaption class="font-body-sm text-body-sm text-on-surface-variant italic px-space-xs">
                        Figure 1.0: Advanced electro-proportional variable displacement hydraulic bench test setup at Detroit
                        R&amp;D facility.
                    </figcaption>
                </figure>
                <!-- ARTICLE BODY PARAGRAPHS -->
                <div class="flex flex-col gap-space-lg text-on-surface font-body-lg text-body-lg leading-relaxed">
                    {!! $news->deskripsi !!}
                <!-- SECONDARY IN-BODY IMAGE -->
                    <figure class="flex flex-col gap-space-xs my-space-sm">
                        <div
                            class="relative w-full aspect-[16/9] rounded-DEFAULT overflow-hidden bg-surface-container shadow-md">
                            <img class="w-full h-full object-cover"
                                data-alt="Heavy industrial turbo-diesel engine with exposed helical gear powertrain assembly, heavy flywheel, transmission casing, and precision machined gear teeth in an engineering manufacturing plant with an engineer working in the background."
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAgPUWAbeTFpRE4aBdHF19eSzwgY9FlkCXEN_Ls_8gzQO3gxxNl4a-V_xAPjOIKchIFFRJeQQ-rftXKXSQjzfadSQQMBFmFyeiS3BvuHcb8Hq6SKLQ73BYzT1tp0OITOmLcfAfdTFLU3oJ9Xiiih_-aB59SeDR_fZlwotHTREd7cSpqbHlyrxamOzVxmxzVR9Qb-0AqVAgSwIcxMVhS5ass45qQ3xx_445jEFF5uPGA">

                        </div>
                        <figcaption class="font-body-sm text-body-sm text-on-surface-variant italic px-space-xs">
                            Figure 2.0: Synchronized torque output matching across turbo-diesel powertrain interfaces.
                        </figcaption>
                    </figure>
                    <h2 class="font-headline-md text-headline-md text-on-surface font-bold tracking-tight">
                        Field Validation Across Mining Operations
                    </h2>
                    <p>
                        Over 2,400 hours of continuous telemetric data were captured at an iron ore extraction quarry in the
                        Pilbara region of Western Australia. Equipped with high-frequency CAN-bus logging nodes, twin THORXup
                        crawler excavators handled blasted basalt rock with high abrasive density. Test metrics proved that
                        the electro-proportional variable system achieved higher bucket fill rates while dropping average
                        hourly fuel burn from 38.4 liters down to 31.4 liters per operational hour.
                    </p>
                    <h2 class="font-headline-md text-headline-md text-on-surface font-bold tracking-tight">
                        Thermal Dissipation and Life Cycle Longevity
                    </h2>
                    <p>
                        Lowering hydraulic throttling losses results in immediate secondary benefits: operating oil reservoir
                        temperatures fell by an average of 14°C throughout peak summer cycles. Because hydraulic fluid remains
                        below its thermal degradation threshold, elastomer seal oxidation and cylinder packing degradation are
                        extended by approximately 3,000 engine service hours, substantially reducing unscheduled field
                        overhauls.
                    </p>
                </div>
                <!-- SOURCE & PHOTO ATTRIBUTION -->
                <div
                    class="p-space-md rounded-DEFAULT bg-surface-container flex flex-col gap-space-xs font-body-sm text-body-sm text-on-surface-variant">
                    <div class="flex items-center gap-2">
                        <span
                            class="font-label-spec text-label-spec text-primary font-bold uppercase tracking-wider">Source:</span>
                        <span class="text-on-surface">THORXup Global Engineering Whitepaper &amp; Mining Technology Journal
                            Q1-2026</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="font-label-spec text-label-spec text-secondary font-bold uppercase tracking-wider">Photo
                            by:</span>
                        <span class="text-on-surface">THORXup Heavy Industries Media Lab / Industrial Telemetry
                            Archives</span>
                    </div>
                </div>
                <!-- SOCIAL SHARE BUTTONS BAR -->
                <div
                    class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-md py-space-md bg-surface-container-low px-space-lg rounded-DEFAULT">
                    <span class="font-label-lg text-label-lg text-on-surface font-bold uppercase tracking-wider">
                        Share this article:
                    </span>
                    <div class="flex flex-wrap items-center gap-2">
                        <!-- Facebook -->
                        <a aria-label="Share on Facebook"
                            class="w-10 h-10 rounded-full bg-white text-primary flex items-center justify-center shadow-sm hover:bg-primary hover:text-on-primary transition-all"
                            href="#">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path
                                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z">
                                </path>
                            </svg>
                        </a>
                        <!-- X (Twitter) -->
                        <a aria-label="Share on X"
                            class="w-10 h-10 rounded-full bg-white text-primary flex items-center justify-center shadow-sm hover:bg-primary hover:text-on-primary transition-all"
                            href="#">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path
                                    d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z">
                                </path>
                            </svg>
                        </a>
                        <!-- LinkedIn -->
                        <a aria-label="Share on LinkedIn"
                            class="w-10 h-10 rounded-full bg-white text-primary flex items-center justify-center shadow-sm hover:bg-primary hover:text-on-primary transition-all"
                            href="#">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path
                                    d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z">
                                </path>
                            </svg>
                        </a>
                        <!-- Telegram -->
                        <a aria-label="Share on Telegram"
                            class="w-10 h-10 rounded-full bg-white text-primary flex items-center justify-center shadow-sm hover:bg-primary hover:text-on-primary transition-all"
                            href="#">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path
                                    d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.894 8.221l-1.97 9.28c-.145.658-.537.818-1.084.508l-3-2.21-1.446 1.394c-.14.18-.357.295-.6.295-.002 0-.003 0-.005 0l.213-3.054 5.56-5.022c.24-.213-.054-.334-.373-.121l-6.869 4.326-2.96-.924c-.643-.204-.657-.643.136-.953l11.57-4.458c.538-.196 1.006.128.832.939z">
                                </path>
                            </svg>
                        </a>
                        <!-- Pinterest -->
                        <a aria-label="Share on Pinterest"
                            class="w-10 h-10 rounded-full bg-white text-primary flex items-center justify-center shadow-sm hover:bg-primary hover:text-on-primary transition-all"
                            href="#">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path
                                    d="M12 0c-6.627 0-12 5.372-12 12 0 5.084 3.163 9.426 7.627 11.174-.105-.949-.2-2.405.042-3.441.218-.937 1.407-5.965 1.407-5.965s-.359-.719-.359-1.782c0-1.668.967-2.914 2.171-2.914 1.023 0 1.518.769 1.518 1.69 0 1.029-.655 2.568-.994 3.995-.283 1.194.599 2.169 1.777 2.169 2.133 0 3.772-2.249 3.772-5.495 0-2.873-2.064-4.882-5.012-4.882-3.414 0-5.418 2.561-5.418 5.207 0 1.031.397 2.138.893 2.738.098.119.112.224.083.345-.09.375-.291 1.199-.332 1.357-.053.211-.174.256-.402.155-1.499-.696-2.435-2.883-2.435-4.639 0-3.774 2.743-7.24 7.904-7.24 4.149 0 7.371 2.957 7.371 6.906 0 4.122-2.599 7.44-6.207 7.44-1.212 0-2.352-.63-2.743-1.377l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146 1.124.347 2.317.535 3.554.535 6.627 0 12-5.373 12-12 0-6.628-5.373-12-12-12z">
                                </path>
                            </svg>
                        </a>
                        <!-- Email -->
                        <a aria-label="Share via Email"
                            class="w-10 h-10 rounded-full bg-white text-primary flex items-center justify-center shadow-sm hover:bg-primary hover:text-on-primary transition-all"
                            href="mailto:?subject={{ rawurlencode($news->judul) }}&body={{ rawurlencode(request()->fullUrl()) }}">
                            <span class="material-symbols-outlined text-[18px]">mail</span>
                        </a>
                        <!-- Print -->
                        <button aria-label="Print Article"
                            class="w-10 h-10 rounded-full bg-white text-primary flex items-center justify-center shadow-sm hover:bg-primary hover:text-on-primary transition-all"
                            onclick="window.print()">
                            <span class="material-symbols-outlined text-[18px]">print</span>
                        </button>
                    </div>
                </div>
                <!-- PREVIOUS / NEXT ARTICLE SPLIT NAVIGATION -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-space-md pt-space-md">
                    @if ($previousNews)
                        <a class="p-space-md rounded-DEFAULT bg-surface-container-low hover:bg-surface-container transition-all flex flex-col gap-1 text-left group"
                            href="{{ route('detail-news', $previousNews->slug) }}">
                            <span
                                class="font-label-spec text-label-spec text-primary font-bold uppercase tracking-wider flex items-center gap-1 group-hover:-translate-x-1 transition-transform">
                                <span class="material-symbols-outlined text-[16px]">arrow_back</span>
                                Previous Article
                            </span>
                            <span class="font-headline-sm text-headline-sm text-on-surface font-semibold line-clamp-2 mt-1">
                                {{ $previousNews->judul }}
                            </span>
                        </a>
                    @else
                        <div></div>
                    @endif

                    @if ($nextNews)
                        <a class="p-space-md rounded-DEFAULT bg-surface-container-low hover:bg-surface-container transition-all flex flex-col gap-1 text-right group"
                            href="{{ route('detail-news', $nextNews->slug) }}">
                            <span
                                class="font-label-spec text-label-spec text-primary font-bold uppercase tracking-wider flex items-center justify-end gap-1 group-hover:translate-x-1 transition-transform">
                                Next Article
                                <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                            </span>
                            <span class="font-headline-sm text-headline-sm text-on-surface font-semibold line-clamp-2 mt-1">
                                {{ $nextNews->judul }}
                            </span>
                        </a>
                    @endif
                </div>
            </article>
            <!-- RIGHT COLUMN: SIDEBAR (~30% width -> 4 cols) -->
            <aside class="lg:col-span-4 flex flex-col gap-space-xl"><!-- SEARCH WIDGET -->
                <div class="flex flex-col w-full bg-white p-space-md shadow-sm border border-outline-variant/30">
                    <!-- Header Tab + Accent Line -->
                    <div class="relative flex flex-col w-full border-b-2 border-primary mb-space-md">
                        <div class="self-start bg-primary text-white font-bold text-label-md px-4 py-1.5 tracking-wide">
                            Search News &amp; Insights
                        </div>
                    </div>
                    <form id="detail-news-search-form" class="relative flex items-center" method="GET" action="{{ route('news') }}">
                        <span
                            class="material-symbols-outlined absolute left-3 text-outline text-[18px] pointer-events-none">search</span>
                        <input
                            class="w-full pl-9 pr-20 py-2 rounded-full border border-outline-variant/30 bg-surface-container-low text-on-surface font-body-sm text-body-sm focus:outline-none focus:bg-white transition-all"
                            name="q" placeholder="Search articles, specs, part" type="text">
                        <button
                            class="absolute right-1 px-4 py-1 rounded-full bg-primary text-white font-label-md text-label-md hover:bg-primary-container transition-colors"
                            type="submit">
                            Search
                        </button>
                    </form>
                    <div id="detail-news-search-results" class="mt-space-sm hidden flex flex-col gap-space-xs"></div>
                </div>

                <!-- RECENT POSTS WIDGET -->
                <div class="flex flex-col w-full bg-white p-space-md shadow-sm border border-outline-variant/30">
                    <!-- Header Tab + Accent Line -->
                    <div class="relative flex flex-col w-full border-b-2 border-primary mb-space-xs">
                        <div class="self-start bg-primary text-white font-bold text-label-md px-4 py-1.5 tracking-wide">
                            Recent Posts
                        </div>
                    </div>
                    <ul class="flex flex-col w-full font-body-sm text-body-sm text-on-surface">
                        @forelse ($recentNews as $recent)
                            <li class="py-2.5 border-b border-surface-container-high hover:text-primary transition-colors">
                                <a class="block leading-snug font-medium" href="{{ route('detail-news', $recent->slug) }}">
                                    {{ $recent->judul }}
                                </a>
                            </li>
                        @empty
                            <li class="py-2.5 text-on-surface-variant">Belum ada berita terbaru.</li>
                        @endforelse
                    </ul>
                </div>

                <!-- RECENT COMMENTS WIDGET -->
                <div class="flex flex-col w-full bg-white p-space-md shadow-sm border border-outline-variant/30">
                    <!-- Header Tab + Accent Line -->
                    <div class="relative flex flex-col w-full border-b-2 border-primary mb-space-sm">
                        <div class="self-start bg-primary text-white font-bold text-label-md px-4 py-1.5 tracking-wide">
                            Recent Comments
                        </div>
                    </div>
                    <div class="flex flex-col gap-space-sm">
                        <!-- Comment 1 -->
                        <div class="p-space-sm rounded-DEFAULT bg-surface-container-low flex flex-col gap-1">
                            <div class="flex items-center gap-2 font-label-md text-label-md">
                                <span
                                    class="w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold text-[11px] shrink-0">MC</span>
                                <span class="font-bold text-on-surface">Marcus Chen</span>
                                <span class="text-on-surface-variant font-normal">on</span>
                                <a class="text-primary font-semibold hover:underline truncate" href="#">Predictive Failure</a>
                            </div>
                            <p class="font-body-sm text-body-sm text-on-surface-variant italic leading-snug">
                                “Great telemetry thresholds. The vibration harmonic frequency guide resolved our pump cavitation
                                issues.”
                            </p>
                        </div>
                        <!-- Comment 2 -->
                        <div class="p-space-sm rounded-DEFAULT bg-surface-container-low flex flex-col gap-1">
                            <div class="flex items-center gap-2 font-label-md text-label-md">
                                <span
                                    class="w-6 h-6 rounded-full bg-secondary text-white flex items-center justify-center font-bold text-[11px] shrink-0">HV</span>
                                <span class="font-bold text-on-surface">Hendrik V.</span>
                                <span class="text-on-surface-variant font-normal">on</span>
                                <a class="text-primary font-semibold hover:underline truncate" href="#">Hydraulic Systems</a>
                            </div>
                            <p class="font-body-sm text-body-sm text-on-surface-variant italic leading-snug">
                                “Will this drop-in proportional valve fit the 336D series boom cylinder manifold without
                                machining?”
                            </p>
                        </div>
                        <!-- Comment 3 -->
                        <div class="p-space-sm rounded-DEFAULT bg-surface-container-low flex flex-col gap-1">
                            <div class="flex items-center gap-2 font-label-md text-label-md">
                                <span
                                    class="w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold text-[11px] shrink-0">PQ</span>
                                <span class="font-bold text-on-surface">PT Quarry Tech</span>
                                <span class="text-on-surface-variant font-normal">on</span>
                                <a class="text-primary font-semibold hover:underline truncate" href="#">Maintenance Guide</a>
                            </div>
                            <p class="font-body-sm text-body-sm text-on-surface-variant italic leading-snug">
                                “Very helpful undercarriage wear chart. We calibrated our daily track slack to 45mm based on
                                this.”
                            </p>
                        </div>
                    </div>
                </div>

                <!-- ARCHIVES WIDGET -->
                <div class="flex flex-col w-full bg-white p-space-md shadow-sm border border-outline-variant/30">
                    <!-- Header Tab + Accent Line -->
                    <div class="relative flex flex-col w-full border-b-2 border-primary mb-space-xs">
                        <div class="self-start bg-primary text-white font-bold text-label-md px-4 py-1.5 tracking-wide">
                            Archives
                        </div>
                    </div>
                    <ul class="flex flex-col w-full font-bold text-body-sm text-on-surface-variant">
                        <li class="border-b border-surface-container-high py-2.5 transition-colors hover:text-primary">
                            <a class="block w-full" href="#">2026</a>
                        </li>
                        <li class="border-b border-surface-container-high py-2.5 transition-colors hover:text-primary">
                            <a class="block w-full" href="#">2025</a>
                        </li>
                        <li class="border-b border-surface-container-high py-2.5 transition-colors hover:text-primary">
                            <a class="block w-full" href="#">2024</a>
                        </li>
                        <li class="py-2.5 transition-colors hover:text-primary">
                            <a class="block w-full" href="#">2023</a>
                        </li>
                    </ul>
                </div>

                <!-- DIRECT TELEMETRY / INDUSTRIAL BULLETIN NEWSLETTER BOX -->
                <div class="p-space-lg rounded-DEFAULT bg-primary text-white flex flex-col gap-space-sm shadow-md">
                    <div
                        class="flex items-center gap-1.5 text-primary-fixed uppercase tracking-wider font-label-spec text-label-spec font-bold">
                        <span class="material-symbols-outlined text-[16px]">mail</span>
                        <span>Direct Telemetry</span>
                    </div>
                    <h4 class="font-headline-sm text-headline-sm font-bold text-white">
                        Industrial Bulletin
                    </h4>
                    <p class="font-body-sm text-body-sm text-primary-fixed leading-relaxed">
                        Receive monthly metallurgical test reports and hydraulic service advisories directly in your inbox.
                    </p>
                    <div class="flex flex-col gap-2 pt-space-xs">
                        <input
                            class="w-full px-4 py-2 rounded-full bg-white text-on-surface font-body-sm text-body-sm placeholder:text-outline focus:outline-none shadow-sm"
                            placeholder="fleet.engineer@company.com" type="email">
                        <button
                            class="w-full py-2.5 px-4 rounded-full bg-secondary-fixed text-primary font-bold font-label-md text-label-md hover:bg-white transition-colors shadow-sm"
                            type="button">
                            Subscribe Bulletin
                        </button>
                    </div>
                    <p class="text-[10px] text-primary-fixed/80 text-center pt-0.5">
                        Zero marketing spam. Only audited technical digests.
                    </p>
                </div>
            </aside>
        </div>
    </div>
</section>
<!-- RELATED POSTS SECTION (FULL WIDTH CARDS WITH IMAGE BACKGROUNDS & WHITE OVERLAY TEXT) -->
<section class="w-full bg-surface-container-low py-space-2xl">
    <div class="max-w-[1360px] mx-auto px-margin-mobile lg:px-margin flex flex-col gap-space-xl">
        <div class="flex items-center justify-between">
            <div>
                <span class="font-label-spec text-label-spec uppercase tracking-wider text-primary font-bold">Discover
                    More</span>
                <h2 class="font-headline-lg text-headline-lg text-on-surface font-extrabold tracking-tight">
                    Related Posts
                </h2>
            </div>
            <a class="hidden sm:flex items-center gap-1 font-label-lg text-label-lg text-primary hover:underline"
                data-path="news" href="#">
                <span>View All News</span>
                <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
            </a>
        </div>
        <!-- 3 FULL IMAGE OVERLAY CARDS -->
        <div class="grid grid-cols-2 md:grid-cols-3 gap-gutter">
            @forelse ($relatedNews as $related)
                <a class="group relative aspect-[4/3] rounded-DEFAULT overflow-hidden shadow-md flex flex-col justify-end p-space-md md:p-space-lg transition-transform duration-300 hover:-translate-y-1 {{ $loop->index >= 3 ? 'md:hidden' : '' }}"
                    href="{{ route('detail-news', $related->slug) }}">
                    @if ($related->thumbnail)
                        <img alt="{{ $related->judul }}"
                            class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            src="{{ asset('storage/' . $related->thumbnail) }}">
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-inverse-surface via-inverse-surface/60 to-transparent"></div>
                    <div class="relative z-10 flex flex-col gap-1 text-white">
                        <span class="font-label-spec text-label-spec text-primary-fixed uppercase tracking-wider">
                            {{ optional($related->published_at)->format('d M Y') }}
                        </span>
                        <h3 class="font-headline-sm text-headline-sm font-bold leading-tight group-hover:text-primary-fixed transition-colors line-clamp-2">
                            {{ $related->judul }}
                        </h3>
                    </div>
                </a>
            @empty
                <p class="col-span-full text-center text-on-surface-variant">Belum ada berita terkait.</p>
            @endforelse
        </div>
        @if ($relatedNews->count() >= 4)
            <div class="flex justify-center">
                <a href="{{ route('news') }}"
                    class="inline-flex items-center gap-space-xs bg-primary text-on-primary font-label-lg text-label-lg px-space-xl py-space-sm rounded-full shadow-lg transition-all font-bold">
                    <span>Lihat Semua Berita</span>
                    <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                </a>
            </div>
        @endif
            </a>
        </div>
    </div>
</section>
<!-- LEAVE A REPLY (COMMENT FORM) SECTION -->
<section class="w-full py-space-2xl bg-surface-container-low">
    <div class="max-w-[1360px] mx-auto px-margin-mobile lg:px-margin">
        <div
            class="max-w-4xl p-space-xl rounded-DEFAULT bg-surface-container-low shadow-sm flex flex-col gap-space-lg">
            <!-- HEADER -->
            <div class="flex flex-col gap-space-xs">
                <h2 class="font-headline-md text-headline-md text-on-surface font-bold tracking-tight">
                    Leave a reply
                </h2>
                <p class="font-body-sm text-body-sm text-on-surface-variant">
                    Your email address will not be published. Required fields are marked <span
                        class="text-error font-bold">*</span>
                </p>
            </div>
            <!-- FORM -->
            <form class="flex flex-col gap-space-md"
                onsubmit="event.preventDefault(); alert('Your comment has been submitted for peer review.');">
                <!-- COMMENT TEXTAREA -->
                <div class="flex flex-col gap-1.5">
                    <label class="font-label-lg text-label-lg text-on-surface font-semibold" for="comment-text">
                        Comment <span class="text-error">*</span>
                    </label>
                    <textarea
                        class="w-full p-space-md rounded-DEFAULT bg-white text-on-surface font-body-md text-body-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary transition-all"
                        id="comment-text" placeholder="Write your technical analysis, questions, or field experiences..."
                        required="" rows="5"></textarea>
                </div>
                <!-- 3-FIELD ROW: NAME, EMAIL, WEBSITE -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-space-md">
                    <div class="flex flex-col gap-1.5">
                        <label class="font-label-lg text-label-lg text-on-surface font-semibold" for="comment-name">
                            Name <span class="text-error">*</span>
                        </label>
                        <input
                            class="w-full px-space-md py-3 rounded-full bg-white text-on-surface font-body-md text-body-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary transition-all"
                            id="comment-name" placeholder="John Doe" required="" type="text">
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <label class="font-label-lg text-label-lg text-on-surface font-semibold" for="comment-email">
                            Email <span class="text-error">*</span>
                        </label>
                        <input
                            class="w-full px-space-md py-3 rounded-full bg-white text-on-surface font-body-md text-body-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary transition-all"
                            id="comment-email" placeholder="john.doe@miningcorp.com" required="" type="email">
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <label class="font-label-lg text-label-lg text-on-surface font-semibold" for="comment-website">
                            Website
                        </label>
                        <input
                            class="w-full px-space-md py-3 rounded-full bg-white text-on-surface font-body-md text-body-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary transition-all"
                            id="comment-website" placeholder="https://company.com" type="url">
                    </div>
                </div>
                <!-- REMEMBER CHECKBOX -->
                <div class="flex items-center gap-3 pt-space-xs">
                    <input class="w-5 h-5 rounded accent-primary cursor-pointer" id="save-info" type="checkbox">
                    <label class="font-body-sm text-body-sm text-on-surface-variant cursor-pointer select-none"
                        for="save-info">
                        Save my name, email, and website in this browser for the next time I comment.
                    </label>
                </div>
                <!-- SUBMIT BUTTON -->
                <div class="pt-space-sm">
                    <button
                        class="px-8 py-3.5 rounded-full bg-primary text-on-primary font-label-lg text-label-lg font-semibold hover:bg-primary-container shadow-sm hover:shadow-md transition-all"
                        type="submit">
                        Post Comment
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const url = encodeURIComponent(window.location.href);
        const title = encodeURIComponent(document.title);

        const shareLinks = {
            'Share on Facebook': 'https://www.facebook.com/sharer/sharer.php?u=' + url,
            'Share on X': 'https://twitter.com/intent/tweet?url=' + url + '&text=' + title,
            'Share on LinkedIn': 'https://www.linkedin.com/sharing/share-offsite/?url=' + url,
            'Share on Telegram': 'https://t.me/share/url?url=' + url + '&text=' + title,
            'Share on Pinterest': 'https://pinterest.com/pin/create/button/?url=' + url + '&description=' + title,
            'Share via Email': 'mailto:?subject=' + title + '&body=' + url,
        };

        Object.keys(shareLinks).forEach(function (label) {
            const link = document.querySelector('a[aria-label="' + label + '"]');
            if (link) {
                link.href = shareLinks[label];
                if (label === 'Share via Email') {
                    link.removeAttribute('target');
                } else {
                    link.target = '_blank';
                    link.rel = 'noopener noreferrer';
                }
            }
        });
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('detail-news-search-form');
        const input = form ? form.querySelector('input[name="q"]') : null;
        const results = document.getElementById('detail-news-search-results');

        if (!form || !results) return;

        const renderResults = async function () {
            const query = input ? input.value.trim() : '';
            if (!query) {
                results.classList.add('hidden');
                results.innerHTML = '';
                return;
            }

            try {
                const url = new URL('{{ route('news') }}', window.location.origin);
                url.searchParams.set('q', query);

                const response = await fetch(url.toString(), {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' },
                });
                const html = await response.text();
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const links = Array.from(doc.querySelectorAll('#news-results h2 a, #news-results a[href*="detail-news"]'));

                const unique = [];
                const seen = new Set();
                links.forEach(function (link) {
                    const href = link.getAttribute('href');
                    const text = link.textContent.trim();
                    if (!href || !text || seen.has(href)) return;
                    seen.add(href);
                    unique.push({ href: href, text: text });
                });

                if (unique.length === 0) {
                    results.innerHTML = '<p class="text-body-sm text-on-surface-variant">Tidak ada hasil.</p>';
                    results.classList.remove('hidden');
                    return;
                }

                results.innerHTML = unique.slice(0, 6).map(function (item) {
                    return '<a class="block rounded-md bg-surface-container-low px-space-sm py-space-xs text-body-sm text-on-surface hover:text-primary transition-colors" href="' + item.href + '">' + item.text + '</a>';
                }).join('');
                results.classList.remove('hidden');
            } catch (error) {
                console.error(error);
            }
        };

        form.addEventListener('submit', function (event) {
            event.preventDefault();
            renderResults();
        });

        input?.addEventListener('input', function () {
            clearTimeout(window.detailNewsSearchTimer);
            window.detailNewsSearchTimer = setTimeout(renderResults, 350);
        });
    });
</script>

@endsection