<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminZonaController extends Controller
{
    public function index()
    {
        return view('admin.manageZona');
    }
}
