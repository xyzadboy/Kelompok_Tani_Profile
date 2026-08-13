<footer class="bg-stone-950 text-stone-300">
    <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">

        {{-- Main Footer Grid (4 Kolom Layout) --}}
        <div class="grid grid-cols-1 gap-10 md:grid-cols-2 lg:grid-cols-4">

            {{-- Column 1: Brand & Bio --}}
            <div class="space-y-4">

                <a href="/" class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-emerald-500 to-green-700 text-white shadow-md">
                        <svg
                            class="h-6 w-6"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 21V11m0 0C12 7.5 9 5 5 5c0 4 2.5 7 7 6zm0 0c0-3.5 3-6 7-6 0 4-2.5 7-7 6z"
                            />
                        </svg>
                    </div>

                    <div class="flex flex-col">
                        <span class="text-lg font-bold tracking-tight text-white">
                            Beruas Harapan
                        </span>
                        <span class="text-[10px] font-semibold uppercase tracking-wider text-amber-500">
                            Kelompok Tani Sejahtera
                        </span>
                    </div>
                </a>

                <p class="text-sm leading-relaxed text-stone-400">
                    Wadah kolaborasi dan pemberdayaan petani lokal untuk
                    mewujudkan ketahanan pangan, inovasi pertanian berkelanjutan,
                    dan kesejahteraan bersama.
                </p>

                {{-- Legal Badge --}}
                <div class="inline-flex items-center gap-2 rounded-lg border border-emerald-800/40 bg-emerald-950/50 px-3 py-1.5 text-xs text-emerald-400">
                    <svg
                        class="h-4 w-4 text-emerald-400"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.746 3.746 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.746 3.746 0 011.043-3.296 3.745 3.745 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z"
                        />
                    </svg>
                    <span>
                        Terdaftar & Terverifikasi Resmi
                    </span>
                </div>

            </div>


            {{-- Column 2: Peta Lokasi (Menggantikan Navigasi) --}}
            <div class="space-y-3">
                <h3 class="text-sm font-semibold uppercase tracking-wider text-white">
                    Peta Lokasi Sekretariat
                </h3>

                <div class="overflow-hidden rounded-xl border border-stone-800 bg-stone-900 shadow-sm">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.603466969503!2d117.0936407!3d-0.5946125999999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df6817b0fec5aa7%3A0x70168bbbc4d8e2b2!2sSekretariat%20Kelompok%20Tani%20Beruas%20Harapan!5e0!3m2!1sen!2sid!4v1786344455686!5m2!1sen!2sid" 
                        class="h-44 w-full border-0 grayscale transition-all duration-300 hover:grayscale-0" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="strict-origin-when-cross-origin"
                    ></iframe>
                </div>
            </div>


            {{-- Column 3: Komoditas Utama --}}
            <div>
                <h3 class="text-sm font-semibold uppercase tracking-wider text-white">
                    Fokus Hasil Tani
                </h3>

                <ul class="mt-4 space-y-2.5 text-sm text-stone-400">
                    <li class="flex items-center gap-2">
                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                        Padi & Palawija
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                        Sayuran Organik
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                        Hortikultura
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                        Pupuk Organik Lokal
                    </li>
                </ul>
            </div>


            {{-- Column 4: Kontak & Sekretariat --}}
            <div class="space-y-4">
                <h3 class="text-sm font-semibold uppercase tracking-wider text-white">
                    Sekretariat
                </h3>

                <ul class="space-y-3 text-sm text-stone-400">
                    {{-- Address --}}
                    <li class="flex items-start gap-2.5">
                        <svg
                            class="mt-0.5 h-5 w-5 shrink-0 text-emerald-500"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"
                            />
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"
                            />
                        </svg>
                        <span>
                            Jl. Tani Makmur No. 12, Desa Beruas, Indonesia
                        </span>
                    </li>

                    {{-- Phone --}}
                    <li class="flex items-center gap-2.5">
                        <svg
                            class="h-5 w-5 shrink-0 text-emerald-500"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-2.828-1.415-5.12-3.707-6.535-6.535l1.293-.97c.362-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"
                            />
                        </svg>
                        <span>
                            +62 812-3456-7890
                        </span>
                    </li>

                    {{-- Email --}}
                    <li class="flex items-center gap-2.5">
                        <svg
                            class="h-5 w-5 shrink-0 text-emerald-500"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"
                            />
                        </svg>
                        <span>
                            kontak@beruasharapan.id
                        </span>
                    </li>
                </ul>
            </div>

        </div>


        {{-- Bottom Copyright Section --}}
        <div class="mt-12 flex flex-col items-center justify-between gap-4 border-t border-stone-800 pt-8 text-xs text-stone-500 sm:flex-row">
            <p>
                © {{ date('Y') }}
                Kelompok Tani Beruas Harapan.
                Hak Cipta Dilindungi.
            </p>

            <p class="flex items-center gap-1">
                Dirancang untuk kemajuan pertanian lokal
            </p>
        </div>

    </div>
</footer>