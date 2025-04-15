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
        // Suppresion d'une colonne
        Schema::table('paniers', function (Blueprint $table) {
            $table->dropForeign(['vol_id']);
            $table->dropColumn('vol_id');
        });

        // Création de la table panier_vol car N:N
        Schema::create('panier_vol', function (Blueprint $table) {
            $table->foreignId('panier_id')->constrained('paniers');
            $table->foreignId('vol_id')->constrained('vols'); 
            $table->primary(['panier_id', 'vol_id']);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Rétablir la colonne supprimée
        Schema::table('paniers', function (Blueprint $table) {
            $table->string('vol_id'); // Recrée la colonne supprimée
        });

        // Suppression de la table panier_vol
        Schema::dropIfExists('panier_vol');
    }
};
