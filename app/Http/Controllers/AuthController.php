<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login',[
            'title' => 'login'
        ]
    );
    }

    public function registrasi()
    {
        return view('auth.registrasi', [
            'title' => 'registrasi'
        ]);
    }

    public function logout()
    {
    }
}
