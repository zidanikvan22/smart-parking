@extends('layout/mainAdmin')

@section('main')

<div class="flex space-x-4 mt-10">

    <div class="max-w-sm w-full bg-white rounded-lg border-2 shadow dark:bg-gray-800 p-4 md:p-6">
        <div class="flex justify-between pb-4 mb-4 border-b border-gray-400 dark:border-gray-700">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-lg bg-gray-50 dark:bg-gray-700 flex items-center justify-center me-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M135.2 117.4L109.1 192l293.8 0-26.1-74.6C372.3 104.6 360.2 96 346.6 96L165.4 96c-13.6 0-25.7 8.6-30.2 21.4zM39.6 196.8L74.8 96.3C88.3 57.8 124.6 32 165.4 32l181.2 0c40.8 0 77.1 25.8 90.6 64.3l35.2 100.5c23.2 9.6 39.6 32.5 39.6 59.2l0 144 0 48c0 17.7-14.3 32-32 32l-32 0c-17.7 0-32-14.3-32-32l0-48L96 400l0 48c0 17.7-14.3 32-32 32l-32 0c-17.7 0-32-14.3-32-32l0-48L0 256c0-26.7 16.4-49.6 39.6-59.2zM128 288a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm288 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z" />
                    </svg>
                </div>
                <div>
                    <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">Jumlah Kendaraan</h5>
                    <p class="text-sm font-normal text-gray-500 dark:text-gray-400">loremepsumkocak</p>
                </div>
            </div>
        </div>

        <div id="column-chart-1">

        </div>


    </div>

    <div class="max-w-sm w-full bg-white rounded-lg border-2 shadow dark:bg-gray-800 p-4 md:p-6">
        <div class="flex justify-between pb-4 mb-4 border-b border-gray-400 dark:border-gray-700">
            <div class="flex items-center">
                <div class="w-8 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center me-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                        <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M32 0C14.3 0 0 14.3 0 32S14.3 64 32 64l0 11c0 42.4 16.9 83.1 46.9 113.1L146.7 256 78.9 323.9C48.9 353.9 32 394.6 32 437l0 11c-17.7 0-32 14.3-32 32s14.3 32 32 32l32 0 256 0 32 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l0-11c0-42.4-16.9-83.1-46.9-113.1L237.3 256l67.9-67.9c30-30 46.9-70.7 46.9-113.1l0-11c17.7 0 32-14.3 32-32s-14.3-32-32-32L320 0 64 0 32 0zM288 437l0 11L96 448l0-11c0-25.5 10.1-49.9 28.1-67.9L192 301.3l67.9 67.9c18 18 28.1 42.4 28.1 67.9z" />
                        </svg>
                </div>
                <div>
                    <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">Durasi Parkir</h5>
                    <p class="text-sm font-normal text-gray-500 dark:text-gray-400">loremepsumkocak</p>
                </div>
            </div>
        </div>


        <div id="column-chart-2" class="mt-4">

        </div>

    </div>

    <div class="max-w-sm w-full bg-white rounded-lg border-2 shadow dark:bg-gray-800 p-4 md:p-6">
        <div class="flex justify-between pb-4 mb-4 border-b border-gray-400 dark:border-gray-700">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-lg bg-gray-50 dark:bg-gray-700 flex items-center justify-center me-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120l0 136c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2 280 120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                    </svg>
                </div>
                <div>
                    <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">Jam Sibuk Parkir</h5>
                    <p class="text-sm font-normal text-gray-500 dark:text-gray-400">loremepsonddeki</p>

                </div>
            </div>
        </div>
        <div>
            <ul class="list-inside space-y-4">
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
@endsection

@push('scripts')

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!-- column chart 1 -->
    <script>
        const options1 = {
            colors: ["#1A56DB"],
            series: [{
                name: "Mobil",
                color: "#1A56DB",
                data: [{
                        x: "Sen",
                        y: 2
                    },
                    {
                        x: "Sel",
                        y: 500
                    },
                    {
                        x: "Rab",
                        y: 63
                    },
                    {
                        x: "Kam",
                        y: 421
                    },
                    {
                        x: "Jum",
                        y: 122
                    },
                    {
                        x: "Sab",
                        y: 323
                    },
                    {
                        x: "Ming",
                        y: 111
                    },
                ],
            }, ],
            chart: {
                type: "bar",
                height: "320px",
                fontFamily: "Inter, sans-serif",
                toolbar: {
                    show: false,
                },
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: "50%",
                    borderRadiusApplication: "end",
                    borderRadius: 8,
                },
            },
            tooltip: {
                shared: true,
                intersect: false,
                style: {
                    fontFamily: "Inter, sans-serif",
                },
            },
            states: {
                hover: {
                    filter: {
                        type: "darken",
                        value: 1,
                    },
                },
            },
            stroke: {
                show: true,
                width: 0,
                colors: ["transparent"],
            },
            grid: {
                show: false,
                strokeDashArray: 4,
                padding: {
                    left: 2,
                    right: 2,
                    top: -14
                },
            },
            dataLabels: {
                enabled: false,
            },
            legend: {
                show: false,
            },
            xaxis: {
                floating: false,
                labels: {
                    show: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                        cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                    }
                },
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
            },
            yaxis: {
                show: false,
            },
            fill: {
                opacity: 1,
            },
        }


        if (document.getElementById("column-chart-1") && typeof ApexCharts !== 'undefined') {
            const chart1 = new ApexCharts(document.getElementById("column-chart-1"), options1);
            chart1.render();
        }

        // column chart 2
        const options2 = {
            colors: ["#057A55"],
            series: [{
                name: "Menit",
                color: "#057A55",
                data: [{
                        x: "Sen",
                        y: 40
                    },
                    {
                        x: "Sel",
                        y: 59
                    },
                    {
                        x: "Rab",
                        y: 30
                    },
                    {
                        x: "Kam",
                        y: 450
                    },
                    {
                        x: "Jum",
                        y: 300
                    },
                    {
                        x: "Sab",
                        y: 150
                    },
                    {
                        x: "Ming",
                        y: 50
                    },
                ],
            }, ],
            chart: {
                type: "bar",
                height: "320px",
                fontFamily: "Inter, sans-serif",
                toolbar: {
                    show: false,
                },
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: "50%",
                    borderRadiusApplication: "end",
                    borderRadius: 8,
                },
            },
            tooltip: {
                shared: true,
                intersect: false,
                style: {
                    fontFamily: "Inter, sans-serif",
                },
            },
            states: {
                hover: {
                    filter: {
                        type: "darken",
                        value: 1,
                    },
                },
            },
            stroke: {
                show: true,
                width: 0,
                colors: ["transparent"],
            },
            grid: {
                show: false,
                strokeDashArray: 4,
                padding: {
                    left: 2,
                    right: 2,
                    top: -14
                },
            },
            dataLabels: {
                enabled: false,
            },
            legend: {
                show: false,
            },
            xaxis: {
                floating: false,
                labels: {
                    show: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                        cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                    }
                },
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
            },
            yaxis: {
                show: false,
            },
            fill: {
                opacity: 1,
            },
        }

        // Second Chart
        if (document.getElementById("column-chart-2") && typeof ApexCharts !== 'undefined') {
            const chart2 = new ApexCharts(document.getElementById("column-chart-2"), options2);
            chart2.render();
        }

    </script>
@endpush
