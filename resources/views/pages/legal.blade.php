@extends('layouts.app')

@section('content')
<section class="relative overflow-hidden bg-[#EBF2FE] py-16 md:py-24">
    <img src="{{ asset('images/elemen.png') }}"
         alt=""
         class="pointer-events-none absolute bottom-0 right-0 w-44 opacity-80 md:w-64">

    <div class="relative z-10 mx-auto max-w-[1360px] px-margin-mobile text-center lg:px-margin">
        <nav class="mb-3 flex items-center justify-center gap-2 text-sm text-on-surface-variant">
            <a href="{{ route('home') }}" class="hover:text-primary">Home</a>
            <span>/</span>
            <span class="font-semibold text-primary">{{ $page->judul }}</span>
        </nav>

        <h1 class="font-headline-lg text-3xl font-extrabold text-on-surface md:text-5xl">
            {{ $page->judul }}
        </h1>

        <p class="mt-3 text-sm text-on-surface-variant">
            Last updated: {{ $page->updated_at->format('d F Y') }}
        </p>
    </div>
</section>

<section class="mx-auto max-w-4xl px-margin-mobile py-12 md:py-16 lg:px-margin">
    <article class="prose prose-slate max-w-none leading-relaxed text-on-surface">
        {!! $page->konten !!}
    </article>
</section>
@endsection