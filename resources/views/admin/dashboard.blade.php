@extends('layouts.admin')

@section('title', 'Dashboard')

@section('main')
    <div class="mb-6">
        <h1 class="font-display text-2xl font-extrabold">Ringkasan</h1>
        <p class="mt-1 text-sm text-zinc-400">Data aktual dari database aplikasi.</p>
    </div>

    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
        @foreach ([
            ['Proyek', $counts['projects'], 'admin.projects.index', 'briefcase-business'],
            ['Jasa', $counts['services'], 'admin.services.index', 'wrench'],
            ['Klien', $counts['clients'], 'admin.clients.index', 'users'],
            ['Ulasan', $counts['reviews'], 'admin.reviews.index', 'star'],
        ] as [$label, $value, $routeName, $icon])
            <a href="{{ route($routeName) }}" class="surface-card rounded-2xl p-6 transition hover:border-white/25">
                <div class="flex items-center justify-between text-sm text-zinc-400">
                    <span>{{ $label }}</span><i data-lucide="{{ $icon }}" class="h-5 w-5 text-crimson"></i>
                </div>
                <div class="mt-3 text-3xl font-extrabold">{{ number_format($value) }}</div>
            </a>
        @endforeach
    </div>

    <section class="surface-card mt-6 overflow-hidden rounded-2xl">
        <div class="flex items-center justify-between border-b border-white/10 p-6">
            <div><h2 class="font-semibold">Proyek terbaru</h2><p class="mt-1 text-sm text-zinc-400">Lima data terakhir.</p></div>
            <a href="{{ route('admin.projects.index') }}" class="text-sm text-crimson hover:underline">Lihat semua</a>
        </div>
        @include('admin.partials.projects-table', ['projects' => $latestProjects])
    </section>
@endsection
