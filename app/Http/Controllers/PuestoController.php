<?php

namespace App\Http\Controllers;

use App\Bloqueo;
use App\Cliente;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Proyecto;
use App\Puesto;
use App\Reserva;
use App\TipoReserva;
use App\TipoVentum;
use App\Vendedor;
use App\Ventum;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PuestoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $puesto = Puesto::where('nro', 'LIKE', "%$keyword%")
                ->orWhere('largo', 'LIKE', "%$keyword%")
                ->orWhere('ancho', 'LIKE', "%$keyword%")
                ->orWhere('latitud', 'LIKE', "%$keyword%")
                ->orWhere('longitud', 'LIKE', "%$keyword%")
                ->orWhere('estado', 'LIKE', "%$keyword%")
                ->orWhere('id_bloque', 'LIKE', "%$keyword%")
                ->orWhere('id_categoria', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $puesto = Puesto::latest()->paginate($perPage);
        }

        return view('puesto.index', compact('puesto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('puesto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nro' => 'required',
            'largo' => 'required',
            'ancho' => 'required',
            'latitud' => 'required',
            'longitud' => 'required',
            'estado' => 'required'
        ]);
        $requestData = $request->all();

        Puesto::create($requestData);

        return redirect('puesto')->with('flash_message', 'Puesto added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $puesto = Puesto::findOrFail($id);

        return view('puesto.show', compact('puesto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $puesto = Puesto::findOrFail($id);

        return view('puesto.edit', compact('puesto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nro' => 'required',
            'largo' => 'required',
            'ancho' => 'required',
            'latitud' => 'required',
            'longitud' => 'required',
            'estado' => 'required'
        ]);
        $requestData = $request->all();

        $puesto = Puesto::findOrFail($id);
        $puesto->update($requestData);

        return redirect('puesto')->with('flash_message', 'Puesto updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Puesto::destroy($id);

        return redirect('puesto')->with('flash_message', 'Puesto deleted!');
    }

    public function listar($id_bloque)
    {
        $puestos = Puesto::_getPuestosBloque($id_bloque)->get();
        return view('proyecto.puestos', compact('puestos'));
    }

    public function reservadoVer($id_puesto)
    {
        $reserva = Reserva::where('id_puesto', '=', $id_puesto)
            ->select('id', 'id_cliente', 'id_vendedor')
            ->orderBy('id', 'desc')->get()->first();
        $reserva = Reserva::find($reserva->id);
        $puesto = Puesto::_getPuesto($id_puesto);
        $restantes = $reserva->dias - Carbon::createFromFormat('Y-m-d', $reserva->fecha)->diffInDays();
        $tipo_reserva = TipoReserva::find($reserva->id_tipoReserva);
        $cliente = Cliente::find($reserva->id_cliente);
        $vendedor = Vendedor::find($reserva->id_vendedor);
        return view('reserva.ver', compact('reserva', 'puesto', 'cliente', 'vendedor', 'tipo_reserva', 'restantes'));
    }

    public function vendidoVer($id_puesto)
    {
        $venta = Ventum::where('id_puesto', '=', $id_puesto)
            ->select('id', 'id_cliente', 'id_vendedor')
            ->orderBy('id', 'desc')->get()->first();
        $venta = Ventum::find($venta->id);
        $puesto = Puesto::_getPuesto($id_puesto);
        $tipoVenta =TipoVentum::find($venta->id_tipo_venta);
        $cliente = Cliente::find($venta->id_cliente);
        $vendedor = Vendedor::find($venta->id_vendedor);
        return view('venta.ver', compact('venta', 'cliente', 'vendedor','puesto','tipoVenta'));
    }

    public function bloqueadoVer($id_puesto)
    {
        $puesto = Puesto::_getPuesto($id_puesto);
        $bloqueo = Bloqueo::where('id_puesto', '=', $id_puesto)
            ->select('id', 'id_vendedor', 'created_at')
            ->orderBy('id', 'desc')->get()->first();
        $vendedor = Vendedor::find($bloqueo->id_vendedor);
        return view('bloqueo.ver', compact('bloqueo', 'vendedor', 'puesto'));
    }

    public function libreVer($id_puesto)
    {
        Session::flash('message', 'Puesto está Libre!!');
        return back();
    }

    public function vistaBuscar()
    {
        $proyectos = Proyecto::all()->pluck('nombre', 'id');
        return view('puesto.buscar', compact('proyectos'));
    }

    public function encontrar(Request $request)
    {
        $id_proyecto = $request->get('id_proyecto');
        $bloque = $request->get('bloque');
        $puesto = $request->get('puesto');
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

            return view('puesto.ver', compact('puesto'));
        }else{
            Session::flash('error', 'No existe este puesto!!');
            return back();
        }
    }
}
