<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Grupo;
use Illuminate\Http\Request;

class GrupoController extends Controller
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
            $grupo = Grupo::where('nombre', 'LIKE', "%$keyword%")
                ->orWhere('detalle', 'LIKE', "%$keyword%")
                ->orWhere('id_coordinador', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $grupo = Grupo::latest()->paginate($perPage);
        }

        return view('grupo.index', compact('grupo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('grupo.create');
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
			'detalle' => 'required',
			'id_coordinador' => 'required'
		]);
        $requestData = $request->all();
        
        Grupo::create($requestData);

        return redirect('grupo')->with('flash_message', 'Grupo added!');
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
        $grupo = Grupo::findOrFail($id);

        return view('grupo.show', compact('grupo'));
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
        $grupo = Grupo::findOrFail($id);

        return view('grupo.edit', compact('grupo'));
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
			'detalle' => 'required',
			'id_coordinador' => 'required'
		]);
        $requestData = $request->all();
        
        $grupo = Grupo::findOrFail($id);
        $grupo->update($requestData);

        return redirect('grupo')->with('flash_message', 'Grupo updated!');
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
        Grupo::destroy($id);

        return redirect('grupo')->with('flash_message', 'Grupo deleted!');
    }
}
