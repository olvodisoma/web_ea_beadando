<?php

namespace App\Http\Controllers;

use App\Models\Targy;
use Illuminate\Http\Request;

class TargyController extends Controller
{
    public function index()
    {
        $targyak = Targy::all();
        return view('targy.index', compact('targyak'));
    }
}
