@extends('layouts.site')
@section('main')
<main class="relative z-10 mx-auto max-w-350 px-5 pb-16 pt-28 sm:px-8">
    <a class="mb-8 inline-flex items-center gap-2 text-sm text-zinc-400 hover:text-white" href="{{ route('home') }}"><i data-lucide="arrow-left" class="h-4 w-4"></i> Kembali ke Beranda</a>
    <section class="max-w-3xl"><p class="tagline mb-4">Live Service Board</p><h1 class="font-display text-3xl font-extrabold sm:text-5xl">Antrian Layanan</h1><p class="mt-4 text-zinc-400">Pantau proyek yang sedang menunggu, diproses, dan baru selesai secara langsung.</p></section>
    <section class="mt-8 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
        <div class="relative w-full max-w-xl"><i data-lucide="search" class="absolute left-4 top-1/2 h-4 w-4 -translate-y-1/2 text-zinc-600"></i><input id="queue-search" class="w-full rounded-full border border-white/10 bg-black/40 py-3.5 pl-11 pr-4 text-sm outline-none focus:border-crimson" type="search" placeholder="Cari nama klien atau nama proyek..."></div>
        <div class="flex gap-3"><div class="surface-card rounded-full px-4 py-2 text-sm"><strong>{{ $activeProjects->count() }}</strong> <span class="text-zinc-500">Antrian aktif</span></div><div class="surface-card rounded-full px-4 py-2 text-sm"><strong>{{ $activeProjects->whereNull('started_at')->count() }}</strong> <span class="text-zinc-500">Menunggu</span></div></div>
    </section>
    <section class="mt-12 grid items-start gap-8 lg:grid-cols-2">
        <section><h2 class="mb-5 font-display text-xl font-bold">Antrian <span class="text-base text-zinc-600">({{ $activeProjects->count() }})</span></h2><div class="space-y-3">
            @forelse ($activeProjects as $project)
                <article class="surface-card queue-card rounded-2xl p-5" data-queue-item data-search="{{ Str::lower(($project->client?->name ?? '').' '.$project->name) }}"><div class="flex items-center gap-4"><div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-crimson/10 font-display font-bold text-crimson">#{{ $loop->iteration }}</div><div class="min-w-0 flex-1"><h3 class="truncate font-semibold">{{ $project->client?->name ?? '-' }}</h3><p class="truncate text-sm text-zinc-400">{{ $project->name }}</p></div><span class="shrink-0 rounded-full px-3 py-1.5 text-xs font-semibold {{ $project->started_at ? 'bg-blue-500/10 text-blue-400' : 'bg-amber-500/10 text-amber-400' }}">{{ $project->started_at ? 'Diproses' : 'Menunggu' }}</span></div></article>
            @empty <p class="surface-card rounded-2xl p-6 text-sm text-zinc-400">Belum ada proyek dalam antrian.</p> @endforelse
        </div></section>
        <section><h2 class="mb-5 font-display text-xl font-bold">Baru Selesai <span class="text-base text-zinc-600">(30 hari)</span></h2><div class="space-y-3">
            @forelse ($completedProjects as $project)
                <article class="surface-card queue-card rounded-2xl p-5" data-queue-item data-search="{{ Str::lower(($project->client?->name ?? '').' '.$project->name) }}"><div class="flex items-center gap-4"><div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-green-500/10 text-green-400"><i data-lucide="circle-check" class="h-5 w-5"></i></div><div class="min-w-0 flex-1"><h3 class="truncate font-semibold">{{ $project->client?->name ?? '-' }}</h3><p class="truncate text-sm text-zinc-400">{{ $project->name }}</p><p class="text-xs text-zinc-500">Selesai {{ $project->finished_at->diffForHumans() }}</p></div></div></article>
            @empty <p class="surface-card rounded-2xl p-6 text-sm text-zinc-400">Belum ada proyek selesai dalam 30 hari terakhir.</p> @endforelse
        </div></section>
    </section>
</main>
@endsection
