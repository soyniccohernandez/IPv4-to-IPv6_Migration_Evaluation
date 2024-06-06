<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@ucompensar.com',
            'password' => Hash::make('1234'),
            'role' => 1
        ]);
        
        $this->call([
            CategoriasTableSeeder::class,
            // Agregar otros seeders aquí
        ]);
    }
}
