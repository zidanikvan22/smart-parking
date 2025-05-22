<link rel="stylesheet" href="{{ asset('css_user/informasi_ringkas.css') }}">

<div class="p-6 bg-white shadow-xl rounded-2xl">
    <h2 class="flex items-center mb-6 text-2xl font-bold text-gray-800">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z" />
        </svg>
        Informasi Ringkas Zona
    </h2>

    @php
        $zoneColors = [
            'from-blue-500 to-blue-600',
            'from-green-500 to-green-600',
            'from-purple-500 to-purple-600',
            'from-amber-500 to-amber-600',
            'from-rose-500 to-rose-600',
            'from-emerald-500 to-emerald-600'
        ];

        $zones = $zonas ?? [];
        $zoneCount = count($zones);
        $needsMarquee = $zoneCount > 4;
    @endphp

    @if($zoneCount > 0)
        <div class="relative overflow-hidden group">
            <div class="flex {{ $needsMarquee ? 'w-max animate-marquee group-hover:[animation-play-state:paused]' : 'w-full justify-center' }}">
                <!-- Card Asli -->
                <div class="flex py-2">
                    @foreach ($zones as $index => $zone)
                        @php
                            $available = $zone->available ?? 0;
                            $total = $zone->total ?? 0;
                            $colorIndex = $index % count($zoneColors);
                            $bgClass = $zoneColors[$colorIndex];
                        @endphp
                        <div class="min-w-[250px] mx-2 bg-gradient-to-br {{ $bgClass }} p-5 rounded-xl shadow-md text-white transform transition hover:scale-105 hover:shadow-lg">
                            <div class="flex items-start justify-between">
                                <h3 class="text-xl font-bold">{{ $zone->nama_zona ?? 'Zona ' . ($index + 1) }}</h3>
                            </div>
                            <div class="mt-4">
                                <p class="text-sm opacity-80">Slot Tersedia</p>
                                <div class="flex items-end justify-between mt-1">
                                    <span class="text-3xl font-bold">{{ $available }}</span>
                                    <span class="text-sm">/{{ $total }} total</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if($needsMarquee)
                    <div class="flex py-2" aria-hidden="true">
                        @foreach ($zones as $index => $zone)
                            @php
                                $available = $zone->available ?? 0;
                                $total = $zone->total ?? 0;
                                $colorIndex = $index % count($zoneColors);
                                $bgClass = $zoneColors[$colorIndex];
                            @endphp
                            <div class="min-w-[250px] mx-2 bg-gradient-to-br {{ $bgClass }} p-5 rounded-xl shadow-md text-white">
                                <div class="flex items-start justify-between">
                                    <h3 class="text-xl font-bold">{{ $zone->nama_zona ?? 'Zona ' . ($index + 1) }}</h3>
                                </div>
                                <div class="mt-4">
                                    <p class="text-sm opacity-80">Slot Tersedia</p>
                                    <div class="flex items-end justify-between mt-1">
                                        <span class="text-3xl font-bold">{{ $available }}</span>
                                        <span class="text-sm">/{{ $total }} total</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    @else
        <div class="py-8 text-center text-gray-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 mx-auto mb-4 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <p class="text-lg font-medium">Tidak ada data zona tersedia</p>
            <p class="text-sm">Silakan tambahkan zona terlebih dahulu</p>
        </div>
    @endif
</div>

@if($needsMarquee)
    <style>
        .animate-marquee {
            animation: marquee {{ count($zones) * 3 }}s linear infinite;
        }
        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
    </style>
@endif
