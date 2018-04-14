<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Coordinador;
use Illuminate\Http\Request;

class CoordinadorController extends Controller
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
            $coordinador = Coordinador::where('nombre', 'LIKE', "%$keyword%")
                ->orWhere('telefono', 'LIKE', "%$keyword%")
                ->orWhere('direccion', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $coordinador = Coordinador::latest()->paginate($perPage);
        }

        return view('coordinador.index', compact('coordinador'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('coordinador.create');
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
			'telefono' => 'required',
			'direccion' => 'required'
		]);
        $requestData = $request->all();
        
        Coordinador::create($requestData);

        return redirect('coordinador')->with('flash_message', 'Coordinador added!');
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
        $coordinador = Coordinador::findOrFail($id);

        return view('coordinador.show', compact('coordinador'));
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
        $coordinador = Coordinador::findOrFail($id);

        return view('coordinador.edit', compact('coordinador'));
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
			'telefono' => 'required',
			'direccion' => 'required'
		]);
        $requestData = $request->all();
        
        $coordinador = Coordinador::findOrFail($id);
        $coordinador->update($requestData);

        return redirect('coordinador')->with('flash_message', 'Coordinador updated!');
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
        Coordinador::destroy($id);

        return redirect('coordinador')->with('flash_message', 'Coordinador deleted!');
    }
}
