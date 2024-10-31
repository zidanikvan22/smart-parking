@extends('layout/mainAdmin')

@section('main')
    <div class="flex flex-col p-6 space-y-4">
        {{-- Tombol Tambah --}}
        <div>
            <button class="rounded-full bg-base-200 hover:bg-[#95AFE5] p-2 px-2">
                <div class="flex items-center space-x-0">
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </i>
                    <p class="text-md">Tambah Zona</p>
                </div>
            </button>
        </div>


        {{-- Dropdown untuk Memilih Zona --}}
        <div class="dropdown">
            <div tabindex="0" role="button" class="m-1 btn">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                  </svg>
                Pilih Zona</div>
            <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
              <li><a>Zona 1</a></li>
              <li><a>Zona 2</a></li>
              <li><a>Zona 3</a></li>
            </ul>
          </div>

        <div class="grid grid-cols-1 p-5 mx-6">
            <div class="pb-2 font-bold md:text-2xl">
                <p>Zona 1</p>
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
                    <tr>
                        <td class="p-3 text-sm border border-black">1</td>
                        <td class="p-3 text-sm border border-black">Slot parkir telah tersedia</td>
                        <td class="p-3 text-sm border border-black">
                            <button class="px-5 py-1 text-xs bg-red-400 rounded-lg hover:bg-blue-200">Edit</button>
                            <button class="px-3 py-1 text-xs bg-red-400 rounded-lg hover:bg-blue-200">Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
