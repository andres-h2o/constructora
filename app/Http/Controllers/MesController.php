<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Me;
use Illuminate\Http\Request;

class MesController extends Controller
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
            $mes = Me::where('ventas_contado', 'LIKE', "%$keyword%")
                ->orWhere('monto_ventas_contado', 'LIKE', "%$keyword%")
                ->orWhere('ventas_credito', 'LIKE', "%$keyword%")
                ->orWhere('monto_ventas_credito', 'LIKE', "%$keyword%")
                ->orWhere('nro_reservas', 'LIKE', "%$keyword%")
                ->orWhere('fecha_inicio', 'LIKE', "%$keyword%")
                ->orWhere('fecha_cierre', 'LIKE', "%$keyword%")
                ->orWhere('estado', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $mes = Me::latest()->paginate($perPage);
        }

        return view('mes.index', compact('mes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('mes.create');
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
			'ventas_contado' => 'required',
			'monto_ventas_contado' => 'required',
			'ventas_credito' => 'required',
			'monto_ventas_credito' => 'required',
			'nro_reservas' => 'required',
			'fecha_inicio' => 'required',
			'fecha_cierre' => 'required',
			'estado' => 'required'
		]);
        $requestData = $request->all();
        
        Me::create($requestData);

        return redirect('mes')->with('flash_message', 'Me added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $me = Me::findOrFail($id);

        return view('mes.show', compact('me'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $me = Me::findOrFail($id);

        return view('mes.edit', compact('me'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'ventas_contado' => 'required',
			'monto_ventas_contado' => 'required',
			'ventas_credito' => 'required',
			'monto_ventas_credito' => 'required',
			'nro_reservas' => 'required',
			'fecha_inicio' => 'required',
			'fecha_cierre' => 'required',
			'estado' => 'required'
		]);
        $requestData = $request->all();
        
        $me = Me::findOrFail($id);
        $me->update($requestData);

        return redirect('mes')->with('flash_message', 'Me updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Me::destroy($id);

        return redirect('mes')->with('flash_message', 'Me deleted!');
    }
}
