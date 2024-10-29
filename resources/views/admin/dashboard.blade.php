@extends('layout/mainAdmin')

@section('main')
    <!-- Awalan -->
    <div class="text-2xl font-bold md:text-3xl xl:text-2xl">
        <span>Selamat datang, Admin</span>
    </div>

    <!-- Card Grid -->
    <div class="grid grid-cols-1 p-12 mx-6 my-5 gap-y-16 sm:grid-cols-2 lg:grid-cols-2 gap-x-32">

        <!-- Card 1 -->
        <div class="flex flex-col max-w-sm mx-auto bg-[#95AFE5] border border-gray-200 shadow-md p-7 md:rounded-2xl hover:bg-blue-400">
            <div class="flex items-center mb-1">
                <div class="pl-7 icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="#000000" viewBox="0 0 256 256">
                        <path
                            d="M117.25,157.92a60,60,0,1,0-66.5,0A95.83,95.83,0,0,0,3.53,195.63a8,8,0,1,0,13.4,8.74,80,80,0,0,1,134.14,0,8,8,0,0,0,13.4-8.74A95.83,95.83,0,0,0,117.25,157.92ZM40,108a44,44,0,1,1,44,44A44.05,44.05,0,0,1,40,108Zm210.14,98.7a8,8,0,0,1-11.07-2.33A79.83,79.83,0,0,0,172,168a8,8,0,0,1,0-16,44,44,0,1,0-16.34-84.87,8,8,0,1,1-5.94-14.85,60,60,0,0,1,55.53,105.64,95.83,95.83,0,0,1,47.22,37.71A8,8,0,0,1,250.14,206.7Z">
                        </path>
                    </svg>
                </div>
                <div class="flex flex-col flex-1">
                    <div class="flex flex-col">
                        <p data-hs-toggle-count='{
                            "target": "#toggle-count",
                            "min": 0,
                            "max": 150
                        }'
                            class="text-4xl font-semibold text-gray-800 pl-[2em]">
                            120
                        </p>
                        <h4 class="text-black pl-[3em] pr-6 text-xl">Pengguna</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="flex flex-col max-w-sm mx-auto bg-[#95AFE5] border border-gray-200 shadow-md p-7 md:rounded-2xl hover:bg-blue-400">
            <div class="flex items-center mb-1">
                <div class="pl-7 icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="#000000" viewBox="0 0 256 256"><path d="M112,80a16,16,0,1,1,16,16A16,16,0,0,1,112,80ZM64,80a64,64,0,0,1,128,0c0,59.95-57.58,93.54-60,94.95a8,8,0,0,1-7.94,0C121.58,173.54,64,140,64,80Zm16,0c0,42.2,35.84,70.21,48,78.5,12.15-8.28,48-36.3,48-78.5a48,48,0,0,0-96,0Zm122.77,67.63a8,8,0,0,0-5.54,15C213.74,168.74,224,176.92,224,184c0,13.36-36.52,32-96,32s-96-18.64-96-32c0-7.08,10.26-15.26,26.77-21.36a8,8,0,0,0-5.54-15C29.22,156.49,16,169.41,16,184c0,31.18,57.71,48,112,48s112-16.82,112-48C240,169.41,226.78,156.49,202.77,147.63Z"></path></svg>
                </div>
                <div class="flex flex-col flex-1">
                    <div class="flex flex-col">
                        <p data-hs-toggle-count='{
                            "target": "#toggle-count",
                            "min": 0,
                            "max": 150
                        }'
                            class="text-4xl font-semibold text-gray-800 pl-[2.2em]">
                            120
                        </p>
                        <h4 class="text-black pl-[3em] text-xl px-2">Zona Parkir</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="flex flex-col max-w-sm mx-auto bg-[#95AFE5] border border-gray-200 shadow-md p-7 md:rounded-2xl hover:bg-blue-400">
            <div class="flex items-center mb-1">
                <div class="pl-7 icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="#000000" viewBox="0 0 256 256"><path d="M128,40a96,96,0,1,0,96,96A96.11,96.11,0,0,0,128,40Zm0,176a80,80,0,1,1,80-80A80.09,80.09,0,0,1,128,216ZM173.66,90.34a8,8,0,0,1,0,11.32l-40,40a8,8,0,0,1-11.32-11.32l40-40A8,8,0,0,1,173.66,90.34ZM96,16a8,8,0,0,1,8-8h48a8,8,0,0,1,0,16H104A8,8,0,0,1,96,16Z"></path></svg>
                </div>
                <div class="flex flex-col flex-1">
                    <div class="flex flex-col">
                        <p data-hs-toggle-count='{
                            "target": "#toggle-count",
                            "min": 0,
                            "max": 150
                        }'
                            class="text-4xl font-semibold text-gray-800 pl-[2.2em]">
                            120
                        </p>
                        <h4 class="text-black pl-[3em] pr-6 text-xl">Real-Time</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="flex flex-col max-w-sm mx-auto bg-[#95AFE5] border border-gray-200 shadow-md p-7 md:rounded-2xl hover:bg-blue-400">
            <div class="flex items-center mb-1">
                <div class="pl-7 icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="#000000" viewBox="0 0 256 256"><path d="M213.66,82.34l-56-56A8,8,0,0,0,152,24H56A16,16,0,0,0,40,40V216a16,16,0,0,0,16,16H200a16,16,0,0,0,16-16V88A8,8,0,0,0,213.66,82.34ZM160,51.31,188.69,80H160ZM200,216H56V40h88V88a8,8,0,0,0,8,8h48V216Z"></path></svg>
                </div>
                <div class="flex flex-col flex-1">
                    <div class="flex flex-col">
                        <p data-hs-toggle-count='{
                            "target": "#toggle-count",
                            "min": 0,
                            "max": 150
                        }'
                            class="text-4xl font-semibold text-gray-800 pl-[2.2em]">
                            120
                        </p>
                        <h4 class="text-black pl-[2.5em] text-xl px-1">Analisis Data</h4>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
