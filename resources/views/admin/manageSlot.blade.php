@extends('layout/mainAdmin')


@section('main')
<div class="flex flex-col p-6 space-y-4 -ml-5 -mt-7">
    <!-- dropdown pilih zona -->
    <div class="dropdown ml-9 ">
        <div tabindex="0" role="button" class="m-1 btn hover:bg-[#95AFE5] font-bold">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
            </svg>
            Pilih Zona</div>
        <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
            <li><a class="hover:bg-[#95AFE5]">Zona 1</a></li>
        </ul>
    </div>

    <!-- tombol tambah slot -->
    <div class="ml-10">
        <button data-modal-target="tambah-slot" data-modal-toggle="tambah-slot"
            class="rounded-md bg-base-200 hover:bg-[#95AFE5] p-2 px-2">
            <div class="flex items-center space-x-0">
                <i class="fas fa-plus me-2">
                </i>
                <p class="text-md font-bold">Tambah Slot</p>
            </div>
        </button>
    </div>

    <!-- tabel slot -->
    <div class="grid grid-cols-2 gap-8 px-11 pt-3 ">

        <div class="w-full ">
            <div class="pb-2 font-bold text-xl">
                <p>Zona 1.1</p>
            </div>
            <table
                class="w-full text-sm font-medium text-left rtl:text-right text-gray-500 dark:text-gray-400 shadow-md shadow-blue-300 rounded-lg">
                <thead class="bg-[#95AFE5] text-xs text-gray-700  dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-3 py-3 text-sm font-bold rounded-tl-lg">No. Slot</th>
                        <th scope="col" class="px-9 py-3 text-sm font-bold ">Keterangan</th>
                        <th scope="col" class="px-1 py-3 text-sm font-bold rounded-tr-lg">Aksi</th>

                    </tr>
                </thead>
                <tbody class="">
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">

                        <th scope="row"
                            class="px-3 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white rounded-bl-lg">
                            1
                        </th>
                        <td class="px-9 py-2">
                            Perbaikan
                        </td>
                        <td class="px-1 py-2 rounded-br-lg ">
                            <button data-modal-target="edit-slot" data-modal-toggle="edit-slot"
                                class=" py-1 text-sm text-blue-500 hover:underline inline-flex items-center justify-center">
                                <i class="w-3 h-3 me-2 text-blue-500 fas fa-pen "></i>Edit</button>
                            <button data-modal-target="hapus-slot" data-modal-toggle="hapus-slot"
                                class="px-2 py-1 text-sm text-red-400 hover:underline inline-flex items-center justify-center">
                                <i class="w-3 h-3 me-2 text-red-400 fas fa-trash "></i>Hapus</button>
                        </td>
                    </tr>


                </tbody>

            </table>

        </div>
    </div>




</div>

<!-- Main Modal Tambah slot -->
<div id="tambah-slot" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div
                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 bg-[#95AFE5]">
                <h3 class="text-lg font-semibold text-white dark:text-white">
                    Tambah Slot Baru
                </h3>
                <button type="button"
                    class="text-white bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="tambah-slot">
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
                    <div class="col-span-2 ">
                        <label for="category"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Sub-Zona</label>
                        <select id="keterangan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:boKder-primary-500">
                            <option selected="">Pilih Sub-Zona</option>
                            <option value="">Zona 1.1</option>

                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.
                            Slot</label>
                        <input type="number" name="" id=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="" required="">
                    </div>
                    <div class="col-span-2 ">
                        <label for="category"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                        <select id="keterangan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:boKder-primary-500">
                            <option selected="">Pilih</option>
                            <option value="">Tersedia</option>
                            <option value="">Terisi</option>
                            <option value="">Perbaikan</option>
                        </select>
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
                    Tambah Slot
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Main Modal edit slot -->
<div id="edit-slot" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div
                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 bg-[#95AFE5]">
                <h3 class="text-lg font-semibold text-white dark:text-white">
                    Edit Slot
                </h3>
                <button type="button"
                    class="text-white bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="edit-slot">
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
                    <div class="col-span-2 ">
                        <label for="category"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Sub-Zona</label>
                        <select id="keterangan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:boKder-primary-500">
                            <!-- <option selected="">Pilih Sub-Zona</option> -->
                            <option value="">Zona 1.1</option>

                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.
                            Slot</label>
                        <input type="number" name="" id=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="" required="">
                    </div>
                    <div class="col-span-2 ">
                        <label for="category"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                        <select id="keterangan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:boKder-primary-500">
                            <option selected="">Pilih</option>
                            <option value="">Tersedia</option>
                            <option value="">Terisi</option>
                            <option value="">Perbaikan</option>
                        </select>
                    </div>

                </div>

                <button type="submit"
                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</div>


<!-- Main Modal hapus slot -->
<div id="hapus-slot" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="hapus-slot">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
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
@endsection

<script>
    function filterZonaTable(selectedZona) {
        // Hide all zona tables first
        document.querySelectorAll('.zona-table').forEach(table => {
            table.style.display = 'none';
        });

        // Show the selected zona table
        if (selectedZona) {
            const selectedTable = document.getElementById('zona-' + selectedZona);
            if (selectedTable) {
                selectedTable.style.display = 'block';
            }
        }
    }

    // Initial hide all tables when page loads
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.zona-table').forEach(table => {
            table.style.display = 'none';
        });
    });
    </script>
