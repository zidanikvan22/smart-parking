@extends('layout.mainUser')

@include('component.headerUser')

@section('main')
    <div class="flex items-center justify-center p-10 overflow-hidden bg-gradient-to-br from-blue-50 to-gray-100">
        <div class="w-full py-12 text-center border-2 border-black shadow-xl rounded-xl" style="max-height: 90vh;">
            <div class="mb-6 w-[80vw] h-[40vh] overflow-hidden rounded-xl mx-auto">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="{{ asset('images/carousel.png') }}" alt="Gambar Dashboard 1"
                                 class="object-cover w-full h-full transition-transform duration-300 border border-gray-200 rounded-xl hover:scale-105">
                        </div>
                        <div class="swiper-slide">
                            <img src="{{ asset('foto parkir\zona 5\IMG-20240920-WA0010.jpg') }}" alt="Gambar Dashboard 2"
                                 class="object-cover w-full h-full transition-transform duration-300 border border-gray-200 rounded-xl hover:scale-105">
                        </div>
                        <div class="swiper-slide">
                            <img src="{{ asset('foto parkir\zona 5\IMG-20240920-WA0009.jpg') }}" alt="Gambar Dashboard 3"
                                 class="object-cover w-full h-full transition-transform duration-300 border border-gray-200 rounded-xl hover:scale-105">
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>

            <!-- Buttons grid -->
            <div class="grid max-w-lg grid-cols-2 gap-6 mx-auto mt-10">
                <a href="{{ route('real-time') }}" class="flex flex-col items-center justify-center p-6 text-white bg-blue-900 rounded-lg shadow-md cursor-pointer">
                    <i class="mb-3 fas fa-tachometer-alt fa-2x"></i>
                    <div class="text-xl font-semibold">Real-Time</div>
                </a>
                <a href="{{ route('analysis') }}" class="flex flex-col items-center justify-center p-6 text-white bg-blue-900 rounded-lg shadow-md cursor-pointer">
                    <i class="mb-3 fas fa-chart-bar fa-2x"></i>
                    <div class="text-xl font-semibold">Analisis</div>
                </a>
            </div>
        </div>
    </div>

    <!-- Tambahkan Swiper.js CSS dan JS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const swiper = new Swiper('.swiper', {
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                    bulletClass: 'w-4 h-4 bg-gray-300 rounded-full cursor-pointer inline-block mx-1',
                    bulletActiveClass: 'bg-blue-600',
                },
            });
        });
    </script>
@endsection
