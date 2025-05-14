<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->check() && !auth()->user()->onboarding_completed) {
            return redirect()->route('onboarding.show');
        }

        return view('dashboard', [
            'title' => 'dashboard',
        ]);
    }
}
