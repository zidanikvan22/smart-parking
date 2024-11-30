@extends('layout.mainUser')

@section('main')
    <main class="container flex-grow px-4 py-8 mx-auto">
        <div class="max-w-md mx-auto">
            <div class="flex items-center mb-6">
                <a href="{{ route('dashboard') }}" class="flex items-center ">
                    <i class="mr-2 text-xl fas fa-arrow-left text-gray-50"></i>
                    <span class="text-xl font-semibold text-gray-50">Kembali</span>
                </a>
            </div>
            <div class="px-8 pt-6 pb-8 mt-12 bg-white rounded shadow-lg">
                <h2 class="mb-6 text-2xl font-bold text-center">Ubah Kata Sandi</h2>
                <form>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="old-password">
                            Kata Sandi lama
                        </label>
                        <div class="flex items-center px-3 py-1 border rounded-lg">
                            <i class="text-gray-400 fas fa-lock"></i>
                            <input class="w-full ml-2 text-sm border-none focus:ring-0" id="old-password"
                                placeholder="Kata Sandi lama" type="password" />
                            <i class="text-gray-400 cursor-pointer fas fa-eye toggle-password"
                                onclick="togglePassword('old-password', this)"></i>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="new-password">
                            Kata Sandi Baru
                        </label>
                        <div class="flex items-center px-3 py-1 border rounded-lg">
                            <i class="text-gray-400 fas fa-lock"></i>
                            <input class="w-full ml-2 text-sm border-none focus:ring-0" id="new-password"
                                placeholder="Kata Sandi Baru" type="password" />
                            <i class="text-gray-400 cursor-pointer fas fa-eye toggle-password"
                                onclick="togglePassword('new-password', this)"></i>
                        </div>
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="confirm-password">
                            Konfirmasi Kata Sandi Baru
                        </label>
                        <div class="flex items-center px-3 py-1 border rounded-lg">
                            <i class="text-gray-400 fas fa-lock"></i>
                            <input class="w-full ml-2 text-sm border-none focus:ring-0" id="confirm-password"
                                placeholder="Konfirmasi Kata Sandi Baru" type="password" />
                            <i class="text-gray-400 cursor-pointer fas fa-eye toggle-password"
                                onclick="togglePassword('confirm-password', this)"></i>
                        </div>
                    </div>
                    <div class="flex items-center justify-center">
                        <button
                            class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                            type="button">
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
@endsection
