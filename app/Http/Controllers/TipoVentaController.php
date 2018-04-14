<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\TipoVentum;
use Illuminate\Http\Request;

class TipoVentaController extends Controller
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
            $tipoventa = TipoVentum::where('nombre', 'LIKE', "%$keyword%")
                ->orWhere('detalle', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $tipoventa = TipoVentum::latest()->paginate($perPage);
        }

        return view('tipo-venta.index', compact('tipoventa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('tipo-venta.create');
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
			'detalle' => 'required'
		]);
        $requestData = $request->all();
        
        TipoVentum::create($requestData);

        return redirect('tipo-venta')->with('flash_message', 'TipoVentum added!');
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
        $tipoventum = TipoVentum::findOrFail($id);

        return view('tipo-venta.show', compact('tipoventum'));
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
        $tipoventum = TipoVentum::findOrFail($id);

        return view('tipo-venta.edit', compact('tipoventum'));
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
			'detalle' => 'required'
		]);
        $requestData = $request->all();
        
        $tipoventum = TipoVentum::findOrFail($id);
        $tipoventum->update($requestData);

        return redirect('tipo-venta')->with('flash_message', 'TipoVentum updated!');
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
        TipoVentum::destroy($id);

        return redirect('tipo-venta')->with('flash_message', 'TipoVentum deleted!');
    }
}
