<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('aeroports')->insert([
            ['nom' => 'Aéroport Francisco Sá Carneiro, Portugal.', 'ville' => 'Porto', 'created_at' => now(),'updated_at' => now()],
            ['nom' => 'Aéroport international de Budapest Ferenc Liszt, Hongrie.', 'ville' => 'Budapest' ,'created_at' => now(),'updated_at' => now()],
            ['nom' => 'Aéroport Roissy Charles de Gaulle, France.', 'ville' => 'Roissy', 'created_at'=> now(),'updated_at'=> now()],
            ['nom' => 'Aéroport international de Santiago du Chili, Chili.', 'ville' => 'Santiago', 'created_at'=> now(),'updated_at'=> now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Suppression via la ville
        DB::table('aeroports')->whereIn('ville', [
            'Porto',
            'Budapest',
            'Roissy',
            'Santiago'
        ])->delete();
    }
};
