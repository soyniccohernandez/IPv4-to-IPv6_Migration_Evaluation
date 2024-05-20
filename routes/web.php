<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PreguntaController;
use App\Http\Controllers\UsuarioPreguntaController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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




require __DIR__.'/auth.php';
