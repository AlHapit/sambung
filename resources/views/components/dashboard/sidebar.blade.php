<aside class="flex w-[240px] shrink-0 flex-col bg-[#1a532a] text-white min-h-screen justify-between py-6 px-4">
    <div>
        {{-- Logo --}}
        <div class="flex items-center gap-3 px-2 mb-8">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
                <img src="{{ asset('images/auth/sambung.png') }}" alt="{{ config('app.name') }}" class="h-10 w-auto object-contain brightness-0 invert">
            </a>
        </div>

        {{-- Nav items --}}
        <nav class="flex flex-col gap-1.5" aria-label="Main Navigation">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3.5 rounded-xl px-3.5 py-2.5 text-sm font-medium transition {{ request()->routeIs('dashboard') ? 'bg-white/15 text-white font-semibold' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                <svg class="size-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
                <span>Home</span>
            </a>

            <a href="#" class="flex items-center gap-3.5 rounded-xl px-3.5 py-2.5 text-sm font-medium text-white/80 transition hover:bg-white/10 hover:text-white">
                <svg class="size-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
                <span>Jelajahi</span>
            </a>

            <a href="#" class="flex items-center gap-3.5 rounded-xl px-3.5 py-2.5 text-sm font-medium text-white/80 transition hover:bg-white/10 hover:text-white">
                <svg class="size-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                </svg>
                <span>Peta</span>
            </a>

            <a href="#" class="flex items-center gap-3.5 rounded-xl px-3.5 py-2.5 text-sm font-medium text-white/80 transition hover:bg-white/10 hover:text-white">
                <svg class="size-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                </svg>
                <span>Sambung</span>
            </a>

            <a href="#" class="flex items-center gap-3.5 rounded-xl px-3.5 py-2.5 text-sm font-medium text-white/80 transition hover:bg-white/10 hover:text-white">
                <svg class="size-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                </svg>
                <span>Event</span>
            </a>

            <a href="#" class="flex items-center gap-3.5 rounded-xl px-3.5 py-2.5 text-sm font-medium text-white/80 transition hover:bg-white/10 hover:text-white">
                <svg class="size-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                </svg>
                <span>Dampak</span>
            </a>
        </nav>
    </div>

    {{-- User & Logout --}}
    <div class="border-t border-white/15 pt-4">
        <div class="flex items-center gap-3 px-2">
            <img
                src="{{ auth()->user()->avatar ?? asset('gambar.png') }}"
                alt="{{ auth()->user()->name }}"
                class="size-10 rounded-full bg-white/20 object-cover"
                onerror="this.onerror=null; this.src='{{ asset('gambar.png') }}';"
            >
            <div class="min-w-0 flex-1">
                <p class="truncate text-xs font-semibold text-white leading-tight">{{ auth()->user()->name }}</p>
                <a href="#" class="text-[11px] text-white/70 hover:underline">Lihat Profil</a>
            </div>
        </div>

        <form method="POST" action="{{ route('logout') }}" class="mt-4">
            @csrf
            <button
                type="submit"
                class="flex w-full items-center gap-2.5 rounded-xl px-3.5 py-2 text-xs font-medium text-white/80 transition hover:bg-red-500/20 hover:text-red-200"
            >
                <svg class="size-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                </svg>
                <span>Keluar</span>
            </button>
        </form>
    </div>
</aside>
