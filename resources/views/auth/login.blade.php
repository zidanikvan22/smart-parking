<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Parkwell</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/LogoParkwell.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body class="bg-gradient-to-b from-blue-500 to-white min-h-screen">
    <div class="container mx-auto px-4 py-4 md:py-8 max-w-[1920px]">
        <!-- header responsive -->
        <header class="flex justify-between items-center mb-4 md:mb-0">
            <img alt="Company logo" class="h-8 md:h-12 -mt-2 md:-mt-5" src="{{ asset('images/PolobatamLogo.png') }}"/>
            <img alt="Indonesian flag" class="h-6 md:h-10 -mt-2 md:-mt-5" src="{{ asset('images/Indonesia.png') }}"/>
        </header>

        <main class="flex flex-col justify-center items-center gap-6 pt-32 md:gap-12 md:pt-10">
            <!-- ukuran logo responsive -->
            <div class="w-full max-w-md">
                <img alt="Parkwell logo" class="h-24 md:h-32 mx-auto" src="{{ asset('images/LogoParkwell.png') }}"/>
            </div>

            <!-- ukuran form login -->
            <div class="w-full max-w-[90%] md:max-w-md -mt-2 md:-mt-5">
                <div class="bg-white p-6 md:p-8 rounded-lg shadow-lg">
                    <h2 class="text-center text-2xl md:text-3xl font-bold mb-4 md:mb-6">Masuk</h2>
                    <form>
                        <!-- input email -->
                        <div class="mb-4">
                            <div class="flex items-center border rounded-lg px-3 py-2 md:py-3">
                                <i class="fas fa-envelope text-gray-400"></i>
                                <input class="ml-2 w-full border-none focus:ring-0 text-base md:text-lg" placeholder="Email" type="email"/>
                            </div>
                        </div>

                        <!-- input password -->
                        <div class="mb-4 md:mb-6">
                            <div class="flex items-center border rounded-lg px-3 py-2 md:py-3">
                                <i class="fas fa-lock text-gray-400"></i>
                                <input id="password" class="ml-2 w-full border-none focus:ring-0 text-base md:text-lg" placeholder="Kata Sandi" type="password"/>
                                <i id="togglePassword" class="fas fa-eye text-gray-400 cursor-pointer" onclick="togglePassword('password', this)"></i>
                            </div>
                        </div>

                        <!-- tombol login -->
                        <button class="bg-blue-500 hover:bg-blue-600 text-white w-full py-2 md:py-3 rounded-lg font-bold text-base md:text-lg transition duration-300">
                            Masuk
                        </button>
                    </form>

                    <!-- link registrasi -->
                    <div class="text-center mt-4 md:mt-6">
                        <p class="text-gray-600 text-sm md:text-base">Atau</p>
                        <a class="text-blue-500 font-bold hover:text-blue-600 text-base md:text-lg" href="#">Registrasi</a>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script>
        function togglePassword(inputId, icon) {
            const input = document.getElementById(inputId);
            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                input.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }
    </script>
</body>
</html>