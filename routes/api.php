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

Route::post('/register', [AutenticacionController::class, 'registerAPI'])->name('autenticacion.registerAPI');
Route::post('/login', [AutenticacionController::class, 'loginAPI'])->name('autenticacion.loginAPI');
Route::post('/logout', [AutenticacionController::class, 'logoutAPI'])->name('autenticacion.logoutAPI');

Route::get('/bloque', [BloqueController::class, 'listarBloquesAPI'])->name('bloque.listarBloquesAPI');
Route::post('/bloque/crear', [BloqueController::class, 'crearBloqueAPI'])->name('bloque.crearBloqueAPI');
Route::get('/bloque/{id}', [BloqueController::class, 'obtenerBloqueAPI'])->name('bloque.obtenerBloqueAPI');
Route::delete('/bloque/{id}', [BloqueController::class, 'borrarBloqueAPI'])->name('bloque.borrarBloqueAPI');

Route::get('/plan', [PlanController::class, 'listarPlanesAPI'])->name('plan.listarPlanesAPI');
Route::post('/plan/crear', [PlanController::class, 'crearPlanAPI'])->name('plan.crearPlanAPI');
Route::put('/plan/{id}', [PlanController::class, 'modificarPlanAPI'])->name('plan.modificarPlanAPI');
Route::delete('/plan/{id}', [PlanController::class, 'borrarPlanAPI'])->name('plan.borrarPlanAPI');

Route::get('/sesion', [SesionController::class, 'listarSesionesAPI'])->name('sesion.listarSesionesAPI');
Route::post('/sesion/crear', [SesionController::class, 'crearSesionAPI'])->name('sesion.crearSesionAPI');
Route::get('/sesion/{id}', [SesionController::class, 'obtenerSesionAPI'])->name('sesion.obtenerSesionAPI');
Route::delete('/sesion/{id}', [SesionController::class, 'borrarSesionAPI'])->name('sesion.borrarSesionAPI');

Route::post('/resultado/crear', [ResultadoController::class, 'crearResultadoAPI'])->name('resultado.crearResultadoAPI');
Route::get('/resultado/{id}', [ResultadoController::class, 'obtenerResultadoAPI'])->name('resultado.obtenerResultadoAPI');

Route::get('/sesionbloque', [SesionBloqueController::class, 'listarSesionBloqueAPI'])->name('sesionbloque.listarSesionBloqueAPI');
Route::post('/sesionbloque/crear', [SesionBloqueController::class, 'crearSesionBloqueAPI'])->name('sesionbloque.crearSesionBloqueAPI');
Route::delete('/sesionbloque/{id}', [SesionBloqueController::class, 'borrarSesionBloqueAPI'])->name('sesionbloque.borrarSesionBloqueAPI');
