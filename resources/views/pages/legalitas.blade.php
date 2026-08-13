<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Legalitas — Kelompok Tani Beruas Harapan</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-white text-gray-900 flex flex-col min-h-screen">

    <livewire:navbar />

    <main class="bg-stone-50/50 flex-grow pb-20">

        {{-- Header Section --}}
        <section class="relative overflow-hidden bg-gradient-to-b from-emerald-900/10 via-stone-50 to-stone-50 pt-12 pb-16 lg:pt-16 lg:pb-20">
            <div class="pointer-events-none absolute inset-0 -z-10 opacity-30 bg-[radial-gradient(#10b981_1px,transparent_1px)] [background-size:24px_24px]"></div>

            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
                {{-- Badge --}}
                <div class="inline-flex items-center gap-2 rounded-full border border-emerald-200 bg-emerald-50/80 px-3.5 py-1.5 text-xs font-semibold text-emerald-800 shadow-sm backdrop-blur-sm">
                    <span class="flex h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    Transparansi & Akuntabilitas
                </div>

                {{-- Title --}}
                <h1 class="mt-4 text-3xl font-extrabold tracking-tight text-stone-900 sm:text-4xl lg:text-5xl">
                    Dokumen & Legalitas Kelompok
                </h1>
                <p class="mt-4 text-base text-stone-600 sm:text-lg max-w-2xl mx-auto">
                    Kelompok Tani <strong class="text-stone-800">Beruas Harapan</strong> terdaftar secara resmi dan diakui oleh instansi pemerintah setempat di Desa Sungai Payang, Kutai Kartanegara.
                </p>
            </div>
        </section>

        {{-- Main Content Section --}}
        <section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 -mt-6">
            
            {{-- Alert Notifikasi jika file gagal diunduh --}}
            @if (session('error'))
                <div class="mb-6 rounded-2xl bg-red-50 p-4 text-sm text-red-700 border border-red-200 flex items-center justify-between">
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            {{-- Grid Legalitas Cards --}}
            @if ($legalitasList->count() > 0)
                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($legalitasList as $item)
                        <div class="flex flex-col justify-between rounded-3xl border border-stone-200 bg-white p-6 shadow-sm transition-all hover:shadow-md hover:border-emerald-200">
                            <div>
                                {{-- Card Header Icon & Badge --}}
                                <div class="flex items-center justify-between mb-4">
                                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-100 text-emerald-800">
                                        {{-- Document Icon --}}
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                        </svg>
                                    </div>
                                    <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700 border border-emerald-200">
                                        Resmi / Sah
                                    </span>
                                </div>

                                {{-- Legal Title & Number --}}
                                <h3 class="text-xl font-bold text-stone-900 leading-snug">
                                    {{ $item->nama }}
                                </h3>
                                <div class="mt-2 inline-flex items-center gap-1.5 text-xs font-mono font-medium text-stone-500 bg-stone-100 px-2.5 py-1 rounded-md">
                                    <span>No:</span>
                                    <span class="text-stone-800 font-semibold">{{ $item->nomor }}</span>
                                </div>

                                {{-- Description / Notes --}}
                                @if ($item->keterangan)
                                    <p class="mt-4 text-xs text-stone-600 leading-relaxed">
                                        {{ $item->keterangan }}
                                    </p>
                                @endif
                            </div>

                         
                        </div>
                    @endforeach
                </div>
            @else
                {{-- Empty State (Jika belum ada data) --}}
                <div class="rounded-3xl border border-dashed border-stone-300 bg-white p-12 text-center shadow-sm">
                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-amber-50 text-amber-600">
                        <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                        </svg>
                    </div>
                    <h3 class="mt-4 text-lg font-bold text-stone-900">Belum Ada Dokumen Legalitas</h3>
                    <p class="mt-2 text-xs text-stone-500 max-w-sm mx-auto">
                        Dokumen legalitas kelompok tani saat ini sedang dalam proses pembaruan data administratif.
                    </p>
                </div>
            @endif

        </section>

    </main>

    {{-- Footer Component --}}
    <livewire:footer />

    @livewireScripts
</body>
</html>