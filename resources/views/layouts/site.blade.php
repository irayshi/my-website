<!doctype html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description"
        content="Irayshi - fullstack engineer dan desainer produk untuk aplikasi web, produk digital, dan UI/UX." />
    <title>Irayshi - Fullstack Engineer & Product Designer</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Playfair+Display:ital@1&display=swap"
        rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#0d0d0f] text-white antialiased">
    <div class="relative overflow-hidden">
        <div class="grain"></div>

        <header id="site-header" class="fixed inset-x-0 top-0 z-50 px-5 py-4 transition-all duration-300 sm:px-8">
            <div class="mx-auto flex max-w-350 items-center justify-between">
                <a href="#hero" class="font-display flex items-center gap-1 text-xl font-extrabold tracking-tight">
                    irayshi<span class="text-crimson">.</span>com
                </a>

                <nav class="hidden items-center gap-9 lg:flex" aria-label="Navigasi utama">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                        href="{{ route('home') }}">@lang('nav.home')</a>
                    <a class="nav-link {{ request()->routeIs('projects') ? 'active' : '' }}"
                        href="{{ route('projects') }}">@lang('nav.projects')</a>
                    <a class="nav-link {{ request()->routeIs('queue') ? 'active' : '' }}"
                        href="{{ route('queue') }}">@lang('nav.queue')</a>
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}"
                        href="{{ route('about') }}">@lang('nav.aboutme')</a>
                </nav>

                <div class="flex items-center gap-3">
                    <div class="flex items-center gap-2 text-sm">
                        <a href="{{ route('locale', 'id') }}"
                            class="{{ app()->getLocale() === 'id' ? 'text-white' : 'text-zinc-400' }}">
                            ID
                        </a>
                        <span class="text-zinc-600">/</span>
                        <a href="{{ route('locale', 'en') }}"
                            class="{{ app()->getLocale() === 'en' ? 'text-white' : 'text-zinc-400' }}">
                            EN
                        </a>
                    </div>

                    <a class="crimson-pill hidden px-5 py-2.5 text-sm font-semibold sm:inline-flex" href="#contact">
                        @lang('nav.contactme')
                    </a>
                    <button id="menu-toggle" class="text-white lg:hidden" type="button" aria-label="Buka menu">
                        <i data-lucide="menu" class="h-6 w-6"></i>
                    </button>
                </div>
            </div>

            <nav id="mobile-menu"
                class="mx-auto mt-4 hidden max-w-350 rounded-2xl border border-white/10 bg-[#141418]/95 p-4 backdrop-blur lg:hidden">
                <a class="mobile-link {{ request()->routeIs('home') ? 'active' : '' }}"
                    href="{{ route('home') }}">Home</a>
                <a class="mobile-link {{ request()->routeIs('projects') ? 'active' : '' }}"
                    href="{{ route('projects') }}">Projects</a>
                <a class="mobile-link {{ request()->routeIs('queue') ? 'active' : '' }}"
                    href="{{ route('queue') }}">Queue</a>
                <a class="mobile-link {{ request()->routeIs('about') ? 'active' : '' }}"
                    href="{{ route('about') }}">About Me</a>
            </nav>
        </header>

        <main>
            @yield('main')
        </main>

        <footer id="contact" class="relative z-10 mx-auto max-w-350 px-5 pb-10 pt-28 sm:px-8">
            <div class="surface-card relative overflow-hidden rounded-3xl p-10 text-center sm:p-16 reveal">
                <div
                    class="absolute -top-20 left-1/2 h-100 w-100 -translate-x-1/2 rounded-full bg-crimson/25 blur-[130px]">
                </div>
                <div class="relative z-10">
                    <h2
                        class="font-display mx-auto max-w-3xl text-3xl font-extrabold leading-[1.05] tracking-tight sm:text-5xl lg:text-6xl">
                        Punya ide? <span class="font-editorial font-normal italic text-crimson">Wujudkan</span> bersama
                        saya.
                    </h2>
                    <p class="mx-auto mt-6 max-w-lg text-zinc-400">Ceritakan kebutuhanmu lewat WhatsApp atau email.
                        Saya biasanya membalas dalam kurang dari 24 jam.</p>
                    <div class="mt-10 flex flex-wrap items-center justify-center gap-4">
                        <a class="crimson-pill inline-flex items-center gap-2 px-7 py-3.5 font-semibold"
                            href="{{ $whatsapp }}" target="_blank" rel="noreferrer">
                            <i data-lucide="message-circle" class="h-5 w-5"></i> Chat via WhatsApp
                        </a>
                        <a class="inline-flex items-center gap-2 rounded-full border border-white/15 px-7 py-3.5 font-semibold transition-all hover:border-white/40 hover:bg-white/5"
                            href="{{ $email }}" target="blank">
                            <i data-lucide="mail" class="h-5 w-5"></i> Kirim Email
                        </a>
                    </div>
                </div>
            </div>

            <div
                class="mt-16 flex flex-col items-center justify-between gap-6 border-t border-white/10 pt-10 sm:flex-row">
                @if (!empty($logo))
                    <img class="h-9 w-auto" src="{{ $logo }}" alt="irayshi.com">
                @else
                    <div class="font-display flex items-center gap-1 text-xl font-extrabold tracking-tight">irayshi<span
                            class="text-crimson">.</span>com</div>
                @endif
                <div class="flex items-center gap-6 text-sm text-zinc-400">
                    <a class="flex items-center gap-1 transition hover:text-white" href="{{ $github }}"
                        target="_blank" rel="noreferrer">GitHub <i data-lucide="arrow-up-right"
                            class="h-3.5 w-3.5"></i></a>
                    <a class="flex items-center gap-1 transition hover:text-white" href="{{ $instagram }}"
                        target="_blank" rel="noreferrer">Instagram <i data-lucide="arrow-up-right"
                            class="h-3.5 w-3.5"></i></a>
                    <a class="flex items-center gap-1 transition hover:text-white" href="{{ $linkedin }}"
                        target="_blank" rel="noreferrer">LinkedIn <i data-lucide="arrow-up-right"
                            class="h-3.5 w-3.5"></i></a>
                </div>
                <div class="text-xs text-zinc-600">&copy; 2026 Irayshi. Semua hak dilindungi.</div>
            </div>
        </footer>
    </div>

    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
</body>

</html>
