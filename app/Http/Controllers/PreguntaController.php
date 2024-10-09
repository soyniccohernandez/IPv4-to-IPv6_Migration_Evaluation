<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Pregunta;

class PreguntaController extends Controller
{
    public function listarPreguntas($id)
    {

        $categoria = Categoria::find($id);
        $preguntas = Pregunta::where('categoria_id', $id)->get();

        return view('preguntas', ['preguntas' => $preguntas, 'categoria' => $categoria]);
    }

    public function listarTotalPreguntas()
    {
        $preguntas = Pregunta::join('categorias', 'preguntas.categoria_id', '=', 'categorias.id')
            ->select('preguntas.id', 'preguntas.descripcion', 'preguntas.ponderacion', 'preguntas.categoria_id', 'categorias.descripcion as categoria', 'preguntas.respuesta')
            ->get();
        $categorias = Categoria::all();
        return view('admin.preguntas.index')->with('preguntas', $preguntas)->with('categorias', $categorias);
    }

    public function agregarActualizarPregunta(Request $request)
    {

        // Definir las reglas de validación
        $rules = [
            'inputDescripcion' => 'required|string|max:255',
            'inputPonderacion' => 'required',
            'inputCategoria' => 'required|exists:categorias,id', // Verifica que la categoría exista
            'inputRespuesta' => 'required|string|max:500',
        ];

        // Mensajes personalizados de error
        $messages = [
            'inputDescripcion.required' => 'La descripción es obligatoria.',
            'inputPonderacion.required' => 'La ponderación es obligatoria.',
            'inputCategoria.required' => 'Debe seleccionar una categoría válida.',
            'inputRespuesta.required' => 'La respuesta es obligatoria.',
        ];

        // Validar la solicitud
        $request->validate($rules, $messages);

        if ($request->operacion_formulario == 1) {
            $pregunta = new Pregunta();
            $pregunta->descripcion = $request->inputDescripcion;
            $pregunta->ponderacion = $request->inputPonderacion;
            $pregunta->categoria_id = $request->inputCategoria;
            $pregunta->respuesta = $request->inputRespuesta;
            $pregunta->save();

            return redirect('/preguntas/admin')->with('mensaje', '¡Excelente! Pregunta matriculada correctamente');
        } else if ($request->operacion_formulario == 2) {
            $pregunta = Pregunta::findOrFail($request->inputId);
            $pregunta->descripcion = $request->inputDescripcion;
            $pregunta->ponderacion = $request->inputPonderacion;
            $pregunta->categoria_id = $request->inputCategoria;
            $pregunta->respuesta = $request->inputRespuesta;
            $pregunta->save();

            return redirect('/preguntas/admin')->with('mensaje', '¡Excelente! Pregunta actualizada correctamente');
        }
    }

    public function eliminarPregunta($id)
    {
        $pregunta = Pregunta::findOrFail($id);
        $pregunta->delete();
        return redirect('/preguntas/admin')->with('mensaje', '¡Excelente! Pregunta eliminada correctamente');
    }
}
