<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kontak Pengurus — Kelompok Tani Beruas Harapan</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-white text-gray-900 flex flex-col min-h-screen">

    <livewire:navbar />

    <main class="bg-stone-50/50 flex-grow pb-20">

        {{-- Header Section --}}
        <section class="relative overflow-hidden bg-gradient-to-b from-emerald-900/10 via-stone-50 to-stone-50 pt-12 pb-12 lg:pt-16 lg:pb-16">
            <div class="pointer-events-none absolute inset-0 -z-10 opacity-30 bg-[radial-gradient(#10b981_1px,transparent_1px)] [background-size:24px_24px]"></div>

            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
                {{-- Badge --}}
                <div class="inline-flex items-center gap-2 rounded-full border border-emerald-200 bg-emerald-50/80 px-3.5 py-1.5 text-xs font-semibold text-emerald-800 shadow-sm backdrop-blur-sm">
                    <span class="flex h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    Layanan Informasi & Kemitraan
                </div>

                {{-- Title --}}
                <h1 class="mt-4 text-3xl font-extrabold tracking-tight text-stone-900 sm:text-4xl lg:text-5xl">
                    Hubungi Pengurus Kelompok
                </h1>
                <p class="mt-4 text-base text-stone-600 sm:text-lg max-w-2xl mx-auto">
                    Silakan hubungi pengurus Kelompok Tani <strong class="text-stone-800">Beruas Harapan</strong> di Desa Sungai Payang untuk informasi kerja sama, hasil panen, maupun konsultasi.
                </p>
            </div>
        </section>

        {{-- Main Content Section --}}
        <section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 -mt-2">

            @if ($contacts->count() > 0)
                {{-- Detail Profile Grid --}}
                <div class="grid gap-8 {{ $contacts->count() == 1 ? 'max-w-3xl mx-auto grid-cols-1' : 'grid-cols-1 lg:grid-cols-2' }}">
                    @foreach ($contacts as $item)
                        @php
                            // Normalisasi nomor telepon untuk link WhatsApp (mengubah 08xx ke 628xx)
                            $cleanPhone = preg_replace('/[^0-9]/', '', $item->nomor);
                            if (str_starts_with($cleanPhone, '0')) {
                                $cleanPhone = '62' . substr($cleanPhone, 1);
                            }
                        @endphp

                        <div class="group relative flex flex-col sm:flex-row overflow-hidden rounded-3xl border border-stone-200 bg-white shadow-sm hover:shadow-xl hover:border-emerald-300 transition-all duration-300">
                            
                            {{-- Foto Profil Besar / Accent Panel --}}
                            <div class="sm:w-2/5 relative min-h-[220px] sm:min-h-full bg-stone-100 flex items-center justify-center overflow-hidden shrink-0">
                                @if ($item->foto && $item->foto !== '-' && Storage::disk('public')->exists($item->foto))
                                    <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}" class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-500">
                                @else
                                    <div class="flex h-full w-full items-center justify-center bg-gradient-to-br from-emerald-800 to-emerald-950 text-white font-black text-4xl uppercase tracking-widest min-h-[200px]">
                                        {{ substr($item->nama, 0, 2) }}
                                    </div>
                                @endif
                                
                                <div class="absolute top-3 left-3 sm:hidden">
                                    <span class="inline-block text-xs font-bold text-emerald-900 bg-white/90 backdrop-blur-md px-3 py-1 rounded-full shadow-sm">
                                        {{ $item->posisi ?? 'Pengurus' }}
                                    </span>
                                </div>
                            </div>

                            {{-- Informasi Detail --}}
                            <div class="p-6 sm:p-8 sm:w-3/5 flex flex-col justify-between">
                                <div>
                                    <div class="hidden sm:block mb-2">
                                        <span class="inline-block text-xs font-bold tracking-wider uppercase text-emerald-800 bg-emerald-50 border border-emerald-200/80 px-3 py-1 rounded-full">
                                            {{ $item->posisi ?? 'Pengurus Kelompok' }}
                                        </span>
                                    </div>

                                    <h3 class="text-xl sm:text-2xl font-bold text-stone-900 leading-tight">
                                        {{ $item->nama }}
                                    </h3>

                                    {{-- Deskripsi Profil --}}
                                    {{-- Deskripsi Profil (Hanya tampil jika ada data) --}}
@if ($item->deskripsi && $item->deskripsi !== '-')
    <p class="mt-3 text-xs sm:text-sm text-stone-600 leading-relaxed">
        {{ $item->deskripsi }}
    </p>
@endif
                                    {{-- Detail Kontak Lengkap --}}
                                    <div class="mt-6 space-y-3 pt-4 border-t border-stone-100">
                                        {{-- WhatsApp / Telepon --}}
                                        <div class="flex items-center gap-3">
                                            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-emerald-700 border border-emerald-100">
                                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-2.896-1.596-5.48-4.18-7.076-7.076l1.293-.97c.362-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <span class="block text-[10px] uppercase tracking-wider text-stone-400 font-semibold">Telepon / Whatsapp</span>
                                                <span class="text-xs sm:text-sm font-bold text-stone-800">{{ $item->nomor }}</span>
                                            </div>
                                        </div>

                                        {{-- Email --}}
                                        @if ($item->email && $item->email !== '-')
                                            <div class="flex items-center gap-3">
                                                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-emerald-700 border border-emerald-100">
                                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25H4.5a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5H4.5a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <span class="block text-[10px] uppercase tracking-wider text-stone-400 font-semibold">Email Official</span>
                                                    <span class="text-xs sm:text-sm font-medium text-stone-700">{{ $item->email }}</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                {{-- Action Button --}}
                                <div class="mt-8 pt-4 border-t border-stone-100">
                                    <a href="https://wa.me/{{ $cleanPhone }}" 
                                       target="_blank"
                                       class="flex w-full items-center justify-center gap-2 rounded-xl bg-emerald-700 px-5 py-3 text-xs sm:text-sm font-bold text-white shadow-sm transition-all hover:bg-emerald-800 hover:shadow-md active:scale-95">
                                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/>
                                        </svg>
                                        Kirim Pesan WhatsApp
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                    
                {{-- Jam Operasional & Catatan Tambahan --}}
                <div class="mt-12 rounded-3xl border border-stone-200 bg-white p-6 sm:p-8 shadow-sm">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 divide-y md:divide-y-0 md:divide-x divide-stone-100">
                        <div class="flex items-start gap-4">
                            <div class="p-3 bg-emerald-50 text-emerald-700 rounded-2xl shrink-0">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-stone-900">Jam Layanan Pesan</h4>
                                <p class="text-xs text-stone-500 mt-1">Senin - Sabtu: 08.00 - 17.00 WITA<br>Respon cepat pada jam kerja.</p>
                            </div>
                        </div>

                        <div class="pt-4 md:pt-0 md:pl-6 flex items-start gap-4">
                            <div class="p-3 bg-emerald-50 text-emerald-700 rounded-2xl shrink-0">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-stone-900">Lokasi Sekretariat</h4>
                                <p class="text-xs text-stone-500 mt-1">Desa Sungai Payang, Kec. Loa Kulu, Kab. Kutai Kartanegara.</p>
                            </div>
                        </div>

                        <div class="pt-4 md:pt-0 md:pl-6 flex items-start gap-4">
                            <div class="p-3 bg-emerald-50 text-emerald-700 rounded-2xl shrink-0">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-stone-900">Kemitraan Langsung</h4>
                                <p class="text-xs text-stone-500 mt-1">Untuk pemesanan komoditas jumlah besar dapat menghubungi pengurus langsung.</p>
                            </div>
                        </div>
                    </div>
                </div>

            @else
                {{-- Empty State --}}
                <div class="rounded-3xl border border-dashed border-stone-300 bg-white p-12 text-center shadow-sm max-w-xl mx-auto">
                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600">
                        <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                    </div>
                    <h3 class="mt-4 text-lg font-bold text-stone-900">Belum Ada Kontak Pengurus</h3>
                    <p class="mt-2 text-xs text-stone-500 max-w-sm mx-auto">
                        Daftar kontak pengurus kelompok tani sedang diperbarui oleh pihak administrator.
                    </p>
                </div>
            @endif

        </section>

    </main>

    <livewire:footer />

    @livewireScripts
</body>
</html>