@extends('layout.mainUser')

@extends('component.headerUser')
@section('main')
<div class="absolute top-[100px] left-4">
    <a href="{{ url()->previous() }}"
        class="flex items-center px-4 py-2 text-sm font-medium text-white transition-colors bg-blue-900 rounded-lg shadow hover:bg-gray-700">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 19l-7-7 7-7" />
        </svg>
        Kembali
    </a>
</div>

    <div class="w-11/12 mx-auto mt-6 overflow-hidden rounded-xl md:w-3/4">
        <div class="relative w-full h-48 bg-gray-200">

            <img src="/images/real-time.png" alt="Informasi Parkir" class="object-cover w-full h-full" loading="lazy">

            <div class="absolute top-4 right-4">
                <a href="/download/peta-parkir.pdf" download
                    class="flex items-center px-4 py-2 text-sm font-medium text-white transition-colors bg-blue-600 rounded-lg shadow hover:bg-blue-700">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    Download Peta
                </a>
            </div>
        </div>
    </div>

    <div class="w-11/12 p-6 mx-auto mt-6 bg-white border border-gray-300 shadow-md md:w-3/4 rounded-xl">
        <h2 class="mb-4 text-xl font-semibold text-gray-800">Informasi Ringkas</h2>
        <div class="relative px-5">
            <div
                class="flex px-12 py-5 space-x-4 overflow-x-auto border border-gray-300 bg-slate-100 scroll-smooth snap-x snap-mandatory rounded-xl">

                @foreach ($zonas as $zone)
                    <div
                        class="flex flex-col flex-shrink-0 w-56 p-4 rounded-xl snap-start hover:shadow-lg transition-all border-2 border-gray-300 bg-gradient-to-br from-{{ $zone['color'] }}-100 to-{{ $zone['color'] }}-50 bg-white">
                        <div class="mb-3 text-center">
                            <h3 class="text-3xl font-bold text-gray-800">{{ $zone['nama_zona'] }}</h3>
                            <div class="w-16 h-0.5 mx-auto bg-gray-400 mt-2"></div>
                        </div>
                        <div class="p-2 text-center bg-gray-300 rounded-md">
                            <p class="text-3xl font-bold text-{{ $zone['color'] }}-600">{{ $zone['total_slot'] }}</p>
                            <p class="text-sm text-gray-600">Jumlah slot</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <div class="w-11/12 p-6 mx-auto mt-6 bg-white shadow-md md:w-3/4 rounded-xl">
        <button onclick="toggleDetail()"
            class="flex items-center gap-2 mb-4 text-xl font-semibold text-gray-800 focus:outline-none">
            <svg id="iconArrow" class="w-5 h-5 transition-transform" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
            Informasi Detail
        </button>

        <div id="detailBox" class="hidden space-y-4">
            <!-- Container for dropdowns and info box -->
            <div class="flex flex-col gap-6 md:flex-row">
                <!-- Left Column - Dropdowns -->
                <div class="w-full p-4 space-y-4 border border-gray-200 rounded-lg md:w-1/3 bg-gray-50">
                    <!-- Dropdown Pilih Zona -->
                    <div class="relative">
                        <button onclick="toggleDropdown('zona')"
                            class="flex items-center justify-between w-full px-4 py-3 transition-colors bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-100">
                            Pilih Zona
                            <svg class="w-4 h-4 ml-2 transition-transform" id="arrowZona" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <ul id="dropdownZona"
                            class="absolute z-10 hidden w-full mt-1 bg-white border border-gray-200 rounded-md shadow-lg">
                            <li class="px-4 py-2 border-b border-gray-100 cursor-pointer hover:bg-gray-100">Zona 1</li>
                            <li class="px-4 py-2 border-b border-gray-100 cursor-pointer hover:bg-gray-100">Zona 2</li>
                            <li class="px-4 py-2 border-b border-gray-100 cursor-pointer hover:bg-gray-100">Zona 3</li>
                            <li class="px-4 py-2 cursor-pointer hover:bg-gray-100">Zona 4</li>
                        </ul>
                    </div>

                    <!-- Dropdown Pilih SubZona -->
                    <div class="relative mt-6">
                        <button onclick="toggleDropdown('subzona')"
                            class="flex items-center justify-between w-full px-4 py-3 transition-colors bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-100">
                            Pilih Sub Zona
                            <svg class="w-4 h-4 ml-2 transition-transform" id="arrowSubzona" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <ul id="dropdownSubzona"
                            class="absolute z-10 hidden w-full mt-1 bg-white border border-gray-200 rounded-md shadow-lg">
                            <li class="px-4 py-2 border-b border-gray-100 cursor-pointer hover:bg-gray-100">SubZona A</li>
                            <li class="px-4 py-2 cursor-pointer hover:bg-gray-100">SubZona B</li>
                        </ul>
                    </div>
                </div>

                <!-- Right Column - Zone Info Card -->
                <div class="flex-1 p-4 border border-gray-200 rounded-lg bg-blue-50">
                    <h3 class="mb-4 text-lg font-semibold text-gray-800">Informasi Zona</h3>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div class="p-3 bg-white rounded-lg shadow-sm">
                            <p class="text-sm text-gray-500">Jumlah Slot Sub Zona</p>
                            <p class="text-xl font-bold">5</p>
                        </div>
                        <div class="p-3 bg-white rounded-lg shadow-sm">
                            <p class="text-sm text-gray-500">Jumlah Slot</p>
                            <p class="text-xl font-bold">5</p>
                        </div>
                        <div class="p-3 bg-white rounded-lg shadow-sm">
                            <p class="text-sm text-gray-500">Slot Terisi</p>
                            <p class="text-xl font-bold text-red-600">7</p>
                        </div>
                        <div class="p-3 bg-white rounded-lg shadow-sm">
                            <p class="text-sm text-gray-500">Slot Kosong</p>
                            <p class="text-xl font-bold text-green-600">18</p>
                        </div>
                    </div>

                    <div class="mt-6 text-center">
                        <button
                            class="px-6 py-2 font-semibold text-white transition-colors bg-green-500 rounded-lg shadow hover:bg-green-600">
                            View SubZona
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Improved toggle script -->
    <script>
        function toggleDetail() {
            const detail = document.getElementById('detailBox');
            const arrow = document.getElementById('iconArrow');
            detail.classList.toggle('hidden');
            arrow.classList.toggle('rotate-180');
        }

        function toggleDropdown(type) {
            const dropdownId = type === 'zona' ? 'dropdownZona' : 'dropdownSubzona';
            const arrowId = type === 'zona' ? 'arrowZona' : 'arrowSubzona';

            const dropdown = document.getElementById(dropdownId);
            const arrow = document.getElementById(arrowId);

            dropdown.classList.toggle('hidden');
            arrow.classList.toggle('rotate-180');

            // Close other dropdown if open
            const otherType = type === 'zona' ? 'subzona' : 'zona';
            const otherDropdown = document.getElementById(
                `dropdown${otherType.charAt(0).toUpperCase() + otherType.slice(1)}`);
            const otherArrow = document.getElementById(`arrow${otherType.charAt(0).toUpperCase() + otherType.slice(1)}`);

            if (!otherDropdown.classList.contains('hidden')) {
                otherDropdown.classList.add('hidden');
                otherArrow.classList.remove('rotate-180');
            }
        }
    </script>
@endsection
