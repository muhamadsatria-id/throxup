@extends('layouts.app')

@section('content')
<section class="w-full bg-surface-container-low shadow-sm relative overflow-hidden">
    <div
        class="max-w-[1360px] mx-auto px-margin-mobile lg:px-margin pt-space-lg pb-space-xl relative z-10 flex flex-col items-center text-center">
        <!-- Breadcrumb Navigation -->
        <x-breadcrumb-navigation align="center" class="mb-space-md" :items="[['label' => $page->judul]]" />

        <!-- Headline & Subtitle -->
        <div class="max-w-3xl mx-auto">
            <h1 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">
                {{ $page->judul }}
            </h1>
            <p class="font-body-md text-body-md text-on-surface-variant mt-space-xs leading-relaxed">
                Last updated: {{ $page->updated_at->format('d F Y') }}
            </p>
        </div>
    </div>
</section>
<section class="mx-auto max-w-4xl px-margin-mobile py-12 md:py-16 lg:px-margin">
    <article class="prose rich-content max-w-none leading-relaxed">
        {{ \Filament\Forms\Components\RichEditor\RichContentRenderer::make($page->konten) }}
    </article>
</section>
@endsection