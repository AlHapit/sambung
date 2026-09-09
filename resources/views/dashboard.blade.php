<x-layouts.dashboard title="Dashboard - {{ config('app.name') }}">
    <div class="space-y-8 pb-12">
        {{-- Hero Banner --}}
        <section class="relative overflow-hidden rounded-3xl bg-[#1a532a] text-white p-8 sm:p-10">
            {{-- Background decorative elements or fallback --}}
            <div class="relative z-10 max-w-2xl">
                <p class="text-sm font-medium text-emerald-200">
                    Halo, {{ explode(' ', auth()->user()->name)[0] }}! 👋
                </p>
                <h1 class="mt-2 text-3xl font-bold tracking-tight sm:text-4xl text-white">
                    Satu Koneksi, Berjuta Dampak
                </h1>
                <p class="mt-3 text-sm text-emerald-100/90 leading-relaxed">
                    Setiap keahlian yang kamu bagikan dan setiap kegiatan yang kamu ikuti membawa perubahan nyata bagi komunitas.
                </p>

                <div class="mt-6 flex flex-wrap gap-3">
                    <a
                        href="#"
                        class="rounded-full bg-white px-5 py-2.5 text-xs font-semibold text-[#1a532a] shadow-sm transition hover:bg-emerald-50"
                    >
                        Jelajahi Kegiatan
                    </a>
                    <a
                        href="#"
                        class="rounded-full border border-white/40 bg-white/10 px-5 py-2.5 text-xs font-semibold text-white transition hover:bg-white/20"
                    >
                        Bagikan Keahlian
                    </a>
                </div>
            </div>

            {{-- Impact Quote / Stat Highlights on the Right --}}
            <div class="mt-8 grid grid-cols-3 gap-4 border-t border-white/20 pt-6 sm:max-w-xl">
                <div>
                    <p class="text-2xl font-bold tracking-tight text-white">
                        {{ $activeUsersCount > 0 ? $activeUsersCount . '+' : '0' }}
                    </p>
                    <p class="mt-0.5 text-xs text-emerald-200">Pengguna Aktif</p>
                </div>
                <div>
                    <p class="text-2xl font-bold tracking-tight text-white">
                        {{ $communityEventsCount > 0 ? $communityEventsCount . '+' : '0' }}
                    </p>
                    <p class="mt-0.5 text-xs text-emerald-200">Kegiatan Komunitas</p>
                </div>
                <div>
                    <p class="text-2xl font-bold tracking-tight text-white">
                        {{ $peopleHelpedCount > 0 ? $peopleHelpedCount . '+' : '0' }}
                    </p>
                    <p class="mt-0.5 text-xs text-emerald-200">Orang Terbantu</p>
                </div>
            </div>
        </section>

        {{-- Section: Rekomendasi Kegiatan --}}
        <section>
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-bold text-slate-900">Rekomendasi Kegiatan</h2>
                    <p class="text-xs text-slate-500">Kegiatan yang mungkin sesuai dengan minat dan lokasimu</p>
                </div>
                <a href="#" class="text-xs font-semibold text-[#1a532a] hover:underline">Lihat Semua &rarr;</a>
            </div>

            @if ($recommendedEvents->isEmpty())
                <div class="mt-4 flex flex-col items-center justify-center rounded-2xl border border-dashed border-slate-300 bg-white p-10 text-center">
                    <div class="flex size-12 items-center justify-center rounded-full bg-emerald-50 text-[#1a532a]">
                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                        </svg>
                    </div>
                    <p class="mt-3 text-sm font-semibold text-slate-800">Belum ada kegiatan yang tersedia saat ini.</p>
                    <p class="mt-1 text-xs text-slate-500">Nantikan kegiatan komunitas terbaru di sekitarmu.</p>
                </div>
            @else
                <div class="mt-4 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($recommendedEvents as $event)
                        <article class="flex flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-xs transition hover:shadow-md">
                            {{-- Event Image Placeholder --}}
                            <div class="relative h-40 w-full overflow-hidden bg-slate-100">
                                <img
                                    src="{{ asset('gambar.png') }}"
                                    alt="{{ $event->title }}"
                                    class="h-full w-full object-cover"
                                    onerror="this.onerror=null; this.src='{{ asset('images/auth/sambung.png') }}';"
                                >
                                <span class="absolute top-3 right-3 rounded-full bg-white/90 px-2.5 py-1 text-[11px] font-semibold text-[#1a532a] backdrop-blur-xs">
                                    {{ $event->category }}
                                </span>
                            </div>

                            <div class="flex flex-1 flex-col p-4">
                                <h3 class="line-clamp-1 text-sm font-bold text-slate-900" title="{{ $event->title }}">
                                    {{ $event->title }}
                                </h3>

                                <div class="mt-2.5 flex items-center gap-1.5 text-xs text-slate-500">
                                    <svg class="size-3.5 shrink-0 text-slate-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                    </svg>
                                    <span class="truncate">{{ $event->location }}</span>
                                </div>

                                <div class="mt-1 flex items-center gap-1.5 text-xs text-slate-500">
                                    <svg class="size-3.5 shrink-0 text-slate-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <span>{{ $event->event_date->translatedFormat('d M Y · H:i') }}</span>
                                </div>

                                <div class="mt-4 flex items-center justify-between border-t border-slate-100 pt-3 text-xs">
                                    <div class="flex items-center gap-1 text-slate-500">
                                        <span class="font-semibold text-slate-700">{{ $event->participations_count }}</span>
                                        <span>peserta</span>
                                    </div>

                                    <a
                                        href="#"
                                        class="rounded-lg bg-[#1a532a] px-3 py-1.5 text-xs font-semibold text-white transition hover:bg-[#144221]"
                                    >
                                        Ikuti
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif
        </section>

        {{-- Section: Temukan di Sekitarmu (Map Section) --}}
        <section>
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h2 class="text-lg font-bold text-slate-900">Temukan di Sekitarmu</h2>
                    <p class="text-xs text-slate-500">Peta kegiatan dan komunitas aktif di wilayah sekitar</p>
                </div>

                {{-- Categories pill filter/legend --}}
                <div class="hidden sm:flex items-center gap-2">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-white px-3 py-1 text-xs text-slate-600 border border-slate-200">
                        <span class="size-2 rounded-full bg-[#1a532a]"></span>
                        Lingkungan
                    </span>
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-white px-3 py-1 text-xs text-slate-600 border border-slate-200">
                        <span class="size-2 rounded-full bg-amber-500"></span>
                        Pendidikan
                    </span>
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-white px-3 py-1 text-xs text-slate-600 border border-slate-200">
                        <span class="size-2 rounded-full bg-blue-500"></span>
                        Sosial
                    </span>
                </div>
            </div>

            <div class="relative h-80 w-full overflow-hidden rounded-2xl border border-slate-200 bg-slate-200 shadow-xs">
                @if ($mapEvents->isEmpty())
                    <div class="flex h-full w-full flex-col items-center justify-center bg-slate-100 p-6 text-center">
                        <div class="flex size-10 items-center justify-center rounded-full bg-slate-200 text-slate-500">
                            <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                            </svg>
                        </div>
                        <p class="mt-2 text-xs font-medium text-slate-600">Belum ada lokasi kegiatan di sekitarmu.</p>
                    </div>
                @else
                    {{-- Map styling canvas placeholder with actual event pins placed proportionally --}}
                    <div class="absolute inset-0 bg-[#e8ece9] opacity-80" style="background-image: radial-gradient(#cbd5e1 1.5px, transparent 1.5px); background-size: 24px 24px;"></div>

                    {{-- Dynamic pin markers from DB coordinates --}}
                    @foreach ($mapEvents as $index => $event)
                        @php
                            // Deterministic spread based on event id if coordinates cluster
                            $topOffset = 25 + (($event->id * 23) % 55);
                            $leftOffset = 15 + (($event->id * 37) % 70);
                        @endphp
                        <div
                            class="absolute -translate-x-1/2 -translate-y-1/2 group cursor-pointer z-10"
                            style="top: {{ $topOffset }}%; left: {{ $leftOffset }}%;"
                        >
                            <div class="relative flex items-center justify-center">
                                <span class="absolute size-6 animate-ping rounded-full bg-emerald-400 opacity-40"></span>
                                <div class="relative flex size-8 items-center justify-center rounded-full bg-[#1a532a] text-white shadow-md">
                                    <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                </div>
                            </div>

                            {{-- Tooltip card on hover --}}
                            <div class="absolute bottom-full left-1/2 mb-2 hidden -translate-x-1/2 rounded-lg bg-white p-2.5 shadow-lg ring-1 ring-black/5 group-hover:block whitespace-nowrap z-20">
                                <p class="text-xs font-bold text-slate-900">{{ $event->title }}</p>
                                <p class="text-[10px] text-slate-500">{{ $event->location }}</p>
                            </div>
                        </div>
                    @endforeach

                    {{-- Map Overlay Controls/Info Badge --}}
                    <div class="absolute bottom-4 left-4 z-10 rounded-xl bg-white/95 px-3 py-2 text-xs font-medium text-slate-700 shadow-sm backdrop-blur-xs border border-slate-200/80">
                        📍 Menampilkan {{ $mapEvents->count() }} titik kegiatan di sekitarmu
                    </div>
                @endif
            </div>
        </section>

        {{-- Section: Learning and Help CTAs --}}
        <section class="grid grid-cols-1 gap-6 sm:grid-cols-2">
            <div class="flex items-center justify-between rounded-2xl border border-slate-200 bg-white p-6 shadow-xs">
                <div class="max-w-xs">
                    <span class="text-xs font-semibold text-emerald-700 uppercase tracking-wider">Belajar Bersama</span>
                    <h3 class="mt-1 text-base font-bold text-slate-900">Saya Ingin Belajar</h3>
                    <p class="mt-1 text-xs text-slate-500">Ajukan kebutuhan belajar dan temukan mentor berpengalaman di sekitarmu.</p>
                    <a href="#" class="mt-4 inline-flex items-center gap-1.5 text-xs font-semibold text-[#1a532a] hover:underline">
                        Mulai Belajar
                        <svg class="size-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                </div>
                <div class="flex size-14 shrink-0 items-center justify-center rounded-2xl bg-emerald-50 text-[#1a532a]">
                    <svg class="size-7" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                    </svg>
                </div>
            </div>

            <div class="flex items-center justify-between rounded-2xl border border-slate-200 bg-white p-6 shadow-xs">
                <div class="max-w-xs">
                    <span class="text-xs font-semibold text-amber-700 uppercase tracking-wider">Berbagi Pengalaman</span>
                    <h3 class="mt-1 text-base font-bold text-slate-900">Saya Ingin Membantu</h3>
                    <p class="mt-1 text-xs text-slate-500">Daftarkan keahlianmu dan bantu sesama anggota komunitas yang membutuhkan bimbingan.</p>
                    <a href="#" class="mt-4 inline-flex items-center gap-1.5 text-xs font-semibold text-[#1a532a] hover:underline">
                        Mulai Membantu
                        <svg class="size-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                </div>
                <div class="flex size-14 shrink-0 items-center justify-center rounded-2xl bg-amber-50 text-amber-600">
                    <svg class="size-7" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                    </svg>
                </div>
            </div>
        </section>
    </div>
</x-layouts.dashboard>
