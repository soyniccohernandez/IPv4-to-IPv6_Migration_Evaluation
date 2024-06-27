<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PreguntaController;
use App\Http\Controllers\RecomendacionController;
use App\Http\Controllers\UsuarioPreguntaController;
use App\Http\Controllers\UsuarioController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/admin', function () {
    return view('dashboardAdmin');
})->middleware(['auth', 'verified'])->name('dashboardAdmin');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/menu', [CategoriaController::class, 'index']);
Route::get('/fase/{id_fase}', [PreguntaController::class, 'listarPreguntas']);
Route::post('/matricular/fase',[UsuarioPreguntaController::class, 'matricularFase'])->name('matricularFase');
Route::get('/resultados/{id_usuarios}', [UsuarioPreguntaController::class, 'resultadosChat']);



Route::get('/resultados/reporte/email', [UsuarioPreguntaController::class, 'reporte']);
Route::get('/testReporte', [UsuarioPreguntaController::class, 'testReporte']);

Route::get('/preguntas/admin', [PreguntaController::class,'listarTotalPreguntas']);
Route::post('/preguntas/agregar_actualizar', [PreguntaController::class, 'agregarActualizarPregunta']);
Route::get('/preguntas/eliminar/{id}', [PreguntaController::class, 'eliminarPregunta']);


Route::get('/recomendaciones/admin', [RecomendacionController::class,'listarTotalRecomendaciones']);
Route::post('/recomendaciones/agregar_actualizar', [RecomendacionController::class, 'agregarActualizarRecomendacion']);
Route::get('/recomendaciones/eliminar/{id}', [RecomendacionController::class, 'eliminarRecomendacion']);


Route::get('/usuarios/admin', [UsuarioController::class,'listarUsuarios']);



require __DIR__.'/auth.php';
