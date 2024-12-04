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

        // Zona ID default null jika tidak ada yang dipilih
        $zonaId = $request->get('zona_id') ?? null;
    
        // Filter subzona berdasarkan zona_id jika ada
        $subzonas = $zonaId ? Subzona::with('zona')->where('zona_id', $zonaId)->get() : collect([]);
    
        return view('admin.manageZona', compact('zonas', 'subzonas', 'zonaId'), [
            "title" => "ManageZona",
        ]);
    }

    // Method Zona
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_zona' => 'required|unique:zona,nama_zona',
            'keterangan' => 'required|string',
            'fotozona' => 'required|image|max:5000',
        ], [
            'nama_zona.required' => 'Nama Zona wajib diisi.',
            'nama_zona.unique' => 'Nama Zona sudah terdaftar.',
            'keterangan.required' => 'Keterangan Zona wajib diisi.',
            'fotozona.image' => 'File yang diunggah harus berupa gambar.',
            'fotozona.max' => 'Ukuran gambar tidak boleh lebih dari 5MB.',
            'fotozona.required' => 'Foto area zona wajib diisi.'
            
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
        return redirect()->back()->with('error', 'Terjadi kesalahan dalam proses validasi.');
    }

    public function update(Request $request, $id)
    {
        $zona = Zona::findOrFail($id);
        
        $validated = $request->validate([
            'keterangan' => 'required|string',
            'fotozona' => 'image|max:5000',
        ], [

            'keterangan.required' => 'Keterangan Zona wajib diisi.',
            'fotozona.image' => 'File yang diunggah harus berupa gambar.',
            'fotozona.max' => 'Ukuran gambar tidak boleh lebih dari 5MB.'

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

        // Hapus foto jika ada
        if ($zona->fotozona) {
            $fotoPath = public_path($zona->fotozona);
            
            // Periksa apakah file foto ada sebelum dihapus
            if (file_exists($fotoPath)) {
                unlink($fotoPath);
            }
        }
        $zona->delete();
        return redirect()->back()->with('success', 'Zona berhasil dihapus');
    }

    // Method Subzona
    public function storeSubzona(Request $request)
    {
        $validated = $request->validate([
            'zona_id' => 'required|exists:zona,id',
            'nama_subzona' => 'required|unique:subzona,nama_subzona',
            'foto' => 'required|image|max:5000'
        ], [
            'zona_id.required' => 'Nama Zona wajib diisi.',            
            'keterangan.required' => 'Keterangan Zona wajib diisi.',
            'nama_subzona.unique' => 'Nama Subzona telah terdaftar',
            'nama_subzona.required' => 'Nama Subzona wajib diisi',
            'foto.required' => 'Foto area Sub-Zona wajib diisi.',
            'foto.image' => 'file yang disubmit harus berupa gambar.',
            'foto.max' => 'Ukuran gambar tidak boleh lebih dari 5MB.'
            
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
            'foto' => 'required|image|max:5000'
        ], [

            'foto.image' => 'file yang disubmit harus berupa gambar.',
            'foto.max' => 'Ukuran gambar tidak boleh lebih dari 5MB.'
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
