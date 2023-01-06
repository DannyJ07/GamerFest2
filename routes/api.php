<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Livewire\Equipos;
use \App\Http\Livewire\Juegos;
use \App\Http\Livewire\Categorias;
use \App\Http\Livewire\Inscripcionis;
use \App\Http\Livewire\Participantes;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource(name:'listarEquipo', controller: Equipos::class);
Route::apiResource(name:'listarInscripciongs', controller: Equipos::class);
Route::apiResource(name:'listarInscripcionis', controller: Equipos::class);
Route::apiResource(name:'listarModos', controller: Equipos::class);
Route::apiResource(name:'listarProductos', controller: Equipos::class);
Route::apiResource(name:'listarTipopgs', controller: Equipos::class);
Route::apiResource(name:'listarJuego',controller: Juegos::class);
Route::apiResource(name:'listarCategorias',controller: Categorias::class);
Route::apiResource(name:'listarActividades',controller: Actividades::class);
Route::apiResource(name:'listarParticipantes',controller: Participantes::class);
