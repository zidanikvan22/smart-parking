<div class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-500 hover:shadow-xl">
    <div class="p-5">
        <div class="flex items-center mb-4">
            <div class="p-3 mr-4 rounded-lg bg-blue-100 text-blue-600">
                <i class="fas fa-car text-xl"></i>
            </div>
            <h2 class="text-xl font-bold text-gray-800">Statistik Kendaraan</h2>
        </div>
        <div class="chart-container relative h-64 md:h-80">
            <canvas id="vehicleChart"></canvas>
        </div>
        <div class="mt-4 flex justify-center space-x-4">
            <div class="text-center p-3 bg-blue-50 rounded-lg w-24">
                <div class="text-2xl font-bold text-blue-600" id="totalVehicles">0</div>
                <div class="text-xs text-gray-500">Total</div>
            </div>
            <div class="text-center p-3 bg-green-50 rounded-lg w-24">
                <div class="text-2xl font-bold text-green-600" id="peakDay">-</div>
                <div class="text-xs text-gray-500">Hari Puncak</div>
            </div>
            <div class="text-center p-3 bg-yellow-50 rounded-lg w-24">
                <div class="text-2xl font-bold text-yellow-600" id="avgVehicles">0</div>
                <div class="text-xs text-gray-500">Rata-rata</div>
            </div>
        </div>
    </div>
</div>
