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
Route::get('puesto/buscar', 'PuestoController@vistaBuscar');
Route::get('puesto/encontrar', 'PuestoController@encontrar');
Route::get('reserva/nueva/{id_puesto}/{id_proyecto}', 'ReservaController@nuevaReserva');
Route::post('reserva/guardar/{id_puesto}/{id_proyecto}', 'ReservaController@guardarReserva')->name('reserva.guardar');
Route::get('bloqueo/nuevo/{id_puesto}/{id_proyecto}', 'BloqueoController@nuevoBloqueo');
Route::post('bloqueo/guardar/{id_puesto}', 'BloqueoController@guardarBloqueo');
Route::post('reserva/actualizar/{id_reserva}', 'ReservaController@actualizarReserva')->name('reserva.actualizar');
Route::post('venta/actualizar/{id_venta}', 'VentaController@actualizarVenta');
Route::post('bloqueo/actualizar/{id_bloqueo}', 'BloqueoController@actualizarBloqueo');
Route::get('mes/ver/{id_proyecto}', 'MesController@verMeses');
Route::get('mes/nuevo/{id_mes}', 'MesController@nuevo');
Route::post('mes/guardar/{id_mes}', 'MesController@guardar');
Route::get('mes/imprimir/{id_mes}', 'MesController@informeGeneral');
Route::get('mes/top-proyectos', 'MesController@topProyectos');
Route::get('mes/ver-top/{id_proyecto}', 'MesController@verMesesTop');
Route::get('mes/informe-proyecto/{id_proyecto}', 'MesController@pdfProyecto');
Route::get('mes/ver-top-diario/{id_proyecto}', 'MesController@verTopDiario');
Route::get('mes/ver-top-proyecto/{id_proyecto}', 'MesController@irTopProyecto');
Route::get('mes/top/{id_mes}', 'MesController@irTop');
Route::post('json-clientes', 'ClienteController@clientesVendedor');
Route::get('cliente/ver-puestos/{id_cliente}', 'ClienteController@verPuestos');


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

//WEB SERVICES
Route::get('vendedor/validar/{id}/{ci}', 'WebServicesController@validarVendedor')->name('vendedor.validar');
Route::get('vendedor/estado/{id}', 'WebServicesController@estadoVendedor');
Route::get('venta/previo/{id_puesto}', 'WebServicesController@datosVenderPuesto')->name('venta.previo');
Route::get('modulos/{id_proyecto}', 'WebServicesController@modulos');
Route::get('bloques/{id_modulo}', 'WebServicesController@bloques');
Route::get('puestos/{id_bloque}', 'WebServicesController@puestos');
Route::get('vender/{id_vendedor}/{id_cliente}/{id_puesto}/{monto}/{id_tipoVenta}', 'WebServicesController@vender');
Route::get('vender-reservado/{id_vendedor}/{id_reserva}/{monto}/{id_tipoVenta}', 'WebServicesController@venderReservado');
Route::get('vender/bloqueado/{id_vendedor}/{id_bloqueo}/{id_cliente}/{monto}/{id_tipoVenta}', 'WebServicesController@venderBloqueado');
Route::get('reservar/{id_vendedor}/{id_cliente}/{id_puesto}/{monto}/{id_tipoReserva}', 'WebServicesController@reservar');
Route::get('reservasVer/{id_vendedor}', 'WebServicesController@reservas');
Route::get('ventasVer/{id_vendedor}', 'WebServicesController@ventas');
Route::get('cliente/guardar/{nombre}/{ci}/{telefono}/{direccion}/{id_vendedor}', 'WebServicesController@guardarCliente');
Route::get('cliente/listar/{id_vendedor}', 'WebServicesController@listarClientes');
Route::get('cliente/listardos/{id_vendedor}', 'WebServicesController@listarClientes2');
Route::get('vendedor/imagen/{id_vendedor}', 'WebServicesController@guardarImagen');
Route::get('puestos/bloqueados/{id_vendedor}', 'WebServicesController@puestosBloqueados');
Route::get('puesto/encontrar/{id_vendedor}/{bloque}', 'WebServicesController@encontrar');
Route::get('top/mensual/{id_vendedor}', 'WebServicesController@mostrarTopMensual');
Route::get('top/diario/{id_vendedor}', 'WebServicesController@mostrarTopDiario');
Route::get('cliente/contra/{id_vendedor}/{contra1}/{contra2}', 'WebServicesController@cambiarPassword');
Route::get('trabajadores/{id_vendedor}', 'WebServicesController@trabajadores');
Route::get('mensajes/{id_vendedor}', 'WebServicesController@mensajes');

Route::resource('mensaje', 'MensajeController');
