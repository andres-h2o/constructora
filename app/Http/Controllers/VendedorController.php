<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Vendedor;
use Illuminate\Http\Request;

class VendedorController extends Controller
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
            $vendedor = Vendedor::where('nombre', 'LIKE', "%$keyword%")
                ->orWhere('telefono', 'LIKE', "%$keyword%")
                ->orWhere('direccion', 'LIKE', "%$keyword%")
                ->orWhere('estado', 'LIKE', "%$keyword%")
                ->orWhere('codigo', 'LIKE', "%$keyword%")
                ->orWhere('ci', 'LIKE', "%$keyword%")
                ->orWhere('id_grupo', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $vendedor = Vendedor::latest()->paginate($perPage);
        }

        return view('vendedor.index', compact('vendedor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('vendedor.create');
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
			'estado' => 'integer',
			'codigo' => 'integer',
			'ci' => 'string',
			'id_grupo' => 'integer'
		]);
        $requestData = $request->all();
        
        Vendedor::create($requestData);

        return redirect('vendedor')->with('flash_message', 'Vendedor added!');
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
        $vendedor = Vendedor::findOrFail($id);

        return view('vendedor.show', compact('vendedor'));
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
        $vendedor = Vendedor::findOrFail($id);

        return view('vendedor.edit', compact('vendedor'));
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
			'nombre' => 'string',
			'telefono' => 'integer',
			'direccion' => 'string',
			'estado' => 'integer',
			'codigo' => 'integer',
			'ci' => 'string',
			'id_grupo' => 'integer'
		]);
        $requestData = $request->all();
        
        $vendedor = Vendedor::findOrFail($id);
        $vendedor->update($requestData);

        return redirect('vendedor')->with('flash_message', 'Vendedor updated!');
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
        Vendedor::destroy($id);

        return redirect('vendedor')->with('flash_message', 'Vendedor deleted!');
    }
}
