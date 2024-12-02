<?php

namespace App\Http\Controllers;

// use App\Models\Slot;
use App\Models\Zona;
use App\Models\Subzona;
use Illuminate\Http\Request;

class RealTimeController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua zona
        $zonas = Zona::all();

        // Ambil zona berdasarkan ID dari request atau default ke zona pertama
        $selectedZona = $request->has('zona') 
            ? Zona::find($request->zona) 
            : $zonas->first();

        // Ambil subzona untuk zona yang dipilih
        $subzonas = $selectedZona ? $selectedZona->subzonas()->with('slot')->get() : collect();

        return view('realTime', [
            'zonas' => $zonas,
            'selectedZona' => $selectedZona,
            'subzonas' => $subzonas,
            'title' => 'real-time'
        ]);
    }

    public function getSubzonas(Request $request)
    {
        $zonaId = $request->input('zona_id');

        // Ambil subzona dan slot terkait
        $subzonas = Subzona::where('zona_id', $zonaId)
            ->with('slot:id,subzona_id,nomor_slot,keterangan,fotozona')
            ->get();

        return response()->json($subzonas);
    }

    
}
