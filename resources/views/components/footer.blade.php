<footer class="w-full bg-primary text-on-primary mt-space-2xl pt-space-2xl pb-space-xl relative overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#ffffff_1px,transparent_1px)] [background-size:24px_24px] pointer-events-none"></div>
    <div class="relative z-10 max-w-[1360px] mx-auto px-margin-mobile lg:px-margin">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-gutter">
            <div class="lg:col-span-4 flex flex-col gap-space-md">
                <div class="flex flex-col gap-space-sm">
                    <h4 class="font-label-lg text-label-lg text-on-primary uppercase tracking-wider font-bold">Follow us</h4>
                    <div class="flex items-center gap-space-md">
                        @if($ig = data_get($platform, 'instagram'))
                            <a aria-label="Instagram"
                               class="w-9 h-9 rounded-full border border-white flex items-center justify-center text-on-primary hover:bg-white hover:text-primary transition-all"
                               href="{{ $ig }}" target="_blank" rel="noopener noreferrer">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                </svg>
                            </a>
                        @endif
                        @if($fb = data_get($platform, 'facebook'))
                            <a aria-label="Facebook"
                               class="w-9 h-9 rounded-full border border-white flex items-center justify-center text-on-primary hover:bg-white hover:text-primary transition-all"
                               href="{{ $fb }}" target="_blank" rel="noopener noreferrer">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                            </a>
                        @endif
                        @if($tt = data_get($platform, 'tiktok'))
                            <a aria-label="TikTok"
                               class="w-9 h-9 rounded-full border border-white flex items-center justify-center text-on-primary hover:bg-white hover:text-primary transition-all"
                               href="{{ $tt }}" target="_blank" rel="noopener noreferrer">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                    <path d="M12.525.02c1.31 0 2.6.43 3.65 1.22.09.07.18.15.26.23.02.02.04.05.07.07 1.09.97 1.75 2.37 1.78 3.86v.44c1.17-.38 2.41-.45 3.64-.2v3.31c-.96.08-1.91-.07-2.81-.44-.39-.16-.76-.36-1.1-.6v8.83c0 4.01-3.26 7.26-7.27 7.26-4.02 0-7.27-3.25-7.27-7.26 0-3.9 3.08-7.07 6.94-7.24.36-.02.73 0 1.09.07v3.42c-.36-.08-.73-.09-1.09-.04-2.1.25-3.66 2.04-3.61 4.15.05 2.08 1.76 3.75 3.84 3.75 2.12 0 3.84-1.72 3.84-3.84V0h-3.13z"/>
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>
                <p class="font-body-md text-body-md text-on-primary-container max-w-sm mt-space-xs">
                     Heavy industrial machinery, advanced powertrain architectures, and precision hydraulic systems engineered for global infrastructure operations.
                </p>
            </div>

            <div class="lg:col-span-3 flex flex-col gap-space-md">
                <h4 class="font-label-lg text-label-lg text-on-primary uppercase tracking-wider font-bold">Products</h4>
                <ul class="flex flex-col gap-space-sm">
                    @foreach($navCategories ?? [] as $cat)
                        <li class="font-body-sm text-body-sm text-on-primary-container hover:text-on-primary transition-colors">
                            <a href="{{ route('category', $cat['slug']) }}">{{ $cat['nama'] }}</a>
                        </li>
                    @endforeach
                    <li class="font-body-sm text-body-sm text-on-primary-container hover:text-on-primary transition-colors">
                        <a href="{{ route('product') }}">All Catalogs</a>
                    </li>
                </ul>
            </div>

            <div class="lg:col-span-3 flex flex-col gap-space-md">
                <h4 class="font-label-lg text-label-lg text-on-primary uppercase tracking-wider font-bold">Global Headquarters</h4>
                <p class="font-body-sm text-body-sm text-on-primary-container">
                    {{ data_get($profile, 'address') ?: '4800 Industrial Parkway, Sector 9, Heavy Engineering Corridor, Detroit, MI 48202' }}
                </p>
                <div class="flex flex-col gap-space-xs pt-space-xs">
                    <span class="font-label-spec text-label-spec text-secondary-fixed uppercase tracking-wider font-semibold">Direct Contact</span>
                    <div class="flex flex-col gap-space-xs">
                        @php
                            $email = data_get($profile, 'email', 'rfq-desk@thorxup-machinery.com');
                            $phone = data_get($profile, 'phone', '+1 (800) 846-7987');
                            $wa    = data_get($profile, 'whatsapp', '+1 (800) 846-7987');
                        @endphp
                        <a class="font-body-sm text-body-sm text-on-primary-container hover:text-on-primary transition-colors"
                           href="mailto:{{ $email }}">{{ $email }}</a>
                        <a class="font-body-sm text-body-sm text-on-primary-container hover:text-on-primary transition-colors"
                           href="tel:{{ $phone }}">{{ $phone }}</a>
                        <a class="font-body-sm text-body-sm text-on-primary-container hover:text-on-primary transition-colors"
                           href="https://wa.me/{{ preg_replace('/\D+/', '', (string) $wa) }}" target="_blank" rel="noopener noreferrer">{{ $wa }}</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-space-2xl pb-space-md select-none pointer-events-none overflow-hidden flex items-center justify-between gap-space-lg tracking-tighter leading-none opacity-20 hover:opacity-30 transition-opacity">
            <div class="flex items-baseline shrink-0">
                <span class="font-display-hero text-[64px] sm:text-[96px] md:text-[120px] lg:text-[148px] font-black text-on-primary uppercase tracking-tighter">THORX</span>
                <span class="font-display-hero text-[32px] sm:text-[48px] md:text-[60px] lg:text-[76px] font-black text-secondary-fixed uppercase tracking-wider -translate-y-4 md:-translate-y-8 ml-1">up</span>
            </div>
            <div class="flex-1 h-1 bg-secondary-fixed/40 rounded-full"></div>
        </div>

        <div class="mt-space-2xl pt-space-lg border-t border-primary-container flex flex-col sm:flex-row items-center justify-between gap-space-md">
            <p class="font-body-sm text-body-sm text-on-primary-container">Copyright © {{ date('Y') }} thorxup design by 3idea.id</p>
            <div class="flex items-center gap-space-lg">
                <a class="font-body-sm text-body-sm text-on-primary-container hover:text-on-primary transition-colors"
                   href="{{ route('page', 'privacy-policy') }}">Privacy Policy</a>
                <a class="font-body-sm text-body-sm text-on-primary-container hover:text-on-primary transition-colors"
                   href="{{ route('page', 'terms-and-conditions') }}">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>