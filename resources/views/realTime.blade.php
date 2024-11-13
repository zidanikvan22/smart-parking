<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemantauan - Parkwell</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/LogoParkwell.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="bg-blue-500 min-h-screen flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-lg p-8 max-w-xl w-full">
        <div class="flex items-center mb-6">
            <i class="fas fa-arrow-left text-blue-500 text-xl mr-2"></i>
            <span class="text-blue-500 text-xl font-semibold">Kembali</span>
        </div>
        <div class="mb-6">
            <select class="w-full p-3 border rounded-lg">
                <option>Zona 1</option>
                <!-- Add more zones as needed -->
            </select>
        </div>
        <div class="flex justify-between mb-6 text-sm text-gray-700">
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
        <div class="grid grid-cols-4 gap-3 mb-6">
            <!-- Slots with status colors -->
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
        </div>
        <button class="bg-blue-500 text-white w-full py-3 rounded-lg flex items-center justify-center">
            <i class="fas fa-eye mr-2"></i>
            Lihat Zona
        </button>
    </div>
</body>
</html>
