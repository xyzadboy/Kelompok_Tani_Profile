<?php

use Livewire\Component;

new class extends Component
{
    public bool $menuOpen = false;
};

?>

<nav x-data="{ open: @entangle('menuOpen') }" class="sticky top-0 z-50 border-b border-emerald-900/10 bg-white/95 backdrop-blur-md transition-all">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="relative flex h-20 items-center justify-between">

            {{-- Brand Logo (Tetap di Samping Kiri) --}}
            <a href="/" class="group flex items-center gap-3 focus:outline-none">
                {{-- Logo Icon Badge --}}
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-white p-1.5 shadow-md shadow-emerald-600/10 border border-stone-200/80 transition-transform group-hover:scale-105">
                    <img src="{{ asset('logo.png') }}" 
                         alt="Logo Kelompok Tani Beruas Harapan" 
                         class="h-full w-full object-contain">
                </div>
                <div class="flex flex-col">
                    <span class="text-xl font-bold tracking-tight text-emerald-950 group-hover:text-emerald-700 transition-colors">
                        Beruas Harapan
                    </span>
                    <span class="text-[10px] font-semibold tracking-wider text-amber-700 uppercase">
                        Kelompok Tani Sejahtera
                    </span>
                </div>
            </a>

            {{-- Desktop Navigation (Presisi Absolut di Tengah Layar) --}}
            <div class="hidden lg:flex items-center gap-1 absolute left-1/2 -translate-x-1/2">
                @php
                    $navItems = [
                        ['name' => 'Beranda', 'url' => '/'],
                        ['name' => 'Legalitas', 'url' => '/legalitas'],
                        ['name' => 'Galeri', 'url' => '/galeri'],
                        ['name' => 'Blog', 'url' => '/blog'],
                        ['name' => 'Kontak', 'url' => '/contact'],
                        ['name' => 'Blok', 'url' => '/blok'],
                    ];
                @endphp

                @foreach ($navItems as $item)
                    @php $isActive = request()->is(ltrim($item['url'], '/')); @endphp
                    <a 
                        href="{{ $item['url'] }}" 
                        class="relative px-4 py-2 text-sm font-medium transition-colors rounded-full
                               {{ $isActive 
                                  ? 'text-emerald-800 bg-emerald-50 font-semibold' 
                                  : 'text-stone-600 hover:text-emerald-700 hover:bg-stone-50' }}"
                    >
                        {{ $item['name'] }}
                        @if ($isActive)
                            <span class="absolute bottom-1 left-1/2 -translate-x-1/2 h-1 w-1 rounded-full bg-emerald-600"></span>
                        @endif
                    </a>
                @endforeach
            </div>

            {{-- Right Area / Mobile Hamburger --}}
            <div class="flex items-center">
                {{-- Mobile Hamburger Button --}}
                <button
                    type="button"
                    wire:click="$toggle('menuOpen')"
                    class="relative rounded-xl p-2.5 text-stone-700 transition-colors hover:bg-emerald-50 hover:text-emerald-800 focus:outline-none lg:hidden"
                    aria-label="Toggle Navigation"
                >
                    <svg class="h-6 w-6 transition-transform duration-200" :class="{ 'rotate-90': open }" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        <path x-show="open" x-cloak stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    {{-- Mobile Menu Dropdown --}}
    <div 
        x-show="open" 
        x-collapse
        x-cloak
        class="border-b border-emerald-900/10 bg-white px-4 pt-2 pb-6 shadow-xl lg:hidden"
    >
        <div class="flex flex-col gap-1.5">
            @foreach ($navItems as $item)
                @php $isActive = request()->is(ltrim($item['url'], '/')); @endphp
                <a
                    href="{{ $item['url'] }}"
                    class="flex items-center justify-between rounded-xl px-4 py-3 text-base font-medium transition-colors
                           {{ $isActive 
                              ? 'bg-emerald-50 text-emerald-800 font-semibold' 
                              : 'text-stone-700 hover:bg-stone-50 hover:text-emerald-700' }}"
                >
                    <span>{{ $item['name'] }}</span>
                    @if ($isActive)
                        <span class="h-2 w-2 rounded-full bg-emerald-600"></span>
                    @endif
                </a>
            @endforeach
        </div>
    </div>
</nav>