<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slot;

class AdminSlotObstacleController extends Controller
{
    public function updateSlot(Request $request)
    {
        $validated = $request->validate([
            'subzona_id' => 'required|exists:subzona,id',
            'nomor_slot' => 'required|integer',
            'keterangan' => 'required|in:Terisi,Tersedia,Perbaikan',
        ]);

        $slot = Slot::where('subzona_id', $validated['subzona_id'])
                    ->where('nomor_slot', $validated['nomor_slot'])
                    ->first();

        if ($slot) {
            $slot->keterangan = $validated['keterangan'];
            $slot->save();
        } else {
            Slot::create($validated);
        }

        return response()->json(['message' => 'Slot updated successfully'], 200);
    }
}
