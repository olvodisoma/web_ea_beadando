<?php

namespace App\Http\Controllers;

use App\Models\Diak;
use Illuminate\Http\Request;

class DiakController extends Controller
{
    public function index()
    {
        $diakok = Diak::all();
        return view('diak.index', compact('diakok'));
    }
}
