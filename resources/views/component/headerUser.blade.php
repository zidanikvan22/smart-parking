<nav class="relative z-50 p-4 text-white bg-blue-600">
    <div class="container flex items-center justify-between mx-auto">
        <h1 class="pl-2 text-base font-bold">Hallo, Selamat Datang</h1>
        <div class="dropdown-wrapper">
            <div class="flex items-center cursor-pointer" id="profileDropdown">
                <span class="mr-2 text-xl">{{auth()->user()->nama}}</span>
                <div class="flex items-center justify-center w-10 h-10 bg-gray-300 rounded-full" id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider">
                    <img src="{{ Storage::url(auth()->user()->foto_profile) }}" alt="Profile Picture" class="object-cover w-full h-full rounded-full">
                </div>
            </div>
            <div id="dropdownDivider" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDividerButton">
                  <li>
                    <a href="{{ route('ubah-sandi')}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                  </li>
                  <li>
                    <form action="{{ route('logout')}}" method="POST">
                        @csrf
                        <button type="submit" class="block w-full h-10 px-4 text-sm dark:hover:bg-gray-600 hover:bg-gray-100 text-start">Keluar</button>
                    </form>
                  </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
