<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\UsuarioPregunta;

class UsuarioController extends Controller
{
    public function listarUsuarios()
    {
        $usuarios = User::all();
        return view('admin.usuarios.index')->with('usuarios', $usuarios);
    }

    public function actualizarClave(Request $request)
    {


        // Buscar al usuario por su ID
        $user = User::findOrFail($request->idUsuario);

        // Actualizar la contraseña encriptada
        $user->password = bcrypt($request->inputConfirmacionNuevaClave);
        // Guardar los cambios
        $user->save();

        // Cerrar todas las sesiones del usuario
        // Invalidar todas las sesiones del usuario
        DB::table('sessions')->where('user_id', $user->id)->delete();

        return redirect('/usuarios/admin')->with('mensaje', '¡Excelente! Contraseña actualizada correctamente.');
    }

    public function resetearUsuario($id)
    {
        DB::table('usuarios_categoria')->where('usuario_id', $id)->delete();
        DB::table('usuarios_preguntas')->where('usuario_id', $id)->delete();
        DB::table('sessions')->where('user_id', $id)->delete();
        return redirect('/usuarios/admin')->with('mensaje', '¡Excelente! El usuario se restablecio correctamente.');
    }

    public function detalladoRespuestas($id)
    {
        $usuario = User::findOrFail($id);
        $resultadoPregunta = DB::table('users as u')
            ->join('usuarios_preguntas as up', 'u.id', '=', 'up.usuario_id')
            ->join('preguntas as p', 'up.pregunta_id', '=', 'p.id')
            ->select('u.name', 'p.descripcion','p.ponderacion', 'p.respuesta as Respuesta_Esperada', 'up.respuesta as Respuesta_Usuario')
            ->where('u.id', $id)
            ->get();
        return view('admin/usuarios/respuestas')->with('respuestas', $resultadoPregunta)->with('usuario', $usuario);
    }
}
