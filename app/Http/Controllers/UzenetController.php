<?php

namespace App\Http\Controllers;

use App\Models\Uzenet;

class UzenetController extends Controller
{
    public function index()
    {
        // legfrissebb elöl
        $uzenetek = Uzenet::orderByDesc('created_at')->paginate(15);
        return view('uzenetek.index', compact('uzenetek'));
    }
}
