<?php

namespace Database\Seeders;

use App\Models\ReglaComision;
use Illuminate\Database\Seeder;

class ReglaComisionSeeder extends Seeder
{
    public function run(): void
    {
        ReglaComision::create([
            'umbral' => 500,
            'porcentaje' => 8,
        ]);

        ReglaComision::create([
            'umbral' => 600,
            'porcentaje' => 6,
        ]);

        ReglaComision::create([
            'umbral' => 800,
            'porcentaje' => 10,
        ]);

        ReglaComision::create([
            'umbral' => 1000,
            'porcentaje' => 15,
        ]);
    }
}