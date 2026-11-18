@extends('layouts.app')
@section('content')
<section class="w-full bg-surface-container-low shadow-sm relative overflow-hidden">
    <div
        class="max-w-[1360px] mx-auto px-margin-mobile lg:px-margin pt-space-lg pb-space-xl relative z-10 flex flex-col items-center text-center">
        <!-- Breadcrumb Navigation -->
        <x-breadcrumb-navigation align="center" class="mb-space-md" :items="[['label' => 'Berita & Wawasan']]" />

        <!-- Headline & Subtitle -->
        <div class="max-w-3xl mx-auto">
            <h1 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">
                Berita Industri &amp; Wawasan Alat Berat Pertambangan
            </h1>
            <p class="font-body-md text-body-md text-on-surface-variant mt-space-xs leading-relaxed">
                Temukan laporan teknis terkini, panduan perawatan lapangan, inovasi sistem hidrolik, serta
                perkembangan rantai pasok alat berat dan manufaktur langsung dari para ahli industri.
            </p>
        </div>
    </div>

    <!-- GAMBAR ELEMEN DEKORATIF KANAN BAWAH -->
    <!-- <img src="elemen.png" alt="" aria-hidden="true"
                    class="absolute bottom-0 right-0 w-44 sm:w-72 lg:w-92 h-auto opacity-20 pointer-events-none select-none z-0" /> -->
</section>
<!-- Main Content 2-Column Grid -->
<section class="w-full py-space-2xl bg-surface-container-low">
    <div class="max-w-[1360px] mx-auto px-margin-mobile lg:px-margin">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
            <!-- Left Column: Article Stream (8 Columns) -->
            <div id="news-results" class="lg:col-span-8 grid grid-cols-2 md:grid-cols-1 gap-space-lg">
                @forelse ($news as $article)
                <x-card-news-default
                    :image="$article->thumbnail ? asset('storage/' . $article->thumbnail) : null"
                    :date="optional($article->published_at)->format('d M Y')"
                    :title="$article->judul"
                    :excerpt="\Illuminate\Support\Str::limit(strip_tags($article->deskripsi), 160)"
                    :author="$article->author?->name ?? 'Admin'"
                    :url="route('detail-news', $article->slug)" />
                @empty
                <p class="col-span-full text-center text-on-surface-variant">Belum ada berita terpublikasi.</p>
                @endforelse
                <!-- Pagination Bar -->
                <div
                    class="col-span-2 md:col-span-1 mt-space-md flex flex-wrap items-center justify-between gap-space-sm bg-surface-container-lowest p-space-md rounded-md shadow-sm">
                    <button
                        class="inline-flex items-center gap-1 px-space-md py-space-xs rounded-full bg-surface-container text-on-surface-variant font-label-lg text-label-lg hover:bg-surface-variant transition-colors disabled:opacity-40"
                        disabled="">
                        <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                        Previous
                    </button>
                    <div class="flex items-center gap-1">
                        <span
                            class="w-9 h-9 rounded-full bg-primary text-on-primary flex items-center justify-center font-label-lg text-label-lg font-bold shadow-sm">1</span>
                        <a class="w-9 h-9 rounded-full text-on-surface-variant hover:bg-surface-container flex items-center justify-center font-label-lg text-label-lg transition-colors"
                            href="#">2</a>
                        <a class="w-9 h-9 rounded-full text-on-surface-variant hover:bg-surface-container flex items-center justify-center font-label-lg text-label-lg transition-colors"
                            href="#">3</a>
                        <span class="px-2 text-outline">...</span>
                        <a class="w-9 h-9 rounded-full text-on-surface-variant hover:bg-surface-container flex items-center justify-center font-label-lg text-label-lg transition-colors"
                            href="#">8</a>
                    </div>
                    <a class="inline-flex items-center gap-1 px-space-md py-space-xs rounded-full bg-primary text-on-primary font-label-lg text-label-lg hover:bg-primary-container transition-colors shadow-sm"
                        href="#">
                        Next
                        <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                    </a>
                </div>
            </div>
            <!-- Right Column: Sidebar (4 Columns, Full Height) -->
            <aside class="lg:col-span-4 flex flex-col gap-space-lg">
                <div class="flex flex-col gap-space-lg lg:sticky lg:top-28">
                    <!-- 1. Search Bar News Widget -->
                    <div class="bg-surface-container-lowest p-space-lg rounded-md shadow-sm">
                        <h3
                            class="font-headline-sm text-headline-sm font-bold text-on-surface mb-space-sm flex items-center gap-2">

                            Search News &amp; Insights
                        </h3>
                        <form id="news-search-form" class="relative flex items-center mt-space-xs"
                            onsubmit="event.preventDefault();">
                            <input
                                class="w-full bg-surface-container-low text-on-surface placeholder:text-outline text-body-md font-body-md pl-10 pr-24 py-2.5 rounded-full focus:outline-none focus:ring-2 focus:ring-primary shadow-inner"
                                name="q" value="{{ $search ?? '' }}" placeholder="Search articles, specs, parts..." type="text">
                            <span
                                class="material-symbols-outlined text-outline absolute left-3.5 text-[20px] pointer-events-none">search</span>
                            <button
                                class="absolute right-1 px-space-md py-1.5 rounded-full bg-primary text-on-primary font-label-md text-label-md font-semibold hover:bg-primary-container transition-colors shadow-sm"
                                type="submit">
                                Search
                            </button>
                        </form>

                    </div>
                    <!-- 2. Recent Posts Widget (Hanya List Judul) -->
                    <div class="bg-surface-container-lowest p-space-lg rounded-md shadow-sm">
                        <div class="relative mb-space-md border-b-2 border-primary flex items-end">
                            <div
                                class="bg-primary text-white font-headline-sm text-headline-sm font-bold px-space-md py-2 rounded-t-DEFAULT inline-block leading-tight select-none">
                                Recent Posts</div>
                        </div>
                        <ul class="flex flex-col gap-space-sm">
                            @forelse ($recentNews as $recent)
                            <li class="group border-b border-surface-container pb-space-sm last:border-b-0">
                                <a class="block" href="{{ route('detail-news', $recent->slug) }}">
                                    <span class="font-body-md text-body-md font-semibold text-on-surface group-hover:text-primary transition-colors leading-snug">
                                        {{ $recent->judul }}
                                    </span>
                                </a>
                            </li>
                            @empty
                            <li class="text-on-surface-variant">Belum ada berita terbaru.</li>
                            @endforelse
                        </ul>
                    </div>
                    <!-- 4. Archives Widget (Strictly List of Years) -->
                    <div class="bg-surface-container-lowest p-space-lg rounded-md shadow-sm">
                        <div
                            class="flex items-center justify-between mb-space-md pb-space-xs border-b border-surface-container">
                            <h3
                                class="font-headline-sm text-headline-sm font-bold text-on-surface flex items-center gap-2">
                                <span
                                    class="material-symbols-outlined text-primary text-[20px]">calendar_month</span>
                                Archives
                            </h3>
                            <span
                                class="font-label-spec text-label-spec text-secondary uppercase font-semibold">By
                                Year</span>
                        </div>
                        <ul class="flex flex-col gap-2">
                            <li>
                                <a class="flex items-center justify-between px-space-md py-space-xs rounded-md hover:bg-surface-container transition-colors group"
                                    href="#">
                                    <span
                                        class="font-body-md text-body-md font-semibold text-on-surface group-hover:text-primary flex items-center gap-2">
                                        <span
                                            class="material-symbols-outlined text-[16px] text-outline group-hover:text-primary">folder_open</span>
                                        2026
                                    </span>

                                </a>
                            </li>
                            <li>
                                <a class="flex items-center justify-between px-space-md py-space-xs rounded-md hover:bg-surface-container transition-colors group"
                                    href="#">
                                    <span
                                        class="font-body-md text-body-md font-semibold text-on-surface group-hover:text-primary flex items-center gap-2">
                                        <span
                                            class="material-symbols-outlined text-[16px] text-outline group-hover:text-primary">folder_open</span>
                                        2025
                                    </span>

                                </a>
                            </li>
                            <li>
                                <a class="flex items-center justify-between px-space-md py-space-xs rounded-md hover:bg-surface-container transition-colors group"
                                    href="#">
                                    <span
                                        class="font-body-md text-body-md font-semibold text-on-surface group-hover:text-primary flex items-center gap-2">
                                        <span
                                            class="material-symbols-outlined text-[16px] text-outline group-hover:text-primary">folder_open</span>
                                        2024
                                    </span>

                                </a>
                            </li>
                            <li>
                                <a class="flex items-center justify-between px-space-md py-space-xs rounded-md hover:bg-surface-container transition-colors group"
                                    href="#">
                                    <span
                                        class="font-body-md text-body-md font-semibold text-on-surface group-hover:text-primary flex items-center gap-2">
                                        <span
                                            class="material-symbols-outlined text-[16px] text-outline group-hover:text-primary">folder_open</span>
                                        2023
                                    </span>

                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- 5. Newsletter / Engineering Bulletin Box -->
                    <div
                        class="bg-primary text-on-primary p-space-lg rounded-md shadow-md relative overflow-hidden">
                        <div
                            class="absolute -right-6 -bottom-6 w-32 h-32 bg-primary-container rounded-full opacity-50 blur-xl pointer-events-none">
                        </div>
                        <div class="relative z-10">
                            <div
                                class="inline-flex items-center gap-1 text-on-primary-container font-label-spec text-label-spec uppercase tracking-wider mb-2">
                                <span class="material-symbols-outlined text-[16px]">mail</span>
                                Direct Telemetry
                            </div>
                            <h4 class="font-headline-sm text-headline-sm font-bold text-on-primary">
                                Industrial Bulletin</h4>
                            <p
                                class="font-body-sm text-body-sm text-on-primary-container mt-1 mb-space-md leading-relaxed">
                                Receive monthly metallurgical test reports and hydraulic service advisories
                                directly in your inbox.
                            </p>
                            <form class="flex flex-col gap-2"
                                onsubmit="event.preventDefault(); alert('Subscribed to Engineering Bulletin.');">
                                <input
                                    class="w-full bg-surface-container-lowest text-on-surface px- space-sm px-space-md py-2.5 rounded-full text-body-sm font-body-sm focus:outline-none shadow-sm"
                                    placeholder="fleet.engineer@company.com" required="" type="email">
                                <button
                                    class="w-full py-2.5 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-lg text-label-lg font-bold hover:bg-surface transition-colors shadow-sm text-center"
                                    type="submit">
                                    Subscribe Bulletin
                                </button>
                            </form>
                            <span
                                class="block text-[11px] text-on-primary-container/80 mt-2 text-center">Zero
                                marketing spam. Only audited technical digests.</span>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('news-search-form');
        const input = form ? form.querySelector('input[name="q"]') : null;
        const results = document.getElementById('news-results');

        if (!form || !results) return;

        const performSearch = async function() {
            const url = new URL(window.location.href);
            url.searchParams.set('q', input ? input.value : '');

            try {
                const response = await fetch(url.toString(), {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                });
                const html = await response.text();
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const newResults = doc.getElementById('news-results');

                if (newResults) {
                    results.innerHTML = newResults.innerHTML;
                }

                window.history.replaceState({}, '', url.toString());
            } catch (error) {
                console.error(error);
            }
        };

        form.addEventListener('submit', function(event) {
            event.preventDefault();
            performSearch();
        });

        input?.addEventListener('input', function() {
            clearTimeout(window.newsSearchTimer);
            window.newsSearchTimer = setTimeout(performSearch, 400);
        });
    });
</script>

@endsection