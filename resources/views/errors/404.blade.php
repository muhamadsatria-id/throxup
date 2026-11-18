@extends('layouts.app')

@section('content')
<section class="relative overflow-hidden bg-[#EBF2FE] py-20 md:py-28">
    {{-- Elemen Dekoratif Kanan-Bawah (konsisten dengan header halaman lain) --}}
    <img src="{{ asset('images/elemen.png') }}"
         alt=""
         class="pointer-events-none absolute bottom-0 right-0 w-48 opacity-80 md:w-72">

    <div class="container relative z-10 mx-auto px-4 text-center">
        <span class="inline-block rounded-full bg-blue-100 px-4 py-1.5 text-xs font-semibold uppercase tracking-wider text-blue-700">
            Error 404
        </span>

        <h1 class="mt-4 text-4xl font-extrabold tracking-tight text-slate-900 md:text-6xl">
            Halaman Tidak Ditemukan
        </h1>

        <p class="mx-auto mt-4 max-w-xl text-base text-slate-600 md:text-lg">
            Maaf, halaman atau suku cadang yang Anda cari mungkin telah dipindahkan, dihapus, atau alamat URL yang dimasukkan tidak tepat.
        </p>

        <div class="mt-8 flex flex-wrap items-center justify-center gap-4">
            <a href="{{ url('/') }}"
               class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">
                Kembali ke Beranda
            </a>

            <a href="{{ route('products.index') }}"
               class="inline-flex items-center justify-center rounded-lg border border-slate-300 bg-white px-6 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">
                Lihat Katalog Produk
            </a>
        </div>
    </div>
</section>
@endsection