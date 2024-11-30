<?php

namespace App\Http\Controllers;

use App\Models\Slot;
use App\Models\Zona;
use App\Models\Subzona;
use Illuminate\Http\Request;

class RealTimeController extends Controller
{
    public function index(Request $request)
    {
        $zonas = Zona::all();
        $zonaId = $request->get('zona_id', $zonas->first()->id ?? null);
        $subzonas = Subzona::where('zona_id', $zonaId)->get();
        $subzonaId = $request->get('subzona_id', $subzonas->first()->id ?? null);
        $slots = Slot::where('subzona_id', $subzonaId)->get();

        return view('realTime', [
            'zonas' => $zonas,
            'subzonas' => $subzonas,
            'slots' => $slots,
            'zonaId' => $zonaId,
            'subzonaId' => $subzonaId,
            'title' => 'real-time',
        ]);
    }
}
