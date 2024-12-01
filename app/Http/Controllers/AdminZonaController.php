<?php

namespace App\Http\Controllers;
use App\Models\Subzona;
use App\Models\Zona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AdminZonaController extends Controller

{
    public function index(Request $request)
    {
        $zonas = Zona::all();

        // mengambil zona id pertama sebagai default atau sesuai dengan permintaan zona maana yang ingin dilihat
        $zonaId = $request->get('zona_id', $zonas->first()->id ?? null);
    
        // Pastikan zona_id valid
        if (!$zonaId) {
            return redirect()->back()->with('error', 'Tidak ada zona yang tersedia.');
        }
    
        // Filter subzona berdasarkan zona_id
        $subzonas = Subzona::with('zona')->where('zona_id', $zonaId)->get();
    
        return view('admin.manageZona', compact('zonas', 'subzonas', 'zonaId'), [
            "title" => "ManageZona",
        ]);
    }

    // Method Zona
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_zona' => 'required|unique:zona,nama_zona',
            'keterangan' => 'nullable|string',
            'fotozona' => 'image|max:2048'
        ]);

        if ($request->hasFile('fotozona')) {
            // penyimpanan foto ke direktori public/datafoto
            $foto = $request->file('fotozona');
            $fotoName = 'zona_' . uniqid() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('datafoto'), $fotoName);
            $validated['fotozona'] = 'datafoto/' . $fotoName;
        }

        Zona::create($validated);
        return redirect()->back()->with('success', 'Zona berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $zona = Zona::findOrFail($id);
        
        $validated = $request->validate([
            'keterangan' => 'required|string',
            'foto' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('fotozona')) {
            // Hapus foto lama jika ada
            if ($zona->fotozona) {
                $oldFotoPath = public_path($zona->fotozona);
                if (file_exists($oldFotoPath)) {
                    unlink($oldFotoPath);
                }
            }
    
            // Simpan foto baru
            $foto = $request->file('fotozona');
            $fotoName = 'zona_' . uniqid() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('datafoto'), $fotoName);
            $validated['fotozona'] = 'datafoto/' . $fotoName;
        }

        $zona->update($validated);
        return redirect()->back()->with('success', 'Keterangan zona berhasil diupdate');
    }

    public function destroy($id)
    {
        $zona = Zona::findOrFail($id);
        $zona->delete();
        return redirect()->back()->with('success', 'Zona berhasil dihapus');
    }

    // Method Subzona
    public function storeSubzona(Request $request)
    {
        $validated = $request->validate([
            'zona_id' => 'required|exists:zona,id',
            'nama_subzona' => 'required|unique:subzona,nama_subzona',
            'foto' => 'nullable|image|max:2048'
        ]);
    
        if ($request->hasFile('foto')) {
            // penyimpanan foto ke direktori public/datafoto
            $foto = $request->file('foto');
            $fotoName = 'subzona_' . uniqid() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('datafoto'), $fotoName);
            $validated['foto'] = 'datafoto/' . $fotoName;
        }
    
        Subzona::create($validated);
        return redirect()->back()->with('success', 'Subzona berhasil ditambahkan');
    }
    
    public function updateSubzona(Request $request, $id)
    {
        $subzona = Subzona::findOrFail($id);
        
        $validated = $request->validate([
            'foto' => 'nullable|image|max:2048'
        ]);
    
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($subzona->foto) {
                $oldFotoPath = public_path($subzona->foto);
                if (file_exists($oldFotoPath)) {
                    unlink($oldFotoPath);
                }
            }
    
            // Simpan foto baru
            $foto = $request->file('foto');
            $fotoName = 'subzona_' . uniqid() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('datafoto'), $fotoName);
            $validated['foto'] = 'datafoto/' . $fotoName;
        }
    
        $subzona->update($validated);
        return redirect()->back()->with('success', 'Foto subzona berhasil diupdate');
    }

    public function destroySubzona($id)
    {
        $subzona = Subzona::findOrFail($id);
        
        // Hapus foto jika ada
        if ($subzona->foto) {
            $fotoPath = public_path($subzona->foto);
            
            // Periksa apakah file foto ada sebelum dihapus
            if (file_exists($fotoPath)) {
                unlink($fotoPath);
            }
        }
    
        $subzona->delete();
        return redirect()->back()->with('success', 'Subzona berhasil dihapus');
    }
}
