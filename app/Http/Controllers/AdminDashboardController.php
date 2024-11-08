<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard Admin';
        return view('admin.dashboard',[
            'title' => $title
        ]);
    }
}
