@php
    $profileName = trim((string) data_get($profile ?? null, 'nama', ''));
    $profileName = $profileName !== '' ? $profileName : 'THORXup';
    $profileLogo = data_get($profile ?? null, 'logo');
@endphp

<header

    class="fixed top-0 left-0 right-0 z-50 bg-surface-container-lowest border-b border-outline-variant/30 shadow-sm">

    <div

        class="h-20 w-full max-w-[1360px] mx-auto px-margin-mobile lg:px-margin flex items-center justify-between">

        <div class="flex items-center">
            <a class="flex items-center tracking-tight text-primary"
                data-path="home" href="{{ route('home') }}">
                @if ($profileLogo)
                    <img src="{{ asset('storage/' . ltrim((string) $profileLogo, '/')) }}"
                        alt="{{ $profileName }}"
                        class="h-12 max-w-44 object-contain">
                @else
                    @if (str_ends_with(strtolower($profileName), 'up'))
                        <span class="font-headline-md text-headline-md flex items-baseline">
                            <span class="font-extrabold">{{ substr($profileName, 0, -2) }}</span>
                            <span class="text-label-md font-label-md uppercase tracking-wider text-secondary -translate-y-2 ml-0.5">{{ substr($profileName, -2) }}</span>
                        </span>
                    @else
                        <span class="font-headline-md text-headline-md font-extrabold">{{ $profileName }}</span>
                    @endif
                @endif
            </a>

        </div>

        <div class="flex items-center gap-space-md">

            <div class="hidden md:flex items-center">

                <nav class="flex items-center gap-space-lg" data-active-classes="text-primary font-bold"><a

                        class="transition-colors {{ request()->routeIs('home') && !request()->is('*/#contact') ? 'text-primary font-bold' : 'text-on-surface-variant font-label-lg text-label-lg hover:text-primary' }}"

                        data-path="home" href="{{ route('home') }}">Home</a><a

                        class="transition-colors {{ request()->routeIs('about') ? 'text-primary font-bold' : 'text-on-surface-variant font-label-lg text-label-lg hover:text-primary' }}"

                        data-path="about-us" href="{{ route('about') }}">About us</a><a

                        class="transition-colors {{ request()->routeIs('news') ? 'text-primary font-bold' : 'text-on-surface-variant font-label-lg text-label-lg hover:text-primary' }}"

                        data-path="news" href="{{ route('news') }}">News</a>

                    <div class="relative group py-space-xs"><button

                            class="flex items-center gap-space-xs transition-colors {{ request()->routeIs('product', 'detail-product') ? 'text-primary font-bold' : 'text-on-surface-variant font-label-lg text-label-lg hover:text-primary' }}"

                            type="button"><span class="font-label-lg text-label-lg">Products</span><span

                                class="material-symbols-outlined text-[16px]">expand_more</span></button>

                        <div

                            class="absolute left-0 top-full pt-space-xs hidden group-hover:block transition-all">

                            <div

                                class="bg-surface-container-lowest rounded-DEFAULT shadow-[0_14px_32px_-4px_rgba(57,73,171,0.12)] p-space-sm w-56 flex flex-col gap-space-xs border border-outline-variant/30">

                                @forelse (($menuCategories ?? []) as $category)
                                <a class="px-space-md py-space-xs text-on-surface-variant font-label-md text-label-md rounded-md hover:bg-surface-container hover:text-on-surface transition-colors"

                                    href="{{ route('product', ['category' => $category['slug']]) }}">{{ $category['nama'] }}</a>
                                @empty
                                <span class="px-space-md py-space-xs text-on-surface-variant font-label-md text-label-md">Belum ada
                                    kategori.</span>
                                @endforelse
                                <a class="px-space-md py-space-xs text-primary font-label-md text-label-md rounded-md hover:bg-surface-container hover:text-primary transition-colors font-bold"

                                    data-path="all-products" href="{{ route('product') }}">All Products</a>

                            </div>

                        </div>

                    </div><a

                        class="transition-colors text-on-surface-variant font-label-lg text-label-lg hover:text-primary"

                        data-path="contact" href="{{ route('home') }}#contact">Contact</a>

                </nav>

            </div>

            <div class="flex items-center gap-space-sm">

                <button id="mobile-menu-toggle" type="button" aria-label="Buka menu"

                    aria-controls="mobile-menu" aria-expanded="false"

                    class="md:hidden w-10 h-10 flex items-center justify-center rounded-full text-primary hover:bg-surface-container transition-colors">

                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor"

                        stroke-width="2" stroke-linecap="round" aria-hidden="true">

                        <path d="M4 7h16M4 12h16M4 17h16"></path>

                    </svg>

                </button>

            </div>

        </div>

    </div>

</header>



<div id="mobile-menu"

    class="md:hidden fixed inset-0 z-[60] hidden bg-surface-container-lowest overflow-y-auto">

    <div class="min-h-screen flex flex-col items-center justify-center gap-space-lg px-margin-mobile py-space-2xl text-center">

        <button id="mobile-menu-close" type="button" aria-label="Tutup menu"

            class="absolute top-4 right-4 w-10 h-10 flex items-center justify-center rounded-full text-primary hover:bg-surface-container transition-colors">

            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"

                stroke-linecap="round" aria-hidden="true">

                <path d="M6 6l12 12M18 6L6 18"></path>

            </svg>

        </button>

        <a href="{{ route('home') }}"

            class="font-label-lg font-bold text-3xl transition-colors {{ request()->routeIs('home') ? 'text-primary font-bold' : 'text-on-surface-variant hover:text-primary' }}">Home</a>

        <a href="{{ route('about') }}"

            class="font-label-lg font-bold text-3xl transition-colors {{ request()->routeIs('about') ? 'text-primary font-bold' : 'text-on-surface-variant hover:text-primary' }}">About us</a>

        <a href="{{ route('news') }}"

            class="font-label-lg font-bold text-3xl transition-colors {{ request()->routeIs('news') ? 'text-primary font-bold' : 'text-on-surface-variant hover:text-primary' }}">News</a>

        <div class="w-full max-w-xs">

            <button id="mobile-products-toggle" type="button"

                class="w-full flex items-center font-bold justify-center gap-space-xs font-label-lg text-3xl transition-colors {{ request()->routeIs('product', 'detail-product') ? 'text-primary font-bold' : 'text-on-surface-variant hover:text-primary' }}">

                <span>Products</span>

                <span class="material-symbols-outlined text-[16px]">expand_more</span>

            </button>

            <div id="mobile-products-menu" class="hidden flex flex-col gap-space-sm mt-space-sm">

                @forelse (($menuCategories ?? []) as $category)
                <a href="{{ route('product', ['category' => $category['slug']]) }}"

                    class="font-label-md font-bold text-base text-on-surface-variant hover:text-primary transition-colors">{{ $category['nama'] }}</a>
                @empty
                <span class="font-label-md text-base text-on-surface-variant">Belum ada kategori.</span>
                @endforelse

                <a href="{{ route('product') }}"

                    class="font-label-md text-base text-primary font-bold transition-colors">All Products</a>

            </div>

        </div>

        <a href="{{ route('home') }}#contact"

            class="font-label-lg font-bold text-3xl transition-colors text-on-surface-variant hover:text-primary">Contact</a>

    </div>

</div>



<script>
    document.addEventListener('DOMContentLoaded', function() {

        const toggle = document.getElementById('mobile-menu-toggle');

        const menu = document.getElementById('mobile-menu');

        const close = document.getElementById('mobile-menu-close');

        const productsToggle = document.getElementById('mobile-products-toggle');

        const productsMenu = document.getElementById('mobile-products-menu');



        const openMenu = function() {

            if (!menu) return;

            menu.classList.remove('hidden');

            document.body.style.overflow = 'hidden';

            if (toggle) toggle.setAttribute('aria-expanded', 'true');

        };



        const closeMenu = function() {

            if (!menu) return;

            menu.classList.add('hidden');

            document.body.style.overflow = '';

            if (toggle) toggle.setAttribute('aria-expanded', 'false');

        };



        toggle?.addEventListener('click', openMenu);

        close?.addEventListener('click', closeMenu);

        productsToggle?.addEventListener('click', function() {

            productsMenu?.classList.toggle('hidden');

        });



        menu?.querySelectorAll('a').forEach(function(link) {

            link.addEventListener('click', closeMenu);

        });



        const updateContactActive = function() {

            if (window.location.pathname !== '/') return;

            const contactActive = window.location.hash === '#contact';

            document.querySelectorAll('[data-path="home"]').forEach(function(link) {

                if (contactActive) {

                    link.classList.remove('text-primary', 'font-bold');

                    link.classList.add('text-on-surface-variant');

                } else {

                    link.classList.add('text-primary', 'font-bold');

                    link.classList.remove('text-on-surface-variant');

                }

            });

            document.querySelectorAll('[data-path="contact"]').forEach(function(link) {

                if (contactActive) {

                    link.classList.add('text-primary', 'font-bold');

                    link.classList.remove('text-on-surface-variant');

                } else {

                    link.classList.remove('text-primary', 'font-bold');

                    link.classList.add('text-on-surface-variant');

                }

            });

        };



        window.addEventListener('hashchange', updateContactActive);

        updateContactActive();

    });
</script>