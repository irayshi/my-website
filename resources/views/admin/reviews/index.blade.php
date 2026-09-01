@extends('layouts.admin')
@section('title', 'Ulasan')
@section('main')
    <div class="mb-6"><h1 class="text-2xl font-extrabold">Ulasan</h1><p class="mt-1 text-sm text-zinc-400">Ulasan klien untuk setiap proyek.</p></div>
    <section class="surface-card overflow-hidden rounded-2xl">
        @if ($reviews->isEmpty()) <p class="p-8 text-center text-sm text-zinc-400">Belum ada data ulasan.</p>
        @else <div class="overflow-x-auto"><table class="w-full min-w-190 text-left text-sm">
            <thead class="border-b border-white/10 bg-white/5 text-xs uppercase tracking-wider text-zinc-500"><tr><th class="px-5 py-4">Klien</th><th class="px-5 py-4">Proyek</th><th class="px-5 py-4">Rating</th><th class="px-5 py-4">Pesan</th><th class="px-5 py-4">Tanggal</th></tr></thead>
            <tbody class="divide-y divide-white/10">@foreach ($reviews as $review)<tr class="hover:bg-white/5"><td class="px-5 py-4 font-medium">{{ $review->client?->name ?? '-' }}</td><td class="px-5 py-4 text-zinc-300">{{ $review->project?->name ?? '-' }}</td><td class="px-5 py-4 text-amber-400">{{ $review->rating ? $review->rating.'/5' : 'Belum dinilai' }}</td><td class="max-w-md px-5 py-4 text-zinc-300">{{ Str::limit($review->message ?? '-', 90) }}</td><td class="px-5 py-4 text-zinc-400">{{ $review->submitted_at?->format('d M Y') ?? '-' }}</td></tr>@endforeach</tbody>
        </table></div>@endif
    </section><div class="mt-6">{{ $reviews->links() }}</div>
@endsection
