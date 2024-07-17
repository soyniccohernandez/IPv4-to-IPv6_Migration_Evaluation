<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pregunta;
use App\Models\UsuarioPregunta;
use App\Models\User;
use App\Models\UsuariosCategoria;
use App\Models\Categoria;
use App\Models\Recomendacion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReporteResultados;


class UsuarioPreguntaController extends Controller
{

    public function matricularFase(Request $request)
    {

        $usuario = Auth::user();


        $categoria = $request->categoria_id;

        $matriz = json_decode($request->matricularFase_data);

        $preguntas = Pregunta::all();

        $respuestasAprobadas = 0;


        // dump($pregunta->respuesta);   

        foreach ($matriz as $elemento) {
            // $elemento ahora contiene cada subarreglo [1, "5"], [2, "2"], [3, "3"]
            // Accede a cada valor dentro del subarreglo
            $primerValor = $elemento[0]; // Primer valor (por ejemplo, 1, 2, 3)
            $segundoValor = $elemento[1]; // Segundo valor (por ejemplo, "5", "2", "3")

            $nuevaRespuesta = new UsuarioPregunta();
            $nuevaRespuesta->estado = 0;
            foreach ($preguntas as $pregunta) {
                if ($pregunta->id == $primerValor) {
                    if ($segundoValor >= $pregunta->respuesta) {
                        $nuevaRespuesta->estado = 1;
                        $respuestasAprobadas++;
                    } else {
                        $nuevaRespuesta->estado = 0;
                    }
                }
            }



            $nuevaRespuesta->usuario_id = $usuario->id; // Asignar el id del usuario autenticado
            $nuevaRespuesta->pregunta_id = $primerValor; // Asignar el primer valor del subarreglo
            $nuevaRespuesta->respuesta = $segundoValor; // Asignar el segundo valor del subarreglo


            // Guardar la nueva respuesta en la base de datos
            $nuevaRespuesta->save();
        }


        // dd('d');


        $preguntasCategoria = Pregunta::where('categoria_id', $categoria)->get();


        // if($respuestasAprobadas >= intval(ceil((count($preguntasCategoria)/2) + 1))){

        // }else{
        //     $aprobadoCategoria  = 0;
        // }

        $aprobadoCategoria  = ($respuestasAprobadas / count($preguntasCategoria)) * 100;





        UsuariosCategoria::create([
            'usuario_id' => $usuario->id,
            'categoria_id' => $categoria,
            'aprobado' => $aprobadoCategoria,
            'estado' => 1
        ]);


        return redirect('/menu')->with('mensaje', '¡Excelente! Has terminado una fase de la evaluación para la migración a IPV6');
    }


    public function resultadosChat($id)
    {

        $resultados = Categoria::select('categorias.descripcion', 'usuarios_categoria.aprobado', 'categorias.id')
            ->join('usuarios_categoria', 'categorias.id', '=', 'usuarios_categoria.categoria_id')
            ->where('usuarios_categoria.usuario_id', $id)
            ->get();

        $recomendaciones = Recomendacion::all();

        return view('/resultados', ['resultados' => $resultados, 'recomendaciones' => $recomendaciones]);
    }

    public function reporte()
    {

        $calificaciones = UsuariosCategoria::where('usuario_id', Auth::id())->get();
        $recomendaciones = [];

        foreach ($calificaciones as $calificacion) {
            // dump($calificacion->aprobado);
            // dump($recomendaciones);
            if ($calificacion->aprobado < 51) {
                $recomendacion = Recomendacion::where('id_categoria', $calificacion->categoria_id)->get();
                foreach ($recomendacion as $rec) {
                    array_push($recomendaciones, $rec);
                }
            }
        }

        // dd($recomendaciones[0]->id);

        $email = Auth::user()->email;
        Mail::to('ericknicolashernandezdiaz@gmail.com')->send(new ReporteResultados($recomendaciones));
        Auth::logout();
        // Almacena el mensaje en la sesión
        return redirect('/')->with('mensaje', 'Recomendaciones enviadas. Revisa tu email para buenas prácticas en tu proceso de migración.');

    }



    public function testReporte()
    {

        // return "Hola desde Test reporte";
        $calificaciones = UsuariosCategoria::where('usuario_id', Auth::id())->get();
        $recomendaciones = [];

        foreach ($calificaciones as $calificacion) {
            // dump($calificacion->aprobado);
            // dump($recomendaciones);
            if ($calificacion->aprobado < 51) {
                $recomendacion = Recomendacion::where('id_categoria', $calificacion->categoria_id)->get();
                foreach ($recomendacion as $rec) {
                    array_push($recomendaciones, $rec);
                }
            }
        }

        return view('/emailRecomendaciones', ['recomendaciones' => $recomendaciones]);
    }
}
