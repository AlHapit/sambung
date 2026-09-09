@extends('layouts.app')

@section('title', 'Sambung')

@section('content')
    <main>
        <x-landing.navbar />

        {{-- Hero --}}
        <section id="beranda" class="overflow-hidden bg-white pt-20">
            <div class="mx-auto grid max-w-7xl gap-12 px-6 py-16 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-24">
                <div class="flex flex-col justify-center">
                    <span class="inline-flex w-fit items-center gap-1.5 rounded-full border border-emerald-200/60 bg-emerald-50 px-3.5 py-1 text-xs font-semibold text-emerald-800">
                        Komunitas &bull; Kolaborasi &bull; Dampak Nyata
                    </span>
                    <h1 class="mt-6 text-4xl leading-[1.15] font-bold tracking-tight text-stone-900 sm:text-5xl lg:text-[56px]">
                        Satu Koneksi,<br><span class="text-[#1a532a]">Seribu Kemungkinan.</span>
                    </h1>
                    <p class="mt-5 max-w-lg text-base leading-relaxed text-stone-600">
                        SAMBUNG mempertemukan orang yang ingin belajar dengan mereka yang ingin berbagi, untuk membangun masyarakat yang lebih kuat bersama.
                    </p>
                    <div class="mt-8 flex flex-wrap items-center gap-3">
                        <a href="{{ route('register') }}" class="inline-flex items-center gap-2 rounded-full bg-[#1a532a] px-6 py-3 text-sm font-medium text-white shadow-sm transition hover:bg-[#144221]">
                            Mulai Sekarang
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                        </a>
                        <a href="#cara-kerja" class="inline-flex items-center gap-2 rounded-full bg-stone-100 px-6 py-3 text-sm font-medium text-stone-800 transition hover:bg-stone-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                            Lihat Cara Kerja
                        </a>
                    </div>
                    <div class="mt-10 flex flex-wrap items-center gap-6 text-sm text-stone-600">
                        <span class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-[#1a532a]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                            Gratis untuk semua
                        </span>
                        <span class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-[#1a532a]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                            Komunitas yang aman
                        </span>
                        <span class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-[#1a532a]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                            Dampak nyata
                        </span>
                    </div>
                </div>
                <div class="relative flex items-center justify-center">
                    <div class="relative w-full overflow-hidden rounded-3xl">
                        <img src="gambar.png" alt="Komunitas Sambung" class="aspect-[4/3] w-full object-cover">
                    </div>
                    <div class="absolute -top-2 right-4 max-w-[200px] rounded-2xl bg-white/90 p-3 shadow-lg backdrop-blur-sm lg:right-0 lg:-top-4">
                        <p class="font-['IM_Fell_Great_Primer'] text-sm leading-snug text-emerald-950/80 italic">
                            "Ilmu yang dibagikan, masa depan yang ditumbuhkan."
                        </p>
                    </div>
                    <div class="absolute -bottom-3 left-4 max-w-[280px] rounded-2xl bg-[#1a532a] px-4 py-3 text-white shadow-lg lg:left-0">
                        <p class="text-xs leading-relaxed">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mb-0.5 mr-1 inline size-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/></svg>
                            Bersama kita bisa menciptakan perubahan, mulai dari hal kecil.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        {{-- Pilar Fitur --}}
        <section id="fitur" class="bg-stone-50/80 py-16 lg:py-24">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="text-center">
                    <span class="inline-flex items-center rounded-full border border-emerald-200/60 bg-emerald-50 px-3.5 py-1 text-xs font-semibold text-emerald-800">Fitur Utama</span>
                    <h2 class="mt-4 text-3xl font-bold tracking-tight text-stone-900 sm:text-4xl">Terhubung untuk Tumbuh Bersama.</h2>
                    <p class="mx-auto mt-3 max-w-xl text-base text-stone-600">Temukan orang yang tepat, ikuti kegiatan komunitas, dan lihat kontribusimu melalui satu platform.</p>
                </div>
                <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    <div class="flex flex-col rounded-2xl bg-[#1a532a] p-6 text-white shadow-sm">
                        <div class="flex size-11 items-center justify-center rounded-xl bg-white/20">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/></svg>
                        </div>
                        <h3 class="mt-5 text-lg font-semibold">Sambungkan</h3>
                        <p class="mt-2 flex-1 text-sm leading-relaxed text-white/80">Temukan mentor, teman belajar, atau orang dengan minat yang sama.</p>
                        <a href="{{ route('register') }}" class="mt-5 inline-flex items-center gap-1 text-sm font-medium text-white/90 transition hover:text-white">
                            Mulai Mencari <svg xmlns="http://www.w3.org/2000/svg" class="size-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                        </a>
                    </div>
                    <div class="flex flex-col rounded-2xl border border-stone-200 bg-white p-6 shadow-sm">
                        <div class="flex size-11 items-center justify-center rounded-xl bg-emerald-50 text-[#1a532a]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/></svg>
                        </div>
                        <h3 class="mt-5 text-lg font-semibold text-stone-900">Event</h3>
                        <p class="mt-2 flex-1 text-sm leading-relaxed text-stone-600">Ikuti berbagai kegiatan komunitas, online maupun offline.</p>
                        <a href="#fitur" class="mt-5 inline-flex items-center gap-1 text-sm font-medium text-[#1a532a] transition hover:text-[#144221]">
                            Lihat Kegiatan <svg xmlns="http://www.w3.org/2000/svg" class="size-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                        </a>
                    </div>
                    <div class="flex flex-col rounded-2xl border border-stone-200 bg-white p-6 shadow-sm">
                        <div class="flex size-11 items-center justify-center rounded-xl bg-emerald-50 text-[#1a532a]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 00-.491 6.347A48.62 48.62 0 0112 20.904a48.62 48.62 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.636 50.636 0 00-2.658-.813A59.906 59.906 0 0112 3.493a59.903 59.903 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"/></svg>
                        </div>
                        <h3 class="mt-5 text-lg font-semibold text-stone-900">Belajar</h3>
                        <p class="mt-2 flex-1 text-sm leading-relaxed text-stone-600">Tingkatkan skill melalui komunitas dan pengalaman langsung.</p>
                        <a href="#fitur" class="mt-5 inline-flex items-center gap-1 text-sm font-medium text-[#1a532a] transition hover:text-[#144221]">
                            Mulai Belajar <svg xmlns="http://www.w3.org/2000/svg" class="size-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                        </a>
                    </div>
                    <div class="flex flex-col rounded-2xl border border-stone-200 bg-white p-6 shadow-sm">
                        <div class="flex size-11 items-center justify-center rounded-xl bg-emerald-50 text-[#1a532a]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/></svg>
                        </div>
                        <h3 class="mt-5 text-lg font-semibold text-stone-900">Dampak</h3>
                        <p class="mt-2 flex-1 text-sm leading-relaxed text-stone-600">Lihat bagaimana kontribusimu membawa perubahan nyata di masyarakat.</p>
                        <a href="#fitur" class="mt-5 inline-flex items-center gap-1 text-sm font-medium text-[#1a532a] transition hover:text-[#144221]">
                            Lihat Dampak <svg xmlns="http://www.w3.org/2000/svg" class="size-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        {{-- Cara Kerja --}}
        <section id="cara-kerja" class="bg-white py-16 lg:py-24">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="text-center">
                    <span class="inline-flex items-center rounded-full border border-emerald-200/60 bg-emerald-50 px-3.5 py-1 text-xs font-semibold text-emerald-800">Cara Kerja SAMBUNG</span>
                    <h2 class="mt-4 text-3xl font-bold tracking-tight text-stone-900 sm:text-4xl">Langkah Kecil, Dampak Besar.</h2>
                    <p class="mx-auto mt-3 max-w-md text-base text-stone-600">Mulai perjalananmu dalam 3 langkah mudah.</p>
                </div>
                <div class="relative mt-14 grid gap-8 lg:grid-cols-3">
                    <div class="hidden lg:absolute lg:inset-x-0 lg:top-16 lg:block lg:px-24">
                        <div class="h-px w-full border-t-2 border-dashed border-stone-200"></div>
                    </div>
                    <div class="relative text-center">
                        <div class="mx-auto flex size-12 items-center justify-center rounded-full bg-[#1a532a] text-lg font-bold text-white shadow-md">1</div>
                        <div class="mx-auto mt-5 flex size-14 items-center justify-center rounded-2xl bg-emerald-50 text-[#1a532a]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z"/></svg>
                        </div>
                        <h3 class="mt-4 text-lg font-semibold text-stone-900">Daftar</h3>
                        <p class="mt-2 text-sm text-stone-600">Buat akun dan lengkapi profilmu.</p>
                    </div>
                    <div class="relative text-center">
                        <div class="mx-auto flex size-12 items-center justify-center rounded-full bg-[#1a532a] text-lg font-bold text-white shadow-md">2</div>
                        <div class="mx-auto mt-5 flex size-14 items-center justify-center rounded-2xl bg-emerald-50 text-[#1a532a]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/></svg>
                        </div>
                        <h3 class="mt-4 text-lg font-semibold text-stone-900">Temukan</h3>
                        <p class="mt-2 text-sm text-stone-600">Cari mentor, kegiatan, atau komunitas yang sesuai dengan minatmu.</p>
                    </div>
                    <div class="relative text-center">
                        <div class="mx-auto flex size-12 items-center justify-center rounded-full bg-[#1a532a] text-lg font-bold text-white shadow-md">3</div>
                        <div class="mx-auto mt-5 flex size-14 items-center justify-center rounded-2xl bg-emerald-50 text-[#1a532a]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 21L3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5"/></svg>
                        </div>
                        <h3 class="mt-4 text-lg font-semibold text-stone-900">Terhubung</h3>
                        <p class="mt-2 text-sm text-stone-600">Mulai berinteraksi, belajar, berbagi, dan ciptakan dampak bersama.</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- Tentang --}}
        <section id="tentang" class="bg-stone-50/80 py-16 lg:py-24">
            <div class="mx-auto grid max-w-7xl items-center gap-12 px-6 lg:grid-cols-2 lg:gap-16 lg:px-8">
                <div class="relative">
                    <div class="overflow-hidden rounded-3xl">
                        <img src="gambar.png" alt="Tentang Sambung" class="aspect-[4/3] w-full object-cover">
                    </div>
                    <div class="absolute bottom-4 left-4 right-4 rounded-2xl bg-[#1a532a]/90 px-5 py-3 text-white backdrop-blur-sm">
                        <p class="font-['IM_Fell_Great_Primer'] text-sm leading-relaxed italic">"Komunitas hari ini, masa depan yang lebih baik."</p>
                    </div>
                </div>
                <div>
                    <span class="inline-flex items-center rounded-full border border-emerald-200/60 bg-emerald-50 px-3.5 py-1 text-xs font-semibold text-emerald-800">Tentang SAMBUNG</span>
                    <h2 class="mt-4 text-3xl font-bold tracking-tight text-stone-900 sm:text-4xl">Lebih dari Sekadar Platform</h2>
                    <p class="mt-5 text-base leading-relaxed text-stone-600">
                        SAMBUNG adalah ruang bertemu, belajar, berbagi, dan bertumbuh bersama. Kami percaya bahwa setiap orang punya keahlian, dan setiap orang juga punya hal yang bisa dipelajari.
                    </p>
                    <p class="mt-4 text-base leading-relaxed text-stone-600">
                        Kami hadir untuk menjembatani kebutuhan belajar dan bantuan dengan kemampuan berbagi, sehingga setiap orang dapat menemukan kesempatan untuk belajar, membantu, dan berkontribusi di komunitasnya.
                    </p>
                    <a href="{{ route('register') }}" class="mt-8 inline-flex items-center gap-2 rounded-full bg-[#1a532a] px-6 py-3 text-sm font-medium text-white shadow-sm transition hover:bg-[#144221]">
                        Pelajari Lebih Lanjut
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                    </a>
                </div>
            </div>
        </section>

        {{-- Cerita dari Komunitas --}}
        <section class="bg-white py-16 lg:py-24">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="flex items-end justify-between">
                    <div>
                        <span class="inline-flex items-center rounded-full border border-emerald-200/60 bg-emerald-50 px-3.5 py-1 text-xs font-semibold text-emerald-800">Apa Kata Mereka?</span>
                        <h2 class="mt-4 text-3xl font-bold tracking-tight text-stone-900 sm:text-4xl">Cerita dari Komunitas</h2>
                    </div>
                    <div class="hidden items-center gap-2 sm:flex">
                        <button type="button" class="flex size-9 items-center justify-center rounded-full border border-stone-300 text-stone-600 transition hover:border-stone-400 hover:bg-stone-50" aria-label="Sebelumnya">&lsaquo;</button>
                        <button type="button" class="flex size-9 items-center justify-center rounded-full border border-stone-300 text-stone-600 transition hover:border-stone-400 hover:bg-stone-50" aria-label="Berikutnya">&rsaquo;</button>
                    </div>
                </div>
                <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    <div class="flex flex-col rounded-2xl border border-stone-200 bg-white p-6 shadow-sm">
                        <div class="flex items-center gap-4">
                            <img src="gambar.png" alt="Nadia Putri" class="size-12 rounded-full object-cover">
                            <div>
                                <p class="text-sm font-semibold text-stone-900">Nadia Putri</p>
                                <p class="text-xs text-stone-500">Mentee</p>
                            </div>
                        </div>
                        <p class="mt-4 flex-1 text-sm leading-relaxed text-stone-600">"Saya jadi lebih percaya diri setelah mendapatkan mentor di SAMBUNG. Komunitasnya sangat suportif!"</p>
                    </div>
                    <div class="flex flex-col rounded-2xl border border-stone-200 bg-white p-6 shadow-sm">
                        <div class="flex items-center gap-4">
                            <img src="gambar.png" alt="Rizky Ramadhan" class="size-12 rounded-full object-cover">
                            <div>
                                <p class="text-sm font-semibold text-stone-900">Rizky Ramadhan</p>
                                <p class="text-xs text-stone-500">Mentor</p>
                            </div>
                        </div>
                        <p class="mt-4 flex-1 text-sm leading-relaxed text-stone-600">"Berbagi ilmu ternyata bisa memberikan dampak yang luar biasa. SAMBUNG membuat prosesnya mudah dan menyenangkan."</p>
                    </div>
                    <div class="flex flex-col rounded-2xl border border-stone-200 bg-white p-6 shadow-sm">
                        <div class="flex items-center gap-4">
                            <img src="gambar.png" alt="Salsabila Putri" class="size-12 rounded-full object-cover">
                            <div>
                                <p class="text-sm font-semibold text-stone-900">Salsabila Putri</p>
                                <p class="text-xs text-stone-500">Volunteer</p>
                            </div>
                        </div>
                        <p class="mt-4 flex-1 text-sm leading-relaxed text-stone-600">"Melalui SAMBUNG, saya bisa berkontribusi langsung di komunitas sekitar. Platform yang benar-benar bermakna."</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- CTA Banner --}}
        <section class="px-6 pb-16 lg:px-8 lg:pb-24">
            <div class="mx-auto max-w-7xl rounded-[32px] bg-[#1a532a] px-8 py-12 sm:px-12 lg:flex lg:items-center lg:justify-between lg:px-16 lg:py-14">
                <div>
                    <h2 class="text-2xl font-bold tracking-tight text-white sm:text-3xl">Siap untuk mulai terhubung?</h2>
                    <p class="mt-2 text-sm text-white/70">Bergabunglah bersama komunitas SAMBUNG — gratis, tanpa biaya.</p>
                </div>
                <a href="{{ route('register') }}" class="mt-6 inline-flex items-center gap-2 rounded-full bg-white px-7 py-3 text-sm font-semibold text-[#1a532a] shadow-sm transition hover:bg-stone-100 lg:mt-0">
                    Daftar Sekarang
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                </a>
            </div>
        </section>

        <x-landing.footer />
    </main>
@endsection
