<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view(
            'auth.login',
            [
                'title' => 'login'
            ]
        );
    }

    public function login_proses(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin-dashboard')->with('success', 'Login berhasil');
            } else {
                return redirect()->route('dashboard')->with('success', 'Login berhasil');
            }
        } else {
            return redirect()->back()->withErrors(['error' => 'Email atau password salah.'])->withInput();
        }
    }

    public function registrasi()
    {
        return view('auth.registrasi', [
            'title' => 'registrasi'
        ]);
    }

    public function registrasi_proses(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:pengguna|email',
            'kendaraan' => 'required',
            'no_plat' => 'required',
            'password' => 'required',
            'gambar' => 'required|image|file|mimes:jpeg,png,jpg',
        ], [
            'nama.required' => 'Nama Lengkap harus diisi',
            'email.required' => 'Email harus diisi',
            'email.unique' => 'Email sudah terdaftar',
            'email.email' => 'Email harus diisi dengan format email',
            'kendaraan.required' => 'Jenis kendaraan harus diisi',
            'no_plat.required' => 'No Plat harus diisi',
            'nik.required' => 'NIK harus diisi',
            'password.required' => 'Password harus diisi',
            'gambar.required' => 'Gambar harus diisi',
        ]);
        $gambar = $request->file('gambar')->store('image/fotoProfile', 'public');

        $store = [
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'jenis_kendaraan' => $validated['kendaraan'],
            'no_plat' => $validated['no_plat'],
            'password' => Hash::make($validated['password']),
            'foto_profile' => $gambar,
        ];

        User::create($store);
        return redirect()->route('login')->with('berhasil', 'Pendaftaran Berhasil');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect()->route('login')->with('succes', 'Logout Berhasil');
    }
}
