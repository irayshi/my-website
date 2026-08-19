@extends('layouts.site')

@section('main')
    <main>

        <section id="hero" class="relative flex min-h-screen items-center px-5 pb-16 pt-28 sm:px-8">
            <div
                class="absolute right-0 top-0 h-[55vw] max-h-[700px] w-[55vw] max-w-[700px] rounded-full bg-crimson/30 blur-[130px]">
            </div>

            <div class="relative z-10 mx-auto grid w-full max-w-[1400px] items-center gap-12 lg:grid-cols-12">
                <div class="lg:col-span-7">
                    <div class="mb-8 flex items-center gap-3 reveal">
                        <span class="relative flex h-2.5 w-2.5">
                            <span
                                class="absolute inline-flex h-full w-full animate-ping rounded-full bg-green-400 opacity-75"></span>
                            <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-green-400"></span>
                        </span>
                        <span class="overline text-white/70">Tersedia untuk Proyek Baru</span>
                    </div>

                    <h1
                        class="font-display text-4xl font-extrabold leading-[1.02] tracking-tight sm:text-6xl lg:text-[4.4rem] xl:text-[5rem]">
                        <span class="block">Membangun</span>
                        <span class="block text-crimson">Produk Digital</span>
                        <span class="block">Yang Berjiwa.</span>
                    </h1>

                    <p class="mt-8 max-w-xl text-base leading-relaxed text-zinc-400 sm:text-lg">
                        Halo, saya <span class="font-medium text-white">Irayshi</span> - fullstack engineer &
                        desainer produk.
                        Saya membangun aplikasi web, menjual produk digital, dan memamerkan karya terbaik saya di
                        sini.
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
                            <img class="h-[420px] w-full rounded-xl object-cover"
                                src="https://images.unsplash.com/photo-1656231267330-f605c1c16a57?crop=entropy&cs=srgb&fm=jpg&q=85&w=900"
                                alt="Karya terbaru Irayshi" />
                        </div>
                        <div
                            class="surface-card absolute -bottom-6 -left-4 rounded-xl bg-[#141418]/90 px-5 py-4 backdrop-blur-xl">
                            <div class="overline">Karya Terbaru</div>
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
            <div id="marquee-track" class="marquee-track"></div>
        </section>

        <section id="manifesto" class="section-wrap">
            <h2 class="section-title reveal">Cara <span class="font-editorial font-normal italic text-crimson">kerja</span>
                saya.</h2>
            <div id="workflow-grid"
                class="mt-16 grid overflow-hidden rounded-2xl border border-white/10 bg-white/10 md:grid-cols-3">
            </div>
        </section>

        <section id="about" class="section-wrap">
            <div class="grid items-center gap-12 lg:grid-cols-12 lg:gap-16">
                <div class="lg:col-span-5 reveal">
                    <div class="surface-card relative overflow-hidden rounded-2xl p-2">
                        <img class="h-[440px] w-full rounded-xl object-cover sm:h-[520px]"
                            src="https://images.unsplash.com/photo-1754473720977-f39053f22586?crop=entropy&cs=srgb&fm=jpg&q=85&w=900"
                            alt="Irayshi" />
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
            <div class="mx-auto max-w-[1400px]">
                <h2 class="section-title reveal">Aset siap pakai untuk mempercepat kamu</h2>
                <div id="product-filters" class="mt-8 flex flex-wrap gap-2.5 reveal"></div>
                <div id="products-grid" class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3"></div>
            </div>
        </section>

        <section class="relative overflow-hidden border-y border-white/10 bg-[#141418] px-5 py-24 sm:px-8">
            <div
                class="absolute left-1/2 top-1/2 h-[500px] w-[500px] -translate-x-1/2 -translate-y-1/2 rounded-full bg-crimson/20 blur-[150px]">
            </div>
            <div id="impact-stats" class="relative z-10 mx-auto grid max-w-[1400px] grid-cols-2 gap-10 lg:grid-cols-4">
            </div>
        </section>

        <section id="portfolio" class="section-wrap">
            <h2 class="section-title reveal">Karya yang saya banggakan</h2>
            <div id="portfolio-filters" class="mt-8 flex flex-wrap gap-2.5 reveal"></div>
            <div id="portfolio-grid" class="mt-12 grid auto-rows-[260px] gap-5 sm:grid-cols-2 lg:grid-cols-6">
            </div>
        </section>
    </main>
    <script src="{{ asset('js/script.js') }}"></script>
@endsection
