@extends('layout/mainAdmin')

@section('main')
    <div class="">
        <form class="ml-12 max-w-96 ">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white ">Search</label>
            <div class="relative ">
                <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3 ">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="default-search" value="{{ request('search') }}" name="search"
                    class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg ps-10 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search Nama pengguna, No.Identitas..." required />
                <button type="submit"
                    class=" absolute end-2.5 bottom-2.5 bg-[#95AFE5] hover:bg-blue-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </form>
    </div>
    </div>

    <div class="grid grid-cols-1 px-12 pt-5 mx-12 ps-0 ">
        @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-800 bg-green-400 rounded-lg dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <span class="font-medium">Success!</span> {{ session('success') }}
        </div>
    @endif
        <div class="mb-4 text-xl font-bold ">
            <span>Persetujuan Akun Baru Pengguna</span>
        </div>

        <table class="font-medium table-fixed ">
            <thead class="bg-[#95AFE5]">
                <tr>
                    <th class="px-1 py-2 text-sm rounded-tl-lg">No</th>
                    <th class="px-1 py-2 text-sm ">Nama Lengkap</th>
                    <th class="px-1 py-2 text-sm ">NIK/NIDN/NIM/NIP</th>
                    <th class="px-1 py-2 text-sm rounded-tr-lg ">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center ">
                @foreach ($approvals as $approval)
                    <tr class="text-center bg-slate-50 hover:bg-slate-100">
                        <td class="px-1 py-2 text-sm">
                            {{ ($approvals->currentPage() - 1) * $approvals->perPage() + $loop->iteration }}
                        </td>
                        <td class="px-1 py-2 text-sm">{{ $approval->nama }}</td>
                        <td class="px-1 py-2 text-sm">{{ $approval->identitas }}</td>
                        <td class="px-1 py-2 text-sm">
                            <button data-modal-target="detail-akunbaru{{ $approval->id_pengguna }}"
                                data-modal-toggle="detail-akunbaru{{ $approval->id_pengguna }}"
                                class="inline-flex items-center justify-center px-2 py-1 text-sm text-blue-500 hover:underline">
                                <i class="w-3 h-3 text-blue-500 me-2 fas fa-eye"></i>
                                Detail
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $approvals->links('pagination::tailwind') }}
    </div>

    <!-- modal lihat detail akun baru pengguna -->
    @foreach ($approvals as $approval)
        <div id="detail-akunbaru{{ $approval->id_pengguna }}" tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full mx-4">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div
                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 bg-[#95AFE5]">
                        <h3 class="text-xl font-medium text-white dark:text-white">
                            Persetujuan Akun Baru Pengguna
                        </h3>
                        <button type="submit"
                            class="inline-flex items-center justify-center w-8 h-8 text-sm text-white bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="detail-akunbaru{{ $approval->id_pengguna }}">
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
                        <div class="flex flex-col mb-24 space-y-2">
                            <div class="flex justify-center">
                                <img src="{{ asset('storage/' . $approval->foto_pengguna) }}" alt="User Profile"
                                    class="object-cover w-48 h-56 rounded-md shadow-md">
                            </div>
                            <div class="flex flex-col space-y-2">
                                <button type="submit" data-modal-target="lihat-kendaraan1{{ $approval->id_pengguna }}"
                                    data-modal-toggle="lihat-kendaraan1{{ $approval->id_pengguna }}"
                                    class="w-full bg-white hover:underline text-gray-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center justify-center">
                                    <i class="w-4 h-4 mt-1 text-gray-700 me-2 fas fa-car "></i>
                                    Lihat Kendaraan
                                </button>
                            </div>
                        </div>


                        <!-- User Information -->
                        <div class="flex-1 space-y-4 ">
                            <div class="grid grid-cols-1 gap-3 ml-5">
                                <div class="flex items-center space-x-2">
                                    <div class="flex items-center justify-center w-8 h-8 rounded-lg bg-blue-50">
                                        <i class="w-4 h-4 text-gray-700 fas fa-id-badge"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">NIM/NIK/NIDN/NIP</p>
                                        <p class="font-medium text-gray-800">{{ $approval->identitas }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <div class="flex items-center justify-center w-8 h-8 rounded-lg bg-blue-50">
                                        <i class="w-4 h-4 text-gray-700 fas fa-list"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Jenis Pengguna</p>
                                        <p class="font-medium text-gray-800">{{ $approval->jenis_pengguna }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <div class="flex items-center justify-center w-8 h-8 rounded-lg bg-blue-50">
                                        <i class="w-4 h-4 text-gray-700 fas fa-envelope"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Email</p>
                                        <p class="font-medium text-gray-800">{{ $approval->email }}</p>
                                    </div>
                                </div>

                                <div class="flex items-center space-x-2">
                                    <div class="flex items-center justify-center w-8 h-8 rounded-lg bg-blue-50">
                                        <i class="w-4 h-4 text-gray-700 fas fa-user"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Nama Lengkap</p>
                                        <p class="font-medium text-gray-800">{{ $approval->nama }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <div class="flex items-center justify-center w-8 h-8 rounded-lg bg-blue-50">
                                        <i class="w-4 h-4 text-gray-700 fas fa-phone"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Nomor Telepon</p>
                                        <p class="font-medium text-gray-800">{{ $approval->nomor_telepon }}</p>
                                    </div>
                                </div>

                                <div class="flex items-center space-x-2">
                                    <div class="flex items-center justify-center w-8 h-8 rounded-lg bg-blue-50">
                                        <i class="w-4 h-4 text-gray-700 fas fa-car"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Jenis Kendaraan </p>
                                        <p class="font-medium text-gray-800">{{ $approval->jenis_kendaraan }}</p>
                                    </div>
                                </div>

                                <div class="flex items-center space-x-2">
                                    <div class="flex items-center justify-center w-8 h-8 rounded-lg bg-blue-50">
                                        <i class="w-4 h-4 text-gray-700 fas fa-id-card"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Plat Kendaraan </p>
                                        <p class="font-medium text-gray-800">{{ $approval->no_plat }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 border-t border-gray-200 rounded-b md:p-5 dark:border-gray-600">
                        <form action="{{ route('update.userStatus', $approval->id_pengguna) }}" method="POST"
                            class="inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" value="aktif" name="status"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Setuju
                            </button>
                            <button type="submit" value="ditolak" name="status"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-white focus:outline-none bg-red-500 rounded-lg border border-gray-200 hover:bg-red-700 hover:text-red-200 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Tolak</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal foto kendaraan -->
        <div id="lihat-kendaraan1{{ $approval->id_pengguna }}" tabindex="-1" aria-hidden="true"
            class="fixed inset-0 z-50 flex items-center justify-center hidden w-full h-full overflow-x-hidden overflow-y-auto bg-black/70">
            <div class="relative w-full max-w-xl mx-4 md:mx-auto">
                <!-- tombol tutup -->
                <button type="button"
                    class="absolute right-0 z-50 text-white transition-colors duration-300 -top-10 hover:text-gray-300"
                    data-modal-hide="lihat-kendaraan1{{ $approval->id_pengguna }}">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>

                <!-- container foto -->
                <div class="overflow-hidden bg-white shadow-2xl rounded-xl">
                    <img src="{{ asset('storage/' . $approval->foto_kendaraan) }}" alt="Vehicle Image"
                        class="object-cover w-full h-auto transition-transform duration-300 hover:scale-105">
                </div>
            </div>
        </div>
    @endforeach

    <div class="grid grid-cols-1 px-12 pt-5 mx-12 ps-0 ">
        <div class="mb-4 text-xl font-bold ">
            <span>Persetujuan Tambah Kendaraan</span>
        </div>
        <table class="font-medium table-fixed ">
            <thead class="bg-[#95AFE5]">
                <tr>
                    <th class="px-1 py-2 text-sm rounded-tl-lg">No</th>
                    <th class="px-1 py-2 text-sm ">Nama Lengkap</th>
                    <th class="px-1 py-2 text-sm ">NIK/NIDN/NIM/NIP</th>
                    <th class="px-1 py-2 text-sm rounded-tr-lg ">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center ">
                <tr class="bg-slate-50 hover:bg-slate-100">
                    <td class="px-1 py-2 text-sm ">1</td>
                    <td class="px-1 py-2 text-sm ">Lorem Epsum Sikocak Siolhok ggdsgds </td>
                    <td class="px-1 py-2 text-sm ">553253553</td>
                    <td class="px-1 py-2 text-sm ">
                        <button data-modal-target="detail-tambahkendaraan" data-modal-toggle="detail-tambahkendaraan"
                            class="inline-flex items-center justify-center px-2 py-1 text-sm text-blue-500 hover:underline">
                            <i class="w-3 h-3 text-blue-500 me-2 fas fa-eye "></i>
                            Detail</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>


    <!-- modal persetujuan tambah kendaraan -->
    <div id="detail-tambahkendaraan" tabindex="-1"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full mx-4">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div
                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 bg-[#95AFE5]">
                    <h3 class="text-xl font-medium text-white dark:text-white">
                        Persetujuan Tambah Kendaraan
                    </h3>
                    <button type="button"
                        class="inline-flex items-center justify-center w-8 h-8 text-sm text-white bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="detail-tambahkendaraan">
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
                    <div class="flex flex-col mb-24 space-y-2">
                        <div class="flex justify-center">
                            <img src="{{ asset('img/user.jpg') }}" alt="User Profile"
                                class="object-cover w-48 h-56 rounded-md shadow-md">
                        </div>
                        <div class="flex flex-col space-y-2">
                            <button type="button" data-modal-target="lihat-kendaraan1"
                                data-modal-toggle="lihat-kendaraan1"
                                class="w-full bg-white hover:underline text-gray-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center justify-center">
                                <i class="w-4 h-4 mt-1 text-gray-700 me-2 fas fa-car "></i>
                                Lihat Kendaraan (Baru)
                            </button>
                        </div>
                    </div>


                    <!-- User Information -->
                    <div class="flex-1 space-y-4 ">
                        <div class="grid grid-cols-1 gap-3 ml-5">
                            <div class="flex items-center space-x-2">
                                <div class="flex items-center justify-center w-8 h-8 rounded-lg bg-blue-50">
                                    <i class="w-4 h-4 text-gray-700 fas fa-id-badge"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">NIM/NIK/NIDN/NIP</p>
                                    <p class="font-medium text-gray-800">3312332331</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <div class="flex items-center justify-center w-8 h-8 rounded-lg bg-blue-50">
                                    <i class="w-4 h-4 text-gray-700 fas fa-list"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Jenis Pengguna</p>
                                    <p class="font-medium text-gray-800">Mahasiswa</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <div class="flex items-center justify-center w-8 h-8 rounded-lg bg-blue-50">
                                    <i class="w-4 h-4 text-gray-700 fas fa-envelope"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Email</p>
                                    <p class="font-medium text-gray-800">cristiano@gmail.com</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-2">
                                <div class="flex items-center justify-center w-8 h-8 rounded-lg bg-blue-50">
                                    <i class="w-4 h-4 text-gray-700 fas fa-user"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Nama Lengkap</p>
                                    <p class="font-medium text-gray-800">Cristiano Ronaldo El Speed</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <div class="flex items-center justify-center w-8 h-8 rounded-lg bg-blue-50">
                                    <i class="w-4 h-4 text-gray-700 fas fa-phone"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Nomor Telepon</p>
                                    <p class="font-medium text-gray-800">098765432145</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-2">
                                <div class="flex items-center justify-center w-8 h-8 rounded-lg bg-blue-50">
                                    <i class="w-4 h-4 text-gray-700 fas fa-car"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Jenis Kendaraan (Baru) </p>
                                    <p class="font-medium text-gray-800">Mobil</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-2">
                                <div class="flex items-center justify-center w-8 h-8 rounded-lg bg-blue-50">
                                    <i class="w-4 h-4 text-gray-700 fas fa-id-card"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Plat Kendaraan (Baru) </p>
                                    <p class="font-medium text-gray-800">BP 0743 KU</p>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 border-t border-gray-200 rounded-b md:p-5 dark:border-gray-600">
                    <button data-modal-hide="small-modal" type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Setuju
                    </button>
                    <button data-modal-hide="small-modal" type="button"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-white focus:outline-none bg-red-500 rounded-lg border border-gray-200 hover:bg-red-700 hover:text-red-200 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Tolak</button>
                </div>
            </div>
        </div>
    </div>

    <!-- modal foto kendaraan -->
    <div id="lihat-kendaraan2" tabindex="-1" aria-hidden="true"
        class="fixed inset-0 z-50 flex items-center justify-center hidden w-full h-full overflow-x-hidden overflow-y-auto bg-black/70">
        <div class="relative w-full max-w-xl mx-4 md:mx-auto">
            <!-- tombol tutup -->
            <button type="button"
                class="absolute right-0 z-50 text-white transition-colors duration-300 -top-10 hover:text-gray-300"
                data-modal-hide="lihat-kendaraan2">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>

            <!-- container foto -->
            <div class="overflow-hidden bg-white shadow-2xl rounded-xl">
                <img src="{{ asset('img/kendaraan.jpg') }}" alt="Vehicle Image"
                    class="object-cover w-full h-auto transition-transform duration-300 hover:scale-105">
            </div>
        </div>

        <script>
            setTimeout(() => {
                const alert = document.querySelector('[role="alert"]');
                if (alert) {
                    alert.style.transition = 'opacity 0.5s ease';
                    alert.style.opacity = '0';
                    setTimeout(() => alert.remove(), 500);
                }
            }, 5000);
        </script>
    @endsection
