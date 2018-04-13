<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Ventum;
use Illuminate\Http\Request;

class VentaController extends Controller
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
            $venta = Ventum::where('fecha', 'LIKE', "%$keyword%")
                ->orWhere('monto', 'LIKE', "%$keyword%")
                ->orWhere('id_puesto', 'LIKE', "%$keyword%")
                ->orWhere('id_vendedor', 'LIKE', "%$keyword%")
                ->orWhere('id_mes', 'LIKE', "%$keyword%")
                ->orWhere('id_tipo_venta', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $venta = Ventum::latest()->paginate($perPage);
        }

        return view('venta.index', compact('venta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('venta.create');
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
			'id_puesto' => 'required',
			'id_vendedor' => 'required',
			'id_mes' => 'required',
			'id_tipo_venta' => 'required'
		]);
        $requestData = $request->all();
        
        Ventum::create($requestData);

        return redirect('venta')->with('flash_message', 'Ventum added!');
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
        $ventum = Ventum::findOrFail($id);

        return view('venta.show', compact('ventum'));
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
        $ventum = Ventum::findOrFail($id);

        return view('venta.edit', compact('ventum'));
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
			'id_puesto' => 'required',
			'id_vendedor' => 'required',
			'id_mes' => 'required',
			'id_tipo_venta' => 'required'
		]);
        $requestData = $request->all();
        
        $ventum = Ventum::findOrFail($id);
        $ventum->update($requestData);

        return redirect('venta')->with('flash_message', 'Ventum updated!');
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
        Ventum::destroy($id);

        return redirect('venta')->with('flash_message', 'Ventum deleted!');
    }
}
