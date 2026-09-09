<header class="flex h-16 w-full items-center justify-between gap-4 border-b border-slate-200 bg-white px-8">
    {{-- Search input --}}
    <div class="relative flex-1 max-w-xl">
        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-slate-400">
            <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
        </span>
        <input
            type="search"
            placeholder="Cari kegiatan, komunitas, atau keahlian..."
            class="h-10 w-full rounded-full border border-slate-200 bg-slate-50 pl-10 pr-4 text-xs text-slate-900 placeholder:text-slate-400 focus:border-[#1a532a] focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#1a532a]"
        >
    </div>

    {{-- Right actions --}}
    <div class="flex items-center gap-4">
        {{-- Notification bell --}}
        <button
            type="button"
            class="relative flex size-9 items-center justify-center rounded-full text-slate-600 transition hover:bg-slate-100 hover:text-slate-900"
            aria-label="Notifikasi"
        >
            <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
            </svg>
        </button>

        {{-- Avatar circle --}}
        <div class="flex items-center">
            <img
                src="{{ auth()->user()->avatar ?? asset('gambar.png') }}"
                alt="{{ auth()->user()->name }}"
                class="size-9 rounded-full bg-slate-200 object-cover ring-2 ring-white"
                onerror="this.onerror=null; this.src='{{ asset('gambar.png') }}';"
            >
        </div>
    </div>
</header>
