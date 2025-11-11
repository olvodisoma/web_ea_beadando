<?php

namespace App\Http\Controllers;

use App\Models\Diak;
use App\Models\Jegy;
use App\Models\Targy;
use Illuminate\Support\Facades\DB;

class DiagramController extends Controller
{
    public function index()
    {
        // Jegyek megoszlása (1..5)
        $jegyekMegoszlas = Jegy::select('ertek', DB::raw('COUNT(*) as db'))
            ->groupBy('ertek')->orderBy('ertek')->pluck('db', 'ertek')->toArray();

        // Átlag jegy tárgyanként
        $atlagTargy = Jegy::select('targy_id', DB::raw('AVG(ertek) as atlag'))
            ->groupBy('targy_id')->get()->map(function($row){
                $nev = Targy::find($row->targy_id)?->nev ?? ('Tárgy #'.$row->targy_id);
                return ['nev' => $nev, 'atlag' => round((float)$row->atlag, 2)];
            });

        // Diákok száma osztályonként
        $diakOsztaly = Diak::select('osztaly', DB::raw('COUNT(*) as db'))
            ->groupBy('osztaly')->orderBy('osztaly')->pluck('db', 'osztaly')->toArray();

        return view('diagram.index', [
            'jegyekMegoszlas' => $jegyekMegoszlas,
            'atlagTargy'      => $atlagTargy,
            'diakOsztaly'     => $diakOsztaly,
        ]);
    }
}
