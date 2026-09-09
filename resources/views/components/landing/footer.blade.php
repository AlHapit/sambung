<footer id="kontak" class="border-t border-stone-200 bg-white">
    <div class="mx-auto max-w-7xl px-6 py-16 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-4">
            {{-- Brand info --}}
            <div class="space-y-4">
                <a href="#beranda" class="inline-block">
                    <img src="{{ asset('images/landing/sambung.png') }}" alt="SAMBUNG" class="h-9 w-auto object-contain">
                </a>
                <p class="text-sm font-semibold text-stone-900">Satu Koneksi, Seribu Kemungkinan.</p>
                <p class="text-xs leading-relaxed text-stone-500">
                    Platform komunitas untuk belajar, berbagi, dan membangun dampak nyata di masyarakat.
                </p>
                <div class="flex items-center gap-3 pt-2 text-stone-400">
                    <a href="#kontak" class="transition hover:text-stone-700" aria-label="Instagram">
                        <svg class="size-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                    <a href="#kontak" class="transition hover:text-stone-700" aria-label="YouTube">
                        <svg class="size-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                    </a>
                    <a href="#kontak" class="transition hover:text-stone-700" aria-label="LinkedIn">
                        <svg class="size-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                    </a>
                    <a href="#kontak" class="transition hover:text-stone-700" aria-label="X">
                        <svg class="size-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>
                </div>
            </div>

            {{-- Navigasi --}}
            <div>
                <p class="text-sm font-semibold text-stone-900">Navigasi</p>
                <ul class="mt-4 space-y-3 text-xs font-medium text-stone-600">
                    <li><a href="#beranda" class="transition hover:text-[#1a532a]">Beranda</a></li>
                    <li><a href="#fitur" class="transition hover:text-[#1a532a]">Fitur</a></li>
                    <li><a href="#cara-kerja" class="transition hover:text-[#1a532a]">Cara Kerja</a></li>
                    <li><a href="#tentang" class="transition hover:text-[#1a532a]">Tentang</a></li>
                    <li><a href="#kontak" class="transition hover:text-[#1a532a]">Kontak</a></li>
                </ul>
            </div>

            {{-- Bantuan --}}
            <div>
                <p class="text-sm font-semibold text-stone-900">Bantuan</p>
                <ul class="mt-4 space-y-3 text-xs font-medium text-stone-600">
                    <li><a href="#kontak" class="transition hover:text-[#1a532a]">Pusat Bantuan</a></li>
                    <li><a href="#kontak" class="transition hover:text-[#1a532a]">Panduan Pengguna</a></li>
                    <li><a href="#kontak" class="transition hover:text-[#1a532a]">Kebijakan Privasi</a></li>
                    <li><a href="#kontak" class="transition hover:text-[#1a532a]">Syarat &amp; Ketentuan</a></li>
                </ul>
            </div>

            {{-- Langganan Update --}}
            <div>
                <p class="text-sm font-semibold text-stone-900">Langganan Update</p>
                <p class="mt-4 text-xs text-stone-500 leading-relaxed">
                    Dapatkan informasi terbaru tentang kegiatan dan fitur SAMBUNG.
                </p>
                <form action="#kontak" onsubmit="event.preventDefault();" class="mt-4 flex gap-2">
                    <input type="email" placeholder="nama@email.com" class="w-full rounded-full border border-stone-300 px-4 py-2 text-xs focus:border-[#1a532a] focus:outline-none">
                    <button type="submit" class="flex size-8 shrink-0 items-center justify-center rounded-full bg-[#1a532a] text-white transition hover:bg-[#144221]" aria-label="Langganan">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                    </button>
                </form>
            </div>
        </div>

        {{-- Bottom row --}}
        <div class="mt-14 flex flex-col items-center justify-between gap-4 border-t border-stone-100 pt-8 sm:flex-row text-xs text-stone-500">
            <p>&copy; {{ date('Y') }} SAMBUNG. Semua hak dilindungi.</p>
            <p class="flex items-center gap-1">
                Bersama, kita tumbuh.
                <svg xmlns="http://www.w3.org/2000/svg" class="size-3.5 text-[#1a532a]" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/></svg>
            </p>
        </div>
    </div>
</footer>
