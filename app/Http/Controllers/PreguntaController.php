<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pregunta;

class PreguntaController extends Controller
{
    public function listarPreguntas($id){
        $preguntas = Pregunta::where('categoria_id', $id)->get();

        return view('preguntas', ['preguntas' => $preguntas]);
    }
}
