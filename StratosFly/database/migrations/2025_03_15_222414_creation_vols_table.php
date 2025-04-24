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
        Schema::create("vols", function (Blueprint $table) {
            $table->id();
            // constrained : vérifie les si les valeurs sont valides.
            // onDelete : Si je supprime un aeroport, les vols associés seront supprimés.
            $table->foreignId("aeroport_depart_id")->constrained("aeroports")->onDelete('cascade');
            $table->foreignId("aeroport_arrivee_id")->constrained("aeroports")->onDelete('cascade');
            $table->dateTime("date_depart");
            $table->dateTime("date_arrivee");
            $table->integer("nb_places");
            $table->integer('places_totales');
            $table->integer("prix");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("vols");
    }
};
