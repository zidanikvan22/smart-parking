<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parking Information - Parkwell</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/LogoParkwell.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gradient-to-b from-blue-500 to-white min-h-screen flex flex-col items-center justify-center">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-xl">
        <a href="#" onclick="history.back();" class="flex items-center mb-4">
            <i class="fas fa-arrow-left text-lg text-gray-600 mr-2"></i>
            <span class="text-lg text-gray-600">Kembali</span>
        </a>
        <h2 class="text-2xl font-bold text-center mb-6">Pilih Zona</h2>
        <select id="zoneSelect" class="mb-6 p-2 border border-gray-300 rounded">
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
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Jam Sibuk Parkir</h3>
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
</body>
</html>