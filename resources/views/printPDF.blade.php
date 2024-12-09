<html>

<head>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 90%;
            max-width: 600px;
            text-align: center;
        }

        h1 {
            color: #2c3e50;
            margin-bottom: 25px;
            font-size: 24px;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
        }

        .qr-code {
            display: block;
            margin: 25px auto;
            width: 400px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
            font-size: 16px;
        }

        th {
            background-color: #f1f5f9;
            color: #2c3e50;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f1f3f5;
            transition: background-color 0.3s ease;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Informasi QR Code</h1>
        <img src="{{ $gambar }}" alt="QR Code" class="qr-code">
        <table>
            <tr>
                <th>Nama Lengkap</th>
                <td>{{ $nama_lengkap }}</td>
            </tr>
            <tr>
                <th>Jenis Kendaraan</th>
                <td>{{ $jenis_kendaraan }}</td>
            </tr>
            <tr>
                <th>Nomor Plat Kendaraan</th>
                <td>{{ $no_plat }}</td>
            </tr>
        </table>
    </div>
</body>

</html>
