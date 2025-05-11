@extends('layout.mainUser')

@include('component.headerUser')

@section('main')
<div class="min-h-[calc(100vh-80px)] bg-gradient-to-br from-blue-50 to-gray-100 flex items-center justify-center p-4">
    <div class="w-full max-w-6xl">
        <div class="flex flex-col gap-6 p-6">

            <div class="mb-3 w-max">
                <a href="{{ route('dashboard') }}"
                    class="inline-flex items-center bg-white hover:bg-gray-50 border border-gray-200 text-gray-700 px-4 py-2 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-x-0.5">
                    <i class="fas fa-arrow-left mr-2 text-gray-500"></i>
                    Kembali
                </a>
            </div>

            <div class="w-full rounded-2xl overflow-hidden shadow-lg relative h-64 group cursor-pointer" onclick="openImageModal(this)">
                <img
                    src="{{asset('images/DashboardSIPPP.jpg')}}"
                    alt="Parking Area"
                    class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105"
                >
                <div class="absolute inset-0 bg-gradient-to-t from-blue-900/70 to-blue-500/30 flex items-end p-6">
                    <div>
                        <h1 class="text-3xl font-bold text-white">Denah Lokasi Zona Parkiran</h1>
                        <p class="text-blue-100 mt-2">Klik gambar untuk memperbesar</p>
                    </div>
                </div>
                <!-- Overlay hover -->
                <div class="absolute inset-0 bg-black bg-opacity-20 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                    <span class="text-white font-medium bg-black bg-opacity-50 px-3 py-1 rounded-full">Lihat Ukuran Penuh</span>
                </div>
            </div>

            @include('component.real-time.informasi_ringkas')
            @include('component.real-time.informasi_detail')
            @include('component.real-time.tampilkan_sub_zona')

            <!-- Image Modal -->
            <div id="imageModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-90 p-4 animate-fadeIn">
                <div class="relative max-w-6xl w-full max-h-[30vh] mx-auto my-auto">
                    <button onclick="closeImageModal()"
                            class="absolute top-2 right-2 text-white hover:text-gray-300 text-3xl focus:outline-none hover:scale-110 transition-transform duration-200"
                            aria-label="Tutup modal">
                        <div class="w-10 h-10 flex items-center justify-center bg-black bg-opacity-50 rounded-full hover:bg-opacity-75 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </div>
                    </button>
                    <div class="flex items-center justify-center h-full">
                        <img id="modalImage" src="" alt="Zoomed Image" class="max-w-full max-h-[90vh] object-contain animate-zoomIn">
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="{{ asset('js/realtime.js') }}"></script>

@endsection
