<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
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
        return view('reserva.create');
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
			'fecha_fin' => 'required',
			'dias' => 'required',
			'id_puesto' => 'required',
			'id_mes' => 'required',
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
     * @param  int  $id
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
     * @param  int  $id
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
     * @param  int  $id
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
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Reserva::destroy($id);

        return redirect('reserva')->with('flash_message', 'Reserva deleted!');
    }
}
