<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\VerifikasiEmail;
use App\Notifications\UbahpasswordEmail;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Notification;

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

            $status = Auth::user()->status;

            switch ($status) {
                case 'nonAktif':
                    return redirect()
                        ->back()
                        ->with('error', 'Akun Anda belum terverifikasi. Silahkan cek email dan klik tombol/link untuk melakukan verifikasi.');

                case 'aktif':
                    if (Auth::user()->role === 'admin') {
                        return redirect()->route('admin-dashboard')->with('success', 'Login berhasil');
                    } else {
                        return redirect()->route('dashboard')->with('success', 'Login berhasil');
                    }

                default:
                    return redirect()
                        ->back()
                        ->with('error', 'Status akun tidak valid.');
            }

        } else {
            return redirect()
                ->back()
                ->with('error', 'Email atau password salah.');
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
        try {
            $validated = $request->validate([
                'email' => 'required|unique:pengguna,email|email',
                'nama' => 'required',
                'password' => 'required|confirmed',
            ], [
                'nama.required' => 'Nama Lengkap harus diisi',
                'email.required' => 'Email harus diisi',
                'email.unique' => 'Email sudah terdaftar',
                'email.email' => 'Format email tidak valid',
                'password.required' => 'Password wajib diisi',
                'password.confirmed' => 'Konfirmasi password tidak cocok',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errorMessage = collect($e->validator->errors()->all())->first();

            return back()
                ->withInput()
                ->with('error', $errorMessage)
                ->with('showModalError', true);
        }

        $store = [
            'email' => $validated['email'],
            'nama' => $validated['nama'],
            'password' => Hash::make($validated['password']),
            'onboarding_step' => 0,
            'onboarding_completed' => false,
        ];

        $user = User::create($store);

        if ($user) {
            $user->notify(new VerifikasiEmail());

            return redirect()
                ->route('landing_page')
                ->with('success', 'Pendaftaran berhasil. Silakan periksa email Anda untuk verifikasi.')
                ->with('showVerificationModal', true);
        } else {
            return back()
                ->withInput()
                ->with('error', 'Pendaftaran gagal')
                ->with('showModalError', true);
        }
    }


    public function verifyEmail(Request $request, $id, $hash)
    {
        $user = User::findOrFail($id);

        if (! hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
            abort(403, 'Invalid verification link');
        }

        if (! $user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
            $user->status = 'aktif';
            $user->save();

            event(new Verified($user));
        }

        return redirect()->route('landing_page')->with('success', 'Akun anda sudah diverifikasi dan siap digunakan!');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect()->route('landing_page')->with('succes', 'Logout Berhasil');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:pengguna,email',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['error' => 'Email tidak ditemukan.'], 404);
        }

        $token = Password::createToken($user);

        $resetUrl = URL::temporarySignedRoute(
            'password.reset',
            now()->addMinutes(30),
            [
                'token' => $token,
                'id' => $user->id_pengguna
            ]
        );

        $user->notify(new UbahpasswordEmail($resetUrl, $user->nama));
        return response()->json(['message' => 'Link reset telah dikirim ke email.']);
    }

    public function showResetForm(Request $request, $token, $id)
    {
        $user = User::findOrFail($id);

        Auth::login($user);

        return view('component.pengaturan.form_ubah_kata_sandi', [
            'token' => $token,
            'email' => $user->email,
            'title' => 'Ubah Kata Sandi'
        ]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ], [
            'password.confirmed' => 'Konfirmasi kata sandi tidak sesuai.',
        ]);

        $user = \App\Models\User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'password' => 'Kata sandi baru tidak boleh sama seperti kata sandi lama.',
            ]);
        }

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect('/settings')->with('success', 'Kata sandi berhasil diubah.')
            : back()->withErrors(['email' => [__($status)]]);
    }













///////////////////////////////////////////////////////////////////////////////////////////////////////////////////







    // public function sendResetLink(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email|exists:users,email',
    //     ]);

    //     $user = User::where('email', $request->email)->first();

    //     if (!$user) {
    //         return back()->withErrors(['email' => 'Email tidak ditemukan.']);
    //     }

    //     $token = Password::createToken($user);

    //     $resetUrl = URL::signedRoute('password.reset', [
    //         'token' => $token,
    //         'id' => $user->id,
    //     ]);

    //     // Kirim email dengan link reset
    //     Mail::to($user->email)->send(new \App\Mail\ResetPasswordMail($user, $resetUrl));

    //     return back()->with('status', 'Link reset telah dikirim ke email.');
    // }

    // public function showResetForm($token, $id)
    // {
    //     return view('component.pengaturan.form_ubah_kata_sandi', compact('token', 'id'));
    // }

    // public function reset(Request $request)
    // {
    //     $request->validate([
    //         'token' => 'required',
    //         'id' => 'required|exists:users,id',
    //         'email' => 'required|email',
    //         'password' => 'required|confirmed|min:8',
    //     ]);

    //     $user = User::where('id', $request->id)->where('email', $request->email)->first();

    //     if (!$user) {
    //         return back()->withErrors(['email' => 'User tidak ditemukan.']);
    //     }

    //     if (!Password::tokenExists($user, $request->token)) {
    //         return back()->withErrors(['token' => 'Token tidak valid atau sudah kedaluwarsa.']);
    //     }

    //     $user->password = Hash::make($request->password);
    //     $user->save();

    //     Password::deleteToken($user); // hapus token setelah berhasil

    //     return redirect('/settings')->with('status', 'Password berhasil direset. Silakan login.');
    // }

}
