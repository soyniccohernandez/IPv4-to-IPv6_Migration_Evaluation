<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('recomendaciones', function (Blueprint $table) {
            $table->id(); // Clave primaria autoincremental (equivalente a `increments('id')`)
            $table->unsignedBigInteger('id_categoria'); // Clave foránea (tipo de dato recomendado para claves foráneas)
             // Texto grande para la recomendación
             $table->text('recomendacion');

            // Definir la clave foránea
            $table->foreign('id_categoria')->references('id')->on('categorias');

            $table->timestamps(); // Campos de timestamps (`created_at` y `updated_at`)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recomendaciones');
    }
};
