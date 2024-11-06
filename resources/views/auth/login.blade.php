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
    <div class="container mx-auto px-4 py-8">
        <header class="flex justify-between items-center mb-12">
            <img alt="Company logo" class="h-16" src="{{ asset('images/PolobatamLogo.png') }}"/>
            <img alt="Indonesian flag" class="h-12" src="{{ asset('images/Indonesia.png') }}"/>
        </header>
        <main class="flex flex-col md:flex-row justify-center items-center gap-12">
            <div class="w-full md:w-1/2 max-w-md">
                <img alt="Parkwell logo" class="h-48 mx-auto mb-8" src="{{ asset('images/LogoParkwell.png') }}"/>
            </div>
            <div class="w-full md:w-1/2 max-w-md">
                <div class="bg-white p-8 rounded-lg shadow-lg">
                    <h2 class="text-center text-3xl font-bold mb-6">Masuk</h2>
                    <form>
                        <div class="mb-4">
                            <div class="flex items-center border rounded-lg px-3 py-3">
                                <i class="fas fa-envelope text-gray-400"></i>
                                <input class="ml-2 w-full border-none focus:ring-0 text-lg" placeholder="Email" type="email"/>
                            </div>
                        </div>
                        <div class="mb-6">
                            <div class="flex items-center border rounded-lg px-3 py-3">
                                <i class="fas fa-lock text-gray-400"></i>
                                <input id="password" class="ml-2 w-full border-none focus:ring-0 text-lg" placeholder="Kata Sandi" type="password"/>
                                <i id="togglePassword" class="fas fa-eye text-gray-400 cursor-pointer" onclick="togglePassword('password', this)"></i>
                            </div>
                        </div>
                        <button class="bg-blue-500 hover:bg-blue-600 text-white w-full py-3 rounded-lg font-bold text-lg transition duration-300">
                            Masuk
                        </button>
                    </form>
                    <div class="text-center mt-6">
                        <p class="text-gray-600">Atau</p>
                        <a class="text-blue-500 font-bold hover:text-blue-600 text-lg" href="#">Registrasi</a>
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