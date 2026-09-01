@extends('layouts.admin')
@section('title', 'Proyek')
@section('main')
    <div class="mb-6"><h1 class="text-2xl font-extrabold">Proyek & Portofolio</h1><p class="mt-1 text-sm text-zinc-400">Data dari tabel projects beserta relasi klien.</p></div>
    <section class="surface-card overflow-hidden rounded-2xl">
        @include('admin.partials.projects-table', ['projects' => $projects])
    </section>
    <div class="mt-6">{{ $projects->links() }}</div>
@endsection
