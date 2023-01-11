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

//Rutas para los pdfs de Equipo
Route::get('downloadEquipo', [App\Http\Livewire\Equipos::class, 'index1'])->name('downloadEquipo-pdf');
Route::get('downloadEquipo-pdf', [App\Http\Livewire\Equipos::class, 'index'])->name('downloadEquipo-pdf');

//Rutas para los pdfs de Juego
Route::get('downloadJuego', [App\Http\Livewire\Juegos::class, 'reporte'])->name('downloadJuego-pdf');
Route::get('downloadJuego-pdf', [App\Http\Livewire\Juegos::class, 'pdfReporte'])->name('downloadJuego-pdf');

//Rutas para los pdfs de Actividades
Route::get('downloadActividade', [App\Http\Livewire\Actividades::class, 'reporte'])->name('downloadActividade-pdf');
Route::get('downloadActividade-pdf', [App\Http\Livewire\Actividades::class, 'descargarReporte'])->name('downloadActividade-pdf');

//Rutas para los pdfs de inscripciones Individuales
Route::get('downloadInscripcioni', [App\Http\Livewire\Inscripcionis::class, 'reporte'])->name('downloadInscripcioni-pdf');
Route::get('downloadInscripcioni-pdf', [App\Http\Livewire\Inscripcionis::class, 'pdfReporte'])->name('downloadInscripcioni-pdf');

//Rutas para los pdfs de Inscripciones Grupales
Route::get('downloadInsGrup', [App\Http\Livewire\Inscripciongs::class, 'insGrup'])->name('downloadInsGrup-pdf');
Route::get('downloadInsGrup-pdf', [App\Http\Livewire\Inscripciongs::class, 'pdfInsGrup'])->name('downloadInsGrup-pdf');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
});


//Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth');

//Route Hooks - Do not delete//
	Route::view('actividades', 'livewire.actividades.index')->middleware('auth');
	Route::view('productos', 'livewire.productos.index')->middleware('auth');
	Route::view('tipopgs', 'livewire.tipopgs.index')->middleware('auth');
	Route::view('participantes', 'livewire.participantes.index')->middleware('auth');
	Route::view('inscripcionis', 'livewire.inscripcionis.index')->middleware('auth');
	Route::view('inscripciongs', 'livewire.inscripciongs.index')->middleware('auth');
	Route::view('equipos', 'livewire.equipos.index')->middleware('auth');
	Route::view('modos', 'livewire.modos.index')->middleware('auth');
	Route::view('juegos', 'livewire.juegos.index')->middleware('auth');
	Route::view('categorias', 'livewire.categorias.index')->middleware('auth');
    Route::view('tipopgs', 'livewire.tipopgs.index')->middleware('auth');
