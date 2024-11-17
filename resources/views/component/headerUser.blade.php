<nav class="relative z-50 p-4 text-white bg-blue-600">
    <div class="container flex items-center justify-between mx-auto">
        <h1 class="pl-2 text-base font-bold">Hallo, Selamat Pagi</h1>
        <div class="dropdown-wrapper">
            <div class="flex items-center cursor-pointer" id="profileDropdown">
                <span class="mr-2 text-sm">Nama Pengguna</span>
                <div class="flex items-center justify-center w-10 h-10 bg-gray-300 rounded-full">
                    <i class="fas fa-user"></i>
                </div>
            </div>
            <div class="hidden w-48 mt-2 bg-white rounded-md shadow-lg dropdown-menu" id="dropdownMenu">
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Ganti Password</a>
                <form action="{{ route('logout')}}" method="POST">
                    @csrf
                    <button type="submit" class="block px-4 text-sm text-gray-700 hover:bg-gray-100">Keluar</button>
                </form>
            </div>
        </div>
    </div>
</nav>
