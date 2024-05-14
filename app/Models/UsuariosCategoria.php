<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuariosCategoria extends Model
{
    use HasFactory;

    protected $table = 'usuarios_categoria';

    protected $fillable = [
        'usuario_id',
        'categoria_id',
        'estado'
    ];

    // Definir la relación con el modelo User (Usuario)
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    // Definir la relación con el modelo Categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
