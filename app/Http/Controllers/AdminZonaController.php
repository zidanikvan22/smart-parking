<?php

namespace App\Http\Controllers;

use App\Models\Zona;
use Illuminate\Http\Request;


class AdminZonaController extends Controller
{
    public function index()
    {
        $zonas = Zona::query()->paginate(5);
        return view('admin.manageZona', [
            'title' => 'ManageZona',
            'zonas' => $zonas,
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'nama' => 'required',
            'gambar' => 'required|image|file|mimes:png,jpg,jpeg',
            'deskripsi' => 'required',
        ]);
        $gambar = $request->file('gambar')->store('image/gambarZona', 'public');

        $addZona = [
            'zona_parkir' => $request->nama,
            'foto_zona' => $gambar,
            'deskripsi' => $request->deskripsi,
        ];
        Zona::create($addZona);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
}
