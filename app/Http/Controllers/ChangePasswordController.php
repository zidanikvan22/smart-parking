<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ChangePasswordController extends Controller
{
    public function index()
    {
        return view('changePassword', [
            'title' => 'ubah sandi'
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
