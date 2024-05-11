<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UsuarioPregunta;

class Pregunta extends Model
{
    use HasFactory;
    protected $fillable = ['descripcion', 'ponderacion', 'categoria_id'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function respuestasUsuarios()
    {
        return $this->hasMany(UsuarioPregunta::class, 'pregunta_id');
    }
}
