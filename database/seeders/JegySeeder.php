<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class JegySeeder extends Seeder
{
    public function run(): void
    {
        $path = database_path('seeders/data/jegy.txt');
        $lines = File::lines($path);

        $first = true;
        foreach ($lines as $line) {
            if ($first) { $first = false; continue; }
            $parts = preg_split('/\t+/', trim($line));
            if (count($parts) < 5) continue;

            $diakid = (int)$parts[0];
            $datumRaw = trim($parts[1]);
            $ertek = (int)$parts[2];
            $tipus = $parts[3];
            $targyid = (int)$parts[4];

            // dátum konvertálás (formátum: 2010.09.08)
            try {
                $datum = Carbon::createFromFormat('Y.m.d', $datumRaw)->format('Y-m-d');
            } catch (\Exception $e) {
                $datum = null;
            }

            DB::table('jegy')->insert([
                'diak_id' => $diakid,
                'datum' => $datum,
                'ertek' => $ertek,
                'tipus' => $tipus,
                'targy_id' => $targyid,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
