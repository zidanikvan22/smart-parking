<link rel="stylesheet" href="{{ asset('css_user/informasi_ringkas.css') }}">

<div class="bg-white p-6 rounded-2xl shadow-xl">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z" />
        </svg>
        Informasi Ringkas Zona
    </h2>

    @php
        $zones = [
            ['title' => 'Zona 1', 'bg' => 'from-blue-500 to-blue-600', 'available' => 13, 'total' => 28],
            ['title' => 'Zona 2', 'bg' => 'from-green-500 to-green-600', 'available' => 5, 'total' => 12],
            ['title' => 'Zona 3', 'bg' => 'from-purple-500 to-purple-600', 'available' => 8, 'total' => 15],
            ['title' => 'Zona 4', 'bg' => 'from-amber-500 to-amber-600', 'available' => 3, 'total' => 64],
        ];
        $zoneCount = count($zones);
    @endphp

    <div class="overflow-hidden relative group">
        <div class="flex {{ $zoneCount > 3 ? 'w-max animate-marquee group-hover:[animation-play-state:paused]' : 'w-full justify-center' }}">

            <div class="flex">
                @foreach ($zones as $zone)
                    @php $percentage = round(($zone['available'] / $zone['total']) * 100); @endphp
                    <div class="min-w-[250px] mx-2 bg-gradient-to-br {{ $zone['bg'] }} p-5 rounded-xl shadow-md text-white transform transition hover:scale-105">
                        <div class="flex justify-between items-start">
                            <h3 class="font-bold text-xl">{{ $zone['title'] }}</h3>
                        </div>
                        <div class="mt-4">
                            <p class="text-sm opacity-80">Slot Tersedia</p>
                            <div class="flex items-end justify-between mt-1">
                                <span class="text-3xl font-bold">{{ $zone['available'] }}</span>
                                <span class="text-sm">/{{ $zone['total'] }} total</span>
                            </div>
                            <div class="w-full bg-white/30 rounded-full h-2 mt-2">
                                <div class="bg-white h-2 rounded-full" style="width: {{ $percentage }}%"></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if($zoneCount > 3)
                <div class="flex">
                    @foreach ($zones as $zone)
                        @php $percentage = round(($zone['available'] / $zone['total']) * 100); @endphp
                        <div class="min-w-[250px] mx-2 bg-gradient-to-br {{ $zone['bg'] }} p-5 rounded-xl shadow-md text-white transform transition hover:scale-105">
                            <div class="flex justify-between items-start">
                                <h3 class="font-bold text-xl">{{ $zone['title'] }}</h3>
                            </div>
                            <div class="mt-4">
                                <p class="text-sm opacity-80">Slot Tersedia</p>
                                <div class="flex items-end justify-between mt-1">
                                    <span class="text-3xl font-bold">{{ $zone['available'] }}</span>
                                    <span class="text-sm">/{{ $zone['total'] }} total</span>
                                </div>
                                <div class="w-full bg-white/30 rounded-full h-2 mt-2">
                                    <div class="bg-white h-2 rounded-full" style="width: {{ $percentage }}%"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>

@if($zoneCount > 3)
    <script src="{{ asset('css_user/informasi_ringkas.css') }}"></script>
@endif
