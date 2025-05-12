<div id="subZoneModal" class="fixed inset-0 z-50 hidden overflow-hidden">
    <!-- Background Overlay -->
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

    <!-- Tombol Close di luar modal -->
    <button id="closeModal"
        class="absolute top-6 right-6 z-50 text-white hover:text-gray-300 bg-black/40 p-2 rounded-full backdrop-blur-md">
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>

    <!-- Modal Container -->
    <div class="fixed inset-0 flex items-center justify-center p-4">
        <div
            class="relative bg-white rounded-lg shadow-xl transform transition-all w-full max-w-4xl max-h-[90vh] overflow-y-auto">
            <!-- Header -->
            <div class="flex justify-between items-start p-4 border-b">
                <h3 class="text-2xl font-bold text-gray-900">
                    Sub Zona <span id="subZoneName">A</span>
                </h3>
            </div>

            <!-- Konten -->
            <div class="p-6 overflow-y-auto">
                <!-- Gambar -->
                <div class="mb-6 rounded-lg overflow-hidden shadow-md">
                    <img id="subZoneImage"
                        src="https://images.unsplash.com/photo-1584799580661-53b7c6b99430?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80"
                        alt="Sub Zona Parkir" class="w-full h-64 object-cover" />
                </div>

                <!-- Denah Slot -->
                <div class="mb-6">
                    <h4 class="text-lg font-semibold mb-3">Denah Slot</h4>
                    <div class="grid grid-cols-10 gap-2">
                        <!-- Slot dummy -->
                        <div class="h-10 bg-green-500 rounded flex items-center justify-center text-white font-bold">1</div>
                        <!-- Tambahkan slot lainnya sesuai kebutuhan -->
                    </div>

                    <!-- Legenda -->
                    <div class="mt-4 flex gap-4">
                        <div class="flex items-center">
                            <div class="w-4 h-4 bg-green-500 rounded mr-2"></div>
                            <span class="text-sm">Kosong</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-4 h-4 bg-red-500 rounded mr-2"></div>
                            <span class="text-sm">Terisi</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-4 h-4 bg-yellow-300 rounded mr-2"></div>
                            <span class="text-sm">Perbaikan</span>
                        </div>
                    </div>
                </div>

                <!-- Ringkasan -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-green-50 p-3 rounded-lg">
                        <h5 class="font-medium text-green-800">Tersedia</h5>
                        <p class="text-2xl font-bold text-green-600">15</p>
                    </div>
                    <div class="bg-red-50 p-3 rounded-lg">
                        <h5 class="font-medium text-red-800">Terisi</h5>
                        <p class="text-2xl font-bold text-red-600">13</p>
                    </div>
                    <div class="bg-yellow-50 p-3 rounded-lg">
                        <h5 class="font-medium text-yellow-500">Perbaikan</h5>
                        <p class="text-2xl font-bold text-yellow-300">28</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JS -->
<script src="{{ asset('js/tampilkan_sub_zona.js') }}"></script>
