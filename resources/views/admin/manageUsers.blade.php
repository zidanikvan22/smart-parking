@extends('layout/mainAdmin')

@section('main')
<!-- <div class="pl-5 mb-4 text-2xl font-bold md:text-3xl xl:text-2xl">
        <span>Data Pengguna</span>
    </div> -->

<div class="">
    <form class="ml-11 max-w-96" id="searchForm">
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
            <input type="search" id="searchInput" value="{{ request('search') }}" name="search"
                class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg ps-10 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Search Nama pengguna, Plat nomor..." required />
            <button type="submit"
                class="absolute end-2.5 bottom-2.5 bg-[#95AFE5] hover:bg-blue-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
    </form>
</div>


<div class="grid grid-cols-1 p-5 mx-6 ">
    <table class="font-medium table-fixed ">
        <thead class="bg-[#95AFE5]">
            <tr>
                <th class="py-2 px-1 text-sm rounded-tl-lg">No</th>
                <th class="py-2 px-1 text-sm ">Nama Lengkap</th>
                <th class="py-2 px-1 text-sm ">No Plat Kendaraan</th>
                <th class="py-2 px-1 text-sm rounded-tr-lg ">Aksi</th>
            </tr>
        </thead>

        <tbody class="text-center" id="userTableBody">
            @foreach($penggunas as $pengguna)
                <tr class="bg-slate-50 hover:bg-slate-100">
                    <td class="py-2 px-1 text-sm">
                        {{ ($penggunas->currentPage() - 1) * $penggunas->perPage() + $loop->iteration }}
                    </td>
                    <td class="py-2 px-1 text-sm">{{ $pengguna->nama }}</td>

                    <td class="py-2 px-1 text-sm">{{ $pengguna->no_plat }}</td>
                    <td class="py-2 px-1 text-sm">
                        <button data-modal-target="small-modal{{ $pengguna->id_pengguna }}"
                            data-modal-toggle="small-modal{{ $pengguna->id_pengguna }}"
                            class="px-2 py-1 text-sm text-blue-500 hover:underline inline-flex items-center justify-center">
                            <i class="w-3 h-3 me-2 text-blue-500 fas fa-eye"></i>Detail</button>
                        <button data-modal-target="hapus-modal{{ $pengguna->id_pengguna }}"
                            data-modal-toggle="hapus-modal{{ $pengguna->id_pengguna }}"
                            class="px-2 py-1 text-sm text-red-400 hover:underline inline-flex items-center justify-center">
                            <i class="w-3 h-3 me-2 text-red-400 fas fa-trash"></i>Hapus</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-4">
    {{ $penggunas->links('pagination::tailwind') }}
</div>

@foreach($penggunas as $pengguna)
    <!-- Main Modal hapus slot -->
    <div id="hapus-modal{{ $pengguna->id_pengguna }}" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full p-4">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button
                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="hapus-modal{{ $pengguna->id_pengguna }}">
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
                        pengguna {{ $pengguna->nama }}</h3>
                    <form action="{{ route('users.delete', $pengguna->id_pengguna) }}"
                        method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Iya
                        </button>
                    </form>
                    <button data-modal-hide="hapus-modal{{ $pengguna->id_pengguna }}" type="button"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                        Tidak
                    </button>
                </div>

            </div>
        </div>
    </div>

    <!-- Small Modal -->
    <div id="small-modal{{ $pengguna->id_pengguna }}" tabindex="-1"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full mx-4">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div
                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 bg-[#95AFE5]">
                    <h3 class="text-xl font-medium text-white dark:text-white">
                        Data Diri & Kendaraan Pengguna
                    </h3>
                    <button type="button"
                        class="text-white bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="small-modal{{ $pengguna->id_pengguna }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 flex space-x-4 items-center">
                    <!-- Profile Image -->
                    <div class="flex flex-col space-y-2 mb-24">
                        <div class="flex justify-center">
                            <img src="{{ asset('storage/' . $pengguna->foto_pengguna) }}" alt="User Profile"
                                class="w-48 h-56 rounded-md object-cover shadow-md">
                        </div>
                        <div class="flex flex-col space-y-2">
                            <button type="button" data-modal-target="lihat-kendaraan1-{{ $pengguna->id_pengguna }}"
                                data-modal-toggle="lihat-kendaraan1-{{ $pengguna->id_pengguna }}"
                                class="w-full bg-white hover:underline text-gray-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center justify-center">
                                <i class="w-4 h-4 me-2 mt-1 fas fa-car "></i>
                                Lihat Kendaraan 1
                            </button>
                            <!-- <button type="button" data-modal-target="lihat-kendaraan2"
                                data-modal-toggle="lihat-kendaraan2"
                                class="w-full bg-white hover:underline text-gray-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center justify-center">
                                <i class="w-4 h-4 me-2 mt-1 fas fa-car "></i>
                                Lihat Kendaraan 2
                            </button> -->
                        </div>
                    </div>


                    <!-- User Information -->
                    <div class="flex-1 space-y-4 ">
                        <div class="grid grid-cols-1 gap-3 ml-5">
                            <div class="flex items-center space-x-2">
                                <div class="w-8 h-8 bg-blue-50 rounded-lg flex items-center justify-center">
                                    <i class="w-4 h-4 text-gray-700 fas fa-id-card"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">NIM/NIK/NIDN/NIP</p>
                                    <p class="font-medium text-gray-800">{{ $pengguna->identitas }}</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <div class="w-8 h-8 bg-blue-50 rounded-lg flex items-center justify-center">
                                    <i class="w-4 h-4 text-gray-700 fas fa-list"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Jenis Pengguna</p>
                                    <p class="font-medium text-gray-800">{{ $pengguna->jenis_pengguna }}</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <div class="w-8 h-8 bg-blue-50 rounded-lg flex items-center justify-center">
                                    <i class="w-4 h-4 text-gray-700 fas fa-envelope"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Email</p>
                                    <p class="font-medium text-gray-800">{{ $pengguna->email }}</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-2">
                                <div class="w-8 h-8 bg-blue-50 rounded-lg flex items-center justify-center">
                                    <i class="w-4 h-4 text-gray-700 fas fa-user"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Nama Lengkap</p>
                                    <p class="font-medium text-gray-800">{{ $pengguna->nama }}</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <div class="w-8 h-8 bg-blue-50 rounded-lg flex items-center justify-center">
                                    <i class="w-4 h-4 text-gray-700 fas fa-phone"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Nomor Telepon</p>
                                    <p class="font-medium text-gray-800">{{ $pengguna->nomor_telepon }}</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-2">
                                <div class="w-8 h-8 bg-blue-50 rounded-lg flex items-center justify-center">
                                    <i class="w-4 h-4 text-gray-700 fas fa-car"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Jenis Kendaraan </p>
                                    <p class="font-medium text-gray-800">{{ $pengguna->jenis_kendaraan }}</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-2">
                                <div class="w-8 h-8 bg-blue-50 rounded-lg flex items-center justify-center">
                                    <i class="w-4 h-4 text-gray-700 fas fa-id-card"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Plat Kendaraan </p>
                                    <p class="font-medium text-gray-800">{{ $pengguna->no_plat }}</p>
                                </div>
                            </div>
                            <!-- <div class="flex items-center space-x-2">
                                <div class="w-8 h-8 bg-blue-50 rounded-lg flex items-center justify-center">
                                    <i class="w-4 h-4 text-gray-700 fas fa-car"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Jenis Kendaraan 2</p>
                                    <p class="font-medium text-gray-800">Motor</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-2">
                                <div class="w-8 h-8 bg-blue-50 rounded-lg flex items-center justify-center">
                                    <i class="w-4 h-4 text-gray-700 fas fa-id-card"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Plat Kendaraan 2</p>
                                    <p class="font-medium text-gray-800">BP 0770 KU</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-2">
                                <div class="w-8 h-8 bg-blue-50 rounded-lg flex items-center justify-center">
                                    <i class="w-4 h-4 text-gray-700 fas fa-users"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Pengguna sejak</p>
                                    <p class="font-medium text-gray-800">{{ date('Y') }}</p>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal foto kendaraan -->
    <div id="lihat-kendaraan1-{{ $pengguna->id_pengguna }}" tabindex="-1" aria-hidden="true"
            class="fixed inset-0 z-50 flex items-center justify-center hidden w-full h-full overflow-x-hidden overflow-y-auto bg-black/70">
            <div class="relative w-full max-w-xl mx-4 md:mx-auto">
                <!-- tombol tutup -->
                <button type="button"
                    class="absolute right-0 z-50 text-white transition-colors duration-300 -top-10 hover:text-gray-300"
                    data-modal-hide="lihat-kendaraan1-{{ $pengguna->id_pengguna }}">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>

                <!-- container foto -->
                <div class="overflow-hidden bg-white shadow-2xl rounded-xl">
                    <img src="{{ asset('storage/' . $pengguna->foto_kendaraan) }}" alt="Vehicle Image"
                        class="object-cover w-full h-auto transition-transform duration-300 hover:scale-105">
                </div>
            </div>
        </div>
@endforeach

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#searchInput').on('keyup', function () {
            var search = $(this).val();

            $.ajax({
                url: "{{ route('search') }}",
                method: 'GET',
                data: {
                    search: search
                },
                success: function (response) {
                    var tableBody = $('tbody#userTableBody');

                    // Filter baris yang ada berdasarkan pencarian
                    tableBody.find('tr').each(function () {
                        var nama = $(this).find('td:nth-child(2)').text()
                            .toLowerCase();
                        var noPlat = $(this).find('td:nth-child(3)').text()
                            .toLowerCase();

                        if (nama.includes(search.toLowerCase()) || noPlat.includes(
                                search.toLowerCase())) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    });
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    });

</script>
@endsection
