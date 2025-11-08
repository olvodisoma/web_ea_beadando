<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DiakSeeder extends Seeder
{
    public function run(): void
    {
        $path = database_path('seeders/data/diak.txt');
        $lines = File::lines($path);

        $first = true;
        foreach ($lines as $line) {
            if ($first) { $first = false; continue; } // fejléc kihagyása, ha van
            $parts = preg_split('/\t+/', trim($line));
            if (count($parts) < 4) continue;

            DB::table('diak')->insert([
                'id' => (int)$parts[0],
                'nev' => $parts[1],
                'osztaly' => $parts[2],
                'fiu' => (int)$parts[3],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

