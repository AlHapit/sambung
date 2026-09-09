<header class="sticky top-0 z-50 w-full border-b border-stone-200/80 bg-white/95 backdrop-blur-md transition-all">
    <div class="mx-auto flex h-20 max-w-7xl items-center justify-between px-6 lg:px-8">
        {{-- Logo --}}
        <a href="#beranda" class="flex items-center gap-3">
            <img src="{{ asset('images/landing/sambung.png') }}" alt="SAMBUNG" class="h-9 w-auto object-contain">
        </a>

        {{-- Desktop Navigation --}}
        <nav class="hidden md:flex items-center gap-8 text-sm font-medium text-stone-600">
            <a href="#beranda" class="transition-colors hover:text-[#1a532a]">Beranda</a>
            <a href="#fitur" class="transition-colors hover:text-[#1a532a]">Fitur</a>
            <a href="#cara-kerja" class="transition-colors hover:text-[#1a532a]">Cara Kerja</a>
            <a href="#tentang" class="transition-colors hover:text-[#1a532a]">Tentang</a>
            <a href="#kontak" class="transition-colors hover:text-[#1a532a]">Kontak</a>
        </nav>

        {{-- Action Buttons --}}
        <div class="flex items-center gap-3">
            @auth
                <a href="{{ route('dashboard') }}" class="inline-flex items-center justify-center rounded-full bg-[#1a532a] px-5 py-2.5 text-sm font-medium text-white shadow-sm transition hover:bg-[#144221]">
                    Dasbor
                </a>
            @else
                <a href="{{ route('login') }}" class="hidden sm:inline-flex items-center justify-center rounded-full border border-stone-300 px-5 py-2 text-sm font-medium text-stone-700 transition hover:border-stone-400 hover:bg-stone-50">
                    Masuk
                </a>
                <a href="{{ route('register') }}" class="inline-flex items-center justify-center rounded-full bg-[#1a532a] px-5 py-2.5 text-sm font-medium text-white shadow-sm transition hover:bg-[#144221]">
                    Daftar Gratis
                </a>
            @endauth
        </div>
    </div>
</header>
