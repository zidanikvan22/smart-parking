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
        // Ambil semua zona dengan subzona dan semua slot (tanpa filter 'tersedia')
        $zonas = Zona::with(['subzonas.slots'])->get();

        // Tambahkan properti available dan total ke setiap zona
        $zonas->each(function ($zona) {
            $zona->total = $zona->subzonas->sum(function ($subzona) {
                return $subzona->slots->count();
            });
            $zona->available = $zona->subzonas->sum(function ($subzona) {
                return $subzona->slots->where('keterangan', 'tersedia')->count();
            });
        });

        // Ambil zona yang dipilih dari request atau default ke zona pertama
        $selectedZonaId = $request->has('zona') ? $request->zona : ($zonas->first() ? $zonas->first()->id : null);
        $selectedZona = $selectedZonaId ? Zona::with(['subzonas.slots'])->find($selectedZonaId) : null;

        // Ambil subzona untuk zona yang dipilih
        $subzonas = $selectedZona ? $selectedZona->subzonas : collect([]);
        $selectedSubzonaId = $request->has('subzona') ? $request->subzona : null;

        // Hitung slot berdasarkan status untuk subzona yang dipilih
        $slotStats = [
            'tersedia' => 0,
            'terisi' => 0,
            'diperbaiki' => 0,
        ];
        if ($selectedSubzonaId) {
            $slotStats = [
                'tersedia' => Slot::where('subzona_id', $selectedSubzonaId)->where('keterangan', 'tersedia')->count(),
                'terisi' => Slot::where('subzona_id', $selectedSubzonaId)->where('keterangan', 'terisi')->count(),
                'diperbaiki' => Slot::where('subzona_id', $selectedSubzonaId)->where('keterangan', 'perbaikan')->count(),
            ];
        }

        // Hitung total untuk Status Real Time
        $totalZona = $zonas->count();
        $totalSubzona = $zonas->sum(function ($zona) {
            return $zona->subzonas->count();
        });
        $totalSlot = Slot::count();

        return view('realTime', [
            'zonas' => $zonas,
            'selectedZona' => $selectedZona,
            'selectedZonaId' => $selectedZonaId,
            'subzonas' => $subzonas,
            'selectedSubzonaId' => $selectedSubzonaId,
            'slotStats' => $slotStats,
            'totalZona' => $totalZona,
            'totalSubzona' => $totalSubzona,
            'totalSlot' => $totalSlot,
            'title' => 'real-time'
        ]);
    }

    public function getSubzonas(Request $request)
    {
        $request->validate([
            'zona_id' => 'required|exists:zonas,id'
        ]);

        $subzonas = Subzona::where('zona_id', $request->zona_id)
            ->with([
                'slots' => function ($query) {
                    $query->select('id', 'subzona_id', 'nomor_slot', 'keterangan', 'fotozona');
                }
            ])
            ->get(['id', 'zona_id', 'nama']);

        return response()->json([
            'success' => true,
            'data' => $subzonas
        ]);
    }

    public function getSubzonaDetails($subzonaId)
    {
        // Ambil data dengan eager loading
        $subzona = Subzona::with([
            'slots' => function ($query) {
                $query->select('id', 'subzona_id', 'nomor_slot', 'keterangan')
                    ->orderBy('nomor_slot');
            }
        ])->findOrFail($subzonaId);

        // Hitung statistik
        $slotStats = [
            'tersedia' => $subzona->slots->where('keterangan', 'tersedia')->count(),
            'kosong' => $subzona->slots->where('keterangan', 'kosong')->count(),
            'terisi' => $subzona->slots->where('keterangan', 'terisi')->count(),
            'diperbaiki' => $subzona->slots->where('keterangan', 'diperbaiki')->count(),
        ];

        return response()->json([
            'nama_subzona' => $subzona->nama_subzona,
            'foto' => $subzona->foto ? asset('storage/' . $subzona->foto) : asset('images/default-subzona.jpg'),
            'slots' => $subzona->slots->map(function ($slot) {
                return [
                    'id' => $slot->id,
                    'nomor_slot' => $slot->nomor_slot,
                    'keterangan' => $slot->keterangan
                ];
            }),
            'slotStats' => $slotStats
        ]);
    }
}
