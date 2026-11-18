@extends('layouts.app')

@push('styles')
<style>
    html, body {
        height: 100vh;
        overflow: hidden;
    }
    header, nav, footer {
        display: none !important;
    }
    main {
        padding-top: 0 !important;
        min-height: 100vh !important;
        height: 100vh !important;
    }
</style>
@endpush

@section('content')
<section class="relative flex h-screen w-full items-center justify-center overflow-hidden bg-surface-container-low px-4">
    {{-- Elemen Dekoratif Kanan-Bawah --}}
    <img src="{{ asset('images/elemen.png') }}"
         alt=""
         class="pointer-events-none absolute bottom-0 right-0 w-44 opacity-80 md:w-64">

    <div class="container relative z-10 mx-auto text-center">
        {{-- Angka 404 Ekstra Besar --}}
        <p class="select-none text-8xl font-black leading-none tracking-tighter text-primary sm:text-9xl md:text-[11rem]">
            404
        </p>

        <h1 class="mt-4 text-2xl font-extrabold tracking-tight text-slate-900 sm:text-3xl md:text-4xl">
            Halaman Tidak Ditemukan
        </h1>

        <p class="mx-auto mt-3 max-w-lg text-sm text-slate-600 sm:text-base">
            Maaf, halaman atau suku cadang yang Anda cari mungkin telah dipindahkan, dihapus, atau alamat URL yang dimasukkan tidak tepat.
        </p>

        <div class="mt-8 flex flex-wrap items-center justify-center gap-3">
            <a href="{{ url('/') }}"
               class="inline-flex items-center justify-center rounded-lg bg-primary px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-primary-container">
                Kembali ke Beranda
            </a>

            <a href="{{ route('product') }}"
               class="inline-flex items-center justify-center rounded-lg border border-slate-300 bg-white px-6 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">
                Lihat Katalog Produk
            </a>
        </div>
    </div>
</section>
@endsection