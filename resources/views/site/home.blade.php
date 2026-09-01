@extends('layouts.site')

@section('main')
    <main>
        <section id="hero" class="relative flex h-screen items-center px-5 pb-16 pt-28 sm:px-8">
            <div
                class="absolute right-0 top-0 h-[55vw] max-h-175 w-[55vw] max-w-175 rounded-full bg-crimson/30 blur-[130px]">
            </div>

            <div class="relative z-10 mx-auto grid w-full max-w-350 items-center gap-12 lg:grid-cols-12">
                <div class="lg:col-span-7">
                    <div class="mb-8 flex items-center gap-3 reveal">
                        <span class="relative flex h-2.5 w-2.5">
                            <span
                                class="absolute inline-flex h-full w-full animate-ping rounded-full bg-green-400 opacity-75"></span>
                            <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-green-400"></span>
                        </span>
                        <span class="tagline text-white/70">Tersedia untuk Proyek Baru</span>
                    </div>

                    <h1
                        class="font-display text-4xl font-extrabold leading-[1.02] tracking-tight sm:text-6xl lg:text-[4.4rem] xl:text-[5rem]">
                        Analisis, Desain, Kembangkan
                    </h1>

                    <p class="mt-8 max-w-xl text-base leading-relaxed text-zinc-400 sm:text-lg">
                        Bangun program tidak hanya berfungsi, tetapi juga bermanfaat. Selesaikan masalah, bukan sekedar
                        menyelesaikan tugas.
                    </p>

                    <div class="mt-10 flex flex-wrap items-center gap-4">
                        <a class="crimson-pill inline-flex items-center gap-2 px-7 py-3.5 text-sm font-semibold"
                            href="https://wa.me/6280000000000" target="_blank" rel="noreferrer">
                            Mulai Proyek <i data-lucide="arrow-up-right" class="h-4 w-4"></i>
                        </a>
                        <a class="inline-flex items-center gap-2 rounded-full border border-white/15 px-7 py-3.5 text-sm font-semibold transition-all hover:border-white/40 hover:bg-white/5"
                            href="#portfolio">
                            Lihat Portofolio
                        </a>
                    </div>

                    <div class="mt-14 flex gap-10">
                        <div>
                            <div class="font-display text-2xl font-bold sm:text-3xl">45+</div>
                            <div class="mt-1 text-xs text-zinc-600">Proyek Selesai</div>
                        </div>
                        <div>
                            <div class="font-display text-2xl font-bold sm:text-3xl">12+</div>
                            <div class="mt-1 text-xs text-zinc-600">Produk Digital</div>
                        </div>
                        <div>
                            <div class="font-display text-2xl font-bold sm:text-3xl">99%</div>
                            <div class="mt-1 text-xs text-zinc-600">Klien Puas</div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-5">
                    <div class="relative reveal">
                        <div class="surface-card overflow-hidden rounded-2xl p-2">
                            <img class="h-105 w-full rounded-xl object-cover"
                                src="https://images.unsplash.com/photo-1656231267330-f605c1c16a57?crop=entropy&cs=srgb&fm=jpg&q=85&w=900"
                                alt="Karya terbaru Irayshi" />
                        </div>
                        <div
                            class="surface-card absolute -bottom-6 -left-4 rounded-xl bg-[#141418]/90 px-5 py-4 backdrop-blur-xl">
                            <div class="tagline">Karya Terbaru</div>
                            <div class="font-display mt-1 font-bold">Pulse Analytics</div>
                            <div class="text-xs text-zinc-600">React · FastAPI · MongoDB</div>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="absolute bottom-8 left-1/2 hidden -translate-x-1/2 flex-col items-center gap-2 text-zinc-600 sm:flex">
                <span class="text-[0.65rem] uppercase tracking-[0.3em]">Scroll</span>
                <i data-lucide="arrow-down" class="h-4 w-4 animate-bounce"></i>
            </div>
        </section>

        <section class="overflow-hidden border-y border-white/10 bg-[#141418] py-6">
            <div class="marquee-track">
                @php
                    $items = ['Mobile Development', 'Web Development', 'UI/UX Design'];
                @endphp

                @for ($i = 0; $i < 3; $i++)
                    @foreach ($items as $item)
                        <span class="marquee-item">
                            <span class="font-display px-6 text-2xl font-bold text-white/90 sm:text-4xl">
                                {{ $item }}</span>
                            <span class="text-2xl text-crimson sm:text-4xl">*</span>
                        </span>
                    @endforeach
                @endfor
            </div>
        </section>

        <section id="manifesto" class="section-wrap">
            <h2 class="section-title reveal">
                Cara <span class="font-editorial font-normal italic text-crimson">kerja</span> saya.
            </h2>

            <div id="workflow-grid"
                class="mt-16 grid overflow-hidden rounded-2xl border border-white/10 bg-white/10 md:grid-cols-3">

                <article class="group reveal bg-[#0d0d0f] p-9 transition-colors duration-300 hover:bg-[#141418]">
                    <div
                        class="font-display text-5xl font-extrabold text-white/10 transition-colors duration-300 group-hover:text-crimson">
                        01</div>
                    <h3 class="font-display mt-6 text-xl font-bold">Diskusi & Perencanaan</h3>
                    <p class="mt-4 text-sm leading-relaxed text-zinc-400">Memahami kebutuhan bisnis Anda, menentukan
                        arsitektur aplikasi, dan menyusun peta jalan proyek yang jelas.</p>
                </article>

                <article class="group reveal bg-[#0d0d0f] p-9 transition-colors duration-300 hover:bg-[#141418]">
                    <div
                        class="font-display text-5xl font-extrabold text-white/10 transition-colors duration-300 group-hover:text-crimson">
                        02</div>
                    <h3 class="font-display mt-6 text-xl font-bold">Desain & Pengembangan</h3>
                    <p class="mt-4 text-sm leading-relaxed text-zinc-400">Mentransformasikan ide ke dalam kode pemrograman
                        yang bersih, responsif, berkinerja tinggi, dan berjiwa.</p>
                </article>

                <article class="group reveal bg-[#0d0d0f] p-9 transition-colors duration-300 hover:bg-[#141418]">
                    <div
                        class="font-display text-5xl font-extrabold text-white/10 transition-colors duration-300 group-hover:text-crimson">
                        03</div>
                    <h3 class="font-display mt-6 text-xl font-bold">Peluncuran & Iterasi</h3>
                    <p class="mt-4 text-sm leading-relaxed text-zinc-400">Melakukan pengujian menyeluruh, merilis produk ke
                        server produksi, dan siap melakukan optimasi berkala.</p>
                </article>

            </div>
        </section>


        <section id="about" class="section-wrap">
            <div class="grid items-center gap-12 lg:grid-cols-12 lg:gap-16">
                <div class="lg:col-span-5 reveal">
                    <div class="surface-card relative overflow-hidden rounded-2xl p-2">
                        <img class="h-110 w-full rounded-xl object-cover sm:h-130"
                            src="{{ asset('images/IMG_20251208_060909_615.jpg') }}" alt="Irayshi" />
                        <div
                            class="surface-card absolute bottom-6 left-4 flex items-center gap-2 rounded-xl bg-[#141418]/90 px-5 py-3 backdrop-blur-xl">
                            <i data-lucide="map-pin" class="h-4 w-4 text-crimson"></i>
                            <span class="text-sm font-medium">Berbasis di Indonesia · Bekerja Global</span>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-7">
                    <h2 class="section-title reveal">Tentang <span
                            class="font-editorial font-normal italic text-crimson">saya</span></h2>
                    <p class="mt-7 text-base leading-relaxed text-zinc-300 sm:text-lg reveal">
                        Halo! Saya <span class="font-semibold text-white">Irayshi</span> - seorang fullstack
                        engineer & desainer produk dengan lebih dari 5 tahun pengalaman membangun aplikasi web yang
                        cepat, indah, dan berdampak.
                    </p>
                    <p class="mt-4 leading-relaxed text-zinc-400 reveal">
                        Saya percaya produk hebat lahir dari perpaduan kode yang rapi dan desain yang berjiwa. Dari
                        ide mentah hingga peluncuran, saya menemani setiap tahap dengan komunikasi terbuka dan
                        kualitas yang tak dikompromikan.
                    </p>
                    <div class="mt-8 reveal">
                        <div class="mb-4 text-sm font-semibold">Keahlian utama</div>
                        <div id="skills-list" class="flex flex-wrap gap-2.5"></div>
                    </div>
                    <div id="about-stats" class="mt-10 flex flex-wrap gap-8 reveal"></div>
                    <a class="crimson-pill mt-10 inline-flex items-center gap-2 px-7 py-3.5 font-semibold reveal"
                        href="#contact">
                        Ajak Berkolaborasi <i data-lucide="arrow-up-right" class="h-4 w-4"></i>
                    </a>
                </div>
            </div>
        </section>

        <section id="services" class="section-wrap">
            <div class="mb-14 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between reveal">
                <h2 class="section-title">Jasa yang saya tawarkan</h2>
                <div class="max-w-sm">
                    <p class="text-sm text-zinc-400">Solusi end-to-end untuk membawa produk digital kamu dari ide
                        menjadi kenyataan.</p>
                    <a class="mt-3 inline-flex items-center gap-1.5 text-sm font-semibold text-crimson transition-all hover:gap-2.5"
                        href="queue.html">
                        Lihat antrian layanan <i data-lucide="arrow-up-right" class="h-4 w-4"></i>
                    </a>
                </div>
            </div>
            <div id="services-grid" class="grid gap-6 md:grid-cols-3"></div>
        </section>

        <section id="products" class="border-y border-white/10 bg-[#141418] px-5 py-28 sm:px-8">
            <div class="mx-auto max-w-350">
                <h2 class="section-title reveal">Aset siap pakai untuk mempercepat kamu</h2>
                <div id="product-filters" class="mt-8 flex flex-wrap gap-2.5 reveal"></div>
                <div id="products-grid" class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3"></div>
            </div>
        </section>

        <section class="relative overflow-hidden border-y border-white/10 bg-[#141418] px-5 py-24 sm:px-8">
            <div
                class="absolute left-1/2 top-1/2 h-125 w-125 -translate-x-1/2 -translate-y-1/2 rounded-full bg-crimson/20 blur-[150px]">
            </div>
            <div id="impact-stats" class="relative z-10 mx-auto grid max-w-350 grid-cols-2 gap-10 lg:grid-cols-4">
            </div>
        </section>

        <section id="portfolio" class="section-wrap">
            <h2 class="section-title reveal">Karya yang saya banggakan</h2>
            <div id="portfolio-filters" class="mt-8 flex flex-wrap gap-2.5 reveal"></div>
            <div id="portfolio-grid" class="mt-12 grid auto-rows-65 gap-5 sm:grid-cols-2 lg:grid-cols-6">
            </div>
        </section>
    </main>
@endsection
