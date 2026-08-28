<nav class="absolute top-4 right-7 left-7 z-10 flex h-12 items-center justify-between rounded-[50px] bg-white px-3 text-[12px] text-black sm:px-4 lg:px-[13px]">
    <a href="#beranda" class="flex h-[39px] w-[113px] items-center overflow-hidden rounded-[50px]" aria-label="Sambung beranda">
        <img src="{{ asset('images/landing/feature-1.jpeg') }}" alt="Sambung" class="h-[56px] max-w-none translate-x-[-12px] scale-[1.14] object-cover">
    </a>
    <div class="hidden items-center gap-12 md:flex">
        <a href="#beranda">Beranda</a>
        <a href="#fitur">Fitur</a>
        <a href="#tentang">Tentang</a>
        <a href="#kontak">Kontak</a>
    </div>
    @auth
        <a href="{{ route('dashboard') }}" class="flex h-[33px] w-[81px] items-center justify-center rounded-[20px] bg-[#1a532a] text-white">Dasbor</a>
    @else
        <a href="{{ route('register') }}" class="flex h-[33px] w-[81px] items-center justify-center rounded-[20px] bg-[#1a532a] text-white">Daftar</a>
    @endauth
</nav>
