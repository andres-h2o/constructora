<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Bloqueo;
use App\Me;
use App\Puesto;
use App\Reserva;
use App\Vendedor;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class BloqueoController extends Controller
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
            $bloqueo = Bloqueo::where('estado', 'LIKE', "%$keyword%")
                ->orWhere('id_puesto', 'LIKE', "%$keyword%")
                ->orWhere('id_vendedor', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $bloqueo = Bloqueo::latest()->paginate($perPage);
        }

        return view('bloqueo.index', compact('bloqueo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('bloqueo.create');
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
            'estado' => 'required',
            'id_puesto' => 'required',
            'id_vendedor' => 'required'
        ]);
        $requestData = $request->all();

        Bloqueo::create($requestData);

        return redirect('bloqueo')->with('flash_message', 'Bloqueo added!');
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
        $bloqueo = Bloqueo::findOrFail($id);

        return view('bloqueo.show', compact('bloqueo'));
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
        $bloqueo = Bloqueo::findOrFail($id);

        return view('bloqueo.edit', compact('bloqueo'));
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
            'estado' => 'required',
            'id_puesto' => 'required',
            'id_vendedor' => 'required'
        ]);
        $requestData = $request->all();

        $bloqueo = Bloqueo::findOrFail($id);
        $bloqueo->update($requestData);

        return redirect('bloqueo')->with('flash_message', 'Bloqueo updated!');
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
        Bloqueo::destroy($id);

        return redirect('bloqueo')->with('flash_message', 'Bloqueo deleted!');
    }

    public function nuevoBloqueo($id_puesto, $id_proyecto)
    {
        $puesto = Puesto::find($id_puesto);

        if ($puesto->estado == "libre") {
            $puesto=Puesto::_getPuesto($id_puesto);
            $vendedores = Vendedor::_getVendedoresProyecto($id_proyecto)->get()->pluck('nombre', 'id');
            return view('bloqueo.create', compact('puesto', 'vendedores', 'id_puesto', 'id_proyecto'));
        } else {
            Session::flash('error', 'Puesto  está ' . $puesto->estado . '!!');
            return back();
        }
    }
    public function guardarBloqueo(Request $request, $id_puesto)
    {
        $puesto = Puesto::find($id_puesto);

        if ($puesto->estado == "libre") {
            $this->validate($request, [
                'id_vendedor' => 'required'
            ]);
            $id_proyecto = Puesto::join('bloques as b','b.id','=','puestos.id_bloque')
                ->join('modulos as m','m.id','=','b.id_modulo')
                ->where('puestos.id','=',$id_puesto)->select('m.id_proyecto as id_proyecto')->get()->first()->id_proyecto;
            $id_mes = Me::where('estado', '=', 1)
                ->where('id_proyecto','=',$id_proyecto)
                ->select('id')->orderBy('id', 'desc')->first()->id;


            Bloqueo::create([
                'estado' => 1,
                'id_puesto' => $id_puesto,
                'id_vendedor' => $request['id_vendedor'],
                'id_mes' => $id_mes,
            ]);
            Puesto::find($id_puesto)->update([
                'estado' => "bloqueado"
            ]);
            Session::flash('message', 'Bloqueo Guardado!');
            return redirect('/puesto/listar/'.$puesto->id_bloque);
        } else {
            Session::flash('error', 'Puesto  está ' . $puesto->estado . '!!');
            return back();
        }


    }
    public function actualizarBloqueo(Request $request, $id_reserva)
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
