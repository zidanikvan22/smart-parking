<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Kata Sandi - Parkwell</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/LogoParkwell.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gradient-to-b from-blue-500 to-white min-h-screen flex flex-col">
    <main class="flex-grow container mx-auto px-4 py-8">
        <div class="max-w-md mx-auto">
            <div class="flex items-center mb-6">
                <a href="#" class="text-blue-600 hover:text-blue-800 flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i>
                    <span class="font-semibold text-lg">Kembali</span>
                </a>
            </div>
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <h2 class="text-2xl font-bold mb-6 text-center">Ubah Kata Sandi</h2>
                <form>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="old-password">
                            Kata Sandi lama
                        </label>
                        <div class="flex items-center border rounded-lg px-3 py-3">
                            <i class="fas fa-lock text-gray-400"></i>
                            <input class="ml-2 w-full border-none focus:ring-0 text-lg" id="old-password" placeholder="Kata Sandi lama" type="password"/>
                            <i class="fas fa-eye text-gray-400 cursor-pointer toggle-password" onclick="togglePassword('old-password', this)"></i>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="new-password">
                            Kata Sandi Baru
                        </label>
                        <div class="flex items-center border rounded-lg px-3 py-3">
                            <i class="fas fa-lock text-gray-400"></i>
                            <input class="ml-2 w-full border-none focus:ring-0 text-lg" id="new-password" placeholder="Kata Sandi Baru" type="password"/>
                            <i class="fas fa-eye text-gray-400 cursor-pointer toggle-password" onclick="togglePassword('new-password', this)"></i>
                        </div>
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="confirm-password">
                            Konfirmasi Kata Sandi Baru
                        </label>
                        <div class="flex items-center border rounded-lg px-3 py-3">
                            <i class="fas fa-lock text-gray-400"></i>
                            <input class="ml-2 w-full border-none focus:ring-0 text-lg" id="confirm-password" placeholder="Konfirmasi Kata Sandi Baru" type="password"/>
                            <i class="fas fa-eye text-gray-400 cursor-pointer toggle-password" onclick="togglePassword('confirm-password', this)"></i>
                        </div>
                    </div>
                    <div class="flex items-center justify-center">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
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