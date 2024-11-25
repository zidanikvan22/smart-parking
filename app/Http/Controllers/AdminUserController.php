<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $users = User::where('status', 'aktif')
            ->when($search, function ($query, $search) {
                $query->where('nama', 'like', "%{$search}%")
                      ->orWhere('no_plat', 'like', "%{$search}%");
            })
            ->paginate(5); // Pagination

        return view('admin.manageUsers', [
            "title" => "ManageUsers",
            "penggunas" => $users
        ]);
    }

    public function delete($id_pengguna){
        $user = User::findOrFail($id_pengguna);
        $user->delete();
        return redirect()->back()->with('success', 'User berhasil dihapus');
    }

}
