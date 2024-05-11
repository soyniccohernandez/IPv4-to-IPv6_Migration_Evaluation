<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $fillable = ['descripcion'];

    public function preguntas()
    {
        return $this->hasMany(Pregunta::class, 'categoria_id');
    }
}
