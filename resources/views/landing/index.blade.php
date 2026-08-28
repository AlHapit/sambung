@extends('layouts.app')

@section('title', 'Sambung')

@section('content')
    <main>
        <section id="beranda" class="relative min-h-[672px] overflow-hidden bg-[#1a532a] text-white">
            <img src="{{ asset('images/landing/hero.jpeg') }}" alt="Sawah terasering hijau" class="absolute inset-0 size-full object-cover object-center">
            <div class="absolute inset-0 bg-black/10"></div>

            <x-landing.navbar />

            <div class="relative z-[1] mx-auto flex w-full max-w-[1366px] flex-col px-7 pt-[134px] sm:px-[90px]">
                <p class="text-[12px] font-medium">PLATFORM KOMUNITAS LINTAS GENERASI.</p>
                <h1 class="mt-2 text-[42px] leading-[1.2] font-semibold sm:text-[48px]">Satu Koneksi,<br>Satu Dampak</h1>
                <p class="mt-3 text-[12px] leading-4">Temukan mentor yang sesuai dengan kebutuhan<br class="hidden sm:block"> belajar dan kemampuan.</p>
                <a href="#fitur" class="mt-5 flex h-[33px] w-[81px] items-center justify-center rounded-[20px] border border-white bg-white/10 text-[12px] font-medium">Pelajari</a>

                <div class="mt-[70px] grid max-w-[649px] gap-[33px] sm:grid-cols-2">
                    <article class="flex h-[170px] overflow-hidden rounded-[25px] bg-white text-black">
                        <div class="h-[161px] w-[111px] shrink-0 rounded-[20px] bg-[#1a532a]"></div>
                        <div class="flex flex-1 flex-col px-3 pt-4">
                            <h2 class="text-[20px] font-medium">Sambungkan</h2>
                            <p class="mt-4 text-[12px] leading-[15px]">Temukan mentor yang<br>sesuai dengan kebutuhanmu<br>dan mulai belajar bersama</p>
                            <a href="#fitur" class="mt-auto mb-[18px] flex h-[22px] w-[81px] items-center justify-center rounded-[20px] border border-[#1a532a] bg-[#1a532a]/10 text-[12px]">Temukan</a>
                        </div>
                    </article>
                    <article class="flex h-[170px] overflow-hidden rounded-[25px] bg-white text-black">
                        <div class="h-[161px] w-[111px] shrink-0 rounded-[20px] bg-[#1a532a]"></div>
                        <div class="flex flex-1 flex-col px-3 pt-4">
                            <h2 class="text-[20px] font-medium">Event</h2>
                            <p class="mt-4 text-[12px] leading-[15px]">Temukan kegiatan yang<br>sesuai dengan kebutuhanmu<br>dan mulai belajar bersama</p>
                            <a href="#fitur" class="mt-auto mb-[18px] flex h-[22px] w-[81px] items-center justify-center rounded-[20px] border border-[#1a532a] bg-[#1a532a]/10 text-[12px]">Temukan</a>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <section id="fitur" class="mx-auto grid w-full max-w-[1366px] gap-12 px-7 py-20 sm:px-[111px] lg:min-h-[576px] lg:grid-cols-[365px_1fr] lg:gap-12 lg:py-[87px]">
            <div class="pt-[2px]">
                <p class="text-[12px]">FITUR SAMBUNG</p>
                <h2 class="mt-5 text-[36px] leading-[1.2] font-semibold">Terhubung untuk<br>Tumbuh Bersama.</h2>
                <p class="mt-6 border-l-2 border-[#f7a600] pl-[22px] text-[14px] leading-[17px]">Temukan orang yang tepat, ikuti kegiatan<br>komunitas dan lihat kontribusimu melalui<br>satu platform</p>
                <div class="mt-12 flex gap-[25px] text-[12px]">
                    <span class="flex size-5 items-center justify-center rounded-full border border-black">‹</span>
                    <span class="flex size-5 items-center justify-center rounded-full border border-black">›</span>
                </div>
            </div>
            <div class="flex flex-col items-end">
                <a href="#tentang" class="flex h-[22px] w-[81px] items-center justify-center rounded-[20px] border border-[#1a532a] bg-[#1a532a]/10 text-[14px]">Pelajari</a>
                <div class="mt-[17px] grid w-full grid-cols-3 items-start gap-[25px]">
                    <div class="mt-6 h-[302px] rounded-[20px] bg-[#1a532a]"></div>
                    <div class="h-[302px] rounded-[20px] bg-[#1a532a]"></div>
                    <div class="mt-6 h-[302px] rounded-[20px] bg-[#1a532a]"></div>
                </div>
            </div>
        </section>

        <section id="tentang" class="mx-auto grid w-full max-w-[1366px] items-start gap-16 px-7 py-16 sm:px-[111px] lg:min-h-[433px] lg:grid-cols-[447px_1fr] lg:gap-[103px] lg:py-[40px]">
            <div class="h-[302px] rounded-[20px] bg-[#1a532a]"></div>
            <div>
                <p class="text-[12px]">Tentang Sambung</p>
                <h2 class="mt-5 text-[36px] leading-[1.2] font-semibold">Apa itu Sambung ?</h2>
                <div class="mt-5 border-l-2 border-[#f7a600] pl-[18px] text-[14px] leading-[17px]">
                    <p>Sambung adalah platform digital yang mempertemukan kebutuhan dan kemampuan masyarakat lintas generasi melalui pembelajaran, bantuan, dan aksi berkelanjutan</p>
                    <p class="mt-5">Kami hadir untuk menjembatani kebutuhan belajar dan bantuan dengan kemampuan berbagi, sehingga setiap orang dapat menemukan kesempatan untuk belajar, membantu dan berkontribusi di komunitasnya.</p>
                </div>
                <a href="#kontak" class="mt-9 flex h-[22px] w-[81px] items-center justify-center rounded-[20px] border border-[#1a532a] bg-[#1a532a]/10 text-[14px]">Pelajari</a>
            </div>
        </section>

        <section class="relative min-h-[116px] overflow-hidden bg-[#1a532a] px-7 py-7 text-white sm:px-[90px]">
            <div class="relative z-[1] mx-auto grid max-w-[1366px] items-center gap-7 lg:grid-cols-[1fr_245px_1fr] lg:gap-0">
                <div></div>
                <div class="flex items-center gap-4">
                    <span class="text-[34px] leading-none">“</span>
                    <p class="font-['IM_FELL_Great_Primer'] text-[14px] leading-[15px]">Sambung bukan hanya platform,<br>tapi jembatan kebaikan yang<br>menghubungkan hati dan aksi.</p>
                </div>
                <div class="flex items-center gap-4 lg:pl-5">
                    <span class="size-[41px] rounded-full bg-[#d9d9d9]"></span>
                    <p class="font-['IM_FELL_Great_Primer'] text-[14px] leading-[16px]"><span class="text-[18px]">Affan Junian Tidiya</span><br>UI / UX Desainer</p>
                </div>
            </div>
            <div class="absolute top-0 right-0 h-full w-[261px] rounded-bl-[50px] bg-[#197733]"></div>
            <div class="absolute top-0 right-0 h-full w-[225px] rounded-bl-[50px] bg-[#14682c]"></div>
            <div class="absolute top-0 right-0 h-full w-[188px] rounded-bl-[50px] bg-[#1a532a]"></div>
        </section>

        <x-landing.footer />
    </main>
@endsection
