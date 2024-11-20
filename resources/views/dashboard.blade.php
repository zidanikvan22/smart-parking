@extends('layout.mainUser')

@include('component/headerUser')

@section('main')


<main class="container mx-auto px-4 py-6 content-wrapper pb-20">

    <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-6 md:mb-8">
        <div class="carousel-container relative h-72">

            <div class="carousel-slide">
                <img alt="Modern parking facility" class="w-full h-72 md:h-64 object-cover"
                    src="{{ asset('img/techno.jpg') }}" />
                <img alt="Smart parking system interface" class="w-full h-72 md:h-64 object-cover"
                    src="{{ asset('img/Gedung.jpg') }}" />
                <img alt="Aerial view of parking" class="w-full h-72 md:h-64 object-cover"
                    src="{{ asset('img/cover.jpg') }}" />
            </div>

            <div class="absolute bottom-4 left-0 right-0 flex justify-center">
                <div class="w-2 h-2 bg-white bg-opacity-50 rounded-full mx-1 carousel-dot"></div>
                <div class="w-2 h-2 bg-white bg-opacity-50 rounded-full mx-1 carousel-dot"></div>
                <div class="w-2 h-2 bg-white bg-opacity-50 rounded-full mx-1 carousel-dot"></div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-3 md:grid-cols-3 gap-2 md:gap-8 mb-6 md:mb-8">
        <div id="realTimeCard"
            class="bg-white rounded-lg shadow-lg p-3 md:p-6 flex flex-col items-center cursor-pointer transition-transform duration-300 transform hover:scale-105">
            <i class="fas fa-car text-2xl md:text-4xl mb-2 md:mb-4 text-blue-500"></i>
            <p class="text-sm md:text-xl font-bold">Real-Time</p>
            <p class="text-center text-xs md:text-base mt-1 md:mt-2 hidden md:block">Monitor parkir secara real-time
            </p>
        </div>
        <div id="qrCodeCard"
            class="bg-white rounded-lg shadow-lg p-3 md:p-6 flex flex-col items-center cursor-pointer transition-transform duration-300 transform hover:scale-105">
            <i class="fas fa-qrcode text-2xl md:text-4xl mb-2 md:mb-4 text-blue-500"></i>
            <p class="text-sm md:text-xl font-bold">QR-Code</p>
            <p class="text-center text-xs md:text-base mt-1 md:mt-2 hidden md:block">Akses mudah dengan QR Code</p>
        </div>
        <div id="analysisCard"
            class="bg-white rounded-lg shadow-lg p-3 md:p-6 flex flex-col items-center cursor-pointer transition-transform duration-300 transform hover:scale-105">
            <i class="fas fa-chart-line text-2xl md:text-4xl mb-2 md:mb-4 text-blue-500"></i>
            <p class="text-sm md:text-xl font-bold">Analisis</p>
            <p class="text-center text-xs md:text-base mt-1 md:mt-2 hidden md:block">Analisis penggunaan parkir</p>
        </div>
    </div>
    <div class="bg-white rounded-lg shadow-lg p-6">
        <h2 class="font-bold mb-4 text-center text-lg">DATA DIRI PENGGUNA</h2>
        <hr class="border-t-2 border-gray-200 mb-4 mx-auto w-2/3">

        <div class="flex items-start space-x-8">

            <div class="relative">
                <div class="w-32 h-32 rounded-full overflow-hidden ring-4 ring-blue-100 shadow-lg">
                    <img alt="Profile picture of the user"
                        src="https://storage.googleapis.com/a1aa/image/43uVAAkjL2o5C9ucXnT9oqONeUqZkv0592nceoaOa8nwCwmTA.jpg"
                        class="w-full h-full object-cover">
                </div>
                <!-- <button data-modal-target="image-modal" data-modal-toggle="image-modal"
                    class="ml-1 mt-5 px-2 py-2 bg-blue-500 text-white text-xs rounded shadow hover:bg-blue-600 focus:outline-none flex items-center space-x-2">
                    <i class="fas fa-car"></i>
                    <span>Lihat Kendaraan</span>
                </button> -->

            </div>


            <div class="flex-1 space-y-4">

                <div class="border-b pb-2">
                    <h3 class="text-base font-semibold text-gray-800">Cristiano Ronaldo El Speed</h3>
                    <p class="text-gray-500 text-sm">Pengguna sejak {{ date('Y') }}</p>
                </div>


                <div class="grid grid-cols-1 gap-3">

                    <div class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-blue-50 rounded-lg flex items-center justify-center">
                            <i class="w-4 h-4 text-green-500 fas fa-id-card"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">NIM/NIK/NIDN</p>
                            <p class="font-medium text-gray-800">3312311189</p>
                        </div>
                    </div>


                    <div class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-green-50 rounded-lg flex items-center justify-center">
                            <i class="w-4 h-4 fas fa-list text-purple-600"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Jenis Pengguna</p>
                            <p class="font-medium text-gray-800">Mahasiswa</p>
                        </div>
                    </div>


                    <div class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-purple-50 rounded-lg flex items-center justify-center">
                            <i class="w-4 h-4 fas fa-envelope text-orange-300"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Email</p>
                            <p class="font-medium text-gray-800">yanto@gmail.com</p>
                        </div>
                    </div>
                    <!-- <div class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-purple-50 rounded-lg flex items-center justify-center">
                            <i class="w-4 h-4 fas fa-car text-cyan-500"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Jenis Kendaraan</p>
                            <p class="font-medium text-gray-800">Motor</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-purple-50 rounded-lg flex items-center justify-center">
                            <i class="w-4 h-4 fas fa-id-card text-indigo-950"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Plat Kendaraan</p>
                            <p class="font-medium text-gray-800">BP 0770 KU</p>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>


    <!-- modal foto kendaraan -->
    <!-- <div id="image-modal" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 w-full h-full overflow-y-auto overflow-x-hidden flex items-center justify-center bg-black/70">
        <div class="relative w-full max-w-xl mx-4 md:mx-auto"> -->
            <!-- Close Button -->
            <!-- <button type="button"
                class="absolute -top-10 right-0 z-50 text-white hover:text-gray-300 transition-colors duration-300"
                data-modal-hide="image-modal">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button> -->

            <!-- Image Container -->
            <!-- <div class="bg-white rounded-xl shadow-2xl overflow-hidden">
                <img src="{{ asset('img/kendaraan.jpg') }}" alt="Vehicle Image"
                    class="w-full h-auto object-cover transition-transform duration-300 hover:scale-105">
            </div>
        </div>
    </div> -->
</main>

@include('component/footerUser')

<script>
    const profileDropdown = document.getElementById('profileDropdown');
    const dropdownMenu = document.getElementById('dropdownMenu');
    profileDropdown.addEventListener('click', () => {
        dropdownMenu.classList.toggle('hidden');
    });
    window.addEventListener('click', (event) => {
        if (!profileDropdown.contains(event.target)) {
            dropdownMenu.classList.add('hidden');
        }
    });
    // Add interactivity to the feature cards
    document.getElementById('realTimeCard').addEventListener('click', () => {
        alert('Membuka fitur Real-Time Monitoring');
    });
    document.getElementById('qrCodeCard').addEventListener('click', () => {
        alert('Membuka fitur QR Code Scanner');
    });
    document.getElementById('analysisCard').addEventListener('click', () => {
        alert('Membuka fitur Analisis Parkir');
    });
    // Auto-sliding carousel
    const carouselSlide = document.querySelector('.carousel-slide');
    const carouselImages = document.querySelectorAll('.carousel-slide img');
    const carouselDots = document.querySelectorAll('.carousel-dot');
    let counter = 0;
    const size = carouselImages[0].clientWidth;

    function slideImage() {
        if (counter >= carouselImages.length - 1) {
            counter = 0;
        } else {
            counter++;
        }
        carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';
        updateDots();
    }

    function updateDots() {
        carouselDots.forEach((dot, index) => {
            if (index === counter) {
                dot.classList.add('bg-white');
                dot.classList.remove('bg-opacity-50');
            } else {
                dot.classList.add('bg-opacity-50');
                // dot.classList.remove('bg-white');
            }
        });
    }
    setInterval(slideImage, 5000); // ganti gambar setiap 5 detik

    updateDots();

</script>

@endsection
