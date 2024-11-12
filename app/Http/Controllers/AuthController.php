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
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Data untuk autentikasi
        $credentials = $request->only('email', 'password');

        // Proses autentikasi
        if (Auth::attempt($credentials)) {
            // Jika autentikasi berhasil, arahkan ke halaman utama
            return redirect()->route('home')->with('success', 'Login berhasil!');
        } else {
            // Jika autentikasi gagal, kembali ke halaman login dengan pesan error
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
        $gambar = $request->file('gambar')->store('image/gambarKendaraan', 'public');

        $store = [
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'jenis_kendaraan' => $validated['kendaraan'],
            'no_plat' => $validated['no_plat'],
            'kata_sandi' => Hash::make($validated['password']),
            'foto_profile' => $gambar,
        ];

        User::create($store);
        return redirect()->route('login')->with('berhasil', 'Pendaftaran Berhasil');
    }


    public function logout()
    {
    }
}
