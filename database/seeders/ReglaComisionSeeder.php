<?php

namespace Database\Seeders;

use App\Models\ReglaComision;
use Illuminate\Database\Seeder;

class ReglaComisionSeeder extends Seeder
{
    public function run(): void
    {
        ReglaComision::updateOrCreate(
            ['umbral' => 500],
            ['porcentaje' => 8]
        );

        ReglaComision::updateOrCreate(
            ['umbral' => 600],
            ['porcentaje' => 6]
        );

        ReglaComision::updateOrCreate(
            ['umbral' => 800],
            ['porcentaje' => 10]
        );

        ReglaComision::updateOrCreate(
            ['umbral' => 1000],
            ['porcentaje' => 15]
        );
    }
}