<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Categorium;
use Illuminate\Http\Request;

class CategoriaController extends Controller
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
            $categoria = Categorium::where('nombre', 'LIKE', "%$keyword%")
                ->orWhere('color', 'LIKE', "%$keyword%")
                ->orWhere('precio', 'LIKE', "%$keyword%")
                ->orWhere('cuota_inicial', 'LIKE', "%$keyword%")
                ->orWhere('cuota_mensual', 'LIKE', "%$keyword%")
                ->orWhere('plazo_meses', 'LIKE', "%$keyword%")
                ->orWhere('id_proyecto', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $categoria = Categorium::latest()->paginate($perPage);
        }

        return view('categoria.index', compact('categoria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('categoria.create');
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
			'color' => 'required',
			'precio' => 'required',
			'cuota_inicial' => 'required',
			'cuota_mensual' => 'required',
			'plazo_meses' => 'required',
			'id_proyecto' => 'required'
		]);
        $requestData = $request->all();
        
        Categorium::create($requestData);

        return redirect('categoria')->with('flash_message', 'Categorium added!');
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
        $categorium = Categorium::findOrFail($id);

        return view('categoria.show', compact('categorium'));
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
        $categorium = Categorium::findOrFail($id);

        return view('categoria.edit', compact('categorium'));
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
			'color' => 'required',
			'precio' => 'required',
			'cuota_inicial' => 'required',
			'cuota_mensual' => 'required',
			'plazo_meses' => 'required',
			'id_proyecto' => 'required'
		]);
        $requestData = $request->all();
        
        $categorium = Categorium::findOrFail($id);
        $categorium->update($requestData);

        return redirect('categoria')->with('flash_message', 'Categorium updated!');
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
        Categorium::destroy($id);

        return redirect('categoria')->with('flash_message', 'Categorium deleted!');
    }
}
