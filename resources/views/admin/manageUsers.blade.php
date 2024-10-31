@extends('layout/mainAdmin')

@section('main')

    <div class="pl-5 mb-4 text-2xl font-bold md:text-3xl xl:text-2xl">
        <span>Data Pengguna</span>
    </div>

    <div class="grid grid-cols-1 p-5 mx-6 my-5">
        <table class="font-medium border border-black table-fixed">
            <thead class="bg-[#95AFE5]">
                <tr>
                    <th class="p-3 text-sm border border-black">No</th>
                    <th class="p-3 text-sm border border-black">Nama Lengkap</th>
                    <th class="p-3 text-sm border border-black">Email</th>
                    <th class="p-3 text-sm border border-black">Jenis Kendaraan</th>
                    <th class="p-3 text-sm border border-black">No Plat Kendaraan</th>
                    <th class="p-3 text-sm border border-black">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <tr>
                    <td class="p-3 text-sm border border-black">1</td>
                    <td class="p-3 text-sm border border-black">Contoh Nama</td>
                    <td class="p-3 text-sm border border-black">email@gmail.com</td>
                    <td class="p-3 text-sm border border-black">Mobil</td>
                    <td class="p-3 text-sm border border-black">BPXXXXBM</td>
                    <td class="p-3 text-sm border border-black">
                        <button class="px-2 py-1 text-xs bg-red-400 rounded-lg hover:bg-blue-200">Hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    @endsection
