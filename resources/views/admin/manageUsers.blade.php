@extends('layout/mainAdmin')

@section('main')

<div class="pl-5 mb-4 text-2xl font-bold md:text-3xl xl:text-2xl">
    <span>Data Pengguna</span>
</div>

<div class="">
    <form class="ml-10 max-w-96 ">
        <label for="default-search"
            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="search" id="default-search" value="{{ request('search') }}" name="search"
                class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg ps-10 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Search Nama pengguna, Plat nomor..." required />
            <button type="submit"
                class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
    </form>
</div>


<div class="grid grid-cols-1 p-5 mx-6 ">

    @foreach ($penggunas as $pengguna )

    @endforeach
    <table class="font-medium border border-black table-fixed">
        <thead class="bg-[#95AFE5]">
            <tr>
                <th class="p-3 text-sm border border-black">No</th>
                <th class="p-3 text-sm border border-black">Nama Lengkap</th>
                <!-- <th class="p-3 text-sm border border-black">Email</th>
                    <th class="p-3 text-sm border border-black">Jenis Kendaraan</th> -->
                <th class="p-3 text-sm border border-black">No Plat Kendaraan</th>
                <th class="p-3 text-sm border border-black">Aksi</th>
            </tr>
        </thead>

        @foreach ($penggunas as $pengguna )
        <tbody class="text-center">
            <tr>
                <td class="p-3 text-sm border border-black">{{ ($penggunas->currentPage() - 1) * $penggunas->perPage() + $loop->iteration }}</td>
                <td class="p-3 text-sm border border-black">{{ $pengguna->nama }}</td>
                <!-- <td class="p-3 text-sm border border-black">email@gmail.com</td>
                    <td class="p-3 text-sm border border-black">Mobil</td> -->
                    <td class="p-3 text-sm border border-black">{{ $pengguna->no_plat }}</td>
                    <td class="p-3 text-sm border border-black">
                        <button data-modal-target="small-modal" data-modal-toggle="small-modal"
                        class="px-2 py-1 text-xs bg-red-400 rounded-lg hover:bg-blue-200">Detail</button>
                        <button data-modal-target="hapus-modal" data-modal-toggle="hapus-modal"
                        class="px-2 py-1 text-xs bg-red-400 rounded-lg hover:bg-blue-200">Hapus</button>
                    </td>
                </tr>
            </tbody>
            @endforeach
    </table>
</div>
<div class="mt-4">
    {{ $penggunas->links('pagination::tailwind') }}
</div>

<!-- Main Modal hapus slot -->
<div id="hapus-modal" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full p-4">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="hapus-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 text-center md:p-5">
                <svg class="w-12 h-12 mx-auto mb-4 text-gray-400 dark:text-gray-200" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h3 class="mb-5 text-lg font-bold text-gray-500 dark:text-gray-400">Apakah anda ingin menghapus Slot
                    ini?</h3>
                <button data-modal-hide="hapus-modal" type="button"
                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                    Iya
                </button>
                <button data-modal-hide="hapus-modal" type="button"
                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Tidak</button>
            </div>
        </div>
    </div>
</div>

<!-- Small Modal -->
<div id="small-modal" tabindex="-1"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Data Diri & Kendaraan Pengguna
                </h3>
                <button type="button"
                    class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="small-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="flex items-center p-4 space-x-4 md:p-5">
                <!-- Profile Image -->
                <img src="{{ asset('img/user.jpg') }}" alt="User Profile" class="object-cover w-48 h-56 rounded-md -pt-5">

                <!-- User Information -->
                <div class="space-y-1">
                    <div class="text-base font-semibold text-gray-900 dark:text-white">Email</div>
                    <div class="text-base text-gray-500 dark:text-gray-400">: cristiano@gmail.com</div>

                    <div class="text-base font-semibold text-gray-900 dark:text-white">Nama Pengguna</div>
                    <div class="text-base text-gray-500 dark:text-gray-400">: Cristiano Ronaldo El Speed</div>

                    <div class="text-base font-semibold text-gray-900 dark:text-white">Jenis Kendaraan</div>
                    <div class="text-base text-gray-500 dark:text-gray-400">: Mobil</div>

                    <div class="text-base font-semibold text-gray-900 dark:text-white">Plat Kendaraan</div>
                    <div class="text-base text-gray-500 dark:text-gray-400">: BP 0770 KU</div>
                </div>
            </div>
            <!-- Modal footer
            <div class="flex items-center p-4 border-t border-gray-200 rounded-b md:p-5 dark:border-gray-600">
                <button data-modal-hide="small-modal" type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                    accept</button>
                <button data-modal-hide="small-modal" type="button"
                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
            </div> -->
        </div>
    </div>
</div>



@endsection
