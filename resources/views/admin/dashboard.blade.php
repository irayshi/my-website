@extends('layouts.admin')

@section('main')
    <main class="relative z-10 mx-auto max-w-300 px-5 py-8 sm:px-8">
        <header class="mb-8 flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="font-display text-2xl font-extrabold">Dashboard Admin</h1>
                <p class="mt-1 text-sm text-zinc-400">Masuk sebagai <span id="admin-email">admin@irayshi.com</span></p>
            </div>

            <div class="flex items-center gap-3">
                <a class="admin-outline-button" href="{{ route('home') }}">
                    <i data-lucide="arrow-left" class="h-4 w-4"></i>
                    Situs
                </a>
                <button id="logout-button" class="admin-outline-button hover:border-red-400 hover:text-red-400"
                    type="button">
                    <i data-lucide="log-out" class="h-4 w-4"></i>
                    Keluar
                </button>
            </div>
        </header>

        <nav id="admin-tabs" class="mb-8 flex gap-2 overflow-x-auto pb-1" aria-label="Navigasi dashboard"></nav>

        <section id="admin-content" aria-live="polite"></section>
    </main>
@endsection
