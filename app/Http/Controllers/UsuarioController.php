<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsuarioController extends Controller
{
    public function listarUsuarios()
    {
        $usuarios = User::all();
        return view('admin.usuarios.index')->with('usuarios', $usuarios);
    }
}
