<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index()
    {
        // Lógica para mostrar todas las categorías, por ejemplo:
        $categorias = Categoria::all();

        return view('menu', ['categorias' => $categorias]);
    }

    
    
}
