@extends('layout.mainUser')

@section('main')
<div class="container px-4 py-8 mx-auto">
    <nav class="flex items-center justify-between mb-8">
        <div class="flex items-center col-span-2 mt-3">
            <a href="{{ route('dashboard')}}" class="flex items-center">
                <i class="mr-2 text-xl fas fa-arrow-left text-gray-50"></i>
                <span class="text-xl font-semibold text-gray-50">Kembali</span>
            </a>
        </div>
    </nav>

    <button button data-modal-target="tambah-kendaraan" data-modal-toggle="tambah-kendaraan"
        class="flex items-center px-6 py-2 mb-5 mr-1 transition duration-300 bg-white rounded-lg shadow-md text-sky-500 hover:bg-gray-200">
        <i class="mr-2 fas fa-car"></i>
        Tambah Kendaraan
    </button>

    <div class="max-w-4xl p-8 mx-auto bg-white rounded-lg shadow-lg">
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
            <div class="flex items-center justify-center">
                <img alt="QR code image" class=""
                    src="{{ Storage::url(auth()->user()->qr_code) }}" />
            </div>
            <div class="space-y-4 text-gray-600">
                <h2 class="mb-6 text-2xl font-bold text-blue-500">Informasi Qr Code :</h2>
                <!-- <p>
                    <span class="text-lg font-bold">Email</span><br />
                    cristiano@gmail.com
                </p> -->
                <p>
                    <span class="text-lg font-bold">Nama Lengkap</span><br />
                    {{ auth()->user()->nama }}
                </p>
                <p>
                    <span class="text-lg font-bold">Jenis Kendaraan</span><br />
                    {{ auth()->user()->jenis_kendaraan }}
                </p>
                <p>
                    <span class="text-lg font-bold">Plat kendaraan</span><br />
                    {{ auth()->user()->no_plat }}
                </p>
            </div>
        </div>

    </div>
    <div class="flex justify-between max-w-4xl mx-auto mt-4">
        <button data-modal-target="image-modal" data-modal-toggle="image-modal"
            class="flex items-center px-6 py-2 ml-1 text-gray-100 transition duration-300 rounded-lg shadow-md bg-sky-500 hover:bg-sky-400">
            <i class="mr-2 fas fa-eye"></i>
            Lihat Kendaraan
        </button>

        <button
            class="flex items-center px-6 py-2 mr-1 text-gray-100 transition duration-300 rounded-lg shadow-md bg-sky-500 hover:bg-sky-400">
            <i class="mr-2 fas fa-file-pdf"></i>
            PDF
        </button>
    </div>
</div>

<!-- modal foto kendaraan -->
<div id="image-modal" tabindex="-1" aria-hidden="true"
    class="fixed inset-0 z-50 flex items-center justify-center hidden w-full h-full overflow-x-hidden overflow-y-auto bg-black/70">
    <div class="relative w-full max-w-xl mx-4 md:mx-auto">
        <!-- tombol tutup -->
        <button type="button"
            class="absolute right-0 z-50 text-white transition-colors duration-300 -top-10 hover:text-gray-300"
            data-modal-hide="image-modal">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                </path>
            </svg>
            <span class="sr-only">Close modal</span>
        </button>

        <!-- container foto -->
        <div class="overflow-hidden bg-white shadow-2xl rounded-xl">
            <img src="{{ Storage::url(auth()->user()->foto_kendaraan) }}" alt="Vehicle Image"
                class="object-cover w-full h-auto transition-transform duration-300 hover:scale-105">
        </div>
    </div>
</div>

<!-- Main Modal Tambah kendaraan -->
<div id="tambah-kendaraan" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full p-4">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Tambah Kendaraan
                </h3>
                <button type="button"
                    class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="tambah-kendaraan">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5">
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                            Kendaraan</label>
                        <select
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            id="vehicle">
                            <option>Pilih Kendaraan</option>
                            <option>Mobil</option>
                            <option>Motor</option>
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Plat Kendaraan</label>
                        <input type="text" name="" id=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="BP 0000 IK" required="">
                    </div>
                    <div class="col-span-2 ">

                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="file_input">Foto Kendaraan </label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="file_input_help" id="file_input" type="file">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG
                            or GIF (MAX. 800x400px).</p>

                    </div>

                </div>
                <button type="submit"
                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-5 h-5 me-1 -ms-1" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Tambah Kendaraan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
