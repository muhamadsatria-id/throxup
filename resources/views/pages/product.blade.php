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
<section class="w-full bg-surface shadow-sm relative overflow-hidden">
    <div
        class="max-w-[1360px] mx-auto px-margin-mobile lg:px-margin pt-space-lg pb-space-xl relative z-10 flex flex-col items-center text-center">
        <!-- Breadcrumb Navigation -->
        <nav aria-label="Breadcrumb"
            class="flex flex-wrap items-center justify-center gap-space-xs text-on-surface-variant font-label-md text-label-md mb-space-md">
            <a class="hover:text-primary transition-colors" href="/">Beranda</a>
            <span aria-hidden="true">/</span>
            <a class="hover:text-primary transition-colors" href="/produk">Katalog Produk</a>
            <span aria-hidden="true">/</span>
            <span class="text-primary font-bold" aria-current="page">Alat Berat &amp; Suku Cadang</span>
        </nav>

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
                <div class="relative flex items-center">
                    <span
                        class="material-symbols-outlined absolute left-3 text-outline text-[18px] pointer-events-none">search</span>
                    <input
                        class="w-full pl-9 pr-8 py-2 bg-surface-container-low rounded-full font-body-sm text-body-sm text-on-surface placeholder:text-outline focus:outline-none focus:bg-surface-container-lowest focus:ring-2 focus:ring-primary/40 transition-all"
                        id="catalog-search" placeholder="Part no., SKU, OEM fitment..." type="text">
                    <button aria-label="Clear Search"
                        class="absolute right-3 text-outline hover:text-on-surface text-[14px]"
                        type="button">
                        <span class="material-symbols-outlined text-[16px]">close</span>
                    </button>
                </div>
            </div>
            <!-- Master Categories Selection List -->
            <div
                class="bg-surface-container-lowest p-space-md rounded-md shadow-sm flex flex-col gap-space-sm">
                <div class="flex items-center justify-between pb-space-xs">
                    <span
                        class="font-label-spec text-label-spec text-on-surface-variant uppercase">Component
                        Categories</span>

                </div>
                <nav class="flex flex-col gap-1" id="categoryNav"><a
                        class="flex items-center justify-between px-3 py-2.5 rounded-full bg-primary text-on-primary font-label-md text-label-md transition-all"
                        href="#">
                        <span>All Products</span>
                        <span class="text-on-primary font-label-spec text-label-spec">15,420</span>
                    </a>
                    <a class="flex items-center justify-between px-3 py-2.5 rounded-full text-on-surface-variant hover:bg-surface-container font-label-md text-label-md transition-all"
                        href="#">
                        <span>Heavy Excavators</span>
                        <span class="text-on-surface-variant font-label-spec text-label-spec">342</span>
                    </a>
                    <a class="flex items-center justify-between px-3 py-2.5 rounded-full text-on-surface-variant hover:bg-surface-container font-label-md text-label-md transition-all"
                        href="#">
                        <span>Hydraulic Assemblies</span>
                        <span class="text-on-surface-variant font-label-spec text-label-spec">580</span>
                    </a>
                    <a class="flex items-center justify-between px-3 py-2.5 rounded-full text-on-surface-variant hover:bg-surface-container font-label-md text-label-md transition-all"
                        href="#">
                        <span>Powertrain &amp; Engines</span>
                        <span class="text-on-surface-variant font-label-spec text-label-spec">428</span>
                    </a>
                    <a class="flex items-center justify-between px-3 py-2.5 rounded-full text-on-surface-variant hover:bg-surface-container font-label-md text-label-md transition-all"
                        href="#">
                        <span>Undercarriage &amp; Tracks</span>
                        <span class="text-on-surface-variant font-label-spec text-label-spec">612</span>
                    </a>
                    <a class="flex items-center justify-between px-3 py-2.5 rounded-full text-on-surface-variant hover:bg-surface-container font-label-md text-label-md transition-all"
                        href="#">
                        <span>Ground Engaging (GET)</span>
                        <span class="text-on-surface-variant font-label-spec text-label-spec">275</span>
                    </a>
                    <a class="flex items-center justify-between px-3 py-2.5 rounded-full text-on-surface-variant hover:bg-surface-container font-label-md text-label-md transition-all"
                        href="#">
                        <span>Filtration &amp; Fluids</span>
                        <span class="text-on-surface-variant font-label-spec text-label-spec">190</span>
                    </a>
                    <a class="flex items-center justify-between px-3 py-2.5 rounded-full text-on-surface-variant hover:bg-surface-container font-label-md text-label-md transition-all"
                        href="#">
                        <span>Sensors &amp; Telematics</span>
                        <span class="text-on-surface-variant font-label-spec text-label-spec">145</span>
                    </a>
                </nav>
            </div>
            <!-- Faceted Technical Filters -->

        </aside>
        <!-- RIGHT MAIN CONTENT AREA -->
        <div class="flex-1 w-full flex flex-col gap-space-lg">
            <!-- Filter Toolbar & View Selector -->
            <!-- 3-Column Responsive Product Cards Grid -->
            <div class="grid grid-cols-2 xl:grid-cols-3 gap-gutter"><!-- Card 1 -->
                <div
                    class="group bg-surface-container-lowest rounded-md overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col border border-outline-variant/30">
                    <div class="relative w-full h-52 overflow-hidden bg-surface-container shrink-0">
                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            data-alt="Heavy industrial yellow tracked excavator performing ground excavation work at a large civil construction site during dusk with dramatic contrast, raw metallic steel structure, hydraulic boom arm in action, high fidelity engineering photography."
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuCVYgSmnyt0go4wCdqzgf2dsouqmYBOBcGlV1w-imjH1EGJ6EuDCtOW73bLEeONQS_hzfmZRI_GDL4SDSNka7aoHjOw-0bjPojmmedYEUVF825zgCqhbSJXDWx5s5L19jWJILCGQczjDqICW8Yw54whH3TZji8lfyI2bF9ivJJQk0yf_Nscu4J8h4AQ1zwxnsLEx8j74-p7PfHvrRqmTcblDmKOYJkBWM-qt1DFt3eg">
                    </div>
                    <div class="p-space-md flex-1 flex flex-col justify-between">
                        <div class="flex flex-col gap-space-xs">
                            <span
                                class="font-label-spec text-label-spec text-secondary uppercase font-bold tracking-wider">Heavy
                                Excavators</span>
                            <h3
                                class="font-headline-sm text-headline-sm text-on-surface font-bold tracking-tight">
                                THORX-X950 Heavy Excavator</h3>
                        </div>
                        <div class="mt-space-md pt-space-xs">
                            <a href="#"
                                class="inline-flex items-center gap-1 text-primary font-semibold text-label-md hover:underline">
                                View Details
                                <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div
                    class="group bg-surface-container-lowest rounded-md overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col border border-outline-variant/30">
                    <div class="relative w-full h-52 overflow-hidden bg-surface-container shrink-0">
                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            data-alt="Close up precision shot of an axial piston hydraulic pump and high pressure valve manifold in an industrial machine shop with steel braided hydraulic hoses, pressure gauge dials, machined metal surfaces and ambient workshop lighting."
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuA5Cxv5VRb1F0cEDpRvL87jSE2aQDxdHn7-6KMKtqk78bhO5YJS3py6sgZ1nX3sZKkI6hwDPcb5dwbIUpti2pm8umzIenCjJQSVT3Ty72taz6-cGtXRM3VhML-k--WlPxZzMvYvqrsUr_sxKdEfNyhcYwyeHZewX5h572nOrn2yRqt54sd5PnaTo7_L0Ya0QGjlZ2rJjw9X4nDrNZsDRLZ1NzzMbWctbo0nCNWOSXHy">
                    </div>
                    <div class="p-space-md flex-1 flex flex-col justify-between">
                        <div class="flex flex-col gap-space-xs">
                            <span
                                class="font-label-spec text-label-spec text-secondary uppercase font-bold tracking-wider">Hydraulic
                                Assemblies</span>
                            <h3
                                class="font-headline-sm text-headline-sm text-on-surface font-bold tracking-tight">
                                HP-4200 Axial Piston Pump</h3>
                        </div>
                        <div class="mt-space-md pt-space-xs">
                            <a href="#"
                                class="inline-flex items-center gap-1 text-primary font-semibold text-label-md hover:underline">
                                View Details
                                <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div
                    class="group bg-surface-container-lowest rounded-md overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col border border-outline-variant/30">
                    <div class="relative w-full h-52 overflow-hidden bg-surface-container shrink-0">
                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            data-alt="Heavy steel excavator crawler track and undercarriage on repair stands inside heavy machinery assembly facility, massive steel track links, rollers, drive sprockets, dark cast iron tones and industrial lighting."
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuDsyaE9NPDv_5qVbUhY9r5zgcIWHYKYK-ce0clowY3uSKCbfowKgv87TTmO02qtBBDBHW7sXZKF7MsAoVmLo1D9WGASUxHUgmT5j21T-6Ru5q36DROLCh-osdHur0Wsd5uYnFNGlJhlcgl7QA2pjFf2-_6nfKc_PjmGV_YcHkF5GR9hK2hMGpiqanyyPioxMrTp0ai2WEBUMBGzhKh6t7zhSG90ARwH5hHtsjFVVayW">
                    </div>
                    <div class="p-space-md flex-1 flex flex-col justify-between">
                        <div class="flex flex-col gap-space-xs">
                            <span
                                class="font-label-spec text-label-spec text-secondary uppercase font-bold tracking-wider">Undercarriage
                                &amp; Tracks</span>
                            <h3
                                class="font-headline-sm text-headline-sm text-on-surface font-bold tracking-tight">
                                DuraTrack Master Link Assembly</h3>
                        </div>
                        <div class="mt-space-md pt-space-xs">
                            <a href="#"
                                class="inline-flex items-center gap-1 text-primary font-semibold text-label-md hover:underline">
                                View Details
                                <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card 4 -->
                <div
                    class="group bg-surface-container-lowest rounded-md overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col border border-outline-variant/30">
                    <div class="relative w-full h-52 overflow-hidden bg-surface-container shrink-0">
                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            data-alt="Massive industrial diesel engine and heavy powertrain transmission assembly exposed with precision steel gears, drive shafts, turbocharger manifolds in an engineering rebuild workshop."
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuDq4Jc5j-641ejHH3YVIzJ0qStQwY07uUk3-UohWyWwfWa27sb7V2vU2amBgSQS3mJ3KqUS9O2yvAANNmNg7aZazYM1p6Xlyef5JYxDfnaGApkNQTtzznja6hD_50bB_nSaghKtbPxctZKKLxJR_K5ibWdQLO9t1ucq4uF8oy9-N1xVDY7YCnsJaIz21Pnc1nS7c7QrUOkXEJ3NOFuSofYSF-OSsFC5PejDWNg1bP_7">
                    </div>
                    <div class="p-space-md flex-1 flex flex-col justify-between">
                        <div class="flex flex-col gap-space-xs">
                            <span
                                class="font-label-spec text-label-spec text-secondary uppercase font-bold tracking-wider">Powertrain
                                &amp; Engines</span>
                            <h3
                                class="font-headline-sm text-headline-sm text-on-surface font-bold tracking-tight">
                                V8 TurboDiesel Heavy Block</h3>
                        </div>
                        <div class="mt-space-md pt-space-xs">
                            <a href="#"
                                class="inline-flex items-center gap-1 text-primary font-semibold text-label-md hover:underline">
                                View Details
                                <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card 5 -->
                <div
                    class="group bg-surface-container-lowest rounded-md overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col border border-outline-variant/30">
                    <div class="relative w-full h-52 overflow-hidden bg-surface-container shrink-0">
                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            data-alt="Wide angle landscape shot of active earthmoving construction site at sunset with heavy excavators, dump trucks, cranes and infrastructure framing in industrial atmosphere."
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuCQnYVXXQvE7XKhIBx0JEgWcT1tHqjIe079BJghZluQbxjq7I6YJSbZcRjAxVlE3Euch2cz1qQ-ZyNg9piAXp_g69r86-VOr1YINLz0nbSTSyqsjb6myWdE79W5DpZHx7bPOdEHFfV9ps9xc0JvB8-7zQg3dQKsGsRUiOy2bdxzMAUMN4aWLOicy6h9d_Om_L3jk81yFVP1oeN4w76iAvWmOv12qU3au4h1Ft5tmgTn">
                    </div>
                    <div class="p-space-md flex-1 flex flex-col justify-between">
                        <div class="flex flex-col gap-space-xs">
                            <span
                                class="font-label-spec text-label-spec text-secondary uppercase font-bold tracking-wider">Compact
                                Machinery</span>
                            <h3
                                class="font-headline-sm text-headline-sm text-on-surface font-bold tracking-tight">
                                Vulcan-600 Compact Crawler</h3>
                        </div>
                        <div class="mt-space-md pt-space-xs">
                            <a href="#"
                                class="inline-flex items-center gap-1 text-primary font-semibold text-label-md hover:underline">
                                View Details
                                <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card 6 -->
                <div
                    class="group bg-surface-container-lowest rounded-md overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col border border-outline-variant/30">
                    <div class="relative w-full h-52 overflow-hidden bg-surface-container shrink-0">
                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            data-alt="Intricate hydraulic manifold valve block with CNC machined aluminum channels, solenoid control switches, and high pressure steel couplings arranged on a clean industrial benchtop."
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuAmkyEXx96JRKi0VkhC7t9z-lo09FJhRGqj--M7STPcjDnIJiWOFDY-b574Qobr7j_v-m9zeh7sk9zfHJLdoNSyLY7x7hpEwxKk1nmORJJyb7rpkCvPpy5GRB25MLggeqUTsfc3de0MZN_C1sa6kbO0N5N7S6cukLZVjE9MsZrfAxqaTOMRoIWZyoXbmmzL3MFP43Sz3X83iLm15Xs8l7uJL4At5pL-Uf-Xje1Eho4_">
                    </div>
                    <div class="p-space-md flex-1 flex flex-col justify-between">
                        <div class="flex flex-col gap-space-xs">
                            <span
                                class="font-label-spec text-label-spec text-secondary uppercase font-bold tracking-wider">Hydraulic
                                Assemblies</span>
                            <h3
                                class="font-headline-sm text-headline-sm text-on-surface font-bold tracking-tight">
                                ApexFlow Monoblock Valve Block</h3>
                        </div>
                        <div class="mt-space-md pt-space-xs">
                            <a href="#"
                                class="inline-flex items-center gap-1 text-primary font-semibold text-label-md hover:underline">
                                View Details
                                <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card 7 -->
                <div
                    class="group bg-surface-container-lowest rounded-md overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col border border-outline-variant/30">
                    <div class="relative w-full h-52 overflow-hidden bg-surface-container shrink-0">
                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            data-alt="Heavy industrial transmission planetary gearbox cutaway displaying heavy steel helical gears, roller bearings, and forged alloy shaft in a technical laboratory setting."
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuAaimviFOPCUNMlos-X62cyhLFUfMlgK770gsSO1fGaljkCjkPYjEwIT-LjvQRNdnFDZBBP2Uhn1U-goZqZJp1OiRrRfMLkUWC3uabKK6p-xDgMGmkz3I6nAvV6tXIdz1ATMAzEAPIiLgJCcu8_ngzGrMrWPwPc_5QygMxkigSMeFuC0WIGLNaF64ZcoKj54z-oX0aF7aC6gQlcrlgg_aNAViA7qF2U0pANsQY90V2e">
                    </div>
                    <div class="p-space-md flex-1 flex flex-col justify-between">
                        <div class="flex flex-col gap-space-xs">
                            <span
                                class="font-label-spec text-label-spec text-secondary uppercase font-bold tracking-wider">Powertrain
                                &amp; Engines</span>
                            <h3
                                class="font-headline-sm text-headline-sm text-on-surface font-bold tracking-tight">
                                TitanGear Planetary Reduction</h3>
                        </div>
                        <div class="mt-space-md pt-space-xs">
                            <a href="#"
                                class="inline-flex items-center gap-1 text-primary font-semibold text-label-md hover:underline">
                                View Details
                                <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card 8 -->
                <div
                    class="group bg-surface-container-lowest rounded-md overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col border border-outline-variant/30">
                    <div class="relative w-full h-52 overflow-hidden bg-surface-container shrink-0">
                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            data-alt="Heavy steel drive sprockets and track rim wheels for 50-ton earthmoving equipment, precision machined tooth profiles with flame hardened induction edges sitting on heavy manufacturing factory floor."
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuA1N0D3btHtxhDevj4uJZl7ZzS9YfTGTW9Ty7Hkzmz76TWiox4Er6K3mZadrYPyDCZf0RPX-0scqCkkX_Ko0q-p3FQt2ersusaWCIPchNpGLR6DJVn9qPo6gRoxKVLk4e4iUk2jDLyQflxHsXKVHGOcVaxKagTMDcTZg8iVWCo-Nk7tU_nWb__25CzEW7P4sycUExpTs2ymod_Mml_Y8ADe5y8CX0dZjGshkVjONXv8">
                    </div>
                    <div class="p-space-md flex-1 flex flex-col justify-between">
                        <div class="flex flex-col gap-space-xs">
                            <span
                                class="font-label-spec text-label-spec text-secondary uppercase font-bold tracking-wider">Undercarriage
                                &amp; Tracks</span>
                            <h3
                                class="font-headline-sm text-headline-sm text-on-surface font-bold tracking-tight">
                                ArmorSprocket Segmented Wheel</h3>
                        </div>
                        <div class="mt-space-md pt-space-xs">
                            <a href="#"
                                class="inline-flex items-center gap-1 text-primary font-semibold text-label-md hover:underline">
                                View Details
                                <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card 9 -->
                <div
                    class="group bg-surface-container-lowest rounded-md overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col border border-outline-variant/30">
                    <div class="relative w-full h-52 overflow-hidden bg-surface-container shrink-0">
                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            data-alt="Heavy hydraulic cylinder testing bench with high pressure steel cylinder piston rod extended, showing high polish mirror chrome finish and industrial hydraulic pressure lines in engineering facility."
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuAJ77aBnpUsGXrcNiUZrjWsTDorhCU_NxnXNpshGrf53F17huhQbrp1bEdYg0LNMkCztHsqtrD3pOnmGu8CtzGsN6PnUL7PsS47IaIo3KHVTdkALBXZzUmrj_WBoqFYKaXednF33sn0k10zn6DZnoJRH8cD_5zT-6ZgM_8A69_IrffggdO1fL4e_XXQmx3z-WnuRQ0in2uy1ROde9LTCmDyAT66Q1rw9HljEga7sDWb">
                    </div>
                    <div class="p-space-md flex-1 flex flex-col justify-between">
                        <div class="flex flex-col gap-space-xs">
                            <span
                                class="font-label-spec text-label-spec text-secondary uppercase font-bold tracking-wider">Hydraulic
                                Assemblies</span>
                            <h3
                                class="font-headline-sm text-headline-sm text-on-surface font-bold tracking-tight">
                                HydroCyl Heavy Boom Cylinder</h3>
                        </div>
                        <div class="mt-space-md pt-space-xs">
                            <a href="#"
                                class="inline-flex items-center gap-1 text-primary font-semibold text-label-md hover:underline">
                                View Details
                                <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Catalog Pagination Bar -->
            <div
                class="bg-surface-container-lowest p-space-md rounded-md shadow-sm flex flex-col sm:flex-row items-center justify-between gap-space-md mt-space-xs">
                <p class="font-body-sm text-body-sm text-on-surface-variant">
                    Page <span class="font-bold text-on-surface">1</span> of <span
                        class="font-bold text-on-surface">128</span> (Showing 9 of 15,420 components)
                </p>
                <div class="flex items-center gap-1">
                    <button
                        class="px-3 py-1.5 rounded-full bg-surface-container text-outline hover:text-on-surface font-label-md text-label-md flex items-center gap-1"
                        type="button">
                        <span class="material-symbols-outlined text-[16px]">chevron_left</span>
                        Previous
                    </button>
                    <button
                        class="w-8 h-8 rounded-full bg-primary text-on-primary font-label-md text-label-md font-bold"
                        type="button">1</button>
                    <button
                        class="w-8 h-8 rounded-full hover:bg-surface-container text-on-surface font-label-md text-label-md"
                        type="button">2</button>
                    <button
                        class="w-8 h-8 rounded-full hover:bg-surface-container text-on-surface font-label-md text-label-md"
                        type="button">3</button>
                    <span class="px-1 text-outline font-label-md text-label-md">...</span>
                    <button
                        class="w-8 h-8 rounded-full hover:bg-surface-container text-on-surface font-label-md text-label-md"
                        type="button">128</button>
                    <button
                        class="px-3 py-1.5 rounded-full bg-surface-container hover:bg-surface-variant text-on-surface font-label-md text-label-md flex items-center gap-1"
                        type="button">
                        Next
                        <span class="material-symbols-outlined text-[16px]">chevron_right</span>
                    </button>
                </div>
            </div>
        </div>
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
                href="#">Contact Me<br></a>
        </div>
    </div>
</section>
@endsection