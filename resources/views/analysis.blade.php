@extends('layout.mainUser')

@section('main')
    <div class="w-full max-w-xl p-6 bg-white rounded-lg shadow-lg">
        <a href="#" onclick="history.back();" class="flex items-center mb-4">
            <i class="mr-2 text-lg text-gray-600 fas fa-arrow-left"></i>
            <span class="text-lg text-gray-600">Kembali</span>
        </a>
        <h2 class="mb-6 text-2xl font-bold text-center">Pilih Zona</h2>
        <select id="zoneSelect" class="p-2 mb-6 border border-gray-300 rounded">
            <option value="1">Zona 1</option>
            <option value="2">Zona 2</option>
            <option value="3">Zona 3</option>
        </select>
        <div class="mb-6">
            <h3 class="text-lg font-semibold text-gray-700">Jumlah Kendaraan</h3>
            <canvas id="vehicleChart" width="400" height="200"></canvas>
        </div>
        <div class="mb-6">
            <h3 class="text-lg font-semibold text-gray-700">Data Rata Durasi Parkir</h3>
            <canvas id="durationChart" width="400" height="200"></canvas>
        </div>
        <div>
            <h3 class="mb-2 text-lg font-semibold text-gray-700">Jam Sibuk Parkir</h3>
            <ul class="text-gray-600">
                <li>Senin: 08.00, 11.00, 14.00-16.00</li>
                <li>Selasa: 08.00, 12.00</li>
                <li>Rabu: 09.00, 13.00</li>
                <li>Kamis: 09.00, 21.00</li>
                <li>Jumat: 08.00</li>
                <li>Sabtu: 12.00</li>
                <li>Minggu: 12.00</li>
            </ul>
        </div>
    </div>

    <!-- Tambahkan Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Data for vehicle chart
        const vehicleData = {
            labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
            datasets: [{
                label: 'Jumlah Kendaraan',
                data: [12, 19, 3, 5, 2, 3, 7], // Example data
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        };

        // Data for duration chart
        const durationData = {
            labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
            datasets: [{
                label: 'Durasi Parkir (jam)',
                data: [2, 3, 1, 4, 2, 5, 3], // Example data
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        };

        // Config for vehicle chart
        const vehicleConfig = {
            type: 'bar',
            data: vehicleData,
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Config for duration chart
        const durationConfig = {
            type: 'line',
            data: durationData,
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Render vehicle chart
        const vehicleChart = new Chart(
            document.getElementById('vehicleChart'),
            vehicleConfig
        );

        // Render duration chart
        const durationChart = new Chart(
            document.getElementById('durationChart'),
            durationConfig
        );
    </script>
@endsection
