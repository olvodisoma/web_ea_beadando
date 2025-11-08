<?php

namespace App\Http\Controllers;

use App\Models\Diak;
use App\Models\Targy;
use App\Models\Jegy;

class AdatbazisController extends Controller
{
    public function index()
    {
        $diakok = Diak::all();
        $targyak = Targy::all();
        $jegyek = Jegy::with(['diak', 'targy'])->get();

        return view('adatbazis', compact('diakok', 'targyak', 'jegyek'));
    }
}

