<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\UsuariosCategoria;
use Illuminate\Support\Facades\Auth;



class CategoriaController extends Controller
{
    public function index()
    {
        $usuario = Auth::user();
        $usuarioId = $usuario->id;

        
        $categorias = $categorias = Categoria::leftJoin('usuarios_categoria', function($join) use ($usuarioId) {
            $join->on('categorias.id', '=', 'usuarios_categoria.categoria_id')
                 ->where('usuarios_categoria.usuario_id', '=', $usuarioId);
        })
        ->select('categorias.id', 'categorias.descripcion', 'usuarios_categoria.estado', 'usuarios_categoria.usuario_id')
        ->get();


        // dd($categorias);
    

        $recuento = UsuariosCategoria::where('usuario_id', $usuarioId)->get();  


        return view('menu', ['categorias' => $categorias, 'recuento' => $recuento]);
    } 
}
