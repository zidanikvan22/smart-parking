@extends('layout.mainUser')
@extends('component.headerUser')

@section('main')
    <div class="flex flex-col items-center min-h-screen p-4 bg-gray-100">
        <div class="w-full max-w-3xl space-y-4">
            <!-- Tombol Kembali -->
            <div>
                <a href="#" onclick="history.back();" class="flex items-center text-gray-600">
                    <i class="mr-2 text-xl fas fa-arrow-left"></i>
                    <span class="text-lg font-semibold">Kembali</span>
                </a>
            </div>

            <!-- Container Diagram Jumlah Kendaraan -->
            <div class="p-4 bg-gray-200 border border-gray-300 rounded-lg shadow">
                <select id="zoneSelect" class="w-48 px-5 py-3 mb-4 text-sm border border-gray-300 bg-gray-50 rounded-xl">
                    <option class="font-bold" value="1">Pilih Satuan</option>
                    <option value="1">Zona 1</option>
                    <option value="2">Zona 2</option>
                    <option value="3">Zona 3</option>
                </select>
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center">
                        <div class="p-2 mr-3 rounded-lg bg-gray-50">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#4b5563"
                                viewBox="0 0 256 256">
                                <path
                                    d="M240,104H229.2L201.42,41.5A16,16,0,0,0,186.8,32H69.2a16,16,0,0,0-14.62,9.5L26.8,104H16a8,8,0,0,0,0,16h8v80a16,16,0,0,0,16,16H64a16,16,0,0,0,16-16V184h96v16a16,16,0,0,0,16,16h24a16,16,0,0,0,16-16V120h8a8,8,0,0,0,0-16ZM69.2,48H186.8l24.89,56H44.31ZM64,200H40V184H64Zm128,0V184h24v16Zm24-32H40V120H216ZM56,144a8,8,0,0,1,8-8H80a8,8,0,0,1,0,16H64A8,8,0,0,1,56,144Zm112,0a8,8,0,0,1,8-8h16a8,8,0,0,1,0,16H176A8,8,0,0,1,168,144Z">
                                </path>
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-gray-700">Jumlah Kendaraan</h2>
                    </div>
                </div>
                <canvas id="vehicleChart" height="200"></canvas>
            </div>

            <!-- Container Jam Sibuk Parkir -->
            <div class="p-4 bg-gray-200 rounded-lg shadow">
                <div class="flex items-center mb-3">
                    <div class="p-2 mr-3 rounded-lg bg-gray-50">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#4b5563"
                            viewBox="0 0 256 256">
                            <path
                                d="M136,80v43.47l36.12,21.67a8,8,0,0,1-8.24,13.72l-40-24A8,8,0,0,1,120,128V80a8,8,0,0,1,16,0Zm88-24a8,8,0,0,0-8,8V82c-6.35-7.36-12.83-14.45-20.12-21.83a96,96,0,1,0-2,137.7,8,8,0,0,0-11-11.64A80,80,0,1,1,184.54,71.4C192.68,79.64,199.81,87.58,207,96H184a8,8,0,0,0,0,16h40a8,8,0,0,0,8-8V64A8,8,0,0,0,224,56Z">
                            </path>
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold text-gray-700">Jam Sibuk Parkir</h2>
                </div>
                <div class="px-10 py-2 bg-white rounded-lg">
                    <ul class="space-y-2 text-sm">
                        <li class="grid grid-cols-[120px_10px_1fr] items-start gap-2 pb-2 border-b border-gray-100">
                            <span class="font-semibold">Senin</span>
                            <span>:</span>
                            <span>08.00, 11.00, 14.00–16.00</span>
                        </li>
                        <li class="grid grid-cols-[120px_10px_1fr] items-start gap-2 pb-2 border-b border-gray-100">
                            <span class="font-semibold">Selasa</span>
                            <span>:</span>
                            <span>09.00, 11.00</span>
                        </li>
                        <li class="grid grid-cols-[120px_10px_1fr] items-start gap-2 pb-2 border-b border-gray-100">
                            <span class="font-semibold">Rabu</span>
                            <span>:</span>
                            <span>15.00–17.00</span>
                        </li>
                        <li class="grid grid-cols-[120px_10px_1fr] items-start gap-2 pb-2 border-b border-gray-100">
                            <span class="font-semibold">Kamis</span>
                            <span>:</span>
                            <span>09.00, 12.00</span>
                        </li>
                        <li class="grid grid-cols-[120px_10px_1fr] items-start gap-2 pb-2 border-b border-gray-100">
                            <span class="font-semibold">Jumat</span>
                            <span>:</span>
                            <span>19.00–21.00</span>
                        </li>
                        <li class="grid grid-cols-[120px_10px_1fr] items-start gap-2 pb-2 border-b border-gray-100">
                            <span class="font-semibold">Sabtu</span>
                            <span>:</span>
                            <span>07.00</span>
                        </li>
                        <li class="grid grid-cols-[120px_10px_1fr] items-start gap-2">
                            <span class="font-semibold">Minggu</span>
                            <span>:</span>
                            <span>12.00</span>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Diagram Jumlah Kendaraan
        new Chart(
            document.getElementById('vehicleChart'), {
                type: 'bar',
                data: {
                    labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
                    datasets: [{
                        label: 'Jumlah Kendaraan',
                        data: [12, 19, 3, 5, 2, 3, 7],
                        backgroundColor: '#00CCFF',
                        borderColor: 'rgba(75, 85, 99, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 2
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            }
        );
    </script>
@endsection
