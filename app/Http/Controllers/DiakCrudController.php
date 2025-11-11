<?php

namespace App\Http\Controllers;

use App\Models\Diak;
use Illuminate\Http\Request;

class DiakCrudController extends Controller
{
    public function index()
    {
        $diakok = Diak::orderBy('id')->paginate(15);
        return view('diakok.index', compact('diakok'));
    }

    public function create()
    {
        return view('diakok.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nev' => ['required','string','max:255'],
            'osztaly' => ['nullable','string','max:20'],
            'fiu' => ['required','in:0,1'],
        ]);
        Diak::create($data);
        return redirect()->route('diakok.index')->with('ok','Diák hozzáadva.');
    }

    public function edit(Diak $diak)
    {
        return view('diakok.edit', compact('diak'));
    }

    public function update(Request $request, Diak $diak)
    {
        $data = $request->validate([
            'nev' => ['required','string','max:255'],
            'osztaly' => ['nullable','string','max:20'],
            'fiu' => ['required','in:0,1'],
        ]);
        $diak->update($data);
        return redirect()->route('diakok.index')->with('ok','Diák módosítva.');
    }

    public function destroy(Diak $diak)
    {
        $diak->delete();
        return redirect()->route('diakok.index')->with('ok','Diák törölve.');
    }
}
