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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('prenom');
            $table->string('role')->default('User');
            //$table->foreignId('passager_id')->constrained('passagers');
            $table->string('genre');
        });

        // Ajouter un admin par défaut
        DB::table('users')->insert([
            'name' => 'admin',
            'prenom'=>'admin',
            'genre'=>'M',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin123'),
            'role' => 'Admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('prenom');
            $table->dropColumn('role');
            //$table->dropColumn('passager_id');
            $table->dropColumn('genre');
        });
    }
};
