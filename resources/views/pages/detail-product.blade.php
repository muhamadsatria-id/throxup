@extends('layouts.app')
@section('content')
@php
$category = $product->category;
$images = $product->imageUrls();
$mainImage = $images[0] ?? null;
$benefits = array_values(array_filter((array) ($product->benefits ?? []), fn ($item) => filled($item)));

$breadcrumbItems = array_values(array_filter([
['label' => 'Products', 'url' => route('product')],
$category ? ['label' => $category->nama, 'url' => route('product', ['category' => $category->slug]), 'hide_on_mobile' => true] : null,
['label' => $product->nama],
]));

$waPhone = preg_replace('/\D+/', '', (string) data_get($profile ?? null, 'whatsapp', ''));
if (str_starts_with($waPhone, '0')) {
$waPhone = '62' . substr($waPhone, 1);
}
$waMessage = urlencode(
'Halo ' . (data_get($profile ?? null, 'nama') ?: config('app.name', 'Thorxup'))
. ', saya ingin menanyakan produk ' . $product->nama . ' (' . $product->sku . ').'
);
$waUrl = $waPhone ? "https://wa.me/{$waPhone}?text={$waMessage}" : route('home') . '#contact';
@endphp

<!-- Breadcrumb Navigation Bar -->
<section class="w-full bg-surface-container-low relative overflow-hidden">
    <div class="max-w-[1360px] mx-auto px-margin-mobile lg:px-margin pt-space-sm pb-space-md relative z-10">
        <!-- Breadcrumb Navigation -->
        <x-breadcrumb-navigation :items="$breadcrumbItems" />
    </div>
</section>

<!-- Main Product Detail Showcase Section -->
<section class="w-full py-space-xl">
    <div class="max-w-[1360px] mx-auto px-margin-mobile lg:px-margin">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter items-start">
            <!-- LEFT COLUMN: Product Gallery -->
            <div class="lg:col-span-7 flex flex-col gap-space-md">
                <!-- Main Large Display Container -->
                <div class="relative bg-surface-container-lowest rounded-md p-space-md shadow-md overflow-hidden group">
                    <div
                        class="relative w-full h-[440px] md:h-[520px] rounded-md overflow-hidden bg-surface-container-high flex items-center justify-center cursor-crosshair">
                        @if ($mainImage)
                        <img alt="{{ $product->nama }}" id="mainProductImg" src="{{ $mainImage }}"
                            loading="eager" fetchpriority="high" decoding="async"
                            class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105">
                        @else
                        <div id="mainProductImg"
                            class="flex flex-col items-center justify-center gap-space-sm text-outline">
                            <span class="material-symbols-outlined text-[64px]">precision_manufacturing</span>
                            <span class="font-label-md text-label-md">Foto produk belum tersedia</span>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Secondary Medium Thumbnail Gallery -->
                @if (count($images) > 1)
                <div class="grid grid-cols-4 gap-space-sm" id="thumbGallery">
                    @foreach ($images as $index => $image)
                    <button type="button"
                        class="thumb-btn text-left p-1 rounded-md bg-surface-container-lowest shadow-sm hover:shadow transition-all group overflow-hidden {{ $index === 0 ? 'ring-2 ring-primary bg-surface-container-high' : '' }}"
                        data-img-src="{{ $image }}" data-img-alt="{{ $product->nama }}"
                        aria-label="Tampilkan foto produk {{ $index + 1 }}">
                        <div class="relative w-full h-24 rounded-md overflow-hidden bg-surface-container">
                            <img alt="{{ $product->nama }} — foto {{ $index + 1 }}" loading="lazy" decoding="async"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                                src="{{ $image }}">
                        </div>
                    </button>
                    @endforeach
                </div>
                @endif
            </div>

            <!-- RIGHT COLUMN: Core Product Information & Commercial Ordering Desk -->
            <div class="lg:col-span-5 flex flex-col gap-space-md">
                <!-- Category & Metadata Header -->
                <div class="flex flex-col gap-space-xs">
                    <div class="flex flex-wrap items-center gap-2 font-label-spec text-label-spec tracking-wider">
                        @if ($category)
                        <a class="text-primary font-bold uppercase hover:underline transition-all"
                            href="{{ route('product', ['category' => $category->slug]) }}">{{ $category->nama }}</a>
                        <span class="text-on-surface-variant/60">/</span>
                        @endif
                        <span class="text-on-surface-variant font-semibold">{{ $product->sku }}</span>
                    </div>

                    <h1 class="font-headline-lg text-headline-lg text-on-surface font-extrabold tracking-tight">
                        {{ $product->nama }}
                    </h1>
                </div>

                <!-- Product Description -->
                <div class="flex flex-col gap-space-xs">
                    <h2 class="font-label-lg text-label-lg font-bold uppercase tracking-wider text-on-surface">Description
                    </h2>
                    <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                        {!! nl2br(e($product->deskripsi)) !!}
                    </p>
                </div>

                <!-- Key Benefits -->
                @if (! empty($benefits))
                <div class="flex flex-col gap-space-xs">
                    <h2 class="font-label-lg text-label-lg font-bold uppercase tracking-wider text-on-surface">Benefits</h2>
                    <ul class="flex flex-col gap-space-xs">
                        @foreach ($benefits as $benefit)
                        <li class="flex items-start gap-2 font-body-md text-body-md text-on-surface-variant leading-relaxed">
                            <span class="material-symbols-outlined text-primary text-[20px] shrink-0">check_circle</span>
                            <span>{{ $benefit }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- Detail Produk (Rich Text) -->
                @if (filled($product->detail_produk))
                <div class="flex flex-col gap-space-xs">
                    <h2 class="font-label-lg text-label-lg font-bold uppercase tracking-wider text-on-surface">Detail Produk</h2>
                    <div
                        class="font-body-md text-body-md text-on-surface-variant leading-relaxed flex flex-col gap-space-sm
                                [&_p]:leading-relaxed [&_ul]:list-disc [&_ul]:pl-5 [&_ol]:list-decimal [&_ol]:pl-5
                                [&_li]:mb-1 [&_strong]:font-semibold [&_strong]:text-on-surface
                                [&_a]:text-primary [&_a]:underline
                                [&_h2]:font-headline-sm [&_h2]:font-bold [&_h2]:text-on-surface
                                [&_h3]:font-headline-sm [&_h3]:font-semibold [&_h3]:text-on-surface">
                        {!! $product->detail_produk !!}
                    </div>
                </div>
                @endif

                <!-- PRIMARY ACTION BUTTONS: Official WhatsApp Order -->
                <div class="flex flex-col gap-space-sm pt-space-xs">
                    <a class="w-full bg-[#25D366] hover:bg-[#20bd5a] text-white py-3.5 px-6 rounded-full font-label-lg text-label-lg flex items-center justify-center gap-3 shadow-md hover:shadow-lg transition-all transform active:scale-[0.99] font-bold"
                        href="{{ $waUrl }}" rel="noopener noreferrer" target="_blank">
                        <!-- WhatsApp Icon SVG -->
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z">
                            </path>
                        </svg>
                        <span>Order Now via WhatsApp</span>
                    </a>

                    <!-- Guarantee Note -->
                    <div class="flex items-center justify-center gap-2 pt-1 text-on-surface-variant font-label-spec text-label-spec">
                        <span class="material-symbols-outlined text-primary text-[18px]">support_agent</span>
                        <span>{{ data_get($profile ?? null, 'nama') ?: 'Tim ' . config('app.name', 'Thorxup') }} siap
                            membantu verifikasi part &amp; penawaran harga</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section: Related Products -->
<section class="w-full py-space-2xl bg-surface-container-low">
    <div class="max-w-[1360px] mx-auto px-margin-mobile lg:px-margin">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-space-md mb-space-xl">
            <div>
                <h2 class="font-headline-lg text-headline-lg text-on-surface font-bold tracking-tight">Related Heavy
                    Machinery &amp; Replacement Parts</h2>
                <p class="font-body-md text-body-md text-on-surface-variant mt-1">
                    Complementary hydraulic units and powertrain assemblies frequently paired with the {{ $product->nama }}.
                </p>
            </div>
            <a class="inline-flex items-center gap-2 text-primary font-label-lg text-label-lg font-semibold hover:underline shrink-0"
                href="{{ route('product') }}">
                <span>View All Products</span>
                <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
            </a>
        </div>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-gutter">
            @forelse ($relatedProducts as $related)
            <x-card-product :image="$related->imageUrl()" :category="$related->category?->nama"
                :title="$related->nama" :url="route('detail-product', $related->slug)" />
            @empty
            <p class="col-span-full text-center text-on-surface-variant">Belum ada produk terkait.</p>
            @endforelse
        </div>
    </div>
</section>

<!-- Section: Bottom Support Callout Banner -->
<section class="w-full py-space-xl bg-surface-container-low">
    <div class="max-w-[1360px] mx-auto px-margin-mobile lg:px-margin">
        <div
            class="bg-surface-container-lowest p-space-xl rounded-md shadow-md flex flex-col md:flex-row items-center justify-between gap-space-lg relative overflow-hidden">
            <div class="flex flex-col gap-space-xs z-10 max-w-2xl">
                <h2 class="font-headline-md text-headline-md text-on-surface font-bold">
                    Need Custom Hydraulic or OEM Fitment Verification?
                </h2>
                <p class="font-body-md text-body-md text-on-surface-variant">
                    Our certified hydraulic engineers will verify your pump spline dimensions, rotation direction, and
                    operating circuit pressures before dispatch.
                </p>
            </div>
            <div class="flex flex-wrap items-center gap-space-sm z-10 shrink-0">
                <a class="bg-primary hover:bg-primary-container text-on-primary py-3.5 px-7 rounded-full font-label-lg text-label-lg font-bold transition-all shadow-md hover:shadow-lg flex items-center gap-2"
                    href="{{ $waUrl }}" rel="noopener noreferrer" target="_blank">
                    <span class="material-symbols-outlined text-[20px]">support_agent</span>
                    <span>Contact Me</span>
                </a>
                <a class="bg-surface-container-high hover:bg-surface-container text-on-surface py-3.5 px-6 rounded-full font-label-lg text-label-lg font-semibold transition-all"
                    href="{{ route('home') }}#contact">
                    Request a Quote
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mainImage = document.getElementById('mainProductImg');
        const thumbs = Array.from(document.querySelectorAll('.thumb-btn'));

        if (!mainImage || mainImage.tagName !== 'IMG' || thumbs.length === 0) {
            return;
        }

        const activeClasses = ['ring-2', 'ring-primary', 'bg-surface-container-high'];

        thumbs.forEach(function(thumb) {
            thumb.addEventListener('click', function() {
                mainImage.src = thumb.dataset.imgSrc;
                mainImage.alt = thumb.dataset.imgAlt || mainImage.alt;

                thumbs.forEach(function(item) {
                    item.classList.remove(...activeClasses);
                });
                thumb.classList.add(...activeClasses);
            });
        });
    });
</script>
@endpush