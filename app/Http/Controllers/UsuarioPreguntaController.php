<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pregunta;
use App\Models\UsuarioPregunta;
use Illuminate\Support\Facades\Auth;

class UsuarioPreguntaController extends Controller
{

    public function matricularFase(Request $request)
    {
        $usuario = Auth::user();

        $matriz = json_decode($request->matricularFase_data);



        foreach ($matriz as $elemento) {
            // $elemento ahora contiene cada subarreglo [1, "5"], [2, "2"], [3, "3"]
            // Accede a cada valor dentro del subarreglo
            $primerValor = $elemento[0]; // Primer valor (por ejemplo, 1, 2, 3)
            $segundoValor = $elemento[1]; // Segundo valor (por ejemplo, "5", "2", "3")

            $nuevaRespuesta = new UsuarioPregunta();

            $nuevaRespuesta->usuario_id = $usuario->id; // Asignar el id del usuario autenticado
            $nuevaRespuesta->pregunta_id = $primerValor; // Asignar el primer valor del subarreglo
            $nuevaRespuesta->respuesta = $segundoValor; // Asignar el segundo valor del subarreglo
            $nuevaRespuesta->estado = 0;

            // Guardar la nueva respuesta en la base de datos
            $nuevaRespuesta->save();
           
        }

        return redirect('/menu')->with('mensaje', '¡Excelente! Has terminado una fase de la evaluación para la migración a IPV6');
    }

}
