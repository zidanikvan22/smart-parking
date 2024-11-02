<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminSlotController extends Controller
{
    public function index(){
        {
            return view('admin.manageSlot', [
                "title" => "ManageSlot"
            ]);
        }
    }
}
