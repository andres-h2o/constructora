<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Puesto;
use Illuminate\Http\Request;

class PuestoController extends Controller
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
			'nombre' => 'required',
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
     * @param  int  $id
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
     * @param  int  $id
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
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'nombre' => 'required',
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
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Puesto::destroy($id);

        return redirect('puesto')->with('flash_message', 'Puesto deleted!');
    }
}
