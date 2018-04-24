<?php

namespace App\Http\Controllers;

use App\Grupo;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Vendedor;
use Illuminate\Http\Request;

class VendedorController extends Controller
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
        $grupos = Grupo::all()->pluck('nombre','id');
        return view('vendedor.create',compact('grupos'));
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
			'ci' => 'string',
			'id_grupo' => 'integer'
		]);
        
        Vendedor::create([
            'nombre'=>$request['nombre'],
            'telefono'=>$request['telefono'],
            'direccion'=>$request['direccion'],
            'ci'=>$request['ci'],
            'id_grupo'=>$request['id_grupo'],
            'codigo'=>'123abc',
            'estado'=>1,
        ]);

        return redirect('vendedor')->with('message', 'Vendedor added!');
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
