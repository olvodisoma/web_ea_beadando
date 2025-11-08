<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Uzenet;

class KapcsolatController extends Controller
{
    public function showForm()
    {
        return view('kapcsolat');
    }

    public function submitForm(Request $request)
    {
        // Szerver oldali validáció
        $validated = $request->validate([
            'nev' => 'required|string|max:100',
            'email' => 'required|email|max:255',
            'tema' => 'nullable|string|max:255',
            'uzenet' => 'required|string|min:5',
        ]);

        // Mentés adatbázisba
        Uzenet::create($validated);

        // Visszajelzés a felhasználónak
        return redirect()->back()->with('success', 'Üzenetét sikeresen elküldte!');
    }
}

