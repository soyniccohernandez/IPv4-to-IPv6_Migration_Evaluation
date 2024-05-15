<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recomendacion extends Model
{
    use HasFactory;
    protected $table = 'recomendaciones'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'id_categoria',
        'recomendacion',
    ]; // Campos que se pueden asignar masivamente

    // Definir la relación con la categoría (una recomendación pertenece a una categoría)
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }
}
