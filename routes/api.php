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

Route::apiResource(name: 'enpie', controller: Equipos::class);
Route::apiResource(name:'antiguedad',controller: Equipos::class);
Route::apiResource(name:'Tips',controller: Juegos::class);
Route::apiResource(name:'CosasMeta',controller: Juegos::class);
Route::apiResource(name:'JuegosSimilares',controller: Juegos::class);
Route::apiResource(name:'CantidadJugadores',controller: Juegos::class);
Route::apiResource(name:'tendencias',controller: Categorias::class);
Route::apiResource(name:'relevancia',controller: Categorias::class);
Route::apiResource(name:'pjrandom',controller: Inscripcionis::class);
Route::apiResource(name:'enpie',controller: Participantes::class);
