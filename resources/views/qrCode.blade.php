@extends('layout.mainUser')

@section('main')
<div class="container px-4 py-8 mx-auto">
    <nav class="flex items-center justify-between mb-8">
        <div class="flex items-center">
            <i class="mr-2 text-2xl text-white fas fa-arrow-left"></i>
            <span class="text-2xl text-white">Kembali</span>
        </div>

    </nav>

    <button button data-modal-target="tambah-kendaraan" data-modal-toggle="tambah-kendaraan"
        class="mb-5 mr-1 flex items-center px-6 py-2 text-sky-500 transition duration-300 bg-white rounded-lg shadow-md hover:bg-gray-200">
        <i class="mr-2 fas fa-car"></i>
        Tambah Kendaraan
    </button>

    <div class="max-w-4xl p-8 mx-auto bg-white rounded-lg shadow-lg">
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
            <div class="flex items-center justify-center">
                <img alt="QR code image" class="w-64 h-64"
                    src="https://storage.googleapis.com/a1aa/image/pdKDUcyVPCYkPVayGUf704CWc4jHDmFgDdl4HZlLTjvS5XzJA.jpg" />
            </div>
            <div class="space-y-4 text-gray-600">
                <h2 class="mb-6 text-3xl font-bold text-blue-500">Data Kendaraan 1</h2>
                <!-- <p>
                    <span class="text-lg font-bold">Email</span><br />
                    cristiano@gmail.com
                </p> -->
                <p>
                    <span class="text-lg font-bold">Nama Pengguna</span><br />
                    Cristiano Ronaldo El Speed
                </p>
                <p>
                    <span class="text-lg font-bold">Jenis Kendaraan</span><br />
                    Mobil
                </p>
                <p>
                    <span class="text-lg font-bold">Plat kendaraan</span><br />
                    BP 1234 FG
                </p>
            </div>
        </div>

    </div>
    <div class="max-w-4xl mx-auto mt-4 flex justify-between">
        <button data-modal-target="image-modal" data-modal-toggle="image-modal"
            class="ml-1 flex items-center px-6 py-2 text-gray-100 transition duration-300 bg-sky-500 rounded-lg shadow-md hover:bg-sky-400">
            <i class="mr-2 fas fa-eye"></i>
            Lihat Kendaraan
        </button>

        <button
            class="mr-1 flex items-center px-6 py-2 text-gray-100 transition duration-300 bg-sky-500 rounded-lg shadow-md hover:bg-sky-400">
            <i class="mr-2 fas fa-file-pdf"></i>
            PDF
        </button>
    </div>
</div>

<!-- modal foto kendaraan -->
<div id="image-modal" tabindex="-1" aria-hidden="true"
    class="hidden fixed inset-0 z-50 w-full h-full overflow-y-auto overflow-x-hidden flex items-center justify-center bg-black/70">
    <div class="relative w-full max-w-xl mx-4 md:mx-auto">
        <!-- tombol tutup -->
        <button type="button"
            class="absolute -top-10 right-0 z-50 text-white hover:text-gray-300 transition-colors duration-300"
            data-modal-hide="image-modal">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                </path>
            </svg>
            <span class="sr-only">Close modal</span>
        </button>

        <!-- container foto -->
        <div class="bg-white rounded-xl shadow-2xl overflow-hidden">
            <img src="{{ asset('img/kendaraan.jpg') }}" alt="Vehicle Image"
                class="w-full h-auto object-cover transition-transform duration-300 hover:scale-105">
        </div>
    </div>
</div>

<!-- Main Modal Tambah zona -->
<div id="tambah-kendaraan" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Tambah Kendaraan
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
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
                <div class="grid gap-4 mb-4 grid-cols-2">
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
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
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
