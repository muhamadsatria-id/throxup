@php $profile = \App\Models\Profile::first(); @endphp
@extends('layouts.app')
@section('content')
<section class="w-full bg-surface shadow-sm relative overflow-hidden">
    <div
        class="max-w-[1360px] mx-auto px-margin-mobile lg:px-margin pt-space-lg pb-space-xl relative z-10 flex flex-col items-center text-center">
        <!-- Breadcrumb Navigation -->
        <nav aria-label="Breadcrumb"
            class="flex flex-wrap items-center justify-center gap-space-xs text-on-surface-variant font-label-md text-label-md mb-space-md">
            <a class="hover:text-primary transition-colors" href="/">Beranda</a>
            <span aria-hidden="true">/</span>
            <span class="text-primary font-bold" aria-current="page">Tentang Kami</span>
        </nav>

        <!-- Headline & Subtitle -->
        <div class="max-w-3xl mx-auto">
            <h1 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">
                {{ $profile?->nama ?: 'Mitra Terpercaya Solusi' }} <br> Pertambangan &amp; Manufaktur
            </h1>
            <p class="font-body-md text-body-md text-on-surface-variant mt-space-xs leading-relaxed">
                Menghadirkan produk berperforma tinggi, dukungan teknis andal, serta manajemen rantai pasok
                yang responsif untuk meningkatkan produktivitas, keandalan, dan keberlanjutan operasional
                industri pertambangan maupun manufaktur.
            </p>
        </div>
    </div>

    <!-- GAMBAR ELEMEN DEKORATIF KANAN BAWAH -->
    <img src="elemen.png" alt="" aria-hidden="true"
        class="absolute bottom-0 right-0 w-44 sm:w-72 lg:w-92 h-auto opacity-20 pointer-events-none select-none z-0" />
</section>
<!-- MAIN NARRATIVE & MEDIA SECTION -->
<section class="w-full py-space-2xl bg-surface-container-low">
    <div class="max-w-[1360px] mx-auto px-margin-mobile lg:px-margin">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-xl items-start">
            <!-- LEFT COLUMN: COPY & VERBATIM NARRATIVE -->
            <div class="lg:col-span-7 flex flex-col gap-space-lg">
                <div class="flex flex-col gap-space-sm">

                    <h2 class="font-headline-lg text-headline-lg text-on-surface font-bold tracking-tight">
                        Profil Perusahaan
                    </h2>
                </div>
                <div class="flex flex-col gap-space-md">
                    <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                        {!! $profile?->deskripsi ?: 'Profil perusahaan belum diisi.' !!}
                    </p>
                </div>
                <!-- KEY COMMITMENT HIGHLIGHT BOX -->
                <!-- <div
                    class="p-space-lg rounded-md bg-surface-container-low shadow-sm flex flex-col gap-space-sm relative overflow-hidden">
                    <div
                        class="flex items-center gap-space-xs text-primary font-headline-sm text-headline-sm font-bold">

                        <h3>Inovasi Perlindungan Permukaan untuk Industri Modern</h3>
                    </div>
                    <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                        Throx Up berkomitmen menghadirkan solusi kimia permukaan yang efektif dan mudah
                        diaplikasikan oleh tim maintenance industri. Dengan formulasi yang terus
                        disempurnakan berdasarkan masukan dari pengguna industri, Throx Up memastikan setiap
                        produk memberikan nilai nyata dalam memperpanjang umur aset dan mengurangi biaya
                        perawatan. Di Indonesia, Throx Up menjadi pilihan tim maintenance yang mengutamakan
                        perlindungan mesin jangka panjang.
                    </p>
                </div> -->
                <!-- OPERATIONAL METRIC STRIP -->

            </div>
            <!-- RIGHT COLUMN: MEDIA CARDS & APPLICATION PREVIEW -->
            <div class="lg:col-span-5 flex flex-col gap-space-lg">
                <!-- CARD 1: VIDEO PRESENTATION CARD -->
                <div
                    class="rounded-md bg-surface-container-lowest overflow-hidden shadow-md flex flex-col group">
                    <div class="relative w-full h-64 bg-surface-container">
                        <div class="w-full h-full bg-cover bg-center transition-transform duration-500 group-hover:scale-105"
                            data-alt="A cinematic close-up of heavy industrial hydraulic valve testing bench inside a manufacturing facility, with precision steel components, pressure gauges, and hydraulic hoses bathed in ambient factory lighting"
                            style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBqSUcRpj0STlfbpJ73LaJeX0HwWx84SxecFyKsNShncOipNPEA8FJDH3eec2W0vIWQsyxZuMmPjZ_XAQEHEqhPtcZGBdYjr4rcd9q_SoI2xVctIX8WOrTgCRNAnz8i4p9MnhFp2-GPUdS1d6Gys1kHrry5t1O_2LvHDSmNy_sof73PK3V0IqcwUrF_TuO5ncVzyfXMl9Ju2sm3FA-W3UkSr3P6qkqIaYmPdp5WrKHJ')">
                        </div>
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-primary/90 via-primary/30 to-transparent flex items-center justify-center p-space-md">
                            <button aria-label="Play facility video"
                                class="w-16 h-16 rounded-full bg-surface-container-lowest text-primary shadow-xl flex items-center justify-center hover:scale-110 active:scale-95 transition-all"
                                type="button">
                                <span class="material-symbols-outlined text-[36px] ml-1">play_arrow</span>
                            </button>
                        </div>
                        <div
                            class="absolute top-space-sm right-space-sm px-2.5 py-1 rounded-full bg-inverse-surface/80 text-inverse-on-surface font-label-spec text-label-spec uppercase tracking-wider backdrop-blur-sm">
                            03:45 HD
                        </div>

                    </div>
                    <div class="p-space-md flex flex-col gap-space-xs">
                        <h4 class="font-headline-sm text-headline-sm text-on-surface font-bold">
                            Tonton Video Profil Fasilitas &amp; Aplikasi Lapangan
                        </h4>
                        <p class="font-body-sm text-body-sm text-on-surface-variant">
                            Pengujian laboratorium dinamis atas aplikasi protective coating pada rakitan
                            transmisi berat dan sistem pompa hidrolik bertekanan tinggi.
                        </p>
                    </div>
                </div>
                <!-- CARD 2: STRATEGIC PARTNERSHIP CARD -->
                <div class="rounded-md bg-surface-container-lowest overflow-hidden shadow-md flex flex-col">
                    <div class="relative w-full h-56 bg-surface-container">
                        <img alt="Heavy machinery tracks, steel sprockets and rollers workshop application"
                            class="w-full h-full object-cover"
                            src="https://lh3.googleusercontent.com/aida/ALJJyrDbzQqNtyqjbTrA2m_XbLklVB8l_Ucy0_riJZTbCoQkhm6IUMvwwefm2huXXG4zp0Y7a0kwLKWEGYGOcU6ruGBrxK1reB5NftSJJ4Ivq82HCPYgjMgF5oSMMZaAKkmWDgGu7grdp-n68ME0d6WOj4D7v-gVRK0qszz9oyfOn144taUstVRWTYFsR1xcGzS42M7WwzF-p9YqdHv7hDYim0ey3cMpfZUBQ-TqlXCJQPojgg">

                    </div>
                    <div class="p-space-md flex flex-col gap-1 bg-surface-container-low">
                        <span
                            class="font-label-spec text-label-spec text-secondary uppercase tracking-wider font-bold">Distribusi
                            Nasional &amp; Dukungan On-Site</span>
                        <p class="font-body-sm text-body-sm text-on-surface-variant">
                            Layanan inspeksi metalurgi langsung di lokasi tambang dan bengkel fabrikasi
                            dengan respon teknis cepat di seluruh wilayah operasional Indonesia.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- VISION & MISSION SECTION -->
<section class="w-full bg-surface-container-low pt-space-lg pb-space-2xl">
    <div class="max-w-[1360px] mx-auto px-margin-mobile lg:px-margin flex flex-col gap-space-xl">
        <div class="flex flex-col items-center text-center gap-space-xs max-w-3xl mx-auto">
            <div class="w-12 h-1 bg-primary rounded-full mx-auto"></div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg items-stretch">
            <!-- CARD 1: VISION (DEEP INDUSTRIAL BLUE) -->
            <div
                class="lg:col-span-5 rounded-md bg-primary text-on-primary p-space-xl flex flex-col justify-between shadow-lg relative overflow-hidden">
                <div class="flex flex-col gap-space-md relative z-10">
                    <div class="border-b-2 border-secondary-fixed pb-2 mb-2 w-fit">
                        <h3
                            class="font-headline-md text-headline-md font-bold text-surface-container-lowest tracking-tight">
                            Our Vision</h3>
                    </div>

                    <p
                        class="font-headline-md text-headline-md font-bold leading-snug tracking-tight text-surface-container-lowest">
                        “To be trusted solution for mining &amp; manufacturing operations through high
                        performance product that enhance productivity, reliability, and sustainability.”
                    </p>
                </div>

                <!-- GAMBAR ELEMEN DEKORATIF KIRI BAWAH -->
                <img src="elemen.png" alt="" aria-hidden="true"
                    class="absolute bottom-0 left-0 w-48 lg:w-64 h-auto opacity-15 pointer-events-none select-none z-0" />
            </div>

            <!-- CARD 2: MISSION (CLEAN INDUSTRIAL WHITE WITH STEPS) -->
            <div
                class="lg:col-span-7 rounded-md bg-surface-container-lowest p-space-xl shadow-md flex flex-col justify-between gap-space-md overflow-hidden">
                <div class="border-b-2 border-primary pb-2 mb-4 w-fit">
                    <h3 class="font-headline-md text-headline-md font-bold text-primary tracking-tight">
                        Our Mission</h3>
                </div>

                <div class="flex flex-col gap-space-md">
                    <div
                        class="flex items-baseline gap-space-md pb-space-sm border-b border-outline-variant/30">
                        <span
                            class="text-[32px] font-extrabold text-primary shrink-0 leading-none">01</span>
                        <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                            Deliver high quality and high durability products to support mining activities
                            under
                            demanding operational conditions.</p>
                    </div>
                    <div
                        class="flex items-baseline gap-space-md py-space-sm border-b border-outline-variant/30">
                        <span
                            class="text-[32px] font-extrabold text-primary shrink-0 leading-none">02</span>
                        <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                            Provide productivity and reliability oriented solutions to improve work
                            effectiveness
                            and reduce operational risk.</p>
                    </div>
                    <div
                        class="flex items-baseline gap-space-md py-space-sm border-b border-outline-variant/30">
                        <span
                            class="text-[32px] font-extrabold text-primary shrink-0 leading-none">03</span>
                        <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                            Ensure product availability and timely distribution through responsive and
                            consistent
                            supply chain management.</p>
                    </div>
                    <div class="flex items-baseline gap-space-md pt-space-sm">
                        <span
                            class="text-[32px] font-extrabold text-primary shrink-0 leading-none">04</span>
                        <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                            Evaluation, technical support, and portfolio development aligned with the
                            evolving needs of the mining industry.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="w-full py-space-2xl bg-surface-container-low">
    <div class="max-w-[1360px] mx-auto px-margin-mobile lg:px-margin">
        <div
            class="rounded-md bg-primary text-on-primary p-space-xl lg:p-space-2xl shadow-xl relative overflow-hidden flex flex-col lg:flex-row items-center justify-between gap-space-xl">
            <div class="flex flex-col gap-space-sm max-w-2xl relative z-10">

                <h2 class="font-headline-lg text-headline-lg font-extrabold tracking-tight">
                    Konsultasikan Kebutuhan Proteksi &amp; Perawatan Mesin Industri Anda
                </h2>
                <p class="font-body-md text-body-md text-on-primary-container leading-relaxed">
                    Tim rekayasa kimia dan spesialis aplikasi kami siap mengevaluasi kondisi operasional,
                    tantangan degradasi permukaan, serta merekomendasikan formulasi paling efisien untuk
                    fasilitas Anda.
                </p>
            </div>
            <div
                class="flex flex-col sm:flex-row items-center gap-space-md shrink-0 w-full lg:w-auto relative z-10">
                <a class="w-full sm:w-auto px-8 py-3.5 rounded-full bg-surface-container-lowest text-primary font-label-lg text-label-lg font-bold text-center hover:bg-secondary-fixed transition-colors shadow-md"
                    data-path="contact" href="#">
                    Hubungi Tim Teknis
                </a>

            </div>
        </div>
    </div>
</section>
@endsection