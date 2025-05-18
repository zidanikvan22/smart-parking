<div class="p-6 bg-white shadow-xl rounded-2xl">
    <h2 class="flex items-center mb-6 text-2xl font-bold text-gray-800">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
        </svg>
        Informasi Detail Zona
    </h2>

    <div class="flex flex-col gap-6 lg:flex-row">
        <div class="p-6 space-y-4 border border-gray-100 shadow-inner lg:w-1/3 bg-gray-50 rounded-xl">
            <!-- Dropdown Pilih Zona -->
            <form method="GET" action="{{ route('real-time') }}">
                <div class="relative mb-6">
                    <select name="zona"
                        class="w-full px-4 py-3 bg-white border border-gray-300 shadow-sm appearance-none rounded-xl focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                        onchange="this.form.submit()">
                        <option value="" disabled {{ is_null($selectedZonaId) ? 'selected' : '' }}>Pilih Zona
                        </option>
                        @foreach ($zonas as $zona)
                            <option value="{{ $zona->id }}" {{ $selectedZonaId == $zona->id ? 'selected' : '' }}>
                                {{ $zona->nama_zona }}
                            </option>
                        @endforeach
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </div>
                </div>
            </form>

            <!-- Dropdown Pilih Sub Zona -->
            <form method="GET" action="{{ route('real-time') }}">
                <div class="relative mb-6">
                    <select name="subzona"
                        class="w-full px-4 py-3 bg-white border border-gray-300 shadow-sm appearance-none rounded-xl focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                        onchange="this.form.submit()">
                        <option value="" disabled {{ is_null($selectedSubzonaId) ? 'selected' : '' }}>Pilih Sub
                            Zona</option>
                        @foreach ($subzonas as $subzona)
                            <option value="{{ $subzona->id }}"
                                {{ $selectedSubzonaId == $subzona->id ? 'selected' : '' }}>
                                {{ $subzona->nama_subzona }}
                            </option>
                        @endforeach
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </div>
                    <!-- Hidden input untuk mempertahankan zona yang dipilih -->
                    <input type="hidden" name="zona" value="{{ $selectedZonaId }}">
                </div>
            </form>

            <div class="p-4 bg-white border border-gray-200 rounded-xl">
                <h4 class="mb-2 font-semibold text-blue-800">Status Real Time</h4>
                <ul class="space-y-2">
                    <li class="flex justify-between">
                        <span class="text-gray-600">Total Zona:</span>
                        <span class="font-medium">{{ $totalZona }} Zona</span>
                    </li>
                    <li class="flex justify-between">
                        <span class="text-gray-600">Total Sub Zona:</span>
                        <span class="font-medium">{{ $totalSubzona }} Sub Zona</span>
                    </li>
                    <li class="flex justify-between">
                        <span class="text-gray-600">Total Slot:</span>
                        <span class="font-medium text-green-600">{{ $totalSlot }} Slot</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="p-6 bg-white border border-gray-100 shadow-lg lg:w-2/3 rounded-xl">
            <h3 class="mb-4 text-xl font-semibold text-gray-800">Detail Sub Zona</h3>

            <div class="grid grid-cols-1 gap-6 mb-6 md:grid-cols-2">
                <div class="p-4 border border-gray-200 rounded-lg shadow-sm bg-gray-50">
                    <div class="flex items-center mb-2">
                        <div class="p-2 mr-3 bg-blue-100 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                            </svg>
                        </div>
                        <h4 class="font-medium text-gray-700">Slot parkiran yang tersedia</h4>
                    </div>
                    <p class="text-3xl font-bold text-gray-900 ml-11">
                        {{ $selectedSubzonaId ? $slotStats['tersedia'] : '-' }}</p>
                </div>

                <div class="p-4 border border-gray-200 rounded-lg shadow-sm bg-gray-50">
                    <div class="flex items-center mb-2">
                        <div class="p-2 mr-3 bg-green-100 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h4 class="font-medium text-gray-700">Slot parkiran yang kosong</h4>
                    </div>
                    <p class="text-3xl font-bold text-green-600 ml-11">
                        {{ $selectedSubzonaId ? $slotStats['tersedia'] : '-' }}</p>
                </div>

                <div class="p-4 border border-gray-200 rounded-lg shadow-sm bg-gray-50">
                    <div class="flex items-center mb-2">
                        <div class="p-2 mr-3 bg-red-100 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </div>
                        <h4 class="font-medium text-gray-700">Slot parkiran yang terisi</h4>
                    </div>
                    <p class="text-3xl font-bold text-red-600 ml-11">
                        {{ $selectedSubzonaId ? $slotStats['terisi'] : '-' }}</p>
                </div>

                <div class="p-4 border border-gray-200 rounded-lg shadow-sm bg-gray-50">
                    <div class="flex items-center mb-2">
                        <div class="p-2 mr-3 bg-yellow-100 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h4 class="font-medium text-gray-700">Slot parkiran yang sedang diperbaiki</h4>
                    </div>
                    <p class="text-3xl font-bold text-yellow-600 ml-11">
                        {{ $selectedSubzonaId ? $slotStats['diperbaiki'] : '-' }}</p>
                </div>
            </div>
            @include('component.real-time.tampilkan_sub_zona')
        </div>
    </div>
</div>
