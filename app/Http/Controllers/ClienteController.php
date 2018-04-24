<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Cliente;
use App\Puesto;
use App\Reserva;
use App\Vendedor;
use App\Ventum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ClienteController extends Controller
{
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
            $cliente = Cliente::where('nombre', 'LIKE', "%$keyword%")
                ->orWhere('ci', 'LIKE', "%$keyword%")
                ->orWhere('direccion', 'LIKE', "%$keyword%")
                ->orWhere('estado', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $cliente = Cliente::latest()->paginate($perPage);
        }
        return view('cliente.index', compact('cliente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $vendedores=Vendedor::all()->pluck('nombre','id');
        return view('cliente.create',compact('vendedores'));
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
            'nombre' => 'string',
            'telefono' => 'integer',
            'direccion' => 'string',
            'ci' => 'string'
        ]);
        $requestData = $request->all();

        Cliente::create($requestData);

        return redirect('cliente')->with('flash_message', 'Cliente added!');
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
        $cliente = Cliente::findOrFail($id);

        return view('cliente.show', compact('cliente'));
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
        $cliente = Cliente::findOrFail($id);
        $vendedores=Vendedor::all()->pluck('nombre','id');
        return view('cliente.edit', compact('cliente','vendedores'));
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
            'nombre' => 'string',
            'telefono' => 'integer',
            'direccion' => 'string',
            'estado' => 'integer'
        ]);
        $requestData = $request->all();

        $cliente = Cliente::findOrFail($id);
        $cliente->update($requestData);

        return redirect('cliente')->with('flash_message', 'Cliente updated!');
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
        Cliente::destroy($id);

        return redirect('cliente')->with('flash_message', 'Cliente deleted!');
    }

    public function clietesVendedor()
    {

        $id_vendedor = Input::get('id_vendedor');
        $clientes = Cliente::where('id_vendedor', '-', $id_vendedor)->get();
        return response()->json($clientes);
    }

    public function verPuestos($id_cliente)
    {
        $puestos1= Reserva::join('puestos as p','p.id','=','reservas.id_puesto')
            ->join('categorias as c','c.id','id_categoria')
            ->join('bloques as b','b.id','p.id_bloque')
            ->join('modulos as m','m.id','b.id_modulo')
            ->join('proyectos as pr','pr.id','m.id_proyecto')
            ->where('id_cliente','=',$id_cliente)
            ->where('reservas.estado','=',1)
            ->select(
                'p.id',
                'p.nro as numero',
                'largo',
                'ancho',
                'p.estado',
                'pr.nombre as proyecto',
                'pr.id as id_proyecto',
                'm.nro as modulo',
                'b.numero as bloque',
                'c.nombre as categoria',
                'c.color as color',
                'c.precio as precio',
                'c.cuota_inicial as cuota_inicial',
                'c.cuota_mensual',
                'c.plazo_meses'
            )->orderBy('p.id','asc');
        $puestos= Ventum::join('puestos as p','p.id','=','ventas.id_puesto')
            ->join('categorias as c','c.id','id_categoria')
            ->join('bloques as b','b.id','p.id_bloque')
            ->join('modulos as m','m.id','b.id_modulo')
            ->join('proyectos as pr','pr.id','m.id_proyecto')
            ->where('id_cliente','=',$id_cliente)
            ->where('estado_venta','=',1)
            ->select(
                'p.id',
                'p.nro as numero',
                'largo',
                'ancho',
                'estado',
                'pr.nombre as proyecto',
                'pr.id as id_proyecto',
                'm.nro as modulo',
                'b.numero as bloque',
                'c.nombre as categoria',
                'c.color as color',
                'c.precio as precio',
                'c.cuota_inicial as cuota_inicial',
                'c.cuota_mensual',
                'c.plazo_meses'
            )->orderBy('p.id','asc')->unionAll($puestos1)->get();

$cliente = Cliente::find($id_cliente);
        return view('cliente.puestos', compact('puestos','cliente'));

    }
}
