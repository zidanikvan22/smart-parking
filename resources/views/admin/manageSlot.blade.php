@extends('layout/mainAdmin')

@section('main')
    <div class="flex flex-col p-6 -mt-8 -ml-10 space-y-4">
        {{-- Dropdown untuk Memilih Zona --}}
        <form class="justify-start w-32 ml-10">
            <select id="zonaSelect" onchange="filterZonaTable(this.value)"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected disabled>Pilih Slot</option>
                @foreach ($zonas as $zona)
                <option value="{{ $zona->zona_parkir }}">
                    {{ $zona->zona_parkir }}
                </option>
                @endforeach
            </select>
        </form>

        {{-- Tombol Tambah --}}
        <div class="ml-10">
            <button data-modal-target="tambah-modal" data-modal-toggle="tambah-modal"
                class="rounded-full bg-base-200 hover:bg-[#95AFE5] p-2 px-2">
                <div class="flex items-center space-x-0">
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </i>
                    <p class="text-md">Tambah Slot</p>
                </div>
            </button>
        </div>

        {{-- Zona Tables --}}
        @foreach ($zonaWithSlots as $zona)
        <div id="zona-{{ $zona->zona_parkir }}" class="grid grid-cols-1 p-5 mx-6 zona-table" style="display: none;">
            <div class="pb-2 font-bold md:text-2xl">
                <p>{{ $zona->zona_parkir }}</p>
            </div>
            <table class="justify-center font-medium border border-black table-auto">
                <thead class="bg-[#95AFE5]">
                    <tr>
                        <th class="p-3 text-sm font-bold border border-black">No</th>
                        <th class="p-3 text-sm font-bold border border-black w-[35em]">Keterangan</th>
                        <th class="p-3 text-sm font-bold border border-black w-[20em]">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse ($zona->slots as $slot)
                    <tr>
                        <td class="p-3 text-sm border border-black">{{ $slot->id_slot }}</td>
                        <td class="p-3 text-sm border border-black">{{ $slot->status_slot }}</td>
                        <td class="p-3 text-sm border border-black">
                            <button data-modal-target="edit-modal" data-modal-toggle="edit-modal"
                                class="px-5 py-1 text-xs bg-red-400 rounded-lg hover:bg-blue-200">Edit</button>
                            <button data-modal-target="hapus-modal" data-modal-toggle="hapus-modal"
                                class="px-3 py-1 text-xs bg-red-400 rounded-lg hover:bg-blue-200">Hapus</button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="p-3 text-sm border border-black">Tidak ada slot di zona ini</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @endforeach

        {{-- Modal Tambah Slot --}}
        <div id="tambah-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full p-4">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Tambah Slot Baru
                        </h3>
                        <button type="button"
                            class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="tambah-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form class="p-4 md:p-5" action="{{ route('slot.store') }}" method="POST">
                        @csrf
                        <input type="hidden" id="zona_parkir" name="zona_parkir">
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div class="col-span-2">
                                <label for="jumlah_slot" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Slot</label>
                                <input type="number" name="jumlah_slot" id="jumlah_slot"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    required="">
                            </div>
                            <div class="col-span-2">
                                <label for="status_slot" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                                <select id="status_slot" name="status_slot"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option selected disabled>Pilih</option>
                                    <option value="Tersedia">Tersedia</option>
                                    <option value="Terisi">Terisi</option>
                                    <option value="Tidak Bisa Digunakan">Tidak Bisa Digunakan</option>
                                </select>
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
                            Tambah Slot
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Zona Tables --}}
        @foreach ($zonaWithSlots as $zona)
        <div id="zona-{{ $zona->zona_parkir }}" class="grid grid-cols-1 p-5 mx-6 zona-table" style="display: none;">
            <div class="pb-2 font-bold md:text-2xl">
                <p>{{ $zona->zona_parkir }}</p>
            </div>
            <table class="font-medium border border-black table-fixed">
                <thead class="bg-[#95AFE5]">
                    <tr>
                        <th class="p-3 text-sm font-bold border border-black">No Slot</th>
                        <th class="p-3 text-sm font-bold border border-black w-[35em]">Keterangan</th>
                        <th class="p-3 text-sm font-bold border border-black">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse ($zona->slots as $slot)
                    <tr>
                        <td class="p-3 text-sm border border-black">{{ $slot->id_slot }}</td>
                        <td class="p-3 text-sm border border-black">{{ $slot->status_slot }}</td>
                        <td class="p-3 text-sm border border-black">
                            <button data-modal-target="edit-modal" data-modal-toggle="edit-modal"
                                class="px-5 py-1 text-xs bg-red-400 rounded-lg hover:bg-blue-200">Edit</button>
                            <button data-modal-target="hapus-modal" data-modal-toggle="hapus-modal"
                                class="px-3 py-1 text-xs bg-red-400 rounded-lg hover:bg-blue-200">Hapus</button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="p-3 text-sm border border-black">Tidak ada slot di zona ini</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @endforeach

        <!-- Main Modal Edit slot -->
        <div id="edit-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full p-4">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Edit Slot
                        </h3>
                        <button type="button"
                            class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="edit-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form class="p-4 md:p-5">
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div class="col-span-2">
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. Slot</label>
                                <input type="number" name="" id=""
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="" required="">
                            </div>
                            <div class="col-span-2 ">
                                <label for="keterangan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                                <select id="keterangan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:boKder-primary-500">
                                    <option selected="">Pilih </option>
                                    <option value="TV">Tersedia</option>
                                    <option value="PC">Terisi</option>
                                    <option value="GA">Tidak Bisa Digunakan</option>
                                </select>
                            </div>

                        </div>

                        <button type="submit"
                            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <!-- <svg class="w-5 h-5 me-1 -ms-1" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                            </svg> -->
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
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
                        <h3 class="mb-5 text-lg font-bold text-gray-500 dark:text-gray-400">Apakah anda ingin menghapus
                            Slot ini?</h3>
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
