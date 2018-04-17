<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Me;
use App\Puesto;
use App\Reserva;
use App\TipoReserva;
use App\Vendedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReservaController extends Controller
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
            $reserva = Reserva::where('fecha', 'LIKE', "%$keyword%")
                ->orWhere('monto', 'LIKE', "%$keyword%")
                ->orWhere('fecha_fin', 'LIKE', "%$keyword%")
                ->orWhere('dias', 'LIKE', "%$keyword%")
                ->orWhere('id_puesto', 'LIKE', "%$keyword%")
                ->orWhere('id_vendedor', 'LIKE', "%$keyword%")
                ->orWhere('id_tipoReserva', 'LIKE', "%$keyword%")
                ->orWhere('id_mes', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $reserva = Reserva::latest()->paginate($perPage);
        }

        return view('reserva.index', compact('reserva'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $tiposReserva = TipoReserva::all()->pluck('nombre', 'id');
        return view('reserva.create', compact('tiposReserva'));
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
            'fecha' => 'required',
            'monto' => 'required',
            'id_tipoReserva' => 'required',
            'id_vendedor' => 'required'
        ]);
        $requestData = $request->all();

        Reserva::create($requestData);

        return redirect('reserva')->with('flash_message', 'Reserva added!');
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
        $reserva = Reserva::findOrFail($id);

        return view('reserva.show', compact('reserva'));
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
        $reserva = Reserva::findOrFail($id);

        return view('reserva.edit', compact('reserva'));
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
            'fecha' => 'required',
            'monto' => 'required',
            'fecha_fin' => 'required',
            'dias' => 'required',
            'id_puesto' => 'required',
            'id_mes' => 'required',
            'id_tipoReserva' => 'required',
            'id_vendedor' => 'required'
        ]);
        $requestData = $request->all();

        $reserva = Reserva::findOrFail($id);
        $reserva->update($requestData);

        return redirect('reserva')->with('flash_message', 'Reserva updated!');
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
        Reserva::destroy($id);

        return redirect('reserva')->with('flash_message', 'Reserva deleted!');
    }

    public function nuevaReserva($id_puesto, $id_proyecto)
    {
        $puesto = Puesto::find($id_puesto);

        if ($puesto->estado == "libre") {
            $vendedores = Vendedor::_getVendedoresProyecto($id_proyecto)->get()->pluck('nombre', 'id');
            $tiposReserva = TipoReserva::all()->pluck('nombre', 'id');
            return view('reserva.create', compact('tiposReserva', 'vendedores', 'id_puesto', 'id_proyecto'));
        } else {
            Session::flash('error', 'Puesto  está ' . $puesto->estado . '!!');
            return back();
        }
    }

    public function guardarReserva(Request $request, $id_puesto, $id_proyecto)
    {
        $puesto = Puesto::find($id_puesto);

        if ($puesto->estado == "libre") {
            $this->validate($request, [
                'fecha' => 'required',
                'monto' => 'required',
                'nombre' => 'required',
                'id_tipoReserva' => 'required',
                'id_vendedor' => 'required'
            ]);
            $id_proyecto = Puesto::join('bloques as b','b.id','=','puestos.id_bloque')
                ->join('modulos as m','m.id','=','b.id_modulo')
                ->where('puestos.id','=',$id_puesto)->select('m.id_proyecto as id_proyecto')->get()->first()->id_proyecto;
            $id_mes = Me::where('estado', '=', 1)
                ->where('id_proyecto','=',$id_proyecto)
                ->select('id')->orderBy('id', 'desc')->get()->first()->id;

            $dias = TipoReserva::find($request['id_tipoReserva'])->dias_reales;

            Cliente::created([
                'nombre' => $request['nombre'],
                'id_vendedor' => $request['id_vendedor']
            ]);
            $id_cliente = Cliente::select('id')->orderBy('id', 'desc')->get()->first()->id;

            Reserva::create([
                'fecha' => $request['fecha'],
                'monto' => $request['monto'],
                'fecha_fin' => $request['fecha'],
                'dias' => $dias,
                'estado' => 1,
                'id_puesto' => $id_puesto,
                'id_vendedor' => $request['id_vendedor'],
                'id_cliente' => $id_cliente,
                'id_tipoReserva' => $request['id_tipoReserva'],
                'id_mes' => $id_mes,

            ]);
            Puesto::find($id_puesto)->update([
                'estado' => "reservado"
            ]);
            $puesto = Puesto::find($id_puesto);
            Session::flash('message', 'Reserva guardada!');
            return redirect('/puesto/listar/'.$puesto->id_bloque);
        } else {
            Session::flash('error', 'Puesto Ya está reservado!');
            return back();
        }


    }

    public function actualizarReserva(Request $request, $id_reserva)
    {
        $this->validate($request, [
            'dias' => 'required',
            'estado' => 'required'
        ]);
        Reserva::find($id_reserva)->update([
            'dias'=>$request['dias'],
            'estado'=>$request['estado']
        ]);
        $reserva=Reserva::find($id_reserva);
        if($request['estado']==0){
            Puesto::find($reserva->id_puesto)->update([
                'estado'=>"libre"
            ]);
        }
        $puesto =Puesto::find($reserva->id_puesto);
        Session::flash('message', 'Reserva Actualizada correctamente!');
        return redirect('/puesto/listar/'.$puesto->id_bloque);
    }
}
