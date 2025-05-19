@extends('layout.mainUser')
@include('component.headerUser')

@section('main')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 p-4 md:p-8">
    <div class="max-w-4xl mx-auto space-y-6">

        <div class="mb-3 w-max">
            <a href="{{ route('dashboard') }}"
                class="inline-flex items-center bg-white hover:bg-gray-50 border border-gray-200 text-gray-700 px-4 py-2 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-x-0.5">
                <i class="fas fa-arrow-left mr-2 text-gray-500"></i>
                Kembali
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-500 hover:shadow-xl transform hover:-translate-y-1">
            <div class="p-5">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <h2 class="text-xl font-bold text-gray-800 mb-3 md:mb-0 flex items-center">
                        <i class="fas fa-map-marker-alt text-blue-500 mr-3"></i>
                        Pilih Zona Parkir
                    </h2>
                    <select id="zoneSelect" class="px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 bg-white shadow-sm">
                        <option value="1">Zona 1</option>
                        <option value="2">Zona 2</option>
                        <option value="3">Zona 3</option>
                    </select>
                </div>
            </div>
        </div>

        @include('component.analysis.statistik_kendaraan')
        @include('component.analysis.jam_sibuk')

    </div>
</div>

<script src="{{ asset('js/analysis.js') }}"></script>

@endsection
