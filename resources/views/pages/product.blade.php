@extends('layouts.app')
@section('content')
<!-- Full-screen mobile navigation -->
<div id="mobile-menu" role="dialog" aria-modal="true" aria-label="Navigasi mobile"
    class="fixed inset-0 z-[60] hidden flex-col bg-surface-container-lowest md:hidden">
    <div
        class="h-20 w-full flex items-center justify-between px-margin-mobile border-b border-outline-variant/30">
        <a class="flex items-baseline tracking-tight font-headline-md text-headline-md text-primary"
            data-path="home" href="#"><span class="font-extrabold">THORX</span><span
                class="text-label-md font-label-md uppercase tracking-wider text-secondary -translate-y-2 ml-0.5">up</span></a>
        <button id="mobile-menu-close" type="button" aria-label="Tutup menu"
            class="w-10 h-10 flex items-center justify-center rounded-full text-primary hover:bg-surface-container transition-colors">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" aria-hidden="true">
                <path d="M6 6l12 12M18 6L6 18"></path>
            </svg>
        </button>
    </div>
    <div class="flex-1 overflow-y-auto px-margin-mobile">
        <nav aria-label="Navigasi mobile"
            class="min-h-full flex flex-col items-center justify-center gap-space-lg text-center py-space-2xl">
            <a class="font-headline-md text-headline-md text-primary font-bold" data-path="home"
                href="#">Home</a>
            <a class="font-headline-md text-headline-md text-on-surface-variant" data-path="about-us"
                href="#">About us</a>
            <a class="font-headline-md text-headline-md text-on-surface-variant" data-path="news"
                href="#">News</a>
            <div class="flex flex-col items-center gap-space-md">
                <button id="mobile-products-toggle" type="button" aria-expanded="false"
                    aria-controls="mobile-products-submenu"
                    class="flex items-center gap-space-xs font-headline-md text-headline-md text-on-surface-variant hover:text-primary transition-colors">
                    <span>Products</span>
                    <svg id="mobile-products-chevron" class="w-5 h-5 transition-transform duration-200"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M6 9l6 6 6-6"></path>
                    </svg>
                </button>
                <div id="mobile-products-submenu" class="hidden flex flex-col items-center gap-space-sm">
                    <a class="font-label-lg text-label-lg text-on-surface-variant hover:text-primary transition-colors"
                        data-path="heavy-machinery" href="#">Heavy Machinery</a>
                    <a class="font-label-lg text-label-lg text-on-surface-variant hover:text-primary transition-colors"
                        data-path="hydraulic-systems" href="#">Hydraulic Systems</a>
                    <a class="font-label-lg text-label-lg text-on-surface-variant hover:text-primary transition-colors"
                        data-path="spare-parts" href="#">Spare Parts</a>
                    <a class="font-label-lg text-label-lg text-on-surface-variant hover:text-primary transition-colors"
                        data-path="powertrain" href="#">Powertrain</a>
                    <a class="font-label-lg text-label-lg text-primary font-bold hover:text-primary transition-colors"
                        data-path="all-products" href="#">All Products</a>
                </div>
            </div>
            <a class="font-headline-md text-headline-md text-on-surface-variant" data-path="contact"
                href="#">Contact</a>
        </nav>
    </div>
</div>
<section class="w-full bg-surface-container-low shadow-sm relative overflow-hidden">
    <div
        class="max-w-[1360px] mx-auto px-margin-mobile lg:px-margin pt-space-lg pb-space-xl relative z-10 flex flex-col items-center text-center">
        <!-- Breadcrumb Navigation -->
        @php
            $activeCategory = $categories->firstWhere('slug', $selectedCategory);
        @endphp
        <x-breadcrumb-navigation align="center" class="mb-space-md" :items="$activeCategory
            ? [['label' => 'Katalog Produk', 'url' => route('product')], ['label' => $activeCategory->nama]]
            : [['label' => 'Katalog Produk']]" />

        <!-- Headline & Subtitle -->
        <div class="max-w-3xl mx-auto">
            <h1 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">
                Katalog Suku Cadang Alat Berat &amp; Pertambangan
            </h1>
            <p class="font-body-md text-body-md text-on-surface-variant mt-space-xs leading-relaxed">
                Jelajahi 15.000+ pilihan suku cadang OEM bersertifikat, sistem hidrolik, komponen
                powertrain,
                hingga Ground Engaging Tools (GET) yang dirancang untuk ketahanan dan performa operasi
                maksimal di medan pertambangan serta manufaktur.
            </p>
        </div>
    </div>

    <!-- GAMBAR ELEMEN DEKORATIF KANAN BAWAH -->
    <img src="elemen.png" alt="" aria-hidden="true"
        class="absolute bottom-0 right-0 w-44 sm:w-72 lg:w-92 h-auto opacity-20 pointer-events-none select-none z-0" />
</section>
<!-- Main Catalog Architecture: 2-Column Split -->
<section class="w-full max-w-[1360px] mx-auto px-margin-mobile lg:px-margin py-space-xl">
    <div class="flex flex-col lg:flex-row gap-gutter items-start">
        <!-- LEFT SIDEBAR: Filters & Hierarchy -->
        <aside class="w-full lg:w-[320px] shrink-0 flex flex-col gap-space-lg lg:sticky lg:top-28">
            <!-- Search Card -->
            <div
                class="bg-surface-container-lowest p-space-md rounded-md shadow-sm flex flex-col gap-space-sm">
                <label class="font-label-spec text-label-spec text-on-surface-variant uppercase"
                    for="catalog-search">Technical Search</label>
                <form id="product-search-form" class="relative flex items-center" method="GET" action="{{ route('product') }}">
                    <span
                        class="material-symbols-outlined absolute left-3 text-outline text-[18px] pointer-events-none">search</span>
                    <input
                        class="w-full pl-9 pr-8 py-2 bg-surface-container-low rounded-full font-body-sm text-body-sm text-on-surface placeholder:text-outline focus:outline-none focus:bg-surface-container-lowest focus:ring-2 focus:ring-primary/40 transition-all"
                        id="catalog-search" name="q" value="{{ $search ?? '' }}" placeholder="Part no., SKU, OEM fitment..." type="text">
                    <button aria-label="Clear Search" type="button" onclick="document.getElementById('catalog-search').value=''; document.getElementById('product-search-form').requestSubmit();"
                        class="absolute right-3 text-outline hover:text-on-surface text-[14px]">
                        <span class="material-symbols-outlined text-[16px]">close</span>
                    </button>
                </form>
            </div>
            <!-- Master Categories Selection List -->
            <div
                class="bg-surface-container-lowest p-space-md rounded-md shadow-sm flex flex-col gap-space-sm">
                <div class="flex items-center justify-between pb-space-xs">
                    <span
                        class="font-label-spec text-label-spec text-on-surface-variant uppercase">Component
                        Categories</span>

                </div>
                <nav class="flex flex-col gap-1" id="categoryNav">
                    <a class="category-link flex items-center justify-between px-3 py-2.5 rounded-full {{ $selectedCategory === '' ? 'bg-primary text-on-primary' : 'text-on-surface-variant hover:bg-surface-container' }} font-label-md text-label-md transition-all"
                        data-category="" href="{{ route('product') }}">
                        <span>All Products</span>
                        <span class="font-label-spec text-label-spec">{{ $products->total() }}</span>
                    </a>
                    @foreach ($categories as $category)
                        <a class="category-link flex items-center justify-between px-3 py-2.5 rounded-full {{ $selectedCategory === $category->slug ? 'bg-primary text-on-primary' : 'text-on-surface-variant hover:bg-surface-container' }} font-label-md text-label-md transition-all"
                            data-category="{{ $category->slug }}" href="{{ route('product', ['category' => $category->slug]) }}">
                            <span>{{ $category->nama }}</span>
                            <span class="font-label-spec text-label-spec">{{ $category->products()->count() }}</span>
                        </a>
                    @endforeach
                </nav>
            </div>
            <!-- Faceted Technical Filters -->

        </aside>
        <!-- RIGHT MAIN CONTENT AREA -->
        <div class="flex-1 w-full flex flex-col gap-space-lg">
            <!-- Filter Toolbar & View Selector -->
            <!-- 3-Column Responsive Product Cards Grid -->
            <div id="product-results" class="grid grid-cols-2 xl:grid-cols-3 gap-gutter">
                        @forelse ($products as $product)
                            <x-card-product
                                :image="$product->imageUrl()"
                                :category="$product->category?->nama"
                                :title="$product->nama"
                                :url="route('detail-product', $product->slug)" />
                        @empty
                            <p class="col-span-full text-center text-on-surface-variant">Belum ada produk aktif.</p>
                        @endforelse
                    </div>
</section>
<!-- Bottom Technical Engineering Advisory CTA Card -->
<section class="w-full max-w-[1360px] mx-auto px-margin-mobile lg:px-margin pb-space-2xl">
    <div
        class="relative overflow-hidden bg-primary text-on-primary rounded-xl p-space-lg lg:p-space-xl shadow-xl flex flex-col lg:flex-row items-start lg:items-center justify-between gap-space-lg">
        <div
            class="absolute -right-16 -top-16 w-80 h-80 rounded-full bg-secondary-container/20 blur-3xl pointer-events-none">
        </div>
        <div class="max-w-2xl relative z-10">

            <h2 class="font-headline-lg text-headline-lg font-bold tracking-tight">Need Custom Hydraulic or
                OEM Fitment Verification?</h2>
            <p class="font-body-md text-body-md text-on-primary-container mt-space-xs">
                Our senior heavy mechanical applications team can analyze your machinery serial numbers,
                calculate flow-pressure curves, or specify certified replacement parts for obsolete
                equipment.
            </p>
        </div>
        <div
            class="flex flex-col sm:flex-row items-stretch sm:items-center gap-space-md shrink-0 w-full lg:w-auto relative z-10">
            <a class="px-space-lg py-3 rounded-full bg-surface-container-lowest text-primary hover:bg-secondary-fixed text-center font-label-lg text-label-lg font-bold transition-all shadow-md"
                href="{{ route('home') }}#contact">Contact Me<br></a>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('product-search-form');
        const input = document.getElementById('catalog-search');
        const results = document.getElementById('product-results');
        const categoryLinks = Array.from(document.querySelectorAll('.category-link'));

        if (!results) return;

        const setActiveCategory = function (categorySlug) {
            categoryLinks.forEach(function (link) {
                const isActive = (link.dataset.category || '') === categorySlug;

                link.classList.toggle('bg-primary', isActive);
                link.classList.toggle('text-on-primary', isActive);
                link.classList.toggle('text-on-surface-variant', !isActive);
                link.classList.toggle('hover:bg-surface-container', !isActive);
            });
        };

        const fetchProducts = async function (categorySlug, search) {
            const url = new URL('{{ route('product') }}', window.location.origin);
            if (categorySlug) url.searchParams.set('category', categorySlug);
            if (search) url.searchParams.set('q', search);

            try {
                const response = await fetch(url.toString(), {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' },
                });
                const html = await response.text();
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const newResults = doc.getElementById('product-results');

                if (newResults) {
                    results.innerHTML = newResults.innerHTML;
                }

                setActiveCategory(categorySlug);
                window.history.replaceState({}, '', url.toString());
            } catch (error) {
                console.error(error);
            }
        };

        form?.addEventListener('submit', function (event) {
            event.preventDefault();
            fetchProducts('', input ? input.value : '');
        });

        input?.addEventListener('input', function () {
            clearTimeout(window.productSearchTimer);
            window.productSearchTimer = setTimeout(function () {
                fetchProducts('', input.value);
            }, 400);
        });

        categoryLinks.forEach(function (link) {
            link.addEventListener('click', function (event) {
                event.preventDefault();
                fetchProducts(link.dataset.category || '', input ? input.value : '');
            });
        });
    });
</script>

@endsection