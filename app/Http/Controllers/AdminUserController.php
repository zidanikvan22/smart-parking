<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::query()->paginate(5);
        return view('admin.manageUsers', [
            "title" => "ManageUsers",
            "penggunas" => $users
        ]);
    }
}
