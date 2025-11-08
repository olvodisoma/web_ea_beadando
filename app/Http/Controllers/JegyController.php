<?php

namespace App\Http\Controllers;

use App\Models\Jegy;
use Illuminate\Http\Request;

class JegyController extends Controller
{
    public function index()
    {
        $jegyek = Jegy::with(['diak', 'targy'])->get();
        return view('jegy.index', compact('jegyek'));
    }
}
