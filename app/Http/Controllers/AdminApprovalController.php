<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminApprovalController extends Controller
{
    public function index()
    {
        $approvals = User::where('status', '!=', 'aktif')->paginate(5);

        return view('admin.approval', [
            'title' => 'approval',
            'approvals' => $approvals
        ]);
    }
}
