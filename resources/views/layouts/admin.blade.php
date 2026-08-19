<!doctype html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Panel admin Irayshi untuk statistik, antrian, produk, jasa, dan portofolio." />
    <title>Dashboard Admin - Irayshi</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500;600&display=swap"
      rel="stylesheet"
    />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            fontFamily: {
              sans: ["Inter", "sans-serif"],
              display: ["Inter", "sans-serif"],
              mono: ["JetBrains Mono", "monospace"],
            },
            colors: {
              crimson: "var(--crimson)",
            },
          },
        },
      };
    </script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
  </head>

  <body class="min-h-screen bg-[#0d0d0f] text-white antialiased">
    <div class="grain"></div>

    @yield('main')

    <template id="empty-state-template">
      <div class="surface-card rounded-2xl p-8 text-center">
        <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-xl bg-crimson/10 text-crimson">
          <i data-lucide="inbox" class="h-6 w-6"></i>
        </div>
        <h2 class="mt-5 font-display text-xl font-bold"></h2>
        <p class="mx-auto mt-2 max-w-md text-sm leading-relaxed text-zinc-400"></p>
      </div>
    </template>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
  </body>
</html>
