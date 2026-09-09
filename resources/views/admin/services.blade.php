@extends('layouts.admin')
@section('title', 'Jasa')
@section('main')
    <div class="mb-6">
        <h1 class="text-2xl font-extrabold">Jasa</h1>
        <p class="mt-1 text-sm text-zinc-400">Data paket layanan dari tabel services.</p>
    </div>
    <section class="surface-card overflow-hidden rounded-2xl">
        @if ($services->isEmpty())
            <p class="p-8 text-center text-sm text-zinc-400">Belum ada data jasa.</p>
        @else
            <div class="overflow-x-auto">
                <table class="w-full min-w-170 text-left text-sm">
                    <thead class="border-b border-white/10 bg-white/5 text-xs uppercase tracking-wider text-zinc-500">
                        <tr>
                            <th class="px-5 py-4">Nama</th>
                            <th class="px-5 py-4">Deskripsi</th>
                            <th class="px-5 py-4">Harga</th>
                            <th class="px-5 py-4">Diperbarui</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/10">
                        @foreach ($services as $service)
                            <tr class="hover:bg-white/5">
                                <td class="px-5 py-4 font-medium">{{ $service->name }}</td>
                                <td class="max-w-md px-5 py-4 text-zinc-300">{{ Str::limit($service->description, 90) }}
                                </td>
                                <td class="px-5 py-4 text-zinc-300">Rp {{ number_format($service->price, 0, ',', '.') }}
                                </td>
                                <td class="px-5 py-4 text-zinc-400">{{ $service->updated_at?->format('d M Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>
    <div class="mt-6">{{ $services->links() }}</div>
@endsection
