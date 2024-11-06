<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Information - Parkwell</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/LogoParkwell.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body class="bg-gradient-to-b from-blue-500 to-white min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <nav class="flex justify-between items-center mb-8">
            <div class="flex items-center">
                <i class="fas fa-arrow-left text-2xl text-white mr-2"></i>
                <span class="text-2xl text-white">Kembali</span>
            </div>
            <button class="bg-white text-blue-500 px-6 py-2 rounded-lg shadow-md flex items-center hover:bg-blue-100 transition duration-300">
                <i class="fas fa-file-pdf mr-2"></i>
                PDF
            </button>
        </nav>
        
        <div class="bg-white rounded-lg shadow-lg p-8 max-w-4xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="flex justify-center items-center">
                    <img alt="QR code image" class="w-64 h-64" src="https://storage.googleapis.com/a1aa/image/pdKDUcyVPCYkPVayGUf704CWc4jHDmFgDdl4HZlLTjvS5XzJA.jpg"/>
                </div>
                <div class="text-gray-600 space-y-4">
                    <h2 class="text-3xl font-bold text-blue-500 mb-6">Vehicle Information</h2>
                    <p>
                        <span class="font-bold text-lg">Email</span><br/>
                        cristiano@gmail.com
                    </p>
                    <p>
                        <span class="font-bold text-lg">Nama Pengguna</span><br/>
                        Cristiano Ronaldo El Speed
                    </p>
                    <p>
                        <span class="font-bold text-lg">Jenis Kendaraan</span><br/>
                        Mobil
                    </p>
                    <p>
                        <span class="font-bold text-lg">Plat kendaraan</span><br/>
                        BP 1234 FG
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>