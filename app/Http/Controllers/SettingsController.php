<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('settings', [
            'title' => 'pengaturan',
            'user' => $user
        ]);
    }


public function updateFotoKendaraan(Request $request)
{
    $request->validate([
        'foto_kendaraan' => 'required|image|mimes:jpg,jpeg,png|max:5120', // Maks 5MB
    ]);

    $user = auth()->user();

    // Hapus foto lama jika ada
    if ($user->foto_kendaraan && Storage::exists('public/' . $user->foto_kendaraan)) {
        Storage::delete('public/' . $user->foto_kendaraan);
    }

    // Simpan foto baru
    $path = $request->file('foto_kendaraan')->store('foto_kendaraan', 'public');
    $user->foto_kendaraan = $path;
    $user->save();

    return response()->json([
        'message' => 'Foto kendaraan berhasil diperbarui.',
        'path' => asset('storage/' . $path)
    ]);
}



    public function changePassword(Request $request)
    {
        $request->validate(
            [
                'old_password' => 'required',
                'new_password' => 'required|min:8|different:old_password',
                'confirm_password' => 'required|same:new_password'
            ],
            [
                'old_password.required' => 'Password lama harus diisi.',
                'new_password.required' => 'Password baru harus diisi.',
                'new_password.min' => 'Password baru minimal 8 karakter.',
                'new_password.different' => 'Password baru harus berbeda dengan password lama.',
                'confirm_password.required' => 'Konfirmasi password harus diisi.',
                'confirm_password.same' => 'Konfirmasi password tidak sesuai.'
            ]
        );

        $user = Auth::user();

        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->with('error', 'Password lama tidak sesuai.');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'password berhasil di ganti');
    }
}
