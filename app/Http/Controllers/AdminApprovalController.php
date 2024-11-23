<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminApprovalController extends Controller
{
    public function index()
    {
        return view('admin.approval', [
            'title' => 'approval',
        ]);
    }
}
