@extends('layout.mainUser')

@section('main')
    <div class="container mx-auto px-4 py-4 md:py-8 max-w-[1920px]">
        <!-- header responsive -->
        <header class="flex items-center justify-between mb-4 md:mb-0">
            <img alt="Company logo" class="h-8 -mt-2 md:h-12 md:-mt-5" src="{{ asset('images/PolobatamLogo.png') }}"/>
            <img alt="Indonesian flag" class="h-6 -mt-2 md:h-10 md:-mt-5" src="{{ asset('images/Indonesia.png') }}"/>
        </header>

        <main class="flex flex-col items-center justify-center gap-6 pt-32 md:gap-12 md:pt-10">
            <!-- ukuran logo responsive -->
            <div class="w-full max-w-md">
                <img alt="Parkwell logo" class="h-24 mx-auto md:h-32" src="{{ asset('images/LogoParkwell.png') }}"/>
            </div>

            <!-- ukuran form login -->
            <div class="w-full max-w-[90%] md:max-w-md -mt-2 md:-mt-5">
                <div class="p-6 bg-white rounded-lg shadow-lg md:p-8">
                    <h2 class="mb-4 text-2xl font-bold text-center md:text-3xl md:mb-6">Masuk</h2>
                    <form>
                        <!-- input email -->
                        <div class="mb-4">
                            <div class="flex items-center px-3 py-2 border rounded-lg md:py-3">
                                <i class="text-gray-400 fas fa-envelope"></i>
                                <input class="w-full ml-2 text-base border-none focus:ring-0 md:text-lg" placeholder="Email" type="email"/>
                            </div>
                        </div>

                        <!-- input password -->
                        <div class="mb-4 md:mb-6">
                            <div class="flex items-center px-3 py-2 border rounded-lg md:py-3">
                                <i class="text-gray-400 fas fa-lock"></i>
                                <input id="password" class="w-full ml-2 text-base border-none focus:ring-0 md:text-lg" placeholder="Kata Sandi" type="password"/>
                                <i id="togglePassword" class="text-gray-400 cursor-pointer fas fa-eye" onclick="togglePassword('password', this)"></i>
                            </div>
                        </div>

                        <!-- tombol login -->
                        <button class="w-full py-2 text-base font-bold text-white transition duration-300 bg-blue-500 rounded-lg hover:bg-blue-600 md:py-3 md:text-lg">
                            Masuk
                        </button>
                    </form>

                    <!-- link registrasi -->
                    <div class="mt-4 text-center md:mt-6">
                        <p class="text-sm text-gray-600 md:text-base">Atau</p>
                        <a class="text-base font-bold text-blue-500 hover:text-blue-600 md:text-lg" href="#">Registrasi</a>
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
@endsection
