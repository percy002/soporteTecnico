<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\MantenimientoController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\HTMLPDFController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::get('responsables', function () {
    return view('responsables');
});

Route::get('reporte', [HTMLPDFController::class, 'createPDF']);

Route::get('personas/{id}/habilitar', [PersonaController::class, 'habilitar']);
Route::get('personas/{id}/desabilitar', [PersonaController::class, 'desabilitar']);

Route::get('mantenimiento/{id}/habilitar', [MantenimientoController::class, 'habilitar']);
Route::get('mantenimiento/{id}/desabilitar', [MantenimientoController::class, 'desabilitar']);

Route::get('equipos/CPU', function () {
    return view('equipo/modal/CPU');
});
Route::get('equipos/laptop', function () {
    return view('equipo/modal/laptop');
});
Route::get('equipos/monitor', function () {
    return view('equipo/modal/monitor');
});
Route::get('equipos/mouse', function () {
    return view('equipo/modal/mouse');
});
Route::get('equipos/parlante', function () {
    return view('equipo/modal/parlante');
});
Route::get('equipos/teclado', function () {
    return view('equipo/modal/teclado');
});
Route::get('equipos/trabajador', function () {
    return view('equipo/modal/trabajador');
});

Route::resource('equipos', EquipoController::class);
// Route::resource('caracteristicas', CaracteristicaController::class);
Route::resource('mantenimientos', MantenimientoController::class);
Route::resource('historiales', HistorialController::class);
Route::resource('personas', PersonaController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
