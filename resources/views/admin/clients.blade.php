@extends('layouts.admin')
@section('title', 'Klien')
@section('main')
    <div class="mb-6"><h1 class="text-2xl font-extrabold">Klien</h1><p class="mt-1 text-sm text-zinc-400">Klien dan jumlah data yang terhubung.</p></div>
    <section class="surface-card overflow-hidden rounded-2xl">
        @if ($clients->isEmpty()) <p class="p-8 text-center text-sm text-zinc-400">Belum ada data klien.</p>
        @else <div class="overflow-x-auto"><table class="w-full min-w-150 text-left text-sm">
            <thead class="border-b border-white/10 bg-white/5 text-xs uppercase tracking-wider text-zinc-500"><tr><th class="px-5 py-4">Nama</th><th class="px-5 py-4">Proyek</th><th class="px-5 py-4">Ulasan</th><th class="px-5 py-4">Terdaftar</th></tr></thead>
            <tbody class="divide-y divide-white/10">@foreach ($clients as $client)<tr class="hover:bg-white/5"><td class="px-5 py-4 font-medium">{{ $client->name }}</td><td class="px-5 py-4 text-zinc-300">{{ $client->projects_count }}</td><td class="px-5 py-4 text-zinc-300">{{ $client->reviews_count }}</td><td class="px-5 py-4 text-zinc-400">{{ $client->created_at?->format('d M Y') }}</td></tr>@endforeach</tbody>
        </table></div>@endif
    </section><div class="mt-6">{{ $clients->links() }}</div>
@endsection
