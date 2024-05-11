<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriasTableSeeder extends Seeder
{
    public function run()
    {
        $categorias = [
            ['descripcion' => 'Hardware'],
            ['descripcion' => 'Software'],
            ['descripcion' => 'Planeación'],
            ['descripcion' => 'Implementación'],
            ['descripcion' => 'Capacitación'],
        ];

        // Iterar sobre el arreglo de categorías y crear registros en la base de datos
        foreach ($categorias as $categoria) {
            Categoria::create($categoria);
        }
    }
}
