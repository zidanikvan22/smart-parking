@extends('layout.mainUser')

@section('main')
<div class="grid grid-cols-2 p-6 ">
    <div class="col-span-2 flex items-center">
        <i class="fas fa-arrow-left text-gray-50 text-xl mr-2"></i>
        <span class="text-gray-50 text-xl font-semibold">Kembali</span>
    </div>
    <div class="col-span-2 mt-5">
        <select class="w-1/3 p-3 border rounded-lg">
            <option>Zona 1</option>
            <option>Zona 2</option>
            <option>Zona 3</option>
        </select>
    </div>
    <div class="col-span-2 row-span-3 mt-5 flex flex-col items-center">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-6 md:mb-8">
            <img class="w-full h-64 md:h-64 object-cover" src="{{ asset('img/peta.png') }}" alt="">
        </div>
        <button class="bg-blue-500 text-white w-1/3 py-3 rounded-lg flex items-center justify-center text-sm -mt-3">
            <i class="fas fa-eye mr-2"></i>
            Lihat Peta Parkir
        </button>
    </div>
</div>


<div class="p-4">

    <div class="flex items-center pl-5 space-x-6 mb-4">
        <h2 class="text-2xl font-bold text-white p-2 rounded-lg shadow-lg">
            Zona 1.1
        </h2>

        <div class="flex space-x-4">
            <div class="flex items-center">
                <span class="w-3 h-3 bg-red-500 rounded-full mr-2"></span>
                <span>Terisi</span>
            </div>
            <div class="flex items-center">
                <span class="w-3 h-3 bg-green-500 rounded-full mr-2"></span>
                <span>Tersedia</span>
            </div>
            <div class="flex items-center">
                <span class="w-3 h-3 bg-yellow-500 rounded-full mr-2"></span>
                <span>Perbaikan</span>
            </div>
        </div>
    </div>


    <div class="grid grid-cols-4 gap-3 m-5 p-5 bg-white rounded-lg shadow-lg">

        <div class="bg-green-500 text-white p-3 rounded-lg text-center">Slot 1</div>
        <div class="bg-green-500 text-white p-3 rounded-lg text-center">Slot 2</div>
        <div class="bg-green-500 text-white p-3 rounded-lg text-center">Slot 3</div>
        <div class="bg-green-500 text-white p-3 rounded-lg text-center">Slot 4</div>
        <div class="bg-green-500 text-white p-3 rounded-lg text-center">Slot 5</div>
        <div class="bg-red-500 text-white p-3 rounded-lg text-center">Slot 9</div>
        <div class="bg-yellow-500 text-white p-3 rounded-lg text-center">Slot 10</div>
        <div class="bg-green-500 text-white p-3 rounded-lg text-center">Slot 6</div>
        <div class="bg-green-500 text-white p-3 rounded-lg text-center">Slot 7</div>
        <div class="bg-green-500 text-white p-3 rounded-lg text-center">Slot 8</div>
        <div class="bg-green-500 text-white p-3 rounded-lg text-center">Slot 11</div>
        <div class="bg-green-500 text-white p-3 rounded-lg text-center">Slot 12</div>
        <div class="bg-green-500 text-white p-3 rounded-lg text-center">Slot 13</div>
        <div class="bg-yellow-500 text-white p-3 rounded-lg text-center">Slot 14</div>
        <div class="bg-yellow-500 text-white p-3 rounded-lg text-center">Slot 15</div>
        <div class="bg-green-500 text-white p-3 rounded-lg text-center">Slot 16</div>
        <div class="bg-green-500 text-white p-3 rounded-lg text-center">Slot 17</div>
        <div class="bg-green-500 text-white p-3 rounded-lg text-center">Slot 18</div>
        <div class="bg-green-500 text-white p-3 rounded-lg text-center">Slot 19</div>
        <div class="bg-green-500 text-white p-3 rounded-lg text-center">Slot 20</div>
        <div class="bg-green-500 text-white p-3 rounded-lg text-center">Slot 21</div>
        <div class="bg-green-500 text-white p-3 rounded-lg text-center">Slot 22</div>
        <div class="bg-yellow-500 text-white p-3 rounded-lg text-center">Slot 23</div>
        <div class="bg-yellow-500 text-white p-3 rounded-lg text-center">Slot 24</div>
        <div class="bg-red-500 text-white p-3 rounded-lg text-center">Slot 25</div>
        <div class="bg-red-500 text-white p-3 rounded-lg text-center">Slot 26</div>
        <div class="bg-red-500 text-white p-3 rounded-lg text-center">Slot 27</div>
        <div class="bg-red-500 text-white p-3 rounded-lg text-center">Slot 28</div>
        <div class="bg-red-500 text-white p-3 rounded-lg text-center">Slot 29</div>
        <div class="bg-red-500 text-white p-3 rounded-lg text-center">Slot 30</div>
    </div>

    <div class="flex justify-center mt-6">
        <button
            class="bg-blue-500 text-white w-1/3 py-3 rounded-lg flex items-center justify-center hover:bg-blue-600 transition duration-300">
            <i class="fas fa-eye mr-2"></i>
            Lihat Zona
        </button>
    </div>
</div>

@endsection
