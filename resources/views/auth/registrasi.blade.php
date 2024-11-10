<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - Parkwell</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/LogoParkwell.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body class="bg-gradient-to-b from-blue-500 to-white min-h-screen">
    <div class="container mx-auto px-4 py-4 md:py-8 max-w-[1920px]">
        <header class="flex justify-between items-center mb-4 md:mb-0">
            <img alt="Logo of the company" class="h-8 md:h-12 -mt-2 md:-mt-5" src="{{ asset('images/PolobatamLogo.png') }}"/>
            <img alt="Indonesian flag" class="h-6 md:h-10 -mt-2 md:-mt-5" src="{{ asset('images/Indonesia.png') }}"/>
        <!-- header responsive -->    
        </header>

        <main class="flex flex-col justify-center items-center gap-6 pt-10 md:gap-12 md:pt-10">
            <!-- ukuran logo responsive -->
            <div class="w-full max-w-md">
                <img alt="Parkwell logo" class="h-24 md:h-32 mx-auto" src="{{ asset('images/LogoParkwell.png') }}"/>
            </div>

            <!-- ukuran form reggistrasi -->
            <div class="w-full max-w-[90%] md:max-w-md -mt-2 md:-mt-5">
                <div class="bg-white shadow-lg rounded-lg px-8 pt-6 pb-8">
                    <h2 class="text-center text-2xl md:text-3xl font-bold mb-4 md:mb-6">Registrasi</h2>
                    <form>
                        <!-- input nama pengguna -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                <i class="fas fa-user mr-2"></i>Nama Pengguna
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm md:text-base " id="username" placeholder="Nama Pengguna" type="text"/>
                        </div>
                        <!-- input email -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                                <i class="fas fa-envelope mr-2"></i>Email
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm md:text-base" id="email" placeholder="Email" type="email"/>
                        </div>
                        <!-- input jenis kendaraan -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="vehicle">
                                <i class="fas fa-car mr-2"></i>Pilih Kendaraan
                            </label>
                            <select class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm md:text-base" id="vehicle">
                                <option>Pilih Kendaraan</option>
                                <option>Mobil</option>
                                <option>Motor</option>
                            </select>
                        </div>
                        <!-- input plat kendaraan -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="plate">
                                <i class="fas fa-id-card mr-2"></i>Plat Kendaraan
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm md:text-base" id="plate" placeholder="Plat Kendaraan" type="text"/>
                        </div>
                        <!-- input kata sandi -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                                <i class="fas fa-lock mr-2"></i>Kata Sandi
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm md:text-base" id="password" placeholder="Kata Sandi" type="password"/>
                        </div>
                        <!-- input file -->
                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="file">
                                <i class="fas fa-camera mr-2"></i>Pilih File
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm md:text-base" id="file" type="file"/>
                        </div>
                        <!-- button registrasi -->
                        <div class="flex items-center justify-between">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded focus:outline-none focus:shadow-outline w-full transition duration-300" type="button">
                                Registrasi
                            </button>
                        </div>
                    </form>
                    <p class="text-center text-gray-500 text-sm mt-6">
                        Sudah punya akun? <a class="text-blue-500 hover:text-blue-700" href="#">Masuk</a>
                    </p>
                </div>
            </div>
        </main>
    </div>
</body>
</html>