<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $blog->judul }} — Kelompok Tani Beruas Harapan</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-white text-gray-900">

    <livewire:navbar />

    <main class="bg-stone-50/50 min-h-screen pb-20">

        <article class="pt-8 pb-16">
            <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
                
                {{-- Tombol Kembali --}}
                <div class="mb-6">
                    <a href="{{ route('blog.index') }}" class="inline-flex items-center gap-2 text-xs font-semibold text-emerald-700 hover:text-emerald-900">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                        </svg>
                        Kembali ke Blog & Artikel
                    </a>
                </div>

                {{-- Header Artikel --}}
                <header class="text-left">
                    <div class="inline-flex items-center gap-2 text-xs font-medium text-stone-500 bg-stone-200/60 px-3 py-1 rounded-full mb-4">
                        <svg class="h-4 w-4 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 9v7.5" />
                        </svg>
                        Dipublikasikan pada {{ optional($blog->published_at)->translatedFormat('d F Y') ?? $blog->created_at->translatedFormat('d F Y') }}
                    </div>

                    <h1 class="text-2xl font-extrabold tracking-tight text-stone-900 sm:text-3xl lg:text-4xl leading-tight">
                        {{ $blog->judul }}
                    </h1>
                </header>

                {{-- Gambar Utama (Rasio 16:9 standar blog) --}}
                <div class="mt-6 overflow-hidden rounded-2xl border border-stone-200 shadow-sm bg-stone-100 aspect-[16/9] w-full">
                    <img src="{{ asset('storage/' . $blog->thumbnail) }}" 
                         alt="{{ $blog->judul }}" 
                         class="w-full h-full object-cover">
                </div>

                {{-- Isi Artikel dengan Rendering HTML Rich Text --}}
                <div class="mt-8 rounded-2xl border border-stone-200 bg-white p-6 sm:p-8 shadow-sm">
                    <div class="prose prose-stone max-w-none prose-emerald 
                                prose-p:text-stone-700 prose-p:leading-relaxed prose-p:mb-4
                                prose-headings:font-bold prose-headings:text-stone-900 prose-headings:mt-6 prose-headings:mb-3
                                prose-ul:list-disc prose-ul:pl-5 prose-ol:list-decimal prose-ol:pl-5
                                prose-a:text-emerald-700 prose-a:underline hover:prose-a:text-emerald-900
                                prose-img:rounded-xl prose-img:mx-auto">
                        {!! $blog->isi !!}
                    </div>
                </div>

            </div>
        </article>

        {{-- Artikel Terkait (Rekomendasi) --}}
        @if (isset($relatedBlogs) && $relatedBlogs->count() > 0)
            <section class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8 border-t border-stone-200 pt-12">
                <h3 class="text-xl font-bold text-stone-900 mb-6">Artikel Lainnya</h3>
                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($relatedBlogs as $item)
                        <div class="flex flex-col justify-between overflow-hidden rounded-2xl border border-stone-200 bg-white p-4 shadow-sm hover:border-emerald-200 hover:shadow-md transition-all">
                            <div>
                                <span class="text-[10px] font-semibold text-emerald-700 bg-emerald-50 px-2.5 py-0.5 rounded-full">
                                    {{ optional($item->published_at)->translatedFormat('d M Y') ?? $item->created_at->translatedFormat('d M Y') }}
                                </span>
                                <h4 class="font-bold text-stone-900 text-sm leading-snug line-clamp-2 mt-2">
                                    <a href="{{ route('blog.show', $item->slug) }}" class="hover:text-emerald-700 transition-colors">
                                        {{ $item->judul }}
                                    </a>
                                </h4>
                                <p class="mt-2 text-xs text-stone-500 line-clamp-2">
                                    {{ Str::limit(strip_tags($item->isi), 80) }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

    </main>

    @livewireScripts
    <livewire:footer />
</body>
</html>