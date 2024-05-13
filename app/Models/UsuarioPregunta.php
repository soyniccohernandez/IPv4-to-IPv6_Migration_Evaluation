<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UsuarioPregunta extends Model
{
    use HasFactory;
    protected $table = 'usuarios_preguntas';
    protected $fillable = ['usuario_id', 'pregunta_id', 'respuesta', 'estado'];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class);
    }
}
