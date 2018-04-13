<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\TipoReserva;
use Illuminate\Http\Request;

class TipoReservaController extends Controller
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
            $tiporeserva = TipoReserva::where('nombre', 'LIKE', "%$keyword%")
                ->orWhere('dias', 'LIKE', "%$keyword%")
                ->orWhere('dias_reales', 'LIKE', "%$keyword%")
                ->orWhere('definitivo', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $tiporeserva = TipoReserva::latest()->paginate($perPage);
        }

        return view('tipo-reserva.index', compact('tiporeserva'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('tipo-reserva.create');
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
			'nombre' => 'required',
			'dias' => 'required',
			'dias_reales' => 'required',
			'definitivo' => 'required'
		]);
        $requestData = $request->all();
        
        TipoReserva::create($requestData);

        return redirect('tipo-reserva')->with('flash_message', 'TipoReserva added!');
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
        $tiporeserva = TipoReserva::findOrFail($id);

        return view('tipo-reserva.show', compact('tiporeserva'));
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
        $tiporeserva = TipoReserva::findOrFail($id);

        return view('tipo-reserva.edit', compact('tiporeserva'));
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
			'nombre' => 'required',
			'dias' => 'required',
			'dias_reales' => 'required',
			'definitivo' => 'required'
		]);
        $requestData = $request->all();
        
        $tiporeserva = TipoReserva::findOrFail($id);
        $tiporeserva->update($requestData);

        return redirect('tipo-reserva')->with('flash_message', 'TipoReserva updated!');
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
        TipoReserva::destroy($id);

        return redirect('tipo-reserva')->with('flash_message', 'TipoReserva deleted!');
    }
}
