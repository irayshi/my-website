@extends('layouts.admin')
@section('title', 'Proyek')
@section('main')
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <h1 class="text-2xl font-extrabold">Proyek & Portofolio</h1>
            <p class="mt-1 text-sm text-zinc-400">Data dari tabel projects beserta relasi klien.</p>
        </div>
        <button
            class="crimson-pill inline-flex w-fit items-center gap-2 px-5 py-2.5 text-sm font-semibold"
            type="button"
            data-open-project-modal
        >
            <i data-lucide="plus" class="h-4 w-4"></i>
            Tambah Proyek
        </button>
    </div>
    <section class="surface-card overflow-hidden rounded-2xl">
        @if ($projects->isEmpty())
            <p class="p-8 text-center text-sm text-zinc-400">Belum ada data proyek.</p>
        @else
            <div class="overflow-x-auto">
                <table class="w-full min-w-190 text-left text-sm">
                    <thead class="border-b border-white/10 bg-white/5 text-xs uppercase tracking-wider text-zinc-500">
                        <tr>
                            <th class="px-5 py-4">Nama</th>
                            <th class="px-5 py-4">Klien</th>
                            <th class="px-5 py-4">Tech stack</th>
                            <th class="px-5 py-4">Status</th>
                            <th class="px-5 py-4">Dibuat</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/10">
                        @foreach ($projects as $project)
                            <tr class="hover:bg-white/5">
                                <td class="px-5 py-4 font-medium text-white">{{ $project->name }}</td>
                                <td class="px-5 py-4 text-zinc-300">{{ $project->client?->name ?? 'Internal' }}</td>
                                <td class="px-5 py-4 text-zinc-300">{{ $project->tech_stack }}</td>
                                <td class="px-5 py-4"><span
                                        class="rounded-full bg-white/10 px-3 py-1 text-xs">{{ $project->is_visible ? 'Tampil' : 'Draft' }}</span>
                                </td>
                                <td class="px-5 py-4 text-zinc-400">{{ $project->created_at?->format('d M Y') ?? '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>
    <div class="mt-6">{{ $projects->links() }}</div>

    <dialog
        id="project-modal"
        class="project-modal m-auto w-[calc(100%-2rem)] max-w-3xl rounded-3xl border border-white/10 bg-[#151519] p-0 text-white shadow-2xl"
        aria-labelledby="project-modal-title"
    >
        <form id="project-form" class="project-modal-form" enctype="multipart/form-data">
            <header class="flex items-start justify-between gap-4 border-b border-white/10 px-5 py-5 sm:px-7">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-crimson">Proyek baru</p>
                    <h2 id="project-modal-title" class="mt-1 text-xl font-bold">Tambah Proyek</h2>
                    <p class="mt-1 text-sm text-zinc-400">Lengkapi informasi yang akan ditampilkan di portofolio.</p>
                </div>
                <button class="admin-icon-button shrink-0" type="button" data-close-project-modal aria-label="Tutup modal">
                    <i data-lucide="x" class="h-4 w-4"></i>
                </button>
            </header>

            <div class="project-modal-content px-5 py-6 sm:px-7">
                <div class="grid gap-5 sm:grid-cols-2">
                    <div class="sm:col-span-2">
                        <label class="project-label" for="project-name">Nama proyek</label>
                        <input class="project-input" id="project-name" name="name" type="text" placeholder="Contoh: Website Company Profile" required />
                    </div>

                    <fieldset class="sm:col-span-2">
                        <legend class="project-label">Jenis proyek</legend>
                        <div class="grid grid-cols-2 gap-2 rounded-xl bg-white/5 p-1" data-project-type>
                            <label class="project-type-option">
                                <input class="peer sr-only" type="radio" name="project_type" value="external" checked />
                                <span class="flex items-center justify-center gap-2 rounded-lg px-4 py-2.5 text-sm font-semibold text-zinc-400 transition peer-checked:bg-white/10 peer-checked:text-white">
                                    <i data-lucide="users" class="h-4 w-4"></i> External
                                </span>
                            </label>
                            <label class="project-type-option">
                                <input class="peer sr-only" type="radio" name="project_type" value="internal" />
                                <span class="flex items-center justify-center gap-2 rounded-lg px-4 py-2.5 text-sm font-semibold text-zinc-400 transition peer-checked:bg-white/10 peer-checked:text-white">
                                    <i data-lucide="building-2" class="h-4 w-4"></i> Internal
                                </span>
                            </label>
                        </div>
                    </fieldset>

                    <div class="sm:col-span-2" data-client-field>
                        <label class="project-label" for="project-client">Nama klien</label>
                        <input class="project-input" id="project-client" name="client_name" type="text" placeholder="Contoh: PT Nusantara Digital" required />
                    </div>

                    <div class="sm:col-span-2">
                        <label class="project-label" for="project-description">Deskripsi</label>
                        <textarea class="project-input min-h-28 resize-y" id="project-description" name="description" placeholder="Ceritakan tujuan, solusi, dan hasil proyek..." required></textarea>
                    </div>

                    <div class="sm:col-span-2">
                        <label class="project-label" for="project-tech-stack">Tech stack</label>
                        <input class="project-input" id="project-tech-stack" name="tech_stack" type="text" placeholder="Laravel, Tailwind CSS, Alpine.js" required />
                        <p class="mt-1.5 text-xs text-zinc-500">Pisahkan setiap teknologi dengan koma.</p>
                    </div>

                    <div>
                        <label class="project-label" for="project-start-date">Tanggal mulai</label>
                        <input class="project-input scheme-dark" id="project-start-date" name="started_at" type="date" />
                    </div>
                    <div>
                        <label class="project-label" for="project-end-date">Tanggal selesai</label>
                        <input class="project-input scheme-dark" id="project-end-date" name="finished_at" type="date" />
                    </div>

                    <div class="sm:col-span-2">
                        <label class="project-label" for="project-demo-link">Link demo</label>
                        <div class="relative">
                            <i data-lucide="link-2" class="pointer-events-none absolute left-3.5 top-1/2 h-4 w-4 -translate-y-1/2 text-zinc-500"></i>
                            <input class="project-input pl-10" id="project-demo-link" name="link_demo" type="url" placeholder="https://contoh-proyek.com" />
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <span class="project-label">Gambar proyek</span>
                        <label class="project-dropzone" for="project-images" data-image-dropzone>
                            <input class="sr-only" id="project-images" name="images[]" type="file" accept="image/*" multiple />
                            <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-crimson/10 text-crimson">
                                <i data-lucide="image-plus" class="h-5 w-5"></i>
                            </span>
                            <span>
                                <strong class="block text-sm font-semibold text-white">Pilih atau tarik beberapa gambar</strong>
                                <span class="mt-1 block text-xs text-zinc-500">PNG, JPG, atau WEBP. Setelah dipilih, tentukan satu gambar sebagai cover.</span>
                            </span>
                        </label>
                        <div class="mt-3 hidden grid-cols-2 gap-3 sm:grid-cols-3" data-image-preview aria-live="polite"></div>
                    </div>
                </div>
            </div>

            <footer class="flex flex-col-reverse gap-3 border-t border-white/10 px-5 py-4 sm:flex-row sm:justify-end sm:px-7">
                <button class="admin-outline-button justify-center" type="button" data-close-project-modal>Batal</button>
                <button class="crimson-pill inline-flex items-center justify-center gap-2 px-5 py-2.5 text-sm font-semibold" type="submit">
                    <i data-lucide="save" class="h-4 w-4"></i>
                    Simpan Proyek
                </button>
            </footer>
        </form>
    </dialog>
@endsection
