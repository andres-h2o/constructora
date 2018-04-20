<?php

namespace App\Http\Controllers;

use App\Bloque;
use App\Bloqueo;
use App\Categorium;
use App\Cliente;
use App\Grupo;
use App\Me;
use App\Modulo;
use App\Puesto;
use App\Reserva;
use App\Vendedor;
use App\Ventum;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;

use PhpParser\Node\Expr\Cast\Object_;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Input;

class WebServicesController extends Controller
{
    public function validarVendedor($id, $ci)
    {

        $vendedor = Vendedor::find($id);
        if ($vendedor != '') {
            if ($vendedor->ci == $ci) {

                return json_encode(array("respuesta" => 1, "vendedor" => $vendedor));

                return $vendedor;
            } else {
                return json_encode(array("respuesta" => 2));
            }
        } else {
            return json_encode(array("respuesta" => 0));
        }
    }

    public function datosVenderPuesto($id_puesto)
    {
        $puesto = Puesto::find($id_puesto);
        $categoria = Categorium::find($puesto->id_categoria);
        return json_encode(
            array(
                "Titulo" => "",
                "Codigo" => 0,
                "FechaHora" => Carbon::now()->toDateTimeString(),
                "Mensaje" => "",
                "Datos" => [array("categoria" => $categoria)]
            ));
    }

    public function prueba(Request $request)
    {
        return 1;
    }

    public function modulos($id_trabajador)
    {
        $id_grupo = Vendedor::find($id_trabajador)->id_grupo;
        $id_proyecto = Grupo::find($id_grupo)->id_proyecto;
        $modulos = Modulo::where('id_proyecto', '=', $id_proyecto)
            ->select(
                'id',
                'nro as numero'
            )->orderBy('nro', 'asc')->get();
        return json_encode(array("modulos" => $modulos));
    }

    public function bloques($id_modulo)
    {
        $bloques = Bloque::where('id_modulo', '=', $id_modulo)
            ->select(
                'id',
                'numero as numero'
            )->orderBy('numero', 'asc')->get();
        return json_encode(array("bloques" => $bloques));
    }

    public function puestos($id_bloque)
    {
        $puestos = Puesto::_getPuestosBloque($id_bloque)->get();

        return json_encode(array("puestos" => $puestos));
    }

    public function vender($id_vendedor, $id_cliente, $id_puesto, $monto, $id_tipoVenta)
    {
        $puesto = Puesto::find($id_puesto);
        if ($puesto->estado == "libre") {
            $vendido = Ventum::where('id_puesto', '=', $id_puesto)->get()->first();
            $reserva = Reserva::where('id_puesto', '=', $id_puesto)->get()->first();
            if ($vendido == '' and $reserva == '') {
                $id_proyecto = Puesto::join('bloques as b', 'b.id', '=', 'puestos.id_bloque')
                    ->join('modulos as m', 'm.id', '=', 'b.id_modulo')
                    ->where('puestos.id', '=', $id_puesto)->select('m.id_proyecto as id_proyecto')->get()->first()->id_proyecto;

                $id_mes = Me::where('estado', '=', 1)
                    ->where('id_proyecto', '=', $id_proyecto)
                    ->select('id')->orderBy('id', 'desc')->get()->first()->id;


                Ventum::create([
                    'fecha' => Carbon::now()->toDateString(),
                    'monto' => $monto,
                    'id_vendedor' => $id_vendedor,
                    'id_cliente' => $id_cliente,
                    'id_puesto' => $id_puesto,
                    'id_mes' => $id_mes,
                    'id_tipo_venta' => $id_tipoVenta
                ]);
                $puesto->update([
                    'estado' => 'vendido'
                ]);
                return json_encode(array("confirmacion" => 1));
            } else {
                return json_encode(array("confirmacion" => 0));
            }
        } else {
            return json_encode(array("confirmacion" => 0));
        }
    }
    public function resrvar($id_vendedor, $id_cliente, $id_puesto, $monto, $id_tipoReserva)
    {
        $puesto = Puesto::find($id_puesto);
        if ($puesto->estado == "libre") {
            $vendido = Ventum::where('id_puesto', '=', $id_puesto)->get()->first();
            $reserva = Reserva::where('estado','=',1)
                ->where('id_puesto', '=', $id_puesto)->get()->first();
            if ($vendido == '' and $reserva == '') {
                $id_proyecto = Puesto::join('bloques as b', 'b.id', '=', 'puestos.id_bloque')
                    ->join('modulos as m', 'm.id', '=', 'b.id_modulo')
                    ->where('puestos.id', '=', $id_puesto)->select('m.id_proyecto as id_proyecto')->get()->first()->id_proyecto;

                $id_mes = Me::where('estado', '=', 1)
                    ->where('id_proyecto', '=', $id_proyecto)
                    ->select('id')->orderBy('id', 'desc')->get()->first()->id;


                Reserva::create([
                    'fecha' => Carbon::now()->toDateString(),
                    'monto' => $monto,
                    'id_vendedor' => $id_vendedor,
                    'id_cliente' => $id_cliente,
                    'id_puesto' => $id_puesto,
                    'id_mes' => $id_mes,
                    'id_tipoReserva' => $id_tipoReserva
                ]);
                $puesto->update([
                    'estado' => 'reservado'
                ]);
                return json_encode(array("confirmacion" => 1));
            } else {
                return json_encode(array("confirmacion" => 0));
            }
        } else {
            return json_encode(array("confirmacion" => 0));
        }
    }

    public function reservas($id_vendedor)
    {
        $reservas = Reserva::join('tipo_reservas as t', 't.id', '=', 'id_tipoReserva')
            ->join('clientes as c', 'c.id', '=', 'id_cliente')
            ->join('puestos as p', 'p.id', '=', 'id_puesto')
            ->join('bloques as b', 'b.id', '=', 'p.id_bloque')
            ->join('modulos as m', 'm.id', '=', 'b.id_modulo')
            ->where('reservas.id_vendedor', '=', $id_vendedor)
            ->where('reservas.estado', '=', 1)
            ->select(
                'reservas.id as id',
                'c.nombre as cliente',
                't.nombre as tipoReserva',
                'p.nro as puesto',
                'b.numero as bloque',
                'm.nro as modulo'
            )->orderBy('reservas.id', 'desc')->get();
        return json_encode(array("reservas" => $reservas));

    }

    public function ventas($id_vendedor)
    {

        $ventas = Ventum::join('tipo_ventas as t', 't.id', '=', 'id_tipo_venta')
            ->join('clientes as c', 'c.id', '=', 'id_cliente')
            ->join('puestos as p', 'p.id', '=', 'id_puesto')
            ->join('bloques as b', 'b.id', '=', 'p.id_bloque')
            ->join('modulos as m', 'm.id', '=', 'b.id_modulo')
            ->where('ventas.id_vendedor', '=', $id_vendedor)
            ->select(
                'ventas.id as id',
                'c.nombre as cliente',
                't.nombre as tipoVenta',
                'p.nro as puesto',
                'b.numero as bloque',
                'm.nro as modulo',
                'monto',
                'ventas.fecha'
            )->orderBy('ventas.id', 'desc')->get();

        return json_encode(array("ventas" => $ventas));
    }

    public function estadoVendedor($id_vendedor)
    {
        $confirmacion = Vendedor::find($id_vendedor)->estado;
        return json_encode(array("confirmacion" => $confirmacion));
    }

    public function guardarCliente($nombre, $ci, $telefono, $direccion, $id_vendedor)
    {
        Cliente::create([
            'nombre' => $nombre,
            'ci' => $ci,
            'telefono' => $telefono,
            'direccion' => $direccion,
            'id_vendedor' => $id_vendedor,
            'estado' => 1
        ]);
        return json_encode(array("confirmacion" => 1));

    }

    public function listarClientes($id_vendedor)
    {
        $clientes = Cliente::where('id_vendedor', '=', $id_vendedor)
            ->select('id', 'nombre', 'ci', 'telefono', 'direccion', 'estado')
            ->orderBy('nombre', 'asc')->get();
        return json_encode(array("clientes" => $clientes));
    }

    public function listarClientes2($id_vendedor)
    {
        $clientes = Cliente::where('id_vendedor', '=', $id_vendedor)
            ->select('id', 'nombre')
            ->orderBy('id', 'desc')->get();
        return json_encode(array("clientes" => $clientes));
    }

    public function guardarImagen($id_vendedor)
    {

        $lista = array();
        array_push($lista, array("andres" => 1));
        array_push($lista, array("andres" => 1));
        array_push($lista, array("andres" => 1));
        array_push($lista, array("andres" => 1));
        return $lista;

        $imagen = Input::get('imagen');
        Vendedor::find($id_vendedor)->update([
            'imagen' => $imagen
        ]);
        return json_encode(array("confirmacion" => 1));
    }

    public function puestosBloqueados($id_vendedor)
    {
        $puestos = Puesto::_getPuestosBloqueados($id_vendedor)->get();

        return json_encode(array("puestos" => $puestos));
    }

    public function encontrar($id_vendedor,$bloque)
    {
        $id_proyecto = Vendedor::join('grupos as g','g.id','id_grupo')
            ->where('vendedors.id','=',$id_vendedor)->get()->first()->id_proyecto;
        $puesto=Input::get('puesto');

        if($puesto== ''){
            $puesto = Puesto::join('categorias as c', 'c.id', '=', 'puestos.id_categoria')
                ->join('bloques as b', 'b.id', '=', 'puestos.id_bloque')
                ->join('modulos as m', 'm.id', '=', 'b.id_modulo')
                ->join('proyectos as p', 'p.id', '=', 'm.id_proyecto')
                ->where('p.id', '=', $id_proyecto)
                ->where('b.numero', '=', $bloque)
                ->select(
                    'puestos.id',
                    'puestos.nro as numero',
                    'largo',
                    'ancho',
                    'puestos.estado',
                    'p.nombre as proyecto',
                    'p.id as id_proyecto',
                    'm.nro as modulo',
                    'b.numero as bloque',
                    'c.nombre as categoria',
                    'c.color as color',
                    'c.precio as precio',
                    'c.cuota_inicial as cuota_inicial',
                    'c.cuota_mensual',
                    'c.plazo_meses'
                )->orderBy('puestos.id', 'asc')->get();
        }else{
            $puesto = Puesto::join('categorias as c', 'c.id', '=', 'puestos.id_categoria')
                ->join('bloques as b', 'b.id', '=', 'puestos.id_bloque')
                ->join('modulos as m', 'm.id', '=', 'b.id_modulo')
                ->join('proyectos as p', 'p.id', '=', 'm.id_proyecto')
                ->where('p.id', '=', $id_proyecto)
                ->where('b.numero', '=', $bloque)
                ->where('puestos.nro', '=', $puesto)
                ->select(
                    'puestos.id',
                    'puestos.nro as numero',
                    'largo',
                    'ancho',
                    'puestos.estado',
                    'p.nombre as proyecto',
                    'p.id as id_proyecto',
                    'm.nro as modulo',
                    'b.numero as bloque',
                    'c.nombre as categoria',
                    'c.color as color',
                    'c.precio as precio',
                    'c.cuota_inicial as cuota_inicial',
                    'c.cuota_mensual',
                    'c.plazo_meses'
                )->orderBy('puestos.id', 'asc')->get();
        }
        if ($puesto->first() != "") {

            return json_encode(array("confiracion"=>1,"puestos"=>$puesto));
        }else{

            return json_encode(array("confiracion"=>0));
        }
    }
}
