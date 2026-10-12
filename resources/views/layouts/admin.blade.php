<!doctype html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('title', 'Dashboard') - Admin Panel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>

  <body class="min-h-screen bg-zinc-950 text-zinc-100 antialiased">
    @php
      $menus = [
        ['admin.projects.index', 'admin.projects.*', 'Proyek', 'folder-kanban'],
      ];
    @endphp

    <div class="flex min-h-screen">
      <aside class="fixed inset-y-0 left-0 z-30 hidden w-64 border-r border-white/10 bg-zinc-950/95 lg:flex lg:flex-col">
        <div class="flex h-18 items-center border-b border-white/10 px-6">
          <a href="{{ route('admin.projects.index') }}" class="flex items-center gap-3">
            <span class="flex h-10 w-10 items-center justify-center rounded-lg bg-crimson text-sm font-black text-white">IR</span>
            <span>
              <span class="block text-base font-bold leading-5">Admin Panel</span>
              <span class="block text-xs text-zinc-500">Irayshi Dashboard</span>
            </span>
          </a>
        </div>

        <nav class="flex-1 space-y-1 px-4 py-5" aria-label="Navigasi admin">
          @foreach ($menus as [$routeName, $activePattern, $label, $icon])
            <a
              href="{{ route($routeName) }}"
              class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition {{ request()->routeIs($activePattern) ? 'bg-crimson text-white shadow-lg shadow-crimson/20' : 'text-zinc-400 hover:bg-white/5 hover:text-white' }}"
            >
              <i data-lucide="{{ $icon }}" class="h-4 w-4"></i>
              <span>{{ $label }}</span>
            </a>
          @endforeach
        </nav>

        <div class="border-t border-white/10 p-4">
          <a href="{{ route('home') }}" class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium text-zinc-400 transition hover:bg-white/5 hover:text-white">
            <i data-lucide="external-link" class="h-4 w-4"></i>
            <span>Lihat Situs</span>
          </a>
          <form action="{{ route('logout') }}" method="POST" class="mt-1">
            @csrf
            <button type="submit" class="flex w-full items-center gap-3 rounded-lg px-3 py-2.5 text-left text-sm font-medium text-zinc-400 transition hover:bg-white/5 hover:text-white">
              <i data-lucide="log-out" class="h-4 w-4"></i>
              <span>Keluar</span>
            </button>
          </form>
        </div>
      </aside>

      <div class="flex min-w-0 flex-1 flex-col lg:pl-64">
        <header class="sticky top-0 z-20 border-b border-white/10 bg-zinc-950/85 backdrop-blur">
          <div class="flex min-h-18 flex-col gap-4 px-4 py-4 sm:px-6 lg:flex-row lg:items-center lg:justify-between lg:px-8">
            <div>
              <p class="text-xs font-semibold uppercase tracking-[0.22em] text-crimson">Admin</p>
              <h1 class="mt-1 text-xl font-bold text-white">@yield('title', 'Dashboard')</h1>
            </div>

            <div class="flex items-center justify-between gap-3">
              <nav class="flex gap-2 overflow-x-auto lg:hidden" aria-label="Navigasi admin mobile">
                @foreach ($menus as [$routeName, $activePattern, $label, $icon])
                  <a
                    href="{{ route($routeName) }}"
                    class="inline-flex shrink-0 items-center gap-2 rounded-lg px-3 py-2 text-sm font-medium transition {{ request()->routeIs($activePattern) ? 'bg-crimson text-white' : 'bg-white/5 text-zinc-300 hover:bg-white/10 hover:text-white' }}"
                  >
                    <i data-lucide="{{ $icon }}" class="h-4 w-4"></i>
                    {{ $label }}
                  </a>
                @endforeach
              </nav>

              <div class="hidden items-center gap-3 sm:flex">
                <div class="text-right">
                  <p class="text-sm font-semibold text-white">{{ auth()->user()->name }}</p>
                  <p class="text-xs text-zinc-500">Administrator</p>
                </div>
                <div class="flex h-10 w-10 items-center justify-center rounded-lg border border-white/10 bg-white/5 text-sm font-bold text-white">
                  {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
              </div>
            </div>
          </div>
        </header>

        <main class="flex-1 px-4 py-6 sm:px-6 lg:px-8">
          <div class="mx-auto w-full max-w-7xl">
            @yield('main')
          </div>
        </main>
      </div>
    </div>

    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', () => window.lucide?.createIcons());
    </script>
  </body>
</html>
