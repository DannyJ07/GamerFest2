<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//Route Hooks - Do not delete//
	Route::view('tipopgs', 'livewire.tipopgs.index')->middleware('auth');
	Route::view('participantes', 'livewire.participantes.index')->middleware('auth');
	Route::view('inscripcionis', 'livewire.inscripcionis.index')->middleware('auth');
	Route::view('inscripciongs', 'livewire.inscripciongs.index')->middleware('auth');
	Route::view('equipos', 'livewire.equipos.index')->middleware('auth');
	Route::view('modos', 'livewire.modos.index')->middleware('auth');
	Route::view('juegos', 'livewire.juegos.index')->middleware('auth');
	Route::view('categorias', 'livewire.categorias.index')->middleware('auth');
    Route::view('tipopgs', 'livewire.tipopgs.index')->middleware('auth');
