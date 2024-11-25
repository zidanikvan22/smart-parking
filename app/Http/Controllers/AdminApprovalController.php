<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
        $approval->save();

        $message = $status === 'aktif' ? 'Pengguna berhasil disetujui.' : 'Pengguna berhasil ditolak.';
        return redirect()->back()->with('success', $message);
    }


}
