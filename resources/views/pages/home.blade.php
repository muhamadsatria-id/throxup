@extends('layouts.app')
@section('content')
<section
    class="relative w-full -mt-20 overflow-hidden bg-primary text-on-primary min-h-[85vh] lg:min-h-[90vh] flex items-center select-none cursor-grab active:cursor-grabbing"
    id="heroCarousel">
    <div class="relative w-full h-full min-h-svh lg:min-h-svh flex transition-transform duration-700 ease-out"
        id="carouselTrack">
        @forelse ($heroCarousels as $hero)
            <div class="w-full flex-shrink-0 relative min-h-[85vh] lg:min-h-[90vh] flex flex-col justify-center">
                <div class="absolute inset-0 z-0">
                    <img alt="{{ $hero->judul }}" class="w-full h-full object-cover object-center transform scale-105"
                        src="{{ asset('storage/' . $hero->image) }}" />
                    <div class="absolute inset-0 bg-gradient-to-r from-primary/70 via-primary/55 to-primary/45"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-primary/70 via-transparent to-primary/30"></div>
                </div>
                <div class="relative z-10 max-w-[1360px] mx-auto px-margin-mobile lg:px-margin pt-36 pb-space-2xl w-full flex flex-col justify-center">
                    <div class="max-w-3xl my-auto py-space-xl text-center mx-auto">
                        <h1 class="font-display-hero text-display-hero-mobile md:text-display-hero text-on-primary tracking-tight font-extrabold leading-tight">
                            {{ $hero->judul }}
                        </h1>
                        @if ($hero->deskripsi)
                            <p class="mt-space-md font-body-lg text-body-lg text-on-primary-container max-w-2xl font-normal mx-auto leading-relaxed">
                                {{ $hero->deskripsi }}
                            </p>
                        @endif
                        @if ($hero->button_text)
                            <div class="mt-space-xl flex flex-wrap items-center justify-center gap-space-md">
                                <a class="inline-flex items-center gap-space-xs bg-secondary-container hover:bg-secondary-fixed text-on-secondary-container font-label-lg text-label-lg px-space-xl py-space-sm rounded-full shadow-lg transition-all font-bold group"
                                    href="{{ $hero->button_url ?: '#' }}">
                                    <span>{{ $hero->button_text }}</span>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="w-full flex-shrink-0 relative min-h-[85vh] lg:min-h-[90vh] flex items-center justify-center">
                <p class="text-on-primary font-body-lg">Belum ada hero carousel aktif.</p>
            </div>
        @endforelse
    </div>
    @if ($heroCarousels->count() > 1)
        <button aria-label="Previous Slide"
            class="absolute left-4 lg:left-8 top-1/2 -translate-y-1/2 z-20 w-12 h-12 lg:w-14 lg:h-14 rounded-full bg-white/10 hover:bg-white/25 active:scale-95 text-on-primary backdrop-blur-md border border-white/25 shadow-xl transition-all flex items-center justify-center group"
            id="carouselPrevBtn">
            <span class="material-symbols-outlined text-[28px] group-hover:-translate-x-0.5 transition-transform">chevron_left</span>
        </button>
        <button aria-label="Next Slide"
            class="absolute right-4 lg:right-8 top-1/2 -translate-y-1/2 z-20 w-12 h-12 lg:w-14 lg:h-14 rounded-full bg-white/10 hover:bg-white/25 active:scale-95 text-on-primary backdrop-blur-md border border-white/25 shadow-xl transition-all flex items-center justify-center group"
            id="carouselNextBtn">
            <span class="material-symbols-outlined text-[28px] group-hover:translate-x-0.5 transition-transform">chevron_right</span>
        </button>
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-20 flex items-center gap-space-sm">
            @foreach ($heroCarousels as $index => $hero)
                <button aria-label="Slide {{ $index + 1 }}"
                    class="carousel-dot transition-all duration-300 {{ $index === 0 ? 'w-8 h-2.5 rounded-full bg-secondary-fixed shadow-md' : 'w-2.5 h-2.5 rounded-full bg-white/40 hover:bg-white/70' }}"
                    data-slide-index="{{ $index }}"></button>
            @endforeach
        </div>
    @endif
</section>
<!-- 2. CATEGORY SECTION -->
<!-- 3. PRODUCTS SECTION -->
 <section class="w-full bg-surface-container-low pb-space-2xl pt-space-2xl" id="inventory-showcase">
                <div class="max-w-[1360px] mx-auto px-margin-mobile lg:px-margin">
                    <div class="w-16 h-1 bg-primary rounded-full mx-auto mb-space-lg"></div>
                    <!-- Section Header -->
                    <div class="flex flex-col md:flex-row md:items-end justify-between gap-space-lg mb-space-xl">
                        <div class="flex flex-col gap-space-xs"><span
                                class="font-label-spec text-label-spec uppercase tracking-wider text-secondary font-bold">
                                INVENTORY SHOWCASE</span>
                            <h2
                                class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-on-surface font-extrabold tracking-tight">
                                Latest Heavy Machinery &amp; Parts</h2>
                        </div>
                        <p class="font-body-md text-body-md text-on-surface-variant max-w-md text-left md:text-right">
                            High-performance machinery and heavy-duty replacement assemblies rigorously tested for
                            immediate field deployment.</p>
                    </div>
                    <!-- 4 Showcase Product Cards Grid -->
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-gutter">
                        @forelse ($products as $product)
                            <x-card-product
                                :image="$product->images ? asset('storage/' . $product->images[0]) : null"
                                :category="$product->category?->nama"
                                :title="$product->nama"
                                :url="route('detail-product', $product->slug)" />
                        @empty
                            <p class="col-span-full text-center text-on-surface-variant">Belum ada produk aktif.</p>
                        @endforelse
                    </div>
                    @if ($products->count() >= 6)
                        <div class="mt-space-xl flex justify-center">
                            <a href="{{ route('product') }}"
                                class="inline-flex items-center gap-space-xs bg-primary text-on-primary font-label-lg text-label-lg px-space-xl py-space-sm rounded-full shadow-lg transition-all font-bold">
                                <span>Lihat Semua Produk</span>
                                <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                            </a>
                        </div>
                    @endif
                </div>
            </section>
                        <section class="w-full py-space-2xl bg-on-secondary-fixed text-on-primary relative overflow-hidden">
                <!-- Decorative background geometric accents -->
                <div
                    class="absolute right-0 top-0 w-96 h-96 bg-primary-container/20 rounded-full blur-3xl pointer-events-none">
                </div>
                <div
                    class="absolute left-10 bottom-0 w-72 h-72 bg-secondary/15 rounded-full blur-2xl pointer-events-none">
                </div>
                <div class="relative z-10 max-w-[1360px] mx-auto px-margin-mobile lg:px-margin justify-center">
                    <div class="max-w-4xl mx-auto text-center flex flex-col items-center">
                        <div class="w-12 h-1 bg-secondary-container rounded-full mb-space-lg"></div>
                        <blockquote
                            class="font-display-hero text-headline-lg-mobile md:text-headline-lg text-on-primary font-extrabold leading-snug tracking-tight">
                            “Built for Unyielding Reliability. When the ground is tough and operations can’t stop,
                            THORXup powers the machines that build the world’s infrastructure.”
                        </blockquote>
                        <p class="font-body-md text-body-md text-secondary-fixed-dim mt-space-md max-w-xl">
                            Zero tolerance for downtime. Every hydraulic line, roller assembly, and cylinder is
                            stress-tested beyond ISO threshold benchmarks.
                        </p>
                    </div>
                    <!-- Key Performance Metrics / Stats Bar -->
                </div>
            </section>
            <!-- 5. LATEST NEWS & INSIGHTS -->
            <section class="w-full py-space-2xl bg-surface">
                <div class="max-w-[1360px] mx-auto px-margin-mobile lg:px-margin">
                    <div class="w-16 h-1 bg-primary rounded-full mx-auto mb-space-lg"></div>
                    <!-- Section Header -->
                    <div class="flex items-center justify-between mb-space-2xl">
                        <div class="flex flex-col gap-space-xs">
                            <span
                                class="font-label-spec text-label-spec text-primary tracking-widest uppercase font-bold">TECHNICAL
                                DIGEST • INSIGHTS</span>
                            <h2
                                class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-on-surface font-extrabold tracking-tight">
                                Industry Insights &amp; Latest News
                            </h2>
                        </div>
                        <p
                            class="font-body-md text-body-md text-on-surface-variant max-w-md text-left md:text-right hidden sm:block">
                            Engineering reports, field telemetry findings, and heavy equipment maintenance updates from
                            our technical specialists.</p>
                    </div>
                    <!-- 3 Editorial Cards Grid -->
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-gutter">
                        @forelse ($news as $article)
                            <article
                                class="bg-surface-container-lowest rounded-md overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300 flex flex-col">
                                <div class="relative h-36 md:h-48 overflow-hidden bg-surface-container">
                                    @if ($article->thumbnail)
                                        <img class="w-full h-full object-cover transition-transform duration-500 hover:scale-105"
                                            alt="{{ $article->judul }}"
                                            src="{{ asset('storage/' . $article->thumbnail) }}" />
                                    @endif
                                </div>
                                <div class="p-space-md md:p-space-lg flex-1 flex flex-col justify-between">
                                    <div>
                                        <div
                                            class="flex flex-wrap items-center gap-space-sm text-outline font-label-spec text-label-spec mb-0 md:mb-space-xs">
                                            <span class="hidden md:inline">
                                                <span>{{ optional($article->published_at)->format('d M Y') }}</span>
                                            </span>
                                        </div>
                                        <h3
                                            class="font-headline-sm text-headline-sm text-on-surface font-bold leading-snug line-clamp-2">
                                            <a href="{{ route('detail-news', $article->slug) }}">{{ $article->judul }}</a>
                                        </h3>
                                        <p
                                            class="font-body-sm text-body-sm text-on-surface-variant mt-space-sm line-clamp-2 md:line-clamp-3">
                                            {{ \Illuminate\Support\Str::limit(strip_tags($article->deskripsi), 140) }}
                                        </p>
                                    </div>
                                    <div class="mt-space-md pt-space-sm flex flex-wrap items-center justify-between gap-space-xs">
                                        <div class="flex items-center gap-space-xs">
                                            <span
                                                class="w-6 h-6 rounded-full bg-primary text-on-primary flex items-center justify-center font-label-spec text-label-spec">
                                                {{ \Illuminate\Support\Str::upper(\Illuminate\Support\Str::substr($article->author?->name ?? 'A', 0, 2)) }}
                                            </span>
                                            <span class="font-body-sm text-body-sm text-on-surface font-medium">
                                                {{ $article->author?->name ?? 'Admin' }}
                                            </span>
                                        </div>
                                        <a class="font-label-lg text-label-lg text-primary hover:text-primary-container font-bold flex items-center gap-0.5"
                                            data-path="news" href="{{ route('detail-news', $article->slug) }}">
                                            <span class="md:hidden">Read</span><span class="hidden md:inline">Read Article</span>
                                            <span class="material-symbols-outlined text-[16px]">chevron_right</span>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        @empty
                            <p class="col-span-full text-center text-on-surface-variant">Belum ada berita terpublikasi.</p>
                        @endforelse
                    </div>
                    @if ($news->count() >= 6)
                        <div class="mt-space-xl flex justify-center">
                            <a href="{{ route('news') }}"
                                class="inline-flex items-center gap-space-xs bg-primary text-on-primary font-label-lg text-label-lg px-space-xl py-space-sm rounded-full shadow-lg transition-all font-bold">
                                <span>Lihat Semua Berita</span>
                                <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                            </a>
                        </div>
                    @endif
                </div>
            </section>
            <!-- 6. ABOUT US SECTION (About, Vision, Mission, Core Values) -->
            <section class="w-full bg-surface-container-low pb-space-2xl pt-space-2xl">
                <div class="max-w-[1360px] mx-auto px-margin-mobile lg:px-margin">
                    <!-- Section Header -->
                    <div class="flex flex-col md:flex-row md:items-end justify-between gap-space-lg mb-space-2xl">
                        <div class="flex flex-col gap-space-xs max-w-2xl"><span
                                class="font-label-spec text-label-spec text-primary tracking-widest uppercase font-bold">ABOUT
                                THORXUP</span>
                            <h2
                                class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-on-surface font-extrabold tracking-tight">
                                Engineering the Backbone of Industrial Productivity</h2>
                        </div>
                        <p class="font-body-md text-body-md text-on-surface-variant max-w-md">Headquartered in the
                            global manufacturing corridor, THORXup provides heavy machinery engineering and rapid
                            component supply to fleets and mine operators worldwide.</p>
                    </div>
                    <!-- Vision & Mission Side-by-Side Cards -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-gutter mb-space-xl items-stretch">
                        <div
                            class="bg-primary p-space-xl rounded-md shadow-md flex flex-col justify-between text-left text-on-primary">
                            <div class="flex flex-col gap-space-md">
                                <div class="w-12 h-1 bg-secondary-fixed rounded-full"></div>
                                <h3 class="font-headline-md text-headline-md text-on-primary font-extrabold">Our Vision
                                </h3>
                                <blockquote
                                    class="font-body-lg text-body-lg text-secondary-fixed-dim leading-relaxed font-medium italic mt-space-sm">
                                    “To be trusted solution for mining operations through high performance product that
                                    enhance productivity, reliability, and sustainability”</blockquote>
                            </div>
                            <div
                                class="mt-space-xl pt-space-md border-t border-primary-container flex items-center gap-space-sm text-secondary-fixed-dim font-label-spec text-label-spec uppercase tracking-wider font-semibold">
                                <span
                                    class="material-symbols-outlined text-[20px] text-secondary-fixed">visibility</span><span
                                    class="text-secondary-fixed">Long-term strategic focus &amp; commitment</span></div>
                        </div>
                        <div
                            class="bg-surface-container-lowest p-space-xl rounded-md shadow-sm border border-outline-variant/30 flex flex-col justify-between">
                            <div class="flex flex-col gap-space-md">
                                <div>
                                    <div class="w-12 h-1 bg-primary rounded-full mb-space-sm"></div>
                                    <h3 class="font-headline-md text-headline-md text-primary font-extrabold">Our
                                        Mission</h3>
                                </div>
                                <div class="flex flex-col gap-space-xs">
                                    <div
                                        class="py-space-sm border-b border-outline-variant/30 flex flex-row items-center gap-space-md group">
                                        <span
                                            class="font-headline-md text-headline-md font-black text-primary shrink-0 select-none">01</span>
                                        <p
                                            class="font-body-sm text-body-sm text-on-surface font-medium leading-snug flex-1">
                                            Deliver high-quality and high-durability products to support mining
                                            activities under demanding operational conditions.</p>
                                    </div>
                                    <div
                                        class="py-space-sm border-b border-outline-variant/30 flex flex-row items-center gap-space-md group">
                                        <span
                                            class="font-headline-md text-headline-md font-black text-primary shrink-0 select-none">02</span>
                                        <p
                                            class="font-body-sm text-body-sm text-on-surface font-medium leading-snug flex-1">
                                            Provide productivity and reliability-oriented solutions to improve work
                                            effectiveness and reduce operational risk.</p>
                                    </div>
                                    <div
                                        class="py-space-sm border-b border-outline-variant/30 flex flex-row items-center gap-space-md group">
                                        <span
                                            class="font-headline-md text-headline-md font-black text-primary shrink-0 select-none">03</span>
                                        <p
                                            class="font-body-sm text-body-sm text-on-surface font-medium leading-snug flex-1">
                                            Ensure product availability and timely distribution through responsive and
                                            consistent supply chain management.</p>
                                    </div>
                                    <div class="py-space-sm flex flex-row items-center gap-space-md group"><span
                                            class="font-headline-md text-headline-md font-black text-primary shrink-0 select-none">04</span>
                                        <p
                                            class="font-body-sm text-body-sm text-on-surface font-medium leading-snug flex-1">
                                            Evaluation, technical support, and portfolio development aligned with the
                                            evolving needs of the mining industry.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Core Values: 4 Pillars -->
                    <div class="mt-space-2xl">
                        <h4
                            class="font-headline-sm text-headline-sm text-on-surface font-bold mb-space-lg text-center md:text-left">
                            Core Engineering Pillars
                        </h4>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-gutter">
                            <div class="bg-surface-container-lowest p-space-lg rounded-md shadow-sm">
                                <div class="text-primary mb-space-sm">
                                    <span class="material-symbols-outlined text-[32px]">verified_user</span>
                                </div>
                                <h5 class="font-headline-sm text-headline-sm text-on-surface font-bold mb-space-xs">
                                    Uncompromising Quality</h5>
                                <p class="font-body-sm text-body-sm text-on-surface-variant">
                                    Every component adheres to metallurgical certified stress tests, laser micrometer
                                    verification, and ISO 9001:2015 protocol.
                                </p>
                            </div>
                            <div class="bg-surface-container-lowest p-space-lg rounded-md shadow-sm">
                                <div class="text-primary mb-space-sm">
                                    <span class="material-symbols-outlined text-[32px]">precision_manufacturing</span>
                                </div>
                                <h5 class="font-headline-sm text-headline-sm text-on-surface font-bold mb-space-xs">
                                    Engineering Precision</h5>
                                <p class="font-body-sm text-body-sm text-on-surface-variant">
                                    Tight tolerance machining down to sub-micron thresholds ensures 100% plug-and-play
                                    fitment with major OEM heavy frames.
                                </p>
                            </div>
                            <div class="bg-surface-container-lowest p-space-lg rounded-md shadow-sm">
                                <div class="text-primary mb-space-sm">
                                    <span class="material-symbols-outlined text-[32px]">shield</span>
                                </div>
                                <h5 class="font-headline-sm text-headline-sm text-on-surface font-bold mb-space-xs">
                                    Relentless Durability</h5>
                                <p class="font-body-sm text-body-sm text-on-surface-variant">
                                    Formulated for extreme thermal variance, abrasive quarry particulates, and severe
                                    dynamic shock loads.
                                </p>
                            </div>
                            <div class="bg-surface-container-lowest p-space-lg rounded-md shadow-sm">
                                <div class="text-primary mb-space-sm">
                                    <span class="material-symbols-outlined text-[32px]">handshake</span>
                                </div>
                                <h5 class="font-headline-sm text-headline-sm text-on-surface font-bold mb-space-xs">
                                    Customer-First Partnership</h5>
                                <p class="font-body-sm text-body-sm text-on-surface-variant">
                                    Direct line access to application engineers, predictive spare parts inventory
                                    holding, and on-site technical support.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- 7. CONTACT & RFQ FORM SECTION -->
            <section class="w-full py-space-2xl bg-surface" id="contact">
                <div class="max-w-[1360px] mx-auto px-margin-mobile lg:px-margin">
                    <div class="w-16 h-1 bg-primary rounded-full mx-auto mb-space-lg"></div>
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
                        <!-- Left: Contact Details & Engineering Support -->
                        <div
                            class="lg:col-span-5 flex flex-col justify-between bg-primary text-on-primary p-space-xl rounded-md shadow-md">
                            <div>
                                <h2
                                    class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-on-primary font-extrabold tracking-tight">
                                    Get an Immediate Technical Quote</h2>
                                <p class="font-body-md text-body-md text-on-primary-container mt-space-sm">Whether you
                                    need replacement undercarriage parts, a bespoke hydraulic valve pack, or full
                                    machinery procurement, our engineering group responds within 2 business hours.</p>
                                <div class="mt-space-xl flex flex-col gap-space-lg">
                                    <div class="flex items-start gap-space-md">
                                        <div class="text-secondary-fixed shrink-0 pt-0.5"><span
                                                class="material-symbols-outlined text-[24px]">location_on</span></div>
                                        <div>
                                            <h4 class="font-label-lg text-label-lg text-on-primary font-bold">Global
                                                Headquarters</h4>
                                            <p class="font-body-sm text-body-sm text-on-primary-container mt-0.5">4800
                                                Industrial Parkway, Sector 9<br />Heavy Engineering Corridor, Detroit,
                                                MI 48202</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-space-md">
                                        <div class="text-secondary-fixed shrink-0 pt-0.5"><span
                                                class="material-symbols-outlined text-[24px]">call</span></div>
                                        <div>
                                            <h4 class="font-label-lg text-label-lg text-on-primary font-bold">24/7 Field
                                                Technical Hotline</h4>
                                            <p class="font-body-sm text-body-sm text-on-primary-container mt-0.5">+1
                                                (800) 846-7987 • Free Global Direct</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-space-md">
                                        <div class="text-secondary-fixed shrink-0 pt-0.5"><span
                                                class="material-symbols-outlined text-[24px]">mail</span></div>
                                        <div>
                                            <h4 class="font-label-lg text-label-lg text-on-primary font-bold">Direct
                                                Engineering Email</h4>
                                            <p class="font-body-sm text-body-sm text-on-primary-container mt-0.5">
                                                rfq-desk@thorxup-machinery.com</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-space-md">
                                        <div class="text-secondary-fixed shrink-0 pt-0.5"><span
                                                class="material-symbols-outlined text-[24px]">schedule</span></div>
                                        <div>
                                            <h4 class="font-label-lg text-label-lg text-on-primary font-bold">Operating
                                                Hours</h4>
                                            <p class="font-body-sm text-body-sm text-on-primary-container mt-0.5">Monday
                                                – Friday: 06:00 – 20:00 EST<br />Emergency Breakdown: 24/7 Continuous
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Right: Inquiry & RFQ Form -->
                        <div
                            class="lg:col-span-7 bg-surface-container-lowest p-space-xl rounded-md shadow-md flex flex-col justify-between">
                            @if (session('quote_status'))
                                <div class="rounded-md bg-emerald-100 text-emerald-800 px-space-md py-space-sm font-body-sm">
                                    {{ session('quote_status') }}
                                </div>
                            @endif
                            <form class="flex flex-col gap-space-md" id="rfq-form" method="POST" action="{{ route('quote.store') }}">
                                @csrf
                                <div class="flex items-center justify-between pb-space-xs">
                                    <h3 class="font-headline-md text-headline-md text-on-surface font-bold">Request a
                                        Formal Quote</h3>
                                </div>
                                <!-- Full Name and Email -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-md">
                                    <div class="flex flex-col gap-space-xs">
                                        <label class="font-label-sm text-label-sm text-on-surface font-semibold"
                                            for="contact-name">Full Name *</label>
                                        <input
                                            class="w-full px-space-md py-space-sm rounded-md bg-surface-container-low text-on-surface font-body-sm text-body-sm focus:outline-none focus:bg-surface-container-lowest focus:shadow-[0_0_0_2px_#3949ab] transition-all"
                                            id="contact-name" name="full_name" placeholder="e.g. Johnathan Vance" required=""
                                            type="text" />
                                    </div>
                                    <div class="flex flex-col gap-space-xs">
                                        <label class="font-label-sm text-label-sm text-on-surface font-semibold"
                                            for="contact-email">Business Email *</label>
                                        <input
                                            class="w-full px-space-md py-space-sm rounded-md bg-surface-container-low text-on-surface font-body-sm text-body-sm focus:outline-none focus:bg-surface-container-lowest focus:shadow-[0_0_0_2px_#3949ab] transition-all"
                                            id="contact-email" name="business_email" placeholder="e.g. j.vance@quarryops.com" required=""
                                            type="email" />
                                    </div>
                                </div>
                                <!-- Phone and Category -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-md">
                                    <div class="flex flex-col gap-space-xs">
                                        <label class="font-label-sm text-label-sm text-on-surface font-semibold"
                                            for="contact-phone">Phone Number / Country Code</label>
                                        <input
                                            class="w-full px-space-md py-space-sm rounded-md bg-surface-container-low text-on-surface font-body-sm text-body-sm focus:outline-none focus:bg-surface-container-lowest focus:shadow-[0_0_0_2px_#3949ab] transition-all"
                                            id="contact-phone" name="phone_number" placeholder="e.g. +1 (555) 019-2834" type="tel" />
                                    </div>
                                    <div class="flex flex-col gap-space-xs">
                                    </div>
                                </div>
                                <!-- Subject -->
                                <div class="flex flex-col gap-space-xs">
                                    <label class="font-label-sm text-label-sm text-on-surface font-semibold"
                                        for="contact-subject">Subject / Part Number Reference</label>
                                    <input
                                        class="w-full px-space-md py-space-sm rounded-md bg-surface-container-low text-on-surface font-body-sm text-body-sm focus:outline-none focus:bg-surface-container-lowest focus:shadow-[0_0_0_2px_#3949ab] transition-all"
                                        id="contact-subject" name="subject"
                                        placeholder="e.g. RFQ for 4x HP-4200 Pumps &amp; Track Assembly" type="text" />
                                </div>
                                <!-- Message -->
                                <div class="flex flex-col gap-space-xs">
                                    <label class="font-label-sm text-label-sm text-on-surface font-semibold"
                                        for="contact-message">Project Specifications / Requirements *</label>
                                    <textarea
                                        class="w-full px-space-md py-space-sm rounded-md bg-surface-container-low text-on-surface font-body-sm text-body-sm focus:outline-none focus:bg-surface-container-lowest focus:shadow-[0_0_0_2px_#3949ab] transition-all"
                                        id="contact-message" name="project_specifications"
                                        placeholder="Please describe required tonnages, operating pressures, specific model numbers, delivery destination, and urgency."
                                        required="" rows="4"></textarea>
                                </div>
                                <!-- Submit Button -->
                                <div
                                    class="pt-space-sm flex flex-col sm:flex-row items-center justify-between gap-space-md">
                                    <span class="font-label-spec text-label-spec text-outline">
                                        Average reply speed: &lt; 120 minutes during work hours
                                    </span>
                                    <button
                                        class="w-full sm:w-auto bg-primary-container hover:bg-primary text-on-primary font-label-lg text-label-lg px-space-xl py-space-sm rounded-full shadow-md transition-all flex items-center justify-center gap-space-xs"
                                        type="submit">
                                        <span>Send Message</span>
                                        <span class="material-symbols-outlined text-[18px]">send</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <section class="w-full py-space-2xl bg-surface-container-lowest border-t border-outline-variant/30">
                <div class="max-w-[1360px] mx-auto px-margin-mobile lg:px-margin">
                    <div class="w-16 h-1 bg-primary rounded-full mx-auto mb-space-lg"></div>
                    <div class="flex flex-col md:flex-row md:items-end justify-between gap-space-lg mb-space-2xl">
                        <div class="flex flex-col gap-space-xs max-w-2xl"><span
                                class="font-label-spec text-label-spec text-primary tracking-widest uppercase font-bold">OFFICIAL
                                CHANNELS &amp; E-COMMERCE</span>
                            <h2
                                class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-on-surface font-extrabold tracking-tight">
                                Connect With Us</h2>
                        </div>
                        <div class="flex items-center gap-space-md">
                            <p class="font-body-md text-body-md text-on-surface-variant max-w-md hidden md:block">
                                Temukan suku cadang resmi THORXup dan ikuti pembaruan teknologi terkini melalui official
                                marketplace dan platform kami.</p>
                            <div class="flex items-center gap-space-xs shrink-0"><button aria-label="Slide Previous"
                                    class="w-12 h-12 rounded-full border border-outline-variant/30 bg-surface-container-lowest text-primary hover:bg-primary hover:text-on-primary transition-all duration-300 flex items-center justify-center shadow-sm"
                                    id="slideLeftBtn"
                                    onclick="const el=document.getElementById('connect-cards-track'); if(el) el.scrollBy({left: -380, behavior: 'smooth'});"><span
                                        class="material-symbols-outlined text-[20px]">arrow_back</span></button><button
                                    aria-label="Slide Next"
                                    class="w-12 h-12 rounded-full border border-outline-variant/30 bg-surface-container-lowest text-primary hover:bg-primary hover:text-on-primary transition-all duration-300 flex items-center justify-center shadow-sm"
                                    id="slideRightBtn"
                                    onclick="const el=document.getElementById('connect-cards-track'); if(el) el.scrollBy({left: 380, behavior: 'smooth'});"><span
                                        class="material-symbols-outlined text-[20px]">arrow_forward</span></button>
                            </div>
                        </div>
                    </div>
                    <div class="flex gap-space-lg overflow-x-auto scroll-smooth py-space-xs snap-x snap-mandatory [scrollbar-width:none]"
                        id="connect-cards-track">
                        <!-- Card 1: Tokopedia -->
                        <div
                            class="min-w-[320px] max-w-[340px] md:min-w-[350px] bg-surface-container-low rounded-md p-space-xl flex flex-col justify-between shadow-sm border border-outline-variant/30 min-h-[340px] snap-start shrink-0 group hover:shadow-lg transition-all duration-300">
                            <div class="flex items-center justify-between">
                                <span
                                    class="font-label-spec text-label-spec text-primary tracking-widest uppercase font-bold">Platform</span>
                                <span class="material-symbols-outlined text-outline text-[20px]">swap_horiz</span>
                            </div>
                            <div class="my-auto py-space-md text-left">
                                <h3
                                    class="font-headline-lg text-headline-lg text-primary font-extrabold tracking-tight">
                                    Tokopedia</h3>
                                <p class="font-body-sm text-body-sm text-on-surface-variant mt-space-xs">Official
                                    Commercial Store • Spare Parts &amp; Equipment</p>
                            </div>
                            <div
                                class="flex items-center justify-between pt-space-md border-t border-outline-variant/30">
                                <div class="flex items-center gap-space-xs">
                                    <span class="w-2 h-2 rounded-full bg-primary"></span>
                                    <span class="w-2 h-2 rounded-full bg-outline-variant/50"></span>
                                    <span class="w-2 h-2 rounded-full bg-outline-variant/50"></span>
                                </div>
                                <a aria-label="Go to Tokopedia"
                                    class="w-12 h-12 rounded-md bg-primary text-on-primary flex items-center justify-center shadow-md transition-all duration-300 group-hover:scale-105 group-hover:bg-primary-container border-none"
                                    href="{{ \App\Models\Platform::first()?->tokopedia ?? '#' }}" rel="noopener noreferrer" target="_blank">
                                    <span class="material-symbols-outlined text-[22px]">south_east</span>
                                </a>
                            </div>
                        </div>
                        <!-- Card 2: Shopee Mall -->
                        <div
                            class="min-w-[320px] max-w-[340px] md:min-w-[350px] bg-surface-container-low rounded-md p-space-xl flex flex-col justify-between shadow-sm border border-outline-variant/30 min-h-[340px] snap-start shrink-0 group hover:shadow-lg transition-all duration-300">
                            <div class="flex items-center justify-between">
                                <span
                                    class="font-label-spec text-label-spec text-primary tracking-widest uppercase font-bold">Platform</span>
                                <span class="material-symbols-outlined text-outline text-[20px]">shopping_bag</span>
                            </div>
                            <div class="my-auto py-space-md text-left">
                                <h3
                                    class="font-headline-lg text-headline-lg text-primary font-extrabold tracking-tight">
                                    Shopee Mall</h3>
                                <p class="font-body-sm text-body-sm text-on-surface-variant mt-space-xs">Heavy Equipment
                                    Spareparts Outlet &amp; Direct Dispatch</p>
                            </div>
                            <div
                                class="flex items-center justify-between pt-space-md border-t border-outline-variant/30">
                                <div class="flex items-center gap-space-xs">
                                    <span class="w-2 h-2 rounded-full bg-outline-variant/50"></span>
                                    <span class="w-2 h-2 rounded-full bg-primary"></span>
                                    <span class="w-2 h-2 rounded-full bg-outline-variant/50"></span>
                                </div>
                                <a aria-label="Go to Shopee Mall"
                                    class="w-12 h-12 rounded-md bg-primary text-on-primary flex items-center justify-center shadow-md transition-all duration-300 group-hover:scale-105 group-hover:bg-primary-container border-none"
                                    href="{{ \App\Models\Platform::first()?->shopee ?? '#' }}" rel="noopener noreferrer" target="_blank">
                                    <span class="material-symbols-outlined text-[22px]">south_east</span>
                                </a>
                            </div>
                        </div>
                        <!-- Card 3: TikTok Shop -->
                        <div
                            class="min-w-[320px] max-w-[340px] md:min-w-[350px] bg-surface-container-low rounded-md p-space-xl flex flex-col justify-between shadow-sm border border-outline-variant/30 min-h-[340px] snap-start shrink-0 group hover:shadow-lg transition-all duration-300">
                            <div class="flex items-center justify-between">
                                <span
                                    class="font-label-spec text-label-spec text-primary tracking-widest uppercase font-bold">Platform</span>
                                <span class="material-symbols-outlined text-outline text-[20px]">play_circle</span>
                            </div>
                            <div class="my-auto py-space-md text-left">
                                <h3
                                    class="font-headline-lg text-headline-lg text-primary font-extrabold tracking-tight">
                                    TikTok Shop</h3>
                                <p class="font-body-sm text-body-sm text-on-surface-variant mt-space-xs">Live Stream
                                    Consultations &amp; Direct Checkout Hub</p>
                            </div>
                            <div
                                class="flex items-center justify-between pt-space-md border-t border-outline-variant/30">
                                <div class="flex items-center gap-space-xs">
                                    <span class="w-2 h-2 rounded-full bg-outline-variant/50"></span>
                                    <span class="w-2 h-2 rounded-full bg-outline-variant/50"></span>
                                    <span class="w-2 h-2 rounded-full bg-primary"></span>
                                </div>
                                <a aria-label="Go to TikTok Shop"
                                    class="w-12 h-12 rounded-md bg-primary text-on-primary flex items-center justify-center shadow-md transition-all duration-300 group-hover:scale-105 group-hover:bg-primary-container border-none"
                                    href="{{ \App\Models\Platform::first()?->tiktok_shop ?? '#' }}">
                                    <span class="material-symbols-outlined text-[22px]">south_east</span>
                                </a>
                            </div>
                        </div>
                        <!-- Card 4: Bukalapak B2B -->
                        <div
                            class="min-w-[320px] max-w-[340px] md:min-w-[350px] bg-surface-container-low rounded-md p-space-xl flex flex-col justify-between shadow-sm border border-outline-variant/30 min-h-[340px] snap-start shrink-0 group hover:shadow-lg transition-all duration-300">
                            <div class="flex items-center justify-between">
                                <span
                                    class="font-label-spec text-label-spec text-primary tracking-widest uppercase font-bold">Platform</span>
                                <span class="material-symbols-outlined text-outline text-[20px]">store</span>
                            </div>
                            <div class="my-auto py-space-md text-left">
                                <h3
                                    class="font-headline-lg text-headline-lg text-primary font-extrabold tracking-tight">
                                    Bukalapak B2B</h3>
                                <p class="font-body-sm text-body-sm text-on-surface-variant mt-space-xs">Enterprise
                                    Procurement &amp; Verified Fleet Supplies</p>
                            </div>
                            <div
                                class="flex items-center justify-between pt-space-md border-t border-outline-variant/30">
                                <div class="flex items-center gap-space-xs">
                                    <span class="w-2 h-2 rounded-full bg-primary"></span>
                                    <span class="w-2 h-2 rounded-full bg-outline-variant/50"></span>
                                    <span class="w-2 h-2 rounded-full bg-outline-variant/50"></span>
                                </div>
                                <a aria-label="Go to Bukalapak B2B"
                                    class="w-12 h-12 rounded-md bg-primary text-on-primary flex items-center justify-center shadow-md transition-all duration-300 group-hover:scale-105 group-hover:bg-primary-container border-none"
                                    href="#contact">
                                    <span class="material-symbols-outlined text-[22px]">south_east</span>
                                </a>
                            </div>
                        </div>
                        <!-- Card 5: Lazada Mall -->
                        <div
                            class="min-w-[320px] max-w-[340px] md:min-w-[350px] bg-surface-container-low rounded-md p-space-xl flex flex-col justify-between shadow-sm border border-outline-variant/30 min-h-[340px] snap-start shrink-0 group hover:shadow-lg transition-all duration-300">
                            <div class="flex items-center justify-between">
                                <span
                                    class="font-label-spec text-label-spec text-primary tracking-widest uppercase font-bold">Platform</span>
                                <span class="material-symbols-outlined text-outline text-[20px]">verified</span>
                            </div>
                            <div class="my-auto py-space-md text-left">
                                <h3
                                    class="font-headline-lg text-headline-lg text-primary font-extrabold tracking-tight">
                                    Lazada Mall</h3>
                                <p class="font-body-sm text-body-sm text-on-surface-variant mt-space-xs">OEM Spare Parts
                                    Distribution Hub &amp; Regional Stock</p>
                            </div>
                            <div
                                class="flex items-center justify-between pt-space-md border-t border-outline-variant/30">
                                <div class="flex items-center gap-space-xs">
                                    <span class="w-2 h-2 rounded-full bg-outline-variant/50"></span>
                                    <span class="w-2 h-2 rounded-full bg-primary"></span>
                                    <span class="w-2 h-2 rounded-full bg-outline-variant/50"></span>
                                </div>
                                <a aria-label="Go to Lazada Mall"
                                    class="w-12 h-12 rounded-md bg-primary text-on-primary flex items-center justify-center shadow-md transition-all duration-300 group-hover:scale-105 group-hover:bg-primary-container border-none"
                                    href="{{ \App\Models\Platform::first()?->lazada ?? '#' }}">
                                    <span class="material-symbols-outlined text-[22px]">south_east</span>
                                </a>
                            </div>
                        </div>
                        <!-- Card 6: Wide Featured Card (Card Memanjang) -->
                    </div>
                </div>
            </section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const track = document.getElementById('carouselTrack');
        if (!track) return;

        const slides = Array.from(track.children);
        const prev = document.getElementById('carouselPrevBtn');
        const next = document.getElementById('carouselNextBtn');
        const dots = Array.from(document.querySelectorAll('.carousel-dot'));
        let current = 0;

        function renderDots() {
            dots.forEach(function (dot, index) {
                if (index === current) {
                    dot.classList.remove('w-2.5', 'h-2.5', 'bg-white/40', 'hover:bg-white/70');
                    dot.classList.add('w-8', 'h-2.5', 'bg-secondary-fixed', 'shadow-md');
                } else {
                    dot.classList.remove('w-8', 'h-2.5', 'bg-secondary-fixed', 'shadow-md');
                    dot.classList.add('w-2.5', 'h-2.5', 'bg-white/40', 'hover:bg-white/70');
                }
            });
        }

        function goTo(index) {
            if (slides.length === 0) return;
            current = (index + slides.length) % slides.length;
            track.style.transform = 'translateX(-' + (current * 100) + '%)';
            renderDots();
        }

        prev?.addEventListener('click', function () {
            goTo(current - 1);
        });

        next?.addEventListener('click', function () {
            goTo(current + 1);
        });

        dots.forEach(function (dot) {
            dot.addEventListener('click', function () {
                goTo(Number(dot.dataset.slideIndex || 0));
            });
        });

        let touchStartX = 0;
        track.addEventListener('touchstart', function (event) {
            touchStartX = event.touches[0].clientX;
        }, { passive: true });

        track.addEventListener('touchend', function (event) {
            const distance = event.changedTouches[0].clientX - touchStartX;
            if (Math.abs(distance) > 50) {
                distance < 0 ? goTo(current + 1) : goTo(current - 1);
            }
        }, { passive: true });

        let isDragging = false;
        let dragStartX = 0;

        track.addEventListener('mousedown', function (event) {
            isDragging = true;
            dragStartX = event.clientX;
            track.style.cursor = 'grabbing';
        });

        window.addEventListener('mouseup', function (event) {
            if (!isDragging) return;
            isDragging = false;
            const distance = event.clientX - dragStartX;
            track.style.cursor = '';
            if (Math.abs(distance) > 50) {
                distance < 0 ? goTo(current + 1) : goTo(current - 1);
            }
        });

        goTo(0);
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('rfq-form');
        if (!form) return;

        const button = form.querySelector('button[type="submit"]');
        const originalButtonHtml = button ? button.innerHTML : '';

        const showToast = function (message, type) {
            const toast = document.createElement('div');
            toast.className = 'fixed top-4 right-4 z-[100] max-w-sm w-[90%] px-space-lg py-space-md rounded-md shadow-xl font-body-md transition-all duration-500 translate-x-full opacity-0 ' +
                (type === 'success' ? 'bg-emerald-600 text-white' : 'bg-red-600 text-white');

            const content = document.createElement('div');
            content.className = 'flex items-start justify-between gap-space-sm';
            content.innerHTML = '<span class="flex-1 text-left">' + message + '</span>';

            const close = document.createElement('button');
            close.type = 'button';
            close.className = 'shrink-0 text-white/90 hover:text-white';
            close.innerHTML = '&times;';
            close.addEventListener('click', function () {
                toast.classList.add('translate-x-full', 'opacity-0');
                setTimeout(function () {
                    toast.remove();
                }, 300);
            });
            content.appendChild(close);
            toast.appendChild(content);
            document.body.appendChild(toast);

            requestAnimationFrame(function () {
                toast.classList.remove('translate-x-full', 'opacity-0');
            });

            setTimeout(function () {
                toast.classList.add('translate-x-full', 'opacity-0');
                setTimeout(function () {
                    toast.remove();
                }, 300);
            }, 3500);
        };

        form.addEventListener('submit', async function (event) {
            event.preventDefault();

            if (button) {
                button.disabled = true;
                button.innerHTML = 'Sending...';
            }

            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                    body: new FormData(form),
                });

                const data = await response.json().catch(function () {
                    return {};
                });

                if (response.ok) {
                    showToast(data.message || 'Permintaan penawaran berhasil dikirim.', 'success');
                    form.reset();
                } else {
                    let message = data.message || 'Gagal mengirim permintaan.';

                    if (data.errors) {
                        message = Object.values(data.errors).flat().join(' ');
                    }

                    showToast(message, 'error');
                }
            } catch (error) {
                showToast('Terjadi kesalahan. Silakan coba lagi.', 'error');
            } finally {
                if (button) {
                    button.disabled = false;
                    button.innerHTML = originalButtonHtml;
                }
            }
        });
    });
</script>

@endsection