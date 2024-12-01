@extends('layout/mainAdmin')

@section('main')
<div class="flex flex-col p-6 space-y-4 -ml-5 -mt-7">
    <!-- dropdown pilih zona -->
    <div class="dropdown ml-9">
        <div tabindex="0" role="button" class="m-1 btn hover:bg-[#95AFE5] font-bold">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
            </svg>
            {{ $selectedZona ? $selectedZona->nama_zona : 'Pilih Zona' }}
        </div>
        <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
            @foreach($zonas as $zona)
                <li>
                    <a href="{{ route('admin-slot', ['zona' => $zona->id]) }}"
                        class="hover:bg-[#95AFE5] {{ $selectedZona && $selectedZona->id == $zona->id ? 'bg-[#95AFE5]' : '' }}">
                        {{ $zona->nama_zona }}
                    </a>
                </li>
            @endforeach
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

    <!-- dropdown pilih subzona -->
    <!-- Periksa URL yang dihasilkan -->
    <!-- {{ route('slot.getBySubzona', ['subzonaId' => 'SUBZONA_ID']) }} -->

    <div class="ml-9 mt-2">
        <select
            onchange="window.location.href='{{ route('slot.getBySubzona', ['subzonaId' => '__SUBZONA_ID__']) }}'.replace('__SUBZONA_ID__', this.value);"
            class="select select-bordered w-full max-w-xs">
            @foreach($subzonas as $subzona)
                <option value="{{ $subzona->id }}"
                    {{ $selectedSubzona && $selectedSubzona->id == $subzona->id ? 'selected' : '' }}>
                    {{ $subzona->nama_subzona }}
                </option>
            @endforeach
        </select>
    </div>



    <!-- tabel slot -->
    <div class="grid grid-cols-2 gap-8 px-11 pt-3">
        <div class="w-full">
            <div class="pb-2 font-bold text-xl">
                <!-- <p>{{ $selectedSubzona ? $selectedSubzona->nama_subzona : '(Nama Subzona)' }} -->
                </p>
            </div>

            <table
                class="w-full text-sm font-medium text-left rtl:text-right text-gray-500 dark:text-gray-400 shadow-md shadow-blue-300 rounded-lg">
                <thead class="bg-[#95AFE5] text-xs text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-3 py-3 text-sm font-bold rounded-tl-lg">No. Slot</th>
                        <th scope="col" class="px-9 py-3 text-sm font-bold">Keterangan</th>
                        <th scope="col" class="px-1 py-3 text-sm font-bold rounded-tr-lg">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($slots as $slot)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-3 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white rounded-bl-lg">
                                {{ $slot->nomor_slot }}
                            </th>
                            <td class="px-9 py-2">
                                {{ $slot->keterangan }}
                            </td>
                            <td class="px-1 py-2 rounded-br-lg">
                                <button data-modal-target="edit-slot-{{ $slot->id }}"
                                    data-modal-toggle="edit-slot-{{ $slot->id }}"
                                    class="py-1 text-sm text-blue-500 hover:underline inline-flex items-center justify-center">
                                    <i class="w-3 h-3 me-2 text-blue-500 fas fa-pen"></i>Edit
                                </button>
                                <button data-modal-target="hapus-slot-{{ $slot->id }}"
                                    data-modal-toggle="hapus-slot-{{ $slot->id }}"
                                    class="px-2 py-1 text-sm text-red-400 hover:underline inline-flex items-center justify-center">
                                    <i class="w-3 h-3 me-2 text-red-400 fas fa-trash"></i>Hapus
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-4">Tidak ada slot</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Tambah Slot -->
    <div id="tambah-slot" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal Header -->
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
                        <span class="sr-only">Tutup modal</span>
                    </button>
                </div>

                <!-- Modal Body -->
                <form action="{{ route('slot.store') }}" method="POST" class="p-4 md:p-5">
                    @csrf

                    <!-- Display any validation errors -->
                    @if($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                            role="alert">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <!-- Sub-Zona Dropdown -->
                        <div class="col-span-2">
                            <label for="subzona_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Sub-Zona <span class="text-red-500">*</span>
                            </label>
                            <select name="subzona_id" id="subzona_id" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white
                            {{ $errors->has('subzona_id') ? 'border-red-500' : '' }}">
                                <option value="" selected disabled>Pilih Sub-Zona</option>
                                @foreach($subzonas as $subzona)
                                    <option value="{{ $subzona->id }}"
                                        {{ old('subzona_id') == $subzona->id ? 'selected' : '' }}>
                                        {{ $subzona->nama_subzona }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Nomor Slot Input -->
                        <div class="col-span-2">
                            <label for="nomor_slot"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Nomor Slot <span class="text-red-500">*</span>
                            </label>
                            <input type="number" name="nomor_slot" id="nomor_slot"
                                value="{{ old('nomor_slot') }}" min="1"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white
                            {{ $errors->has('nomor_slot') ? 'border-red-500' : '' }}"
                                placeholder="Masukkan Nomor Slot" required>
                        </div>

                        <!-- Keterangan Dropdown -->
                        <div class="col-span-2">
                            <label for="keterangan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Keterangan <span class="text-red-500">*</span>
                            </label>
                            <select name="keterangan" id="keterangan" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white
                            {{ $errors->has('keterangan') ? 'border-red-500' : '' }}">
                                <option value="" selected disabled>Pilih Keterangan</option>
                                <option value="Tersedia"
                                    {{ old('keterangan') == 'Tersedia' ? 'selected' : '' }}>
                                    Tersedia</option>
                                <option value="Terisi"
                                    {{ old('keterangan') == 'Terisi' ? 'selected' : '' }}>
                                    Terisi</option>
                                <option value="Perbaikan"
                                    {{ old('keterangan') == 'Perbaikan' ? 'selected' : '' }}>
                                    Perbaikan</option>
                            </select>
                        </div>
                    </div>

                    <!-- Submit Button -->
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


    <!-- Modal Edit Slot -->
    @foreach($slots as $slot)
        <div id="edit-slot-{{ $slot->id }}" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="flex items-center justify-between bg-[#95AFE5] p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-white dark:text-white">
                            Edit Slot
                        </h3>
                        <button type="button"
                            class="text-white bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="edit-slot-{{ $slot->id }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <form action="{{ route('slot.update', $slot->id) }}" method="POST"
                        class="p-4 md:p-5">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="subzona_id" value="{{ $selectedSubzona->id }}">
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="nama_subzona"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                    Subzona</label>
                                <input type="text" name="nama_subzona" id="nama_subzona"
                                    value="{{ $slot->subzona->nama_subzona }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    disabled>
                            </div>
                            <div class="col-span-2">
                                <label for="nomor_slot"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                                    Slot</label>
                                <input type="text" name="nomor_slot" id="nomor_slot" value="{{ $slot->nomor_slot }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    disabled>
                            </div>
                            <div class="col-span-2">
                                <label for="keterangan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Keterangan <span class="text-red-500">*</span>
                                </label>
                                <select name="keterangan" id="keterangan" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                    <option value="Perbaikan"
                                        {{ $slot->keterangan == 'Perbaikan' ? 'selected' : '' }}>
                                        Perbaikan</option>
                                    <option value="Tersedia"
                                        {{ $slot->keterangan == 'Tersedia' ? 'selected' : '' }}>
                                        Tersedia</option>
                                    <option value="Terisi"
                                        {{ $slot->keterangan == 'Terisi' ? 'selected' : '' }}>
                                        Terisi</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit"
                            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Update Slot
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal Hapus Slot -->
    @foreach($slots as $slot)
        <div id="hapus-slot-{{ $slot->id }}" tabindex="-1"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="p-4 text-center">
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                            Apakah Anda yakin ingin menghapus slot ini?
                        </h3>
                        <form action="{{ route('slot.destroy', $slot->id) }}" method="POST"
                            class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                Ya, Hapus
                            </button>
                        </form>
                        <button data-modal-hide="hapus-slot-{{ $slot->id }}" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                            Batal
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
