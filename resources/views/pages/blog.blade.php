<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Blog & Berita — Kelompok Tani Beruas Harapan</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-white text-gray-900">

    <livewire:navbar />

    <main class="bg-stone-50/50 min-h-screen pb-20">

        {{-- Header Section --}}
        <section class="relative overflow-hidden bg-gradient-to-b from-emerald-900/10 via-stone-50 to-stone-50 pt-12 pb-16 lg:pt-16 lg:pb-20">
            <div class="pointer-events-none absolute inset-0 -z-10 opacity-30 bg-[radial-gradient(#10b981_1px,transparent_1px)] [background-size:24px_24px]"></div>

            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
                <div class="inline-flex items-center gap-2 rounded-full border border-emerald-200 bg-emerald-50/80 px-3.5 py-1.5 text-xs font-semibold text-emerald-800 shadow-sm backdrop-blur-sm">
                    <span class="flex h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    Kabar & Edukasi Tani
                </div>

                <h1 class="mt-4 text-3xl font-extrabold tracking-tight text-stone-900 sm:text-4xl lg:text-5xl">
                    Berita & Artikel Terbaru
                </h1>
                <p class="mt-4 text-base text-stone-600 sm:text-lg max-w-2xl mx-auto">
                    Informasi seputar kegiatan kelompok, tips pertanian modern, serta kabar panen Kelompok Tani <strong class="text-stone-800">Beruas Harapan</strong>.
                </p>
            </div>
        </section>

        {{-- Main Content Section --}}
        <section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 -mt-6">

            @if ($blogs->count() > 0)
                <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($blogs as $item)
                        <article class="group flex flex-col justify-between overflow-hidden rounded-3xl border border-stone-200 bg-white shadow-sm transition-all hover:-translate-y-1 hover:shadow-xl hover:border-emerald-200">
                            <div>
                                {{-- Thumbnail --}}
                                <div class="relative h-52 w-full overflow-hidden bg-stone-100">
                                    <img src="{{ asset('storage/' . $item->thumbnail) }}" 
                                         alt="{{ $item->judul }}" 
                                         class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                                         loading="lazy">
                                </div>

                                {{-- Content Info --}}
                                <div class="p-6">
                                    <div class="flex items-center gap-2 text-xs text-stone-400 mb-3">
                                        <svg class="h-4 w-4 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 9v7.5" />
                                        </svg>
                                        {{ optional($item->published_at)->translatedFormat('d M Y') ?? $item->created_at->translatedFormat('d M Y') }}
                                    </div>

                                    <h2 class="text-xl font-bold text-stone-900 group-hover:text-emerald-700 transition-colors leading-snug line-clamp-2">
                                        <a href="{{ route('blog.show', $item->slug) }}">
                                            {{ $item->judul }}
                                        </a>
                                    </h2>

                                    <p class="mt-3 text-xs text-stone-600 leading-relaxed line-clamp-3">
                                        {{ Str::limit(strip_tags($item->isi), 120) }}
                                    </p>
                                </div>
                            </div>

                            <div class="px-6 pb-6 pt-2">
                                <a href="{{ route('blog.show', $item->slug) }}" 
                                   class="inline-flex items-center gap-1.5 text-xs font-semibold text-emerald-700 hover:text-emerald-900 group-hover:translate-x-1 transition-all">
                                    Baca Selengkapnya
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                    </svg>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>

                {{-- Pagination Links --}}
                <div class="mt-12">
                    {{ $blogs->links() }}
                </div>
            @else
                <div class="rounded-3xl border border-dashed border-stone-300 bg-white p-12 text-center shadow-sm">
                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600">
                        <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.75c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-3.75m1.5-12a1.5 1.5 0 00-1.5-1.5H5.25A1.5 1.5 0 003 6v12a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5V7.5" />
                        </svg>
                    </div>
                    <h3 class="mt-4 text-lg font-bold text-stone-900">Belum Ada Artikel Published</h3>
                    <p class="mt-2 text-xs text-stone-500 max-w-sm mx-auto">
                        Artikel dan berita kegiatan kelompok tani akan segera dipublikasikan.
                    </p>
                </div>
            @endif

        </section>

    </main>

    @livewireScripts
    <livewire:footer />
</body>
</html>