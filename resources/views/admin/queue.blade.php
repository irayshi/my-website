@extends('layouts.admin')
@section('title', 'Antrian')
@section('main')
    <div class="mb-6">
        <h1 class="text-2xl font-extrabold">Antrian Proyek</h1>
        <p class="mt-1 text-sm text-zinc-400">Kelola waktu mulai dan selesai proyek eksternal.</p>
    </div>

    @if (session('success'))
        <div class="mb-5 rounded-xl border border-emerald-500/20 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-300">{{ session('success') }}</div>
    @endif
    @if ($errors->any())
        <div class="mb-5 rounded-xl border border-red-500/20 bg-red-500/10 px-4 py-3 text-sm text-red-300">{{ $errors->first() }}</div>
    @endif

    <section class="surface-card overflow-hidden rounded-2xl">
        @if ($projects->isEmpty())
            <p class="p-8 text-center text-sm text-zinc-400">Tidak ada proyek dalam antrian.</p>
        @else
            <div class="overflow-x-auto">
                <table class="w-full min-w-190 text-left text-sm">
                    <thead class="border-b border-white/10 bg-white/5 text-xs uppercase tracking-wider text-zinc-500">
                        <tr><th class="px-5 py-4">#</th><th class="px-5 py-4">Klien</th><th class="px-5 py-4">Proyek</th><th class="px-5 py-4">Status</th><th class="px-5 py-4">Waktu mulai</th><th class="px-5 py-4">Aksi</th></tr>
                    </thead>
                    <tbody class="divide-y divide-white/10">
                        @foreach ($projects as $project)
                            <tr>
                                <td class="px-5 py-4 text-crimson">#{{ $projects->firstItem() + $loop->index }}</td>
                                <td class="px-5 py-4">{{ $project->client?->name ?? '-' }}</td>
                                <td class="px-5 py-4 text-zinc-300">{{ $project->name }}</td>
                                <td class="px-5 py-4"><span class="rounded-full px-3 py-1 text-xs {{ $project->started_at ? 'bg-blue-500/10 text-blue-400' : 'bg-amber-500/10 text-amber-400' }}">{{ $project->started_at ? 'Diproses' : 'Menunggu' }}</span></td>
                                <td class="px-5 py-4 text-zinc-400">{{ $project->started_at?->format('d M Y H:i') ?? '-' }}</td>
                                <td class="px-5 py-4">
                                    @if (! $project->started_at)
                                        <form action="{{ route('admin.queue.start', $project) }}" method="POST">@csrf @method('PATCH')<button class="crimson-pill px-4 py-2 text-xs font-semibold" type="submit">Mulai Proses</button></form>
                                    @else
                                        <form action="{{ route('admin.queue.finish', $project) }}" method="POST">@csrf @method('PATCH')<button class="crimson-pill px-4 py-2 text-xs font-semibold" type="submit">Selesaikan</button></form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>
    <div class="mt-6">{{ $projects->links() }}</div>
@endsection
