<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



use App\Http\Controllers\Controlador;

Route::get('/', [Controlador::class, 'index'])->name('principal');
Route::get('/identificacion', [Controlador::class, 'identificacion'])->name('identificacion');
Route::get('/registro', [Controlador::class, 'registro'])->name('registro');


Route::get('/misPrendas', [Controlador::class, 'misPrendas'])->name('misPrendas');
Route::get('/misConjuntos', [Controlador::class, 'misConjuntos'])->name('misConjuntos');



Route::get('/registrarPrenda', [Controlador::class, 'registrarPrenda'])->name('registrarPrenda');
Route::get('/registrarConjunto', [Controlador::class, 'registrarConjunto'])->name('registrarConjunto');



Route::get('/detalleConjunto/{id}', [Controlador::class, 'detalleConjunto'])->name('detalleConjunto');
Route::get('/detallePrenda/{id}', [Controlador::class, 'detallePrenda'])->name('detallePrenda');

Route::get('/editarConjunto/{id}', [Controlador::class, 'editarConjunto'])->name('editarConjunto');
Route::get('/editarPrenda/{id}', [Controlador::class, 'editarPrenda'])->name('editarPrenda');


Route::post('/registrarUsuarioAccion', [Controlador::class, 'registrarUsuarioAccion']);
Route::post('/identificarUsuarioAccion', [Controlador::class, 'identificarUsuarioAccion']);
Route::post('/registrarPrendaAccion', [Controlador::class, 'registrarPrendaAccion']);
Route::post('/registrarConjuntoAccion', [Controlador::class, 'registrarConjuntoAccion']);

Route::post('/editarConjuntoAccion', [Controlador::class, 'editarConjuntoAccion']);
Route::post('/editarPrendaAccion', [Controlador::class, 'editarPrendaAccion']);

Route::get('/eliminarPrendaAccion/{id}', [Controlador::class,"eliminarPrendaAccion"])->name("eliminarPrendaAccion");
Route::get('/eliminarConjuntoAccion/{id}', [Controlador::class,"eliminarConjuntoAccion"])->name("eliminarConjuntoAccion");
Route::get('/eliminarPrendaConjuntoAccion/{id}', [Controlador::class,"eliminarPrendaConjuntoAccion"])->name("eliminarPrendaConjuntoAccion");