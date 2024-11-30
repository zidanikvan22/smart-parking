@extends('layout.mainUser')

@section('main')
    <div class="grid grid-cols-2 p-6 ">
        <div class="flex items-center col-span-2">
            <a href="{{ route('dashboard') }}" class="flex items-center">
                <i class="mr-2 text-xl fas fa-arrow-left text-gray-50"></i>
                <span class="text-xl font-semibold text-gray-50">Kembali</span>
            </a>
        </div>
        <form method="GET" action="{{ route('real-time') }}" class="col-span-2 mt-5">
            <select name="zona_id" class="w-1/3 p-3 mb-6 border border-gray-300 rounded" onchange="this.form.submit()">
                <option value="">Pilih Zona</option>
                @foreach ($zonas as $zona)
                    <option value="{{ $zona->id }}" {{ $zona->id == $zonaId ? 'selected' : '' }}>
                        {{ $zona->nama_zona }}
                    </option>
                @endforeach
            </select>
        </form>

        <div class="flex flex-col items-center col-span-2 row-span-3 mt-5">
            <div class="mb-6 overflow-hidden bg-white rounded-lg shadow-lg md:mb-8">
                <img class="object-cover w-full h-64 md:h-64" src="{{ asset('img/peta.png') }}" alt="">
            </div>
            <button class="flex items-center justify-center w-1/2 py-3 -mt-3 text-sm text-white bg-blue-500 rounded-lg">
                <i class="mr-2 fas fa-download"></i>
                Download Peta Parkir
            </button>
        </div>
    </div>

    <div class="p-4">
        <div class="flex items-center mb-4">
            <!-- Dropdown untuk memilih subzona -->
            <form method="GET" action="{{ route('real-time') }}">
                <select name="subzona_id" onchange="this.form.submit()"
                    class="text-sm font-bold text-center text-white bg-blue-500 rounded-lg shadow-lg focus:ring focus:ring-blue-300 focus:outline-none">
                    <option>Pilih SubZona</option>
                    @foreach ($subzonas as $subzona)
                        <option value="{{ $subzona->id }}" {{ $subzona->id == $subzonaId ? 'selected' : '' }}>
                            {{ $subzona->nama_subzona }}
                        </option>
                    @endforeach
                </select>
            </form>

            <div class="flex space-x-2">
                <div class="flex items-center pl-2">
                    <span class="w-3 h-3 mr-2 bg-red-500 rounded-full"></span>
                    <span>Terisi</span>
                </div>
                <div class="flex items-center">
                    <span class="w-3 h-3 mr-2 bg-green-500 rounded-full"></span>
                    <span>Tersedia</span>
                </div>
                <div class="flex items-center">
                    <span class="w-3 h-3 mr-2 bg-yellow-500 rounded-full"></span>
                    <span>Perbaikan</span>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-4 gap-3 p-5 m-5 bg-white rounded-lg shadow-lg">
            @foreach ($slots as $slot)
                <div
                    class="p-3 text-center text-white {{ $slot->keterangan == 'Terisi' ? 'bg-red-500' : ($slot->keterangan == 'Tersedia' ? 'bg-green-500' : 'bg-yellow-500') }} rounded-lg">
                    {{ $slot->nomor_slot }}
                </div>
            @endforeach
        </div>

        <div class="flex justify-center mt-6">
            <button data-modal-target="lihat-zona" data-modal-toggle="lihat-zona"
                class="flex items-center justify-center w-1/3 py-3 text-white transition duration-300 bg-blue-500 rounded-lg hover:bg-blue-600">
                <i class="mr-2 fas fa-eye"></i>
                Lihat Zona
            </button>
        </div>
    </div>

    <!-- modal foto kendaraan -->
    <div id="lihat-zona" tabindex="-1" aria-hidden="true"
        class="fixed inset-0 z-50 flex items-center justify-center hidden w-full h-full overflow-x-hidden overflow-y-auto bg-black/70">
        <div class="relative w-full max-w-xl mx-4 md:mx-auto">
            <!-- tombol tutup -->
            <button type="button"
                class="absolute right-0 z-50 text-white transition-colors duration-300 -top-10 hover:text-gray-300"
                data-modal-hide="lihat-zona">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>

            <!-- container foto -->
            <div class="overflow-hidden bg-white shadow-2xl rounded-xl">
                <img src="{{ asset('foto parkir/zona 3/IMG-20240920-WA0014.jpg') }}" alt="Vehicle Image"
                    class="object-cover w-full h-auto transition-transform duration-300 hover:scale-105">
            </div>
        </div>
    </div>
@endsection
