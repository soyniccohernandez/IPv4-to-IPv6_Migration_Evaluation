<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Pregunta;

class PreguntaController extends Controller
{
    public function listarPreguntas($id){

        $categoria = Categoria::find($id);
        $preguntas = Pregunta::where('categoria_id', $id)->get();

        return view('preguntas', ['preguntas' => $preguntas, 'categoria' => $categoria]);
    }
}
