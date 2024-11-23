<?php

namespace App\Http\Controllers;

use App\Models\Slot;
use App\Models\Zona;
use Illuminate\Http\Request;

class AdminSlotController extends Controller
{
    public function index()
    { {
        $zona = Zona::all();
        $zonaWithSlots = Zona::with('slots')->get();

        return view('admin.manageSlot', [
            "title" => "ManageSlot",
            "zonas" => $zona,
            "zonaWithSlots" => $zonaWithSlots
        ]);
        }
    }

    public function store(){
        
    }
}
