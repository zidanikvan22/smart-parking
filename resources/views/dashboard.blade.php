@extends('layout.mainUser')

@include('component/headerUser')

@section('main')


<main class="container px-4 py-6 mx-auto ">

    <div class="mb-6 overflow-hidden bg-white rounded-lg shadow-lg md:mb-8">
        <div class="relative carousel-container h-72">

            <div class="carousel-slide">
                <img alt="Modern parking facility" class="object-cover w-full h-72 md:h-64"
                    src="{{ asset('img/techno.jpg') }}" />
                <img alt="Smart parking system interface" class="object-cover w-full h-72 md:h-64"
                    src="{{ asset('img/Gedung.jpg') }}" />
                <img alt="Aerial view of parking" class="object-cover w-full h-72 md:h-64"
                    src="{{ asset('img/cover.jpg') }}" />
            </div>

            <div class="absolute left-0 right-0 flex justify-center bottom-4">
                <div class="w-2 h-2 mx-1 bg-white bg-opacity-50 rounded-full carousel-dot"></div>
                <div class="w-2 h-2 mx-1 bg-white bg-opacity-50 rounded-full carousel-dot"></div>
                <div class="w-2 h-2 mx-1 bg-white bg-opacity-50 rounded-full carousel-dot"></div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-3 gap-2 mb-6 md:grid-cols-3 md:gap-8 md:mb-8">
        <div id="realTimeCard"
            class="flex flex-col items-center p-3 transition-transform duration-300 transform bg-white rounded-lg shadow-lg cursor-pointer md:p-6 hover:scale-105">
            <i class="mb-2 text-2xl text-blue-500 fas fa-car md:text-4xl md:mb-4"></i>
            <p class="text-sm font-bold md:text-xl">Real-Time</p>
            <p class="hidden mt-1 text-xs text-center md:text-base md:mt-2 md:block">Monitor parkir secara real-time
            </p>
        </div>
        <div id="qrCodeCard"
            class="flex flex-col items-center p-3 transition-transform duration-300 transform bg-white rounded-lg shadow-lg cursor-pointer md:p-6 hover:scale-105">
            <i class="mb-2 text-2xl text-blue-500 fas fa-qrcode md:text-4xl md:mb-4"></i>
            <p class="text-sm font-bold md:text-xl">QR-Code</p>
            <p class="hidden mt-1 text-xs text-center md:text-base md:mt-2 md:block">Akses mudah dengan QR Code</p>
        </div>
        <div id="analysisCard"
            class="flex flex-col items-center p-3 transition-transform duration-300 transform bg-white rounded-lg shadow-lg cursor-pointer md:p-6 hover:scale-105">
            <i class="mb-2 text-2xl text-blue-500 fas fa-chart-line md:text-4xl md:mb-4"></i>
            <p class="text-sm font-bold md:text-xl">Analisis</p>
            <p class="hidden mt-1 text-xs text-center md:text-base md:mt-2 md:block">Analisis penggunaan parkir</p>
        </div>
    </div>
    <div class="p-6 bg-white rounded-lg shadow-lg">
        <h2 class="mb-4 text-lg font-bold text-center">Data Diri & Kendaraan Pengguna</h2>
        <hr class="w-2/3 mx-auto mb-4 border-t-2 border-gray-200">

        <div class="flex items-start space-x-8">

            <div class="relative">
                <div class="w-32 h-32 overflow-hidden rounded-full shadow-lg ring-4 ring-blue-100">
                    <img alt="Profile picture of the user"
                        src="https://storage.googleapis.com/a1aa/image/43uVAAkjL2o5C9ucXnT9oqONeUqZkv0592nceoaOa8nwCwmTA.jpg"
                        class="object-cover w-full h-full">
                </div>
            </div>


            <div class="flex-1 space-y-4">

                <div class="pb-2 border-b">
                    <h3 class="text-base font-semibold text-gray-800">Cristiano Ronaldo El Speed</h3>
                    <p class="text-sm text-gray-500">Pengguna sejak {{ date('Y') }}</p>
                </div>


                <div class="grid grid-cols-1 gap-3">

                    <div class="flex items-center space-x-2">
                        <div class="flex items-center justify-center w-8 h-8 rounded-lg bg-blue-50">
                            <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Email</p>
                            <p class="font-medium text-gray-800">cristiano@gmail.com</p>
                        </div>
                    </div>


                    <div class="flex items-center space-x-2">
                        <div class="flex items-center justify-center w-8 h-8 rounded-lg bg-green-50">
                            <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h8a1 1 0 001-1z M16 17h-2 M18 17h2" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Jenis Kendaraan</p>
                            <p class="font-medium text-gray-800">Mobil</p>
                        </div>
                    </div>


                    <div class="flex items-center space-x-2">
                        <div class="flex items-center justify-center w-8 h-8 rounded-lg bg-purple-50">
                            <svg class="w-4 h-4 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 9a2 2 0 00-2-2H7a2 2 0 00-2 2v6a2 2 0 002 2h6a2 2 0 002-2V9z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Plat Kendaraan</p>
                            <p class="font-medium text-gray-800">BP 0770 KU</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
