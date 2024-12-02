<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AdminApprovalController extends Controller
{
    public function index()
    {
        $approvals = User::where('status', 'nonAktif')->paginate(5);

        return view('admin.approval', [
            'title' => 'approval',
            'approvals' => $approvals
        ]);
    }

    public function updateUserStatus(Request $request, $id_pengguna)
    {
        $approval = User::find($id_pengguna);
        if (!$approval) {
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan.');
        }

        $status = $request->input('status');
        $approval->status = $status;

        if ($status === 'aktif') {
            // Generate QR Code with JSON format for better readability and scanning
            $qrCodeContent = json_encode([
                'nama' => $approval->nama,
                'jenis_kendaraan' => $approval->jenis_kendaraan,
                'plat_kendaraan' => $approval->no_plat
            ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

            $qrCodeFilename = "qrcodes/user_qr_{$approval->id_pengguna}.png";
            $fullPath = storage_path('app/public/' . $qrCodeFilename);

            if (!file_exists(dirname($fullPath))) {
                mkdir(dirname($fullPath), 0755, true);
            }

            try {
                QrCode::format('png')
                    ->encoding('UTF-8')
                    ->size(300)
                    ->margin(10)
                    ->generate($qrCodeContent, $fullPath);

                $approval->qr_code = $qrCodeFilename;
            } catch (\Exception $e) {
                \Log::error('QR Code Generation Error: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Gagal membuat QR Code: ' . $e->getMessage());
            }
        } else {
            // Remove QR code if user is not activated
            if ($approval->qr_code) {
                Storage::disk('public')->delete($approval->qr_code);
                $approval->qr_code = null;
            }
        }

        $approval->save();

        $message = $status === 'aktif'
            ? 'Pengguna berhasil disetujui dan QR Code dibuat.'
            : 'Pengguna berhasil ditolak.';

        return redirect()->back()->with('success', $message);
    }

}
