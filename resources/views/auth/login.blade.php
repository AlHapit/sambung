<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-white">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('Login') }} - {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-white font-['Inter'] text-black antialiased">
    <div class="flex min-h-screen w-full">
        {{-- Left Decorative Sidebar --}}
        <aside class="relative hidden w-[260px] shrink-0 overflow-hidden bg-[#1a532a] text-white lg:block xl:w-[300px]" aria-hidden="true">
            {{-- Chevron layer 1 (outer light green) --}}
            <div
                class="absolute inset-y-0 left-0 w-full bg-[#197733]"
                style="clip-path: polygon(0 0, 61.4% 0, 0 41.3%);"
            ></div>

            {{-- Chevron layer 2 (middle green chevron) --}}
            <div
                class="absolute inset-y-0 left-0 w-full bg-[#14682c]"
                style="clip-path: polygon(61.4% 0, 96.8% 0, 13.2% 56.1%, 85.4% 100%, 0 100%, 0 41.3%);"
            ></div>

            {{-- Navigation Tabs: Login (active pill protruding into white content) & Signin --}}
            <nav class="absolute top-[35%] right-0 z-10 flex flex-col items-end" aria-label="{{ __('Authentication Navigation') }}">
                <div class="relative flex h-[48px] w-[140px] items-center justify-center rounded-l-[28px] bg-white text-[17px] font-semibold text-black shadow-sm">
                    <span class="translate-x-1">{{ __('Login') }}</span>
                </div>

                <a
                    href="{{ route('register') }}"
                    class="mr-9 mt-6 text-[17px] font-medium text-white/95 transition-colors hover:text-white"
                >
                    {{ __('Signin') }}
                </a>
            </nav>
        </aside>

        {{-- Right Form Area --}}
        <main class="flex flex-1 items-center justify-center px-6 py-10 sm:px-12">
            <div class="w-full max-w-[520px]">
                {{-- Logo --}}
                <div class="flex justify-center">
                    <a href="/" class="inline-block focus:outline-none focus-visible:ring-2 focus-visible:ring-[#1a532a] focus-visible:ring-offset-2 rounded-lg" aria-label="{{ config('app.name') }}">
                        <img
                            src="{{ asset('images/auth/sambung.png') }}"
                            alt="{{ config('app.name') }}"
                            class="h-[110px] w-auto object-contain sm:h-[120px]"
                        >
                    </a>
                </div>

                {{-- Header --}}
                <header class="mt-8 text-center sm:mt-10">
                    <h1 class="text-[28px] font-bold tracking-tight text-black sm:text-[32px]">
                        {{ __('Selamat Datang Kembali') }}
                    </h1>
                    <p class="mt-2 text-[14px] text-[#4a4a4a] sm:text-[15px]">
                        {{ __('Masuk untuk melanjutkan ke akun anda') }}
                    </p>
                </header>

                {{-- Alert for Google OAuth error --}}
                @if ($errors?->has('google'))
                    <div role="alert" class="mt-6 rounded-xl border border-red-200 bg-red-50 p-3.5 text-sm text-red-700">
                        {{ $errors->first('google') }}
                    </div>
                @endif

                {{-- Login Form --}}
                <form method="POST" action="{{ route('login.store') }}" class="mt-8 sm:mt-10">
                    @csrf

                    {{-- Email Input --}}
                    <div>
                        <label for="email" class="sr-only">{{ __('Email') }}</label>
                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email') }}"
                            placeholder="{{ __('Email') }}"
                            required
                            autofocus
                            autocomplete="email"
                            class="h-[64px] w-full rounded-[18px] border border-[#1a532a] bg-white px-6 text-[16px] text-black placeholder:text-[#1a1a1a] focus:border-[#1a532a] focus:outline-none focus:ring-2 focus:ring-[#1a532a]/30 @error('email') border-red-500 ring-1 ring-red-500 @enderror"
                        >
                        @error('email')
                            <p class="mt-1.5 pl-3 text-xs text-red-600 sm:text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Password Input --}}
                    <div class="mt-5">
                        <label for="password" class="sr-only">{{ __('Password') }}</label>
                        <input
                            id="password"
                            name="password"
                            type="password"
                            placeholder="{{ __('Password') }}"
                            required
                            autocomplete="current-password"
                            class="h-[64px] w-full rounded-[18px] border border-[#1a532a] bg-white px-6 text-[16px] text-black placeholder:text-[#1a1a1a] focus:border-[#1a532a] focus:outline-none focus:ring-2 focus:ring-[#1a532a]/30 @error('password') border-red-500 ring-1 ring-red-500 @enderror"
                        >
                        @error('password')
                            <p class="mt-1.5 pl-3 text-xs text-red-600 sm:text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Remember Me & Forgot Password --}}
                    <div class="mt-5 flex items-center justify-between px-1 text-[14px] sm:text-[15px]">
                        <label class="flex cursor-pointer items-center gap-2.5 text-black select-none">
                            <input
                                name="remember"
                                type="checkbox"
                                value="1"
                                {{ old('remember') ? 'checked' : '' }}
                                class="size-[18px] rounded border border-[#1a532a] text-[#1a532a] focus:ring-[#1a532a] focus:ring-offset-0"
                            >
                            <span>{{ __('Ingat saya') }}</span>
                        </label>

                        <a
                            href="#"
                            class="text-[#1a532a] hover:underline focus:outline-none focus-visible:underline"
                        >
                            {{ __('Lupa Password ?') }}
                        </a>
                    </div>

                    {{-- Submit Button --}}
                    <button
                        type="submit"
                        class="mt-6 flex h-[64px] w-full items-center justify-center rounded-[18px] bg-[#1a532a] text-[16px] font-semibold tracking-wider text-white shadow-sm transition hover:bg-[#144221] focus:outline-none focus-visible:ring-2 focus-visible:ring-[#1a532a] focus-visible:ring-offset-2 active:scale-[0.99]"
                    >
                        {{ __('LOGIN') }}
                    </button>
                </form>

                {{-- Divider --}}
                <div class="relative my-7 flex items-center justify-center">
                    <div class="w-full border-t border-[#8e8e8e]" aria-hidden="true"></div>
                    <span class="absolute bg-white px-3 text-[14px] text-[#4a4a4a] sm:text-[15px]">
                        {{ __('Atau masuk dengan') }}
                    </span>
                </div>

                {{-- Google Login Button --}}
                <a
                    href="{{ route('google.redirect') }}"
                    class="flex h-[64px] w-full items-center justify-center gap-3 rounded-[18px] border border-[#1a532a] bg-white transition hover:bg-[#1a532a]/5 focus:outline-none focus-visible:ring-2 focus-visible:ring-[#1a532a] focus-visible:ring-offset-2 active:scale-[0.99]"
                    aria-label="{{ __('Masuk dengan Google') }}"
                >
                    <svg class="size-7 shrink-0" viewBox="0 0 24 24" aria-hidden="true">
                        <path
                            fill="#4285F4"
                            d="M23.745 12.27c0-.7-.06-1.4-.19-2.07H12v4.51h6.6c-.29 1.52-1.14 2.82-2.4 3.68v3.05h3.88c2.27-2.09 3.66-5.17 3.66-9.17Z"
                        />
                        <path
                            fill="#34A853"
                            d="M12 24c3.24 0 5.95-1.08 7.93-2.91l-3.88-3.05c-1.08.72-2.45 1.16-4.05 1.16-3.12 0-5.77-2.1-6.72-4.93H1.25v3.15C3.26 21.36 7.33 24 12 24Z"
                        />
                        <path
                            fill="#FBBC05"
                            d="M5.28 14.27c-.25-.72-.38-1.49-.38-2.27s.13-1.55.38-2.27V6.58H1.25C.45 8.18 0 9.99 0 12s.45 3.82 1.25 5.42l4.03-3.15Z"
                        />
                        <path
                            fill="#EA4335"
                            d="M12 4.75c1.77 0 3.35.61 4.6 1.8l3.42-3.42C17.95 1.19 15.24 0 12 0 7.33 0 3.26 2.64 1.25 6.58l4.03 3.15c.95-2.83 3.6-4.98 6.72-4.98Z"
                        />
                    </svg>
                    <span class="sr-only">{{ __('Continue with Google') }}</span>
                </a>

                {{-- Sign up link --}}
                <p class="mt-7 text-center text-[14px] text-black sm:text-[15px]">
                    {{ __('Belum punya akun ?') }}
                    <a
                        href="{{ route('register') }}"
                        class="font-medium text-[#1a532a] hover:underline focus:outline-none focus-visible:underline"
                    >
                        {{ __('Daftar Sekarang') }}
                    </a>
                </p>
            </div>
        </main>
    </div>
</body>
</html>
