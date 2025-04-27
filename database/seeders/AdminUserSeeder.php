<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ajouter un admin par défaut
        User::create([
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
}
