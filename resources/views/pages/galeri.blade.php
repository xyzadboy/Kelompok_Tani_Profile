<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Galeri Kegiatan — Kelompok Tani Beruas Harapan</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-stone-50/60 text-stone-900 antialiased selection:bg-emerald-500 selection:text-white">

    <livewire:navbar />

    <main class="min-h-screen pb-24">

        {{-- Header Section --}}
        <section class="relative overflow-hidden bg-gradient-to-b from-emerald-900/10 via-stone-50/50 to-stone-50 pt-12 pb-16 lg:pt-16 lg:pb-20">
            <div class="pointer-events-none absolute inset-0 -z-10 opacity-30 bg-[radial-gradient(#10b981_1px,transparent_1px)] [background-size:24px_24px]"></div>

            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
                {{-- Badge --}}
                <div class="inline-flex items-center gap-2 rounded-full border border-emerald-200/80 bg-emerald-50/80 px-3.5 py-1.5 text-xs font-semibold text-emerald-800 shadow-sm backdrop-blur-sm">
                    <span class="flex h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    Dokumentasi Lapangan
                </div>

                {{-- Title --}}
                <h1 class="mt-4 text-3xl font-extrabold tracking-tight text-stone-900 sm:text-4xl lg:text-5xl">
                    Galeri Kegiatan Petani
                </h1>
                <p class="mt-4 text-base text-stone-600 sm:text-lg max-w-2xl mx-auto leading-relaxed">
                    Kumpulan momen, aktivitas pertanian, gotong royong, dan perkembangan lahan Kelompok Tani <strong class="text-stone-800">Beruas Harapan</strong> di Desa Sungai Payang.
                </p>
            </div>
        </section>

        {{-- Main Content Section --}}
        <section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 -mt-4">

            @if ($galleries->count() > 0)
                {{-- Grid Galeri Foto (Maksimal 2 Kolom per Baris) --}}
                <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-2">
                    @foreach ($galleries as $item)
                        <div class="group relative flex flex-col justify-between overflow-hidden rounded-3xl border border-stone-200/80 bg-white p-4 shadow-sm hover:shadow-2xl hover:border-emerald-300 transition-all duration-300">
                            
                            {{-- Image Container (Ukuran Lebih Besar - Aspect 16:10) --}}
                            <div class="relative aspect-[16/10] w-full overflow-hidden rounded-2xl bg-stone-100">
                                <img src="{{ asset('storage/' . $item->gambar) }}" 
                                     alt="{{ $item->judul }}" 
                                     class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-105"
                                     loading="lazy">
                                
                                {{-- Dark Overlay Gradient --}}
                                <div class="absolute inset-0 bg-gradient-to-t from-stone-950/60 via-stone-950/5 to-transparent opacity-30 group-hover:opacity-50 transition-opacity duration-300"></div>

                                {{-- Floating Date Badge (Top Left) --}}
                                <div class="absolute top-4 left-4 flex items-center gap-1.5 rounded-full bg-white/90 px-3.5 py-1.5 text-xs font-semibold text-stone-700 backdrop-blur-md shadow-sm border border-white/50">
                                    <svg class="h-4 w-4 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 9v7.5" />
                                    </svg>
                                    {{ $item->created_at->translatedFormat('d M Y') }}
                                </div>
                            </div>

                            {{-- Card Body --}}
                            <div class="px-2 pt-5 pb-2 flex-1 flex flex-col justify-between">
                                <div>
                                    <h3 class="text-lg sm:text-xl font-extrabold text-stone-900 group-hover:text-emerald-700 transition-colors leading-snug">
                                        {{ $item->judul }}
                                    </h3>

                                    @if ($item->deskripsi)
                                        <p class="mt-2.5 text-sm text-stone-600 leading-relaxed">
                                            {{ $item->deskripsi }}
                                        </p>
                                    @endif
                                </div>

                                {{-- Card Footer --}}
                                <div class="mt-6 pt-4 border-t border-stone-100 flex items-center justify-between text-xs">
                                    <span class="inline-flex items-center gap-2 font-semibold text-emerald-800 bg-emerald-50/80 px-3 py-1.5 rounded-xl">
                                        <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                                        Beruas Harapan
                                    </span>

                                    <span class="text-xs font-medium text-stone-400">
                                        Dokumentasi Lapangan
                                    </span>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>

                {{-- Pagination Links --}}
                <div class="mt-14">
                    {{ $galleries->links() }}
                </div>
            @else
                {{-- Empty State --}}
                <div class="rounded-3xl border border-dashed border-stone-300 bg-white p-12 lg:p-16 text-center shadow-sm max-w-xl mx-auto">
                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600 ring-8 ring-emerald-50/50">
                        <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                        </svg>
                    </div>
                    <h3 class="mt-4 text-lg font-bold text-stone-900">Belum Ada Foto Galeri</h3>
                    <p class="mt-2 text-xs text-stone-500 max-w-sm mx-auto leading-relaxed">
                        Foto-foto dokumentasi kegiatan lapangan akan segera diunggah oleh pengurus kelompok tani.
                    </p>
                </div>
            @endif

        </section>

    </main>

    @livewireScripts
    <livewire:footer />
</body>
</html>