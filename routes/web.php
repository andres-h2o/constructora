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
    return view('auth/login');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('bloque/listar/{id_proyecto}', 'BloqueController@listar')->name('bloque.listar');
Route::get('puesto/listar/{id_bloque}', 'PuestoController@listar')->name('puesto.listar');
Route::get('puesto/reservado/{id_puesto}', 'PuestoController@reservadoVer');
Route::get('puesto/vendido/{id_puesto}', 'PuestoController@vendidoVer');
Route::get('puesto/bloqueado/{id_puesto}', 'PuestoController@bloqueadoVer');
Route::get('puesto/libre/{id_puesto}', 'PuestoController@libreVer');
Route::get('reserva/nueva/{id_puesto}/{id_proyecto}', 'ReservaController@nuevaReserva');
Route::post('reserva/guardar/{id_puesto}/{id_proyecto}', 'ReservaController@guardarReserva')->name('reserva.guardar');
Route::get('bloqueo/nuevo/{id_puesto}/{id_proyecto}', 'BloqueoController@nuevoBloqueo');
Route::post('bloqueo/guardar/{id_puesto}', 'BloqueoController@guardarBloqueo');
Route::post('reserva/actualizar/{id_reserva}', 'ReservaController@actualizarReserva')->name('reserva.actualizar');
Route::post('json-clientes', 'ClienteController@clientesVendedor');


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
Route::resource('grupo', 'GrupoController');
Route::resource('cliente', 'ClienteController');