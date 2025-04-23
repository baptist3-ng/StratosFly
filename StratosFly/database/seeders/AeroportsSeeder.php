<?php

namespace Database\Seeders;

use App\Models\Aeroport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AeroportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Aeroport::insert([
                ['nom' => 'Aéroport Francisco Sá Carneiro, Portugal.', 'ville' => 'Porto', 'created_at' => now(),'updated_at' => now()],
                ['nom' => 'Aéroport international de Budapest Ferenc Liszt, Hongrie.', 'ville' => 'Budapest' ,'created_at' => now(),'updated_at' => now()],
                ['nom' => 'Aéroport Roissy Charles de Gaulle, France.', 'ville' => 'Roissy', 'created_at'=> now(),'updated_at'=> now()],
                ['nom' => 'Aéroport international de Santiago du Chili, Chili.', 'ville' => 'Santiago', 'created_at'=> now(),'updated_at'=> now()],
            ]);
    }
}
