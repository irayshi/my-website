@extends('layouts.site')

@section('main')
    <main class="relative z-10 mx-auto max-w-350 px-5 pb-16 pt-28 sm:px-8">
        <a class="mb-8 inline-flex items-center gap-2 text-sm text-zinc-400 transition hover:text-white" href="index.html">
            <i data-lucide="arrow-left" class="h-4 w-4"></i>
            Kembali ke Beranda
        </a>

        <section class="max-w-3xl">
            <p class="tagline mb-4">Live Service Board</p>
            <h1 class="font-display text-3xl font-extrabold leading-[1.05] tracking-tight sm:text-5xl">
                Antrian Layanan
            </h1>
            <p class="mt-4 max-w-xl leading-relaxed text-zinc-400">
                Pantau tim developer, posisi antrian proyek, dan karya yang baru selesai. Data di halaman ini masih statis,
                tapi strukturnya sudah siap diganti dengan API nanti.
            </p>
        </section>

        <section class="mt-8 grid gap-4 lg:grid-cols-[minmax(0,1fr)_auto] lg:items-center">
            <div class="relative max-w-xl">
                <i data-lucide="search" class="absolute left-4 top-1/2 h-4.5 w-4.5 -translate-y-1/2 text-zinc-600"></i>
                <input id="queue-search"
                    class="w-full rounded-full border border-white/10 bg-black/40 py-3.5 pl-11 pr-4 text-sm outline-none transition focus:border-crimson"
                    type="search" placeholder="Cari nama klien atau nama proyek..." autocomplete="off" />
            </div>

            <div id="queue-summary" class="flex flex-wrap gap-3"></div>
        </section>

        <section class="mt-12 grid items-start gap-6 lg:grid-cols-3">
            <section>
                <div class="mb-5 flex items-center justify-between">
                    <h2 class="font-display text-xl font-bold">Developer</h2>
                    <span id="developer-count" class="text-sm text-zinc-600"></span>
                </div>
                <div id="developer-list" class="space-y-4"></div>
            </section>

            <section>
                <div class="mb-5 flex items-center justify-between">
                    <h2 class="font-display text-xl font-bold">
                        Antrian <span id="active-count" class="text-base text-zinc-600"></span>
                    </h2>
                </div>
                <div id="queue-list" class="space-y-3"></div>
            </section>

            <section>
                <div class="mb-5 flex items-center justify-between">
                    <h2 class="font-display text-xl font-bold">
                        Baru Selesai <span class="text-base text-zinc-600">(30 hari)</span>
                    </h2>
                </div>
                <div id="completed-list" class="space-y-3"></div>
            </section>
        </section>
    </main>
@endsection
