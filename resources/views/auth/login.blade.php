<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Irayshi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#0d0d0f] text-white antialiased">
    <div class="grain"></div>
    <main class="relative z-10 flex min-h-screen items-center justify-center px-5 py-10">
        <section class="surface-card w-full max-w-md rounded-3xl p-6 sm:p-8">
            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-crimson">Admin Irayshi</p>
            <h1 class="mt-2 text-2xl font-extrabold">Masuk ke dashboard</h1>
            <p class="mt-2 text-sm text-zinc-400">Gunakan akun administrator yang dibuat melalui seeder.</p>

            <form action="{{ route('login.store') }}" method="POST" class="mt-7 space-y-5">
                @csrf
                <div>
                    <label class="project-label" for="email">Email</label>
                    <input class="project-input" id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" autofocus required>
                    @error('email') <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="project-label" for="password">Kata sandi</label>
                    <input class="project-input" id="password" name="password" type="password" autocomplete="current-password" required>
                    @error('password') <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p> @enderror
                </div>
                <label class="flex items-center gap-2 text-sm text-zinc-400">
                    <input class="rounded border-white/20 bg-white/5 text-crimson focus:ring-crimson" name="remember" type="checkbox" value="1">
                    Ingat saya
                </label>
                <button class="crimson-pill inline-flex w-full items-center justify-center px-5 py-3 text-sm font-semibold" type="submit">Masuk</button>
            </form>
        </section>
    </main>
</body>
</html>
