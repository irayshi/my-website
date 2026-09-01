@if ($projects->isEmpty())
    <p class="p-8 text-center text-sm text-zinc-400">Belum ada data proyek.</p>
@else
    <div class="overflow-x-auto">
        <table class="w-full min-w-190 text-left text-sm">
            <thead class="border-b border-white/10 bg-white/5 text-xs uppercase tracking-wider text-zinc-500">
                <tr><th class="px-5 py-4">Nama</th><th class="px-5 py-4">Klien</th><th class="px-5 py-4">Tech stack</th><th class="px-5 py-4">Status</th><th class="px-5 py-4">Dibuat</th></tr>
            </thead>
            <tbody class="divide-y divide-white/10">
                @foreach ($projects as $project)
                    <tr class="hover:bg-white/5">
                        <td class="px-5 py-4 font-medium text-white">{{ $project->name }}</td>
                        <td class="px-5 py-4 text-zinc-300">{{ $project->client?->name ?? 'Internal' }}</td>
                        <td class="px-5 py-4 text-zinc-300">{{ $project->tech_stack }}</td>
                        <td class="px-5 py-4"><span class="rounded-full bg-white/10 px-3 py-1 text-xs">{{ $project->is_visible ? 'Tampil' : 'Draft' }}</span></td>
                        <td class="px-5 py-4 text-zinc-400">{{ $project->created_at?->format('d M Y') ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
