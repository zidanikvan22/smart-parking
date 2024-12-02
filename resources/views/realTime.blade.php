@extends('layout.mainUser')

@section('main')
<div class="grid grid-cols-2 p-6 ">
    <div class="flex items-center col-span-2 mt-3">
        <a href="{{ route('dashboard')}}" class="flex items-center">
            <i class="mr-2 text-xl fas fa-arrow-left text-gray-50"></i>
            <span class="text-xl font-semibold text-gray-50">Kembali</span>
        </a>
    </div>
    <div class="col-span-2 mt-7 ">
        <div class="dropdown">
            <div tabindex="0" role="button" class="flex items-center space-x-2 text-lg font-bold btn w-36 ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6 ">
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


@if($subzonas->isNotEmpty())
    @foreach($subzonas as $subzona)
        <div class="p-4">
            <div class="flex items-center pl-6 mb-4 space-x-6">
                <h2 class="p-2 text-2xl font-bold text-white rounded-lg shadow-lg">
                    {{ $subzona->nama_subzona }}
                </h2>

                <div class="flex mt-2 space-x-4">
                    <div class="flex items-center">
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
                    class="flex items-center justify-center w-1/3 py-3 text-sm text-white transition duration-300 bg-blue-500 rounded-lg hover:bg-blue-600">
                    <i class="mr-2 fas fa-eye"></i>
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
        class="fixed inset-0 z-50 flex items-center justify-center hidden w-full h-full overflow-x-hidden overflow-y-auto bg-black/70">
        <div class="relative w-full max-w-xl mx-4 md:mx-auto">
            <!-- tombol tutup -->
            <button type="button"
                class="absolute right-0 z-50 text-white transition-colors duration-300 -top-10 hover:text-gray-300"
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
                <div class="overflow-hidden bg-white shadow-2xl rounded-xl">
                    <img src="{{ asset($subzona->foto) }}" alt="Foto Subzona"
                        class="object-cover w-full h-auto transition-transform duration-300 hover:scale-105">
                </div>
            @endif
        </div>
    </div>
@endforeach
@endsection
