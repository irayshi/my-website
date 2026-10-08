<!doctype html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Panel admin Irayshi untuk statistik, antrian, produk, jasa, dan portofolio." />
    <title>@yield('title', 'Dashboard') - Admin Irayshi</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500;600&display=swap"
      rel="stylesheet"
    />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>

  <body class="min-h-screen bg-[#0d0d0f] text-white antialiased">
    <div class="grain"></div>

    <div class="relative z-10 mx-auto max-w-350 px-5 py-8 sm:px-8">
      <header class="mb-8 flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">
        <div>
          <a href="{{ route('admin.dashboard') }}" class="font-display text-2xl font-extrabold">Admin Irayshi</a>
          <p class="mt-1 text-sm text-zinc-400">Kelola data website langsung dari database.</p>
        </div>
        <div class="flex items-center gap-2">
          <span class="hidden text-sm text-zinc-400 md:inline">{{ auth()->user()->name }}</span>
          <a class="admin-outline-button" href="{{ route('home') }}">
            <i data-lucide="arrow-left" class="h-4 w-4"></i> Situs
          </a>
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="admin-outline-button" type="submit">
              <i data-lucide="log-out" class="h-4 w-4"></i> Keluar
            </button>
          </form>
        </div>
      </header>

      <nav class="mb-8 flex gap-2 overflow-x-auto pb-1" aria-label="Navigasi admin">
        @foreach ([
          ['admin.dashboard', 'admin.dashboard', 'Dashboard', 'layout-dashboard'],
          ['admin.projects.index', 'admin.projects.*', 'Proyek', 'briefcase-business'],
          ['admin.queue.index', 'admin.queue.*', 'Antrian', 'list-ordered'],
          ['admin.services.index', 'admin.services.*', 'Jasa', 'wrench'],
          ['admin.clients.index', 'admin.clients.*', 'Klien', 'users'],
          ['admin.reviews.index', 'admin.reviews.*', 'Ulasan', 'star'],
        ] as [$routeName, $activePattern, $label, $icon])
          <a href="{{ route($routeName) }}" class="admin-tab {{ request()->routeIs($activePattern) ? 'active' : '' }}">
            <i data-lucide="{{ $icon }}" class="h-4 w-4"></i>{{ $label }}
          </a>
        @endforeach
      </nav>

      <main>@yield('main')</main>
    </div>

    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
    <script>document.addEventListener('DOMContentLoaded', () => window.lucide?.createIcons());</script>
  </body>
</html>
