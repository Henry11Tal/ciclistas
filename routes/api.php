<?php

use Illuminate\Http\Request;

use App\Http\Controllers\AutenticacionController;
use App\Http\Controllers\BloqueController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\SesionController;
use App\Http\Controllers\ResultadoController;
use App\Http\Controllers\SesionBloqueController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/api/register', [AutenticacionController::class, 'registerAPI'])->name('autenticacion.registerAPI');
Route::post('/api/login', [AutenticacionController::class, 'loginAPI'])->name('autenticacion.loginAPI');
Route::post('/api/logout', [AutenticacionController::class, 'logoutAPI'])->name('autenticacion.logoutAPI');

Route::get('/api/bloque', [BloqueController::class, 'listarBloquesAPI'])->name('bloque.listarBloquesAPI');
Route::post('/api/bloque/crear', [BloqueController::class, 'crearBloqueAPI'])->name('bloque.crearBloqueAPI');
Route::get('/api/bloque/{id}', [BloqueController::class, 'obtenerBloqueAPI'])->name('bloque.obtenerBloqueAPI');
Route::delete('/api/bloque/{id}', [BloqueController::class, 'borrarBloqueAPI'])->name('bloque.borrarBloqueAPI');

Route::get('/api/plan', [PlanController::class, 'listarPlanesAPI'])->name('plan.listarPlanesAPI');
Route::post('/api/plan/crear', [PlanController::class, 'crearPlanAPI'])->name('plan.crearPlanAPI');
Route::put('/api/plan/{id}', [PlanController::class, 'modificarPlanAPI'])->name('plan.modificarPlanAPI');
Route::delete('/api/plan/{id}', [PlanController::class, 'borrarPlanAPI'])->name('plan.borrarPlanAPI');

Route::get('/api/sesion', [SesionController::class, 'listarSesionesAPI'])->name('sesion.listarSesionesAPI');
Route::post('/api/sesion/crear', [SesionController::class, 'crearSesionAPI'])->name('sesion.crearSesionAPI');
Route::get('/api/sesion/{id}', [SesionController::class, 'obtenerSesionAPI'])->name('sesion.obtenerSesionAPI');
Route::delete('/api/sesion/{id}', [SesionController::class, 'borrarSesionAPI'])->name('sesion.borrarSesionAPI');

Route::post('/api/resultado/crear', [ResultadoController::class, 'crearResultadoAPI'])->name('resultado.crearResultadoAPI');
Route::get('/api/resultado/{id}', [ResultadoController::class, 'obtenerResultadoAPI'])->name('resultado.obtenerResultadoAPI');

Route::get('/api/sesionbloque', [SesionBloqueController::class, 'listarSesionBloqueAPI'])->name('sesionbloque.listarSesionBloqueAPI');
Route::post('/api/sesionbloque/crear', [SesionBloqueController::class, 'crearSesionBloqueAPI'])->name('sesionbloque.crearSesionBloqueAPI');
Route::delete('/api/sesionbloque/{id}', [SesionBloqueController::class, 'borrarSesionBloqueAPI'])->name('sesionbloque.borrarSesionBloqueAPI');
