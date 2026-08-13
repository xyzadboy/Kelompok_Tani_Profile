<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Beruas Harapan — Kelompok Tani Kalimantan Timur</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-white text-gray-900">

    <livewire:navbar />

<main class="bg-stone-50/50">

    {{-- 1. Hero Section (Foto Tanpa Gradient Overlay) --}}
    <section class="relative overflow-hidden py-24 lg:py-36 bg-cover bg-center bg-no-repeat" 
             style="background-image: url('https://images.unsplash.com/photo-1625246333195-78d9c38ad449?q=80&w=1920&auto=format&fit=crop');">
        
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl text-center lg:text-left">
                
                <!-- {{-- Badge / Slogan --}}
                <div class="inline-flex items-center gap-2 rounded-full border border-emerald-500/30 bg-stone-900/80 px-4 py-1.5 text-xs font-semibold text-emerald-300 backdrop-blur-md shadow-lg">
                    <span class="flex h-2 w-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    Bumi ETAM — Kalimantan Timur
                </div> -->

                {{-- Main Heading --}}
                <h1 class="mt-6 text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl/tight [text-shadow:_0_2px_10px_rgba(0,0,0,0.8)]">
                    Kelompok Tani <br>
                    <span class="text-emerald-400">Beruas Harapan</span>
                </h1>

                {{-- Subheading --}}
                <p class="mt-6 text-lg text-white sm:text-xl leading-relaxed [text-shadow:_0_1px_8px_rgba(0,0,0,0.9)]">
                    Berpusat di <strong class="font-bold text-emerald-300">Desa Sungai Payang, Kec. Loa Kulu, Kutai Kartanegara</strong>. Kami berkomitmen untuk memajukan sektor pertanian lokal dan mewujudkan hasil panen melimpah secara berkelanjutan.
                </p>

                {{-- Action Buttons --}}
                <div class="mt-8 flex flex-col items-center justify-center gap-4 sm:flex-row lg:justify-start">
                    <a href="https://wa.me/6282255778559" target="_blank" class="flex w-full items-center justify-center gap-2 rounded-full bg-emerald-600 px-8 py-4 text-base font-semibold text-white shadow-xl transition-all hover:bg-emerald-500 active:scale-95 sm:w-auto">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-2.896-1.596-5.48-4.18-7.076-7.076l1.293-.97c.362-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                        </svg>
                        Hubungi: 0822-5577-8559
                    </a>
                    <a href="/legalitas" class="flex w-full items-center justify-center gap-2 rounded-full border border-white/40 bg-stone-900/80 px-8 py-4 text-base font-semibold text-white backdrop-blur-md shadow-xl transition-all hover:bg-stone-900 active:scale-95 sm:w-auto">
                        Legalitas Kelompok
                    </a>
                </div>

                {{-- Highlights Checkmarks --}}
                <div class="mt-10 flex flex-wrap justify-center gap-6 text-sm font-medium text-white lg:justify-start [text-shadow:_0_1px_6px_rgba(0,0,0,0.8)]">
                    <div class="flex items-center gap-2">
                        <svg class="h-5 w-5 text-emerald-400 drop-shadow" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                        </svg>
                        <span>Pertanian Ramah Lingkungan</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="h-5 w-5 text-emerald-400 drop-shadow" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                        </svg>
                        <span>Mitra Terpercaya</span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- 2. Stats Section --}}
    <section class="border-y border-stone-200 bg-white py-12">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 gap-8 md:grid-cols-4">
                <div class="text-center">
                    <p class="text-3xl sm:text-4xl font-extrabold text-emerald-700">100+</p>
                    <p class="mt-1 text-sm font-medium text-stone-600">Anggota Petani</p>
                </div>
                <div class="text-center">
                    <p class="text-3xl sm:text-4xl font-extrabold text-emerald-700">100+ Ha</p>
                    <p class="mt-1 text-sm font-medium text-stone-600">Luas Kelola Lahan</p>
                </div>
                <div class="text-center">
                    <p class="text-3xl sm:text-4xl font-extrabold text-emerald-700">500 Ton</p>
                    <p class="mt-1 text-sm font-medium text-stone-600">Hasil Panen / Tahun</p>
                </div>
                <div class="text-center">
                    <p class="text-3xl sm:text-4xl font-extrabold text-emerald-700">100%</p>
                    <p class="mt-1 text-sm font-medium text-stone-600">Dukungan Komunitas</p>
                </div>
            </div>
        </div>
    </section>

    {{-- 3. Features / Sejarah, Visi & Misi Section --}}
    <section class="py-20 bg-stone-50/50 border-t border-stone-200/60">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            
            {{-- Section Header --}}
            <div class="text-center max-w-3xl mx-auto">
                <h2 class="text-xs font-bold tracking-widest text-emerald-700 uppercase">Mengenal Lebih Dekat</h2>
                <p class="mt-2 text-3xl font-bold tracking-tight text-stone-900 sm:text-4xl">
                    Sejarah, Visi, & Misi Kelompok Tani
                </p>
                <p class="mt-4 text-stone-600">
                    Landasan dan komitmen Kelompok Tani Beruas Harapan dalam membangun kemandirian dan kesejahteraan pertanian lokal.
                </p>
            </div>

            {{-- Grid Content: Sejarah (Kiri) & Visi Misi (Kanan) --}}
            <div class="mt-16 grid gap-8 lg:grid-cols-12 lg:items-stretch">

                {{-- 1. Sejarah Singkat (5 Cols) --}}
                <div class="lg:col-span-5 flex flex-col justify-between rounded-3xl border border-stone-200 bg-white p-8 shadow-sm">
                    <div>
                        <div class="inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-amber-100 text-amber-800 mb-6">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>

                        <h3 class="text-2xl font-bold text-stone-900">Sejarah Terbentuknya</h3>
                        
                        {{-- Timeline Sejarah --}}
                        <div class="mt-6 space-y-6">
                            <div class="flex gap-4">
                                <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-amber-500 text-xs font-bold text-white shadow-sm">
                                    1
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-stone-900">Inisiatif Awal</h4>
                                    <p class="mt-1 text-xs text-stone-600 leading-relaxed">
                                        Tokoh-tokoh masyarakat mengajak warga berkumpul dan bermusyawarah bersama untuk mendirikan sebuah wadah kelompok tani.
                                    </p>
                                </div>
                            </div>

                            <div class="flex gap-4">
                                <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-amber-500 text-xs font-bold text-white shadow-sm">
                                    2
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-stone-900">Rapat Warga</h4>
                                    <p class="mt-1 text-xs text-stone-600 leading-relaxed">
                                        Musyawarah warga yang dihadiri minimal 100 orang (atau sesuai kesepakatan wilayah) untuk secara resmi membentuk organisasi kelompok tani.
                                    </p>
                                </div>
                            </div>

                            <div class="flex gap-4">
                                <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-amber-500 text-xs font-bold text-white shadow-sm">
                                    3
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-stone-900">Pengesahan Legalitas</h4>
                                    <p class="mt-1 text-xs text-stone-600 leading-relaxed">
                                        Penyusunan struktur kepengurusan serta aturan dasar, lalu didaftarkan secara resmi ke kantor desa dan instansi terkait.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Tag Legalitas --}}
                    <div class="mt-8 pt-6 border-t border-stone-100 flex items-center justify-between text-xs text-stone-500">
                        <span class="flex items-center gap-1.5 font-medium text-emerald-800">
                            <span class="h-2 w-2 rounded-full bg-emerald-600"></span>
                            Terdaftar di Instansi Terkait
                        </span>
                        <span class="font-semibold text-stone-700">Legal & Resmi</span>
                    </div>
                </div>

                {{-- 2. Visi & Misi Cards (7 Cols) --}}
                <div class="lg:col-span-7 flex flex-col gap-6">

                    {{-- Visi Card --}}
                    <div class="rounded-3xl border border-emerald-900/10 bg-gradient-to-br from-emerald-800 to-green-900 p-8 text-white shadow-md flex-1 flex flex-col justify-center">
                        <div class="flex items-center gap-4 mb-3">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-white/10 text-emerald-300 backdrop-blur-sm">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.573 16.49 16.638 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold tracking-wide">VISI</h3>
                        </div>
                        <p class="text-emerald-100 text-base lg:text-lg leading-relaxed font-medium">
                            "Terwujudnya kelompok tani yang mandiri, maju, dan sejahtera dalam meningkatkan hasil pertanian yang ramah lingkungan."
                        </p>
                    </div>

                    {{-- Misi Card --}}
                    <div class="rounded-3xl border border-stone-200 bg-white p-8 shadow-sm flex-1 flex flex-col justify-center">
                        <div class="flex items-center gap-4 mb-5">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-100 text-emerald-700">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-stone-900">MISI</h3>
                        </div>

                        <ul class="space-y-3.5 text-sm text-stone-600">
                            <li class="flex items-start gap-3">
                                <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-emerald-50 text-xs font-bold text-emerald-800 border border-emerald-200">1</span>
                                <span class="text-stone-700 font-medium leading-relaxed">Meningkatkan kerja sama antar anggota kelompok tani.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-emerald-50 text-xs font-bold text-emerald-800 border border-emerald-200">2</span>
                                <span class="text-stone-700 font-medium leading-relaxed">Menjaga kesuburan tanah dan kelestarian alam.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-emerald-50 text-xs font-bold text-emerald-800 border border-emerald-200">3</span>
                                <span class="text-stone-700 font-medium leading-relaxed">Meningkatkan pengetahuan kelompok tani lewat pelatihan rutin.</span>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>

        </div>
    </section>

    {{-- 4. Call to Action Banner --}}
    <section class="mx-auto max-w-7xl px-4 pb-20 sm:px-6 lg:px-8">
        <div class="relative overflow-hidden rounded-3xl bg-emerald-800 px-6 py-12 text-center text-white shadow-xl sm:px-12 sm:py-16">
            <div class="relative z-10 max-w-2xl mx-auto">
                <h2 class="text-3xl font-bold sm:text-4xl">Ingin Bekerja Sama atau Menjadi Mitra?</h2>
                <p class="mt-4 text-emerald-100">
                    Buka peluang kemitraan pasokan hasil tani, program sosial, maupun studi lapangan bersama Beruas Harapan.
                </p>
                <div class="mt-8">
                    <a href="https://wa.me/6282255778559" target="_blank" class="inline-flex items-center gap-2 rounded-full bg-white px-8 py-3.5 text-sm font-semibold text-emerald-900 transition-all hover:bg-emerald-50 active:scale-95">
                        Hubungi Pengurus Kelompok Tani
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>

{{-- Footer --}}
<livewire:footer />

@livewireScripts
</body>
</html>