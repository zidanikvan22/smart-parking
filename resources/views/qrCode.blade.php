@extends('layout.mainUser')

@section('main')
    <div class="container px-4 py-8 mx-auto">
        <nav class="flex items-center justify-between mb-8">
            <div class="flex items-center">
                <i class="mr-2 text-2xl text-white fas fa-arrow-left"></i>
                <span class="text-2xl text-white">Kembali</span>
            </div>
            <button class="flex items-center px-6 py-2 text-blue-500 transition duration-300 bg-white rounded-lg shadow-md hover:bg-blue-100">
                <i class="mr-2 fas fa-file-pdf"></i>
                PDF
            </button>
        </nav>

        <div class="max-w-4xl p-8 mx-auto bg-white rounded-lg shadow-lg">
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                <div class="flex items-center justify-center">
                    <img alt="QR code image" class="w-64 h-64" src="https://storage.googleapis.com/a1aa/image/pdKDUcyVPCYkPVayGUf704CWc4jHDmFgDdl4HZlLTjvS5XzJA.jpg"/>
                </div>
                <div class="space-y-4 text-gray-600">
                    <h2 class="mb-6 text-3xl font-bold text-blue-500">Vehicle Information</h2>
                    <p>
                        <span class="text-lg font-bold">Email</span><br/>
                        cristiano@gmail.com
                    </p>
                    <p>
                        <span class="text-lg font-bold">Nama Pengguna</span><br/>
                        Cristiano Ronaldo El Speed
                    </p>
                    <p>
                        <span class="text-lg font-bold">Jenis Kendaraan</span><br/>
                        Mobil
                    </p>
                    <p>
                        <span class="text-lg font-bold">Plat kendaraan</span><br/>
                        BP 1234 FG
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
