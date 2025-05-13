<?php

namespace App\Http\Controllers;

use App\Models\Zona;
use App\Models\Subzona;
use App\Models\Slot;
use Illuminate\Http\Request;

class RealTimeController extends Controller
{
    public function index(Request $request)
    {
        $zonas = Zona::with(['subzonas.slots' => function($query) {
            $query->where('keterangan', 'tersedia');
        }])->get();

        $selectedZonaId = $request->has('zona') ? $request->zona : ($zonas->first() ? $zonas->first()->id : null);
        $selectedZona = $selectedZonaId ? Zona::with(['subzonas.slots'])->find($selectedZonaId) : null;

        return view('realTime', [
            'zonas' => $zonas,
            'selectedZona' => $selectedZona,
            'title' => 'real-time'
        ]);
    }

    public function getSubzonas(Request $request)
    {
        $request->validate([
            'zona_id' => 'required|exists:zonas,id'
        ]);

        $subzonas = Subzona::where('zona_id', $request->zona_id)
            ->with(['slots' => function($query) {
                $query->select('id', 'subzona_id', 'nomor_slot', 'keterangan', 'fotozona');
            }])
            ->get(['id', 'zona_id', 'nama']);

        return response()->json([
            'success' => true,
            'data' => $subzonas
        ]);
    }
}
