<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QrCodeController extends Controller
{
    public function index()
    {
        return view('qrCode', [
            'title' => 'qr-code',
        ]);
    }

    public function fotoQrcode($qr_code){
        $path = storage_path('app/public/' . $qr_code);
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        return 'data:image/' . $type . ';base64,' . base64_encode($data);
    }

    public function generatePDF()
    {
        $user = Auth::user();
        $gambar = $user->qr_code;
        $id_pengguna = $user->id;
        $nama_lengkap = $user->nama;
        $jenis_kendaraan = $user->jenis_kendaraan;
        $no_plat = $user->no_plat;

        // Step 3: Generate the HTML content
        $html = view('printPDF', [
            'gambar' => $this->fotoQrcode($gambar),
            'id_pengguna' => $id_pengguna,
            'nama_lengkap' => $nama_lengkap,
            'jenis_kendaraan' => $jenis_kendaraan,
            'no_plat' => $no_plat
        ])->render();

        // Step 4: Create a new Dompdf instance
        $dompdf = new Dompdf();

        // Step 5: Load the HTML content
        $dompdf->loadHtml($html);

        // Step 6: Render the PDF
        $dompdf->render();

        // Step 7: Output the PDF
        return $dompdf->stream('informasi_qr_code_' . $id_pengguna . '.pdf', ['Attachment' => 0]);
    }
}
