<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Peta Lahan — Kelompok Tani Beruas Harapan</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-white text-gray-900 flex flex-col min-h-screen">

    <livewire:navbar />

    <main class="bg-stone-50/50 py-10 flex-grow">
        {{-- Leaflet CSS & JS --}}
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            {{-- Header Section --}}
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 border-b border-stone-200 pb-6">
                <div>
                    <div class="inline-flex items-center gap-2 rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-800 border border-emerald-200">
                        <span class="h-2 w-2 rounded-full bg-emerald-600 animate-pulse"></span>
                        GIS Interactive Map — Desa Batuah, Kec. Loa Janan
                    </div>
                    <h1 class="mt-2 text-3xl font-extrabold text-stone-900 tracking-tight sm:text-4xl">
                        Peta Pemetaan & Detail Blok Lahan
                    </h1>
                    <p class="mt-1 text-sm text-stone-600">
                        Peta lokasi presisi berbasis koordinat geografis dan pembagian kavling garapan anggota Kelompok Tani Beruas Harapan.
                    </p>
                </div>
                <div>
                    <button onclick="location.reload()" class="rounded-lg bg-emerald-600 px-4 py-2 text-sm font-medium text-white hover:bg-emerald-700 transition-colors">
                        🔄 Refresh Data
                    </button>
                </div>
            </div>

            {{-- Main Map Section --}}
            <div class="mt-8 grid grid-cols-1 lg:grid-cols-12 gap-8" x-data="mapComponent()" x-init="initMap()">

                {{-- Interactive Map View (8 Cols) --}}
                <div class="lg:col-span-8 space-y-4">
                    <div class="rounded-2xl border border-stone-200 bg-white p-4 shadow-sm">
                        {{-- Map Header & Layer Selector --}}
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-3">
                            <div class="flex items-center gap-2">
                                <span class="font-bold text-sm text-stone-800">Tampilan Peta Digital</span>
                                <span class="text-xs text-stone-500">(Gunakan zoom untuk memperbesar lokasi blok)</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <button
                                    type="button"
                                    @click="setTileLayer('satelit')"
                                    :class="activeLayer === 'satelit' ? 'bg-emerald-700 text-white' : 'bg-stone-100 text-stone-700 hover:bg-stone-200'"
                                    class="rounded-lg px-3 py-1 text-xs font-medium transition-colors"
                                >
                                    Satelit
                                </button>
                                <button
                                    type="button"
                                    @click="setTileLayer('jalan')"
                                    :class="activeLayer === 'jalan' ? 'bg-emerald-700 text-white' : 'bg-stone-100 text-stone-700 hover:bg-stone-200'"
                                    class="rounded-lg px-3 py-1 text-xs font-medium transition-colors"
                                >
                                    Jalan / Topografi
                                </button>
                            </div>
                        </div>

                        {{-- Map Container --}}
                        <div id="map" class="h-[500px] w-full rounded-xl border border-stone-200 z-10"></div>
                    </div>

                    {{-- Table Data List --}}
                    <div class="rounded-2xl border border-stone-200 bg-white overflow-hidden shadow-sm">
                        <div class="p-4 border-b border-stone-100 flex items-center justify-between">
                            <h3 class="text-sm font-bold text-stone-900">Daftar Kavling & Penanggung Jawab</h3>
                            <span class="text-xs text-stone-500">Klik 'Fokus Lokasi' untuk menuju ke titik peta</span>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-xs text-stone-600">
                                <thead class="bg-stone-50 border-b border-stone-200 uppercase text-[10px] font-semibold tracking-wider text-stone-500">
                                    <tr>
                                        <th class="px-4 py-3">Kode Blok</th>
                                        <th class="px-4 py-3">Penanggung Jawab</th>
                                        <th class="px-4 py-3">Luas</th>
                                        <th class="px-4 py-3">Komoditas</th>
                                        <th class="px-4 py-3">Status</th>
                                        <th class="px-4 py-3 text-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-stone-100">
                                    <!-- Loading State -->
                                    <tr x-show="loading">
                                        <td colspan="6" class="px-4 py-8 text-center text-stone-500">
                                            <div class="flex items-center justify-center gap-2">
                                                <svg class="animate-spin h-5 w-5 text-emerald-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                                </svg>
                                                Memuat data...
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Data Rows -->
                                    <template x-for="block in blocks" :key="block.id">
                                        <tr class="hover:bg-emerald-50/40 transition-colors">
                                            <td class="px-4 py-3 font-bold text-emerald-800" x-text="block.kode_blok"></td>
                                            <td class="px-4 py-3 font-medium text-stone-900" x-text="block.penanggung_jawab"></td>
                                            <td class="px-4 py-3" x-text="block.luas + ' Ha'"></td>
                                            <td class="px-4 py-3" x-text="block.komoditas"></td>
                                            <td class="px-4 py-3">
                                                <span x-show="block.status === 'aktif'" class="inline-flex items-center gap-1 rounded-full bg-emerald-100 px-2 py-0.5 text-[10px] font-semibold text-emerald-800">
                                                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-600"></span>
                                                    Aktif
                                                </span>
                                                <span x-show="block.status === 'nonaktif'" class="inline-flex items-center gap-1 rounded-full bg-red-100 px-2 py-0.5 text-[10px] font-semibold text-red-800">
                                                    <span class="h-1.5 w-1.5 rounded-full bg-red-600"></span>
                                                    Nonaktif
                                                </span>
                                                <span x-show="block.status === 'perawatan'" class="inline-flex items-center gap-1 rounded-full bg-yellow-100 px-2 py-0.5 text-[10px] font-semibold text-yellow-800">
                                                    <span class="h-1.5 w-1.5 rounded-full bg-yellow-600"></span>
                                                    Perawatan
                                                </span>
                                            </td>
                                            <td class="px-4 py-3 text-right">
                                                <button
                                                    type="button"
                                                    @click="focusOnBlock(block)"
                                                    class="rounded-md bg-emerald-100 px-2.5 py-1 text-[11px] font-semibold text-emerald-800 hover:bg-emerald-200 transition-colors"
                                                >
                                                    📍 Fokus Lokasi
                                                </button>
                                            </td>
                                        </tr>
                                    </template>

                                    <!-- Empty State -->
                                    <tr x-show="!loading && blocks.length === 0">
                                        <td colspan="6" class="px-4 py-8 text-center text-stone-500">
                                            <svg class="mx-auto h-12 w-12 text-stone-400 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <p>Belum ada data blok lahan.</p>
                                            <p class="text-xs mt-1">Silahkan tambahkan data melalui admin panel.</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- Right Panel: Selected Block Detail (4 Cols) --}}
                <div class="lg:col-span-4 space-y-6">
                    <div class="rounded-2xl border border-stone-200 bg-white p-6 shadow-sm sticky top-24">
                        <h3 class="text-base font-bold text-stone-900 border-b border-stone-100 pb-3">
                            Detail Informasi Blok
                        </h3>

                        <template x-if="selectedBlock">
                            <div class="mt-4 space-y-4 text-xs">
                                <div class="flex justify-between items-center bg-emerald-50 p-3 rounded-xl border border-emerald-100">
                                    <span class="text-stone-500 font-medium">Kode Garapan</span>
                                    <span class="text-sm font-extrabold text-emerald-900" x-text="selectedBlock.kode_blok"></span>
                                </div>

                                <div class="space-y-1">
                                    <label class="text-stone-400 font-medium">Penanggung Jawab / Pengelola</label>
                                    <p class="text-sm font-bold text-stone-800" x-text="selectedBlock.penanggung_jawab"></p>
                                    <p class="text-xs text-stone-500" x-text="selectedBlock.telepon"></p>
                                </div>

                                <div class="grid grid-cols-2 gap-3">
                                    <div class="bg-stone-50 p-3 rounded-xl border border-stone-100">
                                        <span class="text-stone-400 block mb-0.5">Luas Lahan</span>
                                        <span class="font-bold text-stone-800 text-sm" x-text="selectedBlock.luas + ' Ha'"></span>
                                    </div>
                                    <div class="bg-stone-50 p-3 rounded-xl border border-stone-100">
                                        <span class="text-stone-400 block mb-0.5">Komoditas Utama</span>
                                        <span class="font-bold text-emerald-700 text-xs" x-text="selectedBlock.komoditas"></span>
                                    </div>
                                </div>

                                <div class="space-y-1">
                                    <label class="text-stone-400 font-medium">Koordinat</label>
                                    <p class="font-mono bg-stone-900 text-amber-400 p-2.5 rounded-xl text-[11px]" x-text="selectedBlock.latitude + ', ' + selectedBlock.longitude"></p>
                                </div>

                                <div class="space-y-1" x-show="selectedBlock.deskripsi">
                                    <label class="text-stone-400 font-medium">Deskripsi</label>
                                    <p class="text-sm text-stone-700 bg-stone-50 p-2.5 rounded-xl border border-stone-100" x-text="selectedBlock.deskripsi"></p>
                                </div>

                                <div class="space-y-1" x-show="selectedBlock.alamat">
                                    <label class="text-stone-400 font-medium">Alamat</label>
                                    <p class="text-sm text-stone-700" x-text="selectedBlock.alamat"></p>
                                </div>

                                <div class="grid grid-cols-2 gap-3" x-show="selectedBlock.tanggal_tanam">
                                    <div class="bg-stone-50 p-3 rounded-xl border border-stone-100">
                                        <span class="text-stone-400 block mb-0.5">Tanggal Tanam</span>
                                        <span class="font-bold text-stone-800 text-xs" x-text="selectedBlock.tanggal_tanam"></span>
                                    </div>
                                    <div class="bg-stone-50 p-3 rounded-xl border border-stone-100" x-show="selectedBlock.tanggal_panen">
                                        <span class="text-stone-400 block mb-0.5">Tanggal Panen</span>
                                        <span class="font-bold text-stone-800 text-xs" x-text="selectedBlock.tanggal_panen"></span>
                                    </div>
                                </div>

                                <div class="flex items-center gap-2 bg-stone-50 p-3 rounded-xl border border-stone-100">
                                    <span class="text-stone-400 font-medium">Status</span>
                                    <span x-show="selectedBlock.status === 'aktif'" class="inline-flex items-center gap-1 rounded-full bg-emerald-100 px-2 py-0.5 text-[10px] font-semibold text-emerald-800">
                                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-600"></span>
                                        Aktif
                                    </span>
                                    <span x-show="selectedBlock.status === 'nonaktif'" class="inline-flex items-center gap-1 rounded-full bg-red-100 px-2 py-0.5 text-[10px] font-semibold text-red-800">
                                        <span class="h-1.5 w-1.5 rounded-full bg-red-600"></span>
                                        Nonaktif
                                    </span>
                                    <span x-show="selectedBlock.status === 'perawatan'" class="inline-flex items-center gap-1 rounded-full bg-yellow-100 px-2 py-0.5 text-[10px] font-semibold text-yellow-800">
                                        <span class="h-1.5 w-1.5 rounded-full bg-yellow-600"></span>
                                        Perawatan
                                    </span>
                                </div>

                                {{-- Perbaikan Tag <a> --}}
                                <a :href="'https://www.google.com/maps/search/?api=1&query=' + selectedBlock.latitude + ',' + selectedBlock.longitude"
                                   target="_blank"
                                   class="flex items-center justify-center gap-2 w-full mt-2 rounded-xl bg-emerald-700 py-2.5 text-center text-xs font-semibold text-white shadow-sm hover:bg-emerald-800 transition-colors">
                                    Buka di Google Maps ↗
                                </a>
                            </div>
                        </template>

                        <template x-if="!selectedBlock">
                            <div class="py-12 text-center text-stone-400">
                                <svg class="mx-auto h-10 w-10 text-stone-300 mb-2" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                </svg>
                                <p class="text-xs">Klik pada marker/wilayah blok di dalam peta untuk menampilkan detail pengelola.</p>
                            </div>
                        </template>
                    </div>
                </div>

            </div>
        </div>

        {{-- Script Inisialisasi Peta & Data --}}
        <script>
            function mapComponent() {
                return {
                    map: null,
                    activeLayer: 'satelit',
                    tileLayers: {},
                    selectedBlock: null,
                    markers: [],
                    blocks: [],
                    loading: true,

                    async initMap() {
                        try {
                            const response = await fetch('/get-blocks');

                            if (!response.ok) {
                                throw new Error(`HTTP error! status: ${response.status}`);
                            }

                            const result = await response.json();

                            if (result.success) {
                                this.blocks = result.data;
                            } else {
                                throw new Error(result.message || 'Gagal mengambil data');
                            }

                        } catch (error) {
                            console.error('❌ Gagal mengambil data:', error);
                            this.blocks = [];
                        } finally {
                            this.loading = false;
                        }

                        this.$nextTick(() => {
                            this.map = L.map('map').setView([-0.6640, 117.0860], 15);

                            this.tileLayers.satelit = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                                attribution: 'Tiles &copy; Esri'
                            });

                            this.tileLayers.jalan = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                attribution: '&copy; OpenStreetMap contributors'
                            });

                            this.tileLayers.satelit.addTo(this.map);

                            if (this.blocks.length > 0) {
                                this.renderBlocksOnMap();
                            } else {
                                this.map.setView([-0.6640, 117.0860], 13);
                                L.popup()
                                    .setLatLng([-0.6640, 117.0860])
                                    .setContent('<div class="text-center p-2"><b>📋 Belum Ada Data</b><br><span class="text-xs">Silahkan tambahkan data blok lahan melalui admin panel Filament.</span></div>')
                                    .openOn(this.map);
                            }
                        });
                    },

                    setTileLayer(type) {
                        this.activeLayer = type;
                        if (type === 'satelit') {
                            if (this.map.hasLayer(this.tileLayers.jalan)) {
                                this.map.removeLayer(this.tileLayers.jalan);
                            }
                            this.tileLayers.satelit.addTo(this.map);
                        } else {
                            if (this.map.hasLayer(this.tileLayers.satelit)) {
                                this.map.removeLayer(this.tileLayers.satelit);
                            }
                            this.tileLayers.jalan.addTo(this.map);
                        }
                    },

                    renderBlocksOnMap() {
                        if (this.markers.length > 0) {
                            this.markers.forEach(marker => {
                                this.map.removeLayer(marker);
                            });
                            this.markers = [];
                        }

                        this.blocks.forEach(block => {
                            const lat = block.latitude;
                            const lng = block.longitude;

                            const offset = 0.0015;
                            const polygonBounds = [
                                [lat - offset, lng - offset],
                                [lat + offset, lng - offset],
                                [lat + offset, lng + offset],
                                [lat - offset, lng + offset]
                            ];

                            let color = '#10b981';
                            let fillColor = '#059669';
                            if (block.status === 'nonaktif') {
                                color = '#ef4444';
                                fillColor = '#dc2626';
                            } else if (block.status === 'perawatan') {
                                color = '#eab308';
                                fillColor = '#ca8a04';
                            }

                            const polygon = L.polygon(polygonBounds, {
                                color: color,
                                fillColor: fillColor,
                                fillOpacity: 0.35,
                                weight: 2
                            }).addTo(this.map);

                            const marker = L.marker([lat, lng]).addTo(this.map);
                            marker.bindPopup(`
                                <b>${block.kode_blok}</b><br>
                                ${block.penanggung_jawab}<br>
                                Luas: ${block.luas} Ha<br>
                                ${block.komoditas}<br>
                                Status: ${block.status}
                            `);

                            this.markers.push(marker);

                            const selectBlockAction = () => {
                                this.selectedBlock = block;
                                this.map.flyTo([lat, lng], 16, { duration: 1 });
                            };

                            polygon.on('click', selectBlockAction);
                            marker.on('click', selectBlockAction);
                        });
                    },

                    focusOnBlock(block) {
                        this.selectedBlock = block;
                        this.map.flyTo([block.latitude, block.longitude], 17, { duration: 1.5 });
                    }
                }
            }
        </script>
    </main>

    {{-- Footer Component --}}
    <livewire:footer />

    @livewireScripts
</body>
</html>