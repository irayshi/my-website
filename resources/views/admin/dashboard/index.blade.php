@extends('layouts.admin')

@section('title', 'Dashboard')

@section('main')
    @php
        $summary = [
            ['Kunjungan hari ini', '486', '+8,2%', 'users', 'vs. kemarin'],
            ['Klik kontak', '73', '+5,7%', 'mouse-pointer-click', '15% conversion'],
            ['Rasio konversi', '15%', '+1,4%', 'percent', 'vs. 7 hari lalu'],
        ];
        $weeklyVisits = [
            ['label' => 'Rab', 'date' => '3 Sep', 'value' => 286],
            ['label' => 'Kam', 'date' => '4 Sep', 'value' => 342],
            ['label' => 'Jum', 'date' => '5 Sep', 'value' => 318],
            ['label' => 'Sab', 'date' => '6 Sep', 'value' => 425],
            ['label' => 'Min', 'date' => '7 Sep', 'value' => 391],
            ['label' => 'Sen', 'date' => '8 Sep', 'value' => 472],
            ['label' => 'Sel', 'date' => '9 Sep', 'value' => 486],
        ];
        $hourlyTraffic = [
            ['label' => '00', 'value' => 15], ['label' => '02', 'value' => 10],
            ['label' => '04', 'value' => 8], ['label' => '06', 'value' => 21],
            ['label' => '08', 'value' => 49], ['label' => '10', 'value' => 72],
            ['label' => '12', 'value' => 63], ['label' => '14', 'value' => 91],
            ['label' => '16', 'value' => 84], ['label' => '18', 'value' => 68],
            ['label' => '20', 'value' => 43], ['label' => '22', 'value' => 27],
        ];
        $popularPages = [
            ['name' => 'Beranda', 'path' => '/', 'views' => 8124, 'share' => 100],
            ['name' => 'Portofolio', 'path' => '/#projects', 'views' => 5368, 'share' => 66],
            ['name' => 'Layanan', 'path' => '/#services', 'views' => 3746, 'share' => 46],
            ['name' => 'Tentang', 'path' => '/#about', 'views' => 2185, 'share' => 27],
            ['name' => 'Kontak', 'path' => '/#contact', 'views' => 1452, 'share' => 18],
        ];
        $trafficSources = [
            ['name' => 'Google', 'type' => 'Organic Search', 'visits' => 10953, 'share' => 44, 'color' => '#dc143c'],
            ['name' => 'Direct', 'type' => 'Langsung', 'visits' => 6970, 'share' => 28, 'color' => '#fb7185'],
            ['name' => 'Instagram', 'type' => 'Social', 'visits' => 4481, 'share' => 18, 'color' => '#fda4af'],
            ['name' => 'LinkedIn', 'type' => 'Social', 'visits' => 1494, 'share' => 6, 'color' => '#fecdd3'],
            ['name' => 'Lainnya', 'type' => 'Referral', 'visits' => 994, 'share' => 4, 'color' => '#52525b'],
        ];
        $weeklyMax = max(array_column($weeklyVisits, 'value'));
        $hourlyMax = max(array_column($hourlyTraffic, 'value'));
        $linePoints = collect($weeklyVisits)->map(function ($item, $index) use ($weeklyMax, $weeklyVisits) {
            $x = 20 + ($index * (660 / (count($weeklyVisits) - 1)));
            $y = 190 - (($item['value'] / $weeklyMax) * 145);
            return round($x, 1).','.round($y, 1);
        })->implode(' ');
    @endphp

    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <p class="tagline">Analytics</p>
            <h1 class="font-display mt-2 text-2xl font-extrabold">Ringkasan kunjungan</h1>
            <p class="mt-1 text-sm text-zinc-400">Pantau performa website dan perilaku pengunjung.</p>
        </div>
        <button type="button" class="admin-outline-button w-fit">
            <i data-lucide="calendar-days" class="h-4 w-4"></i>7 hari terakhir
            <i data-lucide="chevron-down" class="h-4 w-4"></i>
        </button>
    </div>

    <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
        @foreach ($summary as [$label, $value, $change, $icon, $caption])
            <article class="surface-card rounded-2xl p-5 sm:p-6">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="text-sm text-zinc-400">{{ $label }}</p>
                        <p class="font-display mt-3 text-3xl font-extrabold tracking-tight">{{ $value }}</p>
                    </div>
                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-crimson/10 text-crimson"><i data-lucide="{{ $icon }}" class="h-5 w-5"></i></span>
                </div>
                <div class="mt-4 flex items-center gap-2 text-xs"><span class="font-semibold text-emerald-400">{{ $change }}</span><span class="text-zinc-500">{{ $caption }}</span></div>
            </article>
        @endforeach
    </div>

    <div class="mt-6 grid gap-6 xl:grid-cols-[1.45fr_1fr]">
        <article class="surface-card overflow-hidden rounded-2xl p-5 sm:p-6">
            <div class="flex items-start justify-between gap-4">
                <div><h2 class="font-semibold">Trafik kunjungan</h2><p class="mt-1 text-sm text-zinc-500">7 hari terakhir</p></div>
                <div class="text-right"><p class="font-display text-xl font-bold">2.720</p><p class="mt-1 text-xs font-medium text-emerald-400">+11,8%</p></div>
            </div>
            <div class="mt-6 overflow-x-auto pb-1">
                <div class="min-w-150">
                    <svg class="h-52 w-full overflow-visible" viewBox="0 0 700 210" role="img" aria-label="Grafik kunjungan tujuh hari terakhir">
                        <defs><linearGradient id="weekly-area" x1="0" x2="0" y1="0" y2="1"><stop offset="0%" stop-color="#dc143c" stop-opacity=".35"/><stop offset="100%" stop-color="#dc143c" stop-opacity="0"/></linearGradient></defs>
                        @foreach ([45, 95, 145, 190] as $y)
                            <line x1="20" x2="680" y1="{{ $y }}" y2="{{ $y }}" stroke="rgba(255,255,255,.07)" stroke-dasharray="4 5" />
                        @endforeach
                        <polygon points="20,190 {{ $linePoints }} 680,190" fill="url(#weekly-area)" />
                        <polyline points="{{ $linePoints }}" fill="none" stroke="#dc143c" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                        @foreach ($weeklyVisits as $index => $item)
                            @php $x = 20 + ($index * 110); $y = 190 - (($item['value'] / $weeklyMax) * 145); @endphp
                            <circle cx="{{ $x }}" cy="{{ $y }}" r="4" fill="#111114" stroke="#fb7185" stroke-width="3"><title>{{ $item['label'] }}, {{ $item['date'] }}: {{ number_format($item['value'], 0, ',', '.') }} kunjungan</title></circle>
                        @endforeach
                    </svg>
                    <div class="grid grid-cols-7 gap-2 px-1 text-center">
                        @foreach ($weeklyVisits as $item)
                            <div><p class="text-xs font-medium text-zinc-300">{{ $item['label'] }}</p><p class="mt-1 text-[10px] text-zinc-600">{{ $item['date'] }}</p></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </article>

        <article class="surface-card rounded-2xl p-5 sm:p-6">
            <div class="flex items-start justify-between gap-4">
                <div><h2 class="font-semibold">Trafik per jam</h2><p class="mt-1 text-sm text-zinc-500">Hari ini</p></div>
                <span class="rounded-full bg-white/5 px-3 py-1 text-xs text-zinc-400">Puncak 14:00</span>
            </div>
            <div class="mt-8 flex h-48 items-end gap-2 sm:gap-3" aria-label="Grafik trafik per jam hari ini">
                @foreach ($hourlyTraffic as $item)
                    <div class="group flex h-full min-w-0 flex-1 flex-col items-center justify-end gap-2">
                        <div class="relative flex w-full flex-1 items-end"><div class="w-full rounded-t-md bg-crimson/75 transition hover:bg-crimson" style="height: {{ max(7, ($item['value'] / $hourlyMax) * 100) }}%" title="{{ $item['label'] }}:00 — {{ $item['value'] }} kunjungan"></div></div>
                        <span class="text-[10px] text-zinc-600">{{ $item['label'] }}</span>
                    </div>
                @endforeach
            </div>
        </article>
    </div>

    <div class="mt-6 grid gap-6 xl:grid-cols-2">
        <article class="surface-card rounded-2xl p-5 sm:p-6">
            <div class="mb-5 flex items-center justify-between">
                <div><h2 class="font-semibold">Halaman populer</h2><p class="mt-1 text-sm text-zinc-500">Berdasarkan jumlah tayangan</p></div>
                <i data-lucide="file-chart-column" class="h-5 w-5 text-zinc-500"></i>
            </div>
            <div class="space-y-5">
                @foreach ($popularPages as $index => $page)
                    <div>
                        <div class="mb-2 flex items-center gap-3">
                            <span class="w-5 text-xs text-zinc-600">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                            <div class="min-w-0 flex-1"><p class="truncate text-sm font-medium">{{ $page['name'] }}</p><p class="mt-0.5 truncate font-mono text-[11px] text-zinc-600">{{ $page['path'] }}</p></div>
                            <p class="shrink-0 text-sm font-semibold">{{ number_format($page['views'], 0, ',', '.') }}</p>
                        </div>
                        <div class="ml-8 h-1 overflow-hidden rounded-full bg-white/5"><div class="h-full rounded-full bg-crimson" style="width: {{ $page['share'] }}%"></div></div>
                    </div>
                @endforeach
            </div>
        </article>

        <article class="surface-card rounded-2xl p-5 sm:p-6">
            <div class="mb-5 flex items-center justify-between">
                <div><h2 class="font-semibold">Sumber trafik</h2><p class="mt-1 text-sm text-zinc-500">Dari mana pengunjung datang</p></div>
                <i data-lucide="waypoints" class="h-5 w-5 text-zinc-500"></i>
            </div>
            <div class="mb-6 flex h-2 overflow-hidden rounded-full bg-white/5">
                @foreach ($trafficSources as $source)<span style="width: {{ $source['share'] }}%; background-color: {{ $source['color'] }}"></span>@endforeach
            </div>
            <div class="space-y-4">
                @foreach ($trafficSources as $source)
                    <div class="flex items-center gap-3">
                        <span class="h-2.5 w-2.5 shrink-0 rounded-full" style="background-color: {{ $source['color'] }}"></span>
                        <div class="min-w-0 flex-1"><p class="text-sm font-medium">{{ $source['name'] }}</p><p class="mt-0.5 text-xs text-zinc-600">{{ $source['type'] }}</p></div>
                        <p class="text-sm text-zinc-400">{{ number_format($source['visits'], 0, ',', '.') }}</p><p class="w-10 text-right text-sm font-semibold">{{ $source['share'] }}%</p>
                    </div>
                @endforeach
            </div>
        </article>
    </div>
@endsection
