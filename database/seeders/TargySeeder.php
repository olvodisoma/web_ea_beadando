<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class TargySeeder extends Seeder
{
    public function run(): void
    {
        $path = database_path('seeders/data/targy.txt');
        $lines = File::lines($path);

        $first = true;
        foreach ($lines as $line) {
            if ($first) { $first = false; continue; }
            $parts = preg_split('/\t+/', trim($line));
            if (count($parts) < 3) continue;

            DB::table('targy')->insert([
                'id' => (int)$parts[0],
                'nev' => $parts[1],
                'kategoria' => $parts[2],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

