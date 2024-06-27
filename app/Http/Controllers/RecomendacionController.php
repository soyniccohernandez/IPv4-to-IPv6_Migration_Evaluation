<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Recomendacion;

class RecomendacionController extends Controller
{

    public function listarRecomendacion($id)
    {

        $categoria = Categoria::find($id);
        $recomendaciones = Recomendacion::where('id_categoria', $id)->get();

        return view('recomendaciones', ['recomendaciones' => $recomendaciones, 'categoria' => $categoria]);
    }

    public function listarTotalRecomendaciones(Request $request)
    {
        $recomendaciones = Recomendacion::join('categorias', 'recomendaciones.id_categoria', '=', 'categorias.id')
            ->select('recomendaciones.id', 'recomendaciones.id_categoria', 'categorias.descripcion as categoria', 'recomendaciones.recomendacion')
            ->get();
        $categorias = Categoria::all();
        return view('admin.recomendaciones.index')->with('recomendaciones', $recomendaciones)->with('categorias', $categorias);
    }

    public function agregarActualizarRecomendacion(Request $request)
    {

        if ($request->operacion_formulario == 1) {
            $recomendacion = new Recomendacion();

            $recomendacion->recomendacion = $request->inputRecomendacion;
            $recomendacion->id_categoria = $request->inputCategoria;
            $recomendacion->save();

            return redirect('/recomendaciones/admin')->with('mensaje', '¡Excelente! Recomendación matriculada correctamente');


        } else if ($request->operacion_formulario == 2) {
            $recomendacion = Recomendacion::findOrFail($request->inputId);
            $recomendacion->recomendacion = $request->inputRecomendacion;
            $recomendacion->id_categoria = $request->inputCategoria;
            $recomendacion->save();

            return redirect('/recomendaciones/admin')->with('mensaje', '¡Excelente! Recomendación actualizada correctamente');
        }
    }

    public function eliminarRecomendacion($id)
    {
        $recomendacion = Recomendacion::findOrFail($id);
        $recomendacion->delete();
        return redirect('/recomendaciones/admin')->with('mensaje', '¡Excelente! Recomendación eliminada correctamente');
    }
}
