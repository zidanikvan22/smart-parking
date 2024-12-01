@extends('layout.mainUser')

@section('main')
<div class="grid grid-cols-2 p-6 ">
    <div class="col-span-2 flex items-center mt-3">
        <a href="#" onclick="history.back();" class="flex items-center">
            <i class="fas fa-arrow-left text-gray-50 text-xl mr-2"></i>
            <span class="text-gray-50 text-xl font-semibold">Kembali</span>
        </a>
    </div>
    <div class="col-span-2 mt-7 ">
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn font-bold w-36 text-lg flex items-center space-x-2 ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6  ">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>
                {{ $selectedZona ? $selectedZona->nama_zona : 'Pilih Zona' }}
            </div>
            <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-36 p-2 shadow">
                @foreach($zonas as $zona)
                    <li>
                        <a href="{{ route('real-time', ['zona' => $zona->id]) }}"
                            class="hover:bg-[#95AFE5] {{ $selectedZona && $selectedZona->id == $zona->id ? 'bg-[#95AFE5]' : '' }}">
                            {{ $zona->nama_zona }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="col-span-2 row-span-3 mt-5 flex flex-col items-center">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-6 md:mb-8">
            <img class="w-full h-64 md:h-64 object-cover" src="{{ asset('img/peta.png') }}" alt="">
        </div>
        <button class="bg-blue-500 text-white w-1/2 py-3 rounded-lg flex items-center justify-center text-sm -mt-3">
            <i class="fas fa-download mr-2"></i>
            Download Peta Parkir
        </button>
    </div>
</div>


@if($subzonas->isNotEmpty())
    @foreach($subzonas as $subzona)
        <div class="p-4">
            <div class="flex items-center pl-6 space-x-6 mb-4">
                <h2 class="text-2xl font-bold text-white p-2 rounded-lg shadow-lg">
                    {{ $subzona->nama_subzona }}
                </h2>

                <div class="flex space-x-4 mt-2">
                    <div class="flex items-center">
                        <span class="w-3 h-3 bg-red-500 rounded-full mr-2"></span>
                        <span>Terisi</span>
                    </div>
                    <div class="flex items-center">
                        <span class="w-3 h-3 bg-green-500 rounded-full mr-2"></span>
                        <span>Tersedia</span>
                    </div>
                    <div class="flex items-center">
                        <span class="w-3 h-3 bg-yellow-500 rounded-full mr-2"></span>
                        <span>Perbaikan</span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-4 gap-3 m-5 p-5 bg-white rounded-lg shadow-lg">
                @if($subzona->slot->isNotEmpty())
                    @foreach($subzona->slot as $slot)
                        <div class="{{ 
                            $slot->keterangan == 'Terisi' ? 'bg-red-500' : 
                            ($slot->keterangan == 'Tersedia' ? 'bg-green-500' : 'bg-yellow-500') 
                        }} text-white p-3 rounded-lg text-center">
                            Slot {{ $slot->nomor_slot }}
                        </div>
                    @endforeach
                @else
                    <div class="col-span-4 text-center text-gray-500">
                        Tidak ada slot tersedia untuk subzona ini.
                    </div>
                @endif
            </div>

            <div class="flex justify-center mt-6">
                <button data-modal-target="lihat-subzona-{{ $subzona->id }}"
                    data-modal-toggle="lihat-subzona-{{ $subzona->id }}"
                    class="bg-blue-500 text-white text-sm w-1/3 py-3 rounded-lg flex items-center justify-center hover:bg-blue-600 transition duration-300">
                    <i class="fas fa-eye mr-2"></i>
                    Lihat Area Subzona
                </button>
            </div>
        </div>
    @endforeach
@else
    <div class="p-4 text-center">
        <p class="text-gray-500">Tidak ada subzona yang tersedia untuk zona ini.</p>
    </div>
@endif


@foreach($subzonas as $subzona)
    <!-- modal foto kendaraan -->
    <div id="lihat-subzona-{{ $subzona->id }}" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 w-full h-full overflow-y-auto overflow-x-hidden flex items-center justify-center bg-black/70">
        <div class="relative w-full max-w-xl mx-4 md:mx-auto">
            <!-- tombol tutup -->
            <button type="button"
                class="absolute -top-10 right-0 z-50 text-white hover:text-gray-300 transition-colors duration-300"
                data-modal-hide="lihat-subzona-{{ $subzona->id }}">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>

            <!-- container foto -->
            @if($subzona->foto)
                <div class="bg-white rounded-xl shadow-2xl overflow-hidden">
                    <img src="{{ asset($subzona->foto) }}" alt="Foto Subzona"
                        class="w-full h-auto object-cover transition-transform duration-300 hover:scale-105">
                </div>
            @endif
        </div>
    </div>
@endforeach
@endsection
