<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Parkwell</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/LogoParkwell.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
    <style>
        body { font-family: 'Roboto', sans-serif; }
        .carousel-container {
            position: relative;
            overflow: hidden;
        }
        .carousel-slide {
            display: flex;
            width: 300%;
            transition: transform 0.5s ease-in-out;
        }
        .carousel-slide img {
            width: 33.333%;
            flex-shrink: 0;
        }
        .dropdown-wrapper {
            position: relative;
        }
        .dropdown-menu {
            position: absolute;
            right: 0;
            top: 100%;
            z-index: 50;
            min-width: 12rem;
        }
    </style>
</head>
<body class="bg-gradient-to-b from-blue-500 to-blue-200 min-h-screen">
    <nav class="bg-blue-600 text-white p-4 relative z-50">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">Selamat Datang</h1>
            <div class="dropdown-wrapper">
                <div class="flex items-center cursor-pointer" id="profileDropdown">
                    <span class="mr-2">Nama Pengguna</span>
                    <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
                <div class="dropdown-menu mt-2 w-48 bg-white rounded-md shadow-lg hidden" id="dropdownMenu">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Ganti Password</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
                </div>
            </div>
        </div>
    </nav>
    <main class="container mx-auto p-4">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-8">
            <div class="carousel-container">
                <div class="carousel-slide">
                    <img alt="Modern parking facility with the text 'Parkwell: Your smart parking solution'" class="w-full h-64 object-cover" src="https://storage.googleapis.com/a1aa/image/qkghMJMzoe0KMqk1XUhkfaPK81f7P7SQR8g4Gpe5HmRLLAbOB.jpg"/>
                    <img alt="Smart parking system interface" class="w-full h-64 object-cover" src="/api/placeholder/400/320" />
                    <img alt="Aerial view of a large parking lot" class="w-full h-64 object-cover" src="/api/placeholder/400/320" />
                </div>
            </div>
            <div class="flex justify-center py-2">
                <div class="w-2 h-2 bg-gray-400 rounded-full mx-1 carousel-dot"></div>
                <div class="w-2 h-2 bg-gray-400 rounded-full mx-1 carousel-dot"></div>
                <div class="w-2 h-2 bg-gray-400 rounded-full mx-1 carousel-dot"></div>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
            <div id="realTimeCard" class="bg-white rounded-lg shadow-lg p-6 flex flex-col items-center cursor-pointer transition-transform duration-300 transform hover:scale-105">
                <i class="fas fa-car text-4xl mb-4 text-blue-500"></i>
                <p class="text-xl font-bold">Real-Time</p>
                <p class="text-center mt-2">Monitor parkir secara real-time</p>
            </div>
            <div id="qrCodeCard" class="bg-white rounded-lg shadow-lg p-6 flex flex-col items-center cursor-pointer transition-transform duration-300 transform hover:scale-105">
                <i class="fas fa-qrcode text-4xl mb-4 text-blue-500"></i>
                <p class="text-xl font-bold">QR-Code</p>
                <p class="text-center mt-2">Akses mudah dengan QR Code</p>
            </div>
            <div id="analysisCard" class="bg-white rounded-lg shadow-lg p-6 flex flex-col items-center cursor-pointer transition-transform duration-300 transform hover:scale-105">
                <i class="fas fa-chart-line text-4xl mb-4 text-blue-500"></i>
                <p class="text-xl font-bold">Analisis</p>
                <p class="text-center mt-2">Analisis penggunaan parkir</p>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-bold mb-4">Data Diri & Kendaraan Pengguna</h2>
            <div class="flex items-center">
                <img alt="Profile picture of the user" class="w-24 h-24 rounded-full mr-6" src="https://storage.googleapis.com/a1aa/image/43uVAAkjL2o5C9ucXnT9oqONeUqZkv0592nceoaOa8nwCwmTA.jpg"/>
                <div>
                    <p class="mb-2"><span class="font-bold">Email:</span> cristiano@gmail.com</p>
                    <p class="mb-2"><span class="font-bold">Nama Pengguna:</span> Cristiano Ronaldo El Speed</p>
                    <p class="mb-2"><span class="font-bold">Jenis Kendaraan:</span> Mobil</p>
                    <p><span class="font-bold">Plat Kendaraan:</span> BP 0770 KU</p>
                </div>
            </div>
        </div>
    </main>
    <footer class="bg-blue-600 text-white py-4 mt-8">
        <div class="container mx-auto text-center">
            <p>&copy; 2023 Parkwell. All rights reserved.</p>
        </div>
    </footer>
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
                dot.style.backgroundColor = index === counter ? '#3B82F6' : '#9CA3AF';
            });
        }
        setInterval(slideImage, 5000); // Change image every 5 seconds
        // Update dots on page load
        updateDots();
    </script>
</body>
</html>