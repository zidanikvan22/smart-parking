@extends('layout.mainUser')

@section('main')
<div class="p-5">
    <a href="#" onclick="history.back();" class="flex items-center mb-4">
        <i class="mr-2 text-xl fas fa-arrow-left text-gray-50"></i>
        <span class="text-xl font-semibold text-gray-50">Kembali</span>
    </a>
    <select id="zoneSelect" class="w-1/3 p-3 mb-6 border border-gray-300 rounded">
        <option value="1">Zona 1</option>
        <option value="2">Zona 2</option>
        <option value="3">Zona 3</option>
    </select>
</div>
<div class="grid w-screen grid-cols-1 gap-4 px-4 md:grid-cols-2">
    <!-- <h2 class="mb-6 text-2xl font-bold text-center">Pilih Zona</h2> -->
    <div class="w-full col-span-1 mx-auto bg-white border-2 rounded-lg shadow p-4-w dark:bg-gray-800 md:p-4">
        <div class="flex justify-between pb-4 mb-4 border-b border-gray-400 dark:border-gray-700">
            <div class="flex items-center">
                <div class="flex items-center justify-center bg-gray-100 rounded-lg dark:bg-gray-700 me-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#000000" viewBox="0 0 256 256">
                        <path
                            d="M240,104H229.2L201.42,41.5A16,16,0,0,0,186.8,32H69.2a16,16,0,0,0-14.62,9.5L26.8,104H16a8,8,0,0,0,0,16h8v80a16,16,0,0,0,16,16H64a16,16,0,0,0,16-16V184h96v16a16,16,0,0,0,16,16h24a16,16,0,0,0,16-16V120h8a8,8,0,0,0,0-16ZM69.2,48H186.8l24.89,56H44.31ZM64,200H40V184H64Zm128,0V184h24v16Zm24-32H40V120H216ZM56,144a8,8,0,0,1,8-8H80a8,8,0,0,1,0,16H64A8,8,0,0,1,56,144Zm112,0a8,8,0,0,1,8-8h16a8,8,0,0,1,0,16H176A8,8,0,0,1,168,144Z">
                        </path>
                    </svg>
                </div>
                <div>
                    <h5 class="pb-1 text-xl font-bold leading-none text-gray-900 dark:text-white">Jumlah Kendaraan</h5>
                </div>
            </div>
        </div>
        <canvas id="vehicleChart" width="400" height="200"></canvas>
    </div>


    <div class="w-full h-full col-span-1 p-4 mx-auto bg-white border-2 rounded-lg shadow dark:bg-gray-800 md:p-4">
        <div class="flex justify-between pb-4 mb-4 border-b border-gray-400 dark:border-gray-700">
            <div class="flex items-center">
                <div class="flex items-center justify-center bg-gray-100 rounded-lg dark:bg-gray-700 me-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#000000" viewBox="0 0 256 256">
                        <path
                            d="M211.18,196.56,139.57,128l71.61-68.56a1.59,1.59,0,0,1,.13-.13A16,16,0,0,0,200,32H56A16,16,0,0,0,44.7,59.31l.12.13L116.43,128,44.82,196.56l-.12.13A16,16,0,0,0,56,224H200a16,16,0,0,0,11.32-27.31A1.59,1.59,0,0,1,211.18,196.56ZM56,48h0v0ZM97.79,88h60.42L128,116.92ZM200,48,174.92,72H81.08L56,48ZM56,208l64-61.26V168a8,8,0,0,0,16,0V146.74L200,208Z">
                        </path>
                    </svg>
                </div>
                <div>
                    <h5 class="pb-1 text-xl font-bold leading-none text-gray-900 dark:text-white">Durasi Parkir</h5>
                </div>
            </div>
        </div>
        <canvas id="durationChart" width="400" height="200"></canvas>
    </div>

    <div class="w-full max-w-xl p-4 mt-5 bg-white border-2 rounded-lg shadow dark:bg-gray-800 md:p-4">
        <div class="flex justify-between pb-4 mb-4 border-b border-gray-400 dark:border-gray-700">
            <div class="flex items-center">
                <div class="flex items-center justify-center bg-gray-100 rounded-lg dark:bg-gray-700 me-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#000000" viewBox="0 0 256 256">
                        <path
                            d="M136,80v43.47l36.12,21.67a8,8,0,0,1-8.24,13.72l-40-24A8,8,0,0,1,120,128V80a8,8,0,0,1,16,0Zm88-24a8,8,0,0,0-8,8V82c-6.35-7.36-12.83-14.45-20.12-21.83a96,96,0,1,0-2,137.7,8,8,0,0,0-11-11.64A80,80,0,1,1,184.54,71.4C192.68,79.64,199.81,87.58,207,96H184a8,8,0,0,0,0,16h40a8,8,0,0,0,8-8V64A8,8,0,0,0,224,56Z">
                        </path>
                    </svg>
                </div>
                <div>
                    <h5 class="pb-1 text-xl font-bold leading-none text-gray-900 dark:text-white">Jam Sibuk Parkir</h5>
                </div>
            </div>
        </div>
        <div>
            <ul class="space-y-4 list-inside">
                <li>Senin : 08.00, 11.00, 14.00-16.00 </li>
                <li>Selasa : 09.00, 11.00</li>
                <li>Rabu : 15.00-17.00</li>
                <li>Kamis : 09.00, 12.00</li>
                <li>Jumat : 19.00-21.00</li>
                <li>Sabtu : 07.00</li>
                <li>Minggu : 12.00</li>
            </ul>
        </div>
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
