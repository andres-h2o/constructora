<?php

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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('proyecto', 'ProyectoController');
Route::resource('modulo', 'ModuloController');
Route::resource('bloque', 'BloqueController');
Route::resource('categoria', 'CategoriaController');
Route::resource('puesto', 'PuestoController');
Route::resource('coordinador', 'CoordinadorController');
Route::resource('grupo', 'GrupoController');
Route::resource('vendedor', 'VendedorController');
Route::resource('mes', 'MesController');
Route::resource('tipo-reserva', 'TipoReservaController');
Route::resource('tipo-venta', 'TipoVentaController');
Route::resource('reserva', 'ReservaController');
Route::resource('venta', 'VentaController');
Route::resource('bloqueo', 'BloqueoController');
Route::resource('proyecto', 'ProyectoController');
Route::resource('proyecto', 'ProyectoController');
Route::resource('modulo', 'ModuloController');
Route::resource('bloque', 'BloqueController');
Route::resource('puesto', 'PuestoController');
Route::resource('vendedor', 'VendedorController');
Route::resource('mes', 'MesController');
Route::resource('bloqueo', 'BloqueoController');