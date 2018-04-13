<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Bloqueo;
use Illuminate\Http\Request;

class BloqueoController extends Controller
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
            $bloqueo = Bloqueo::where('estado', 'LIKE', "%$keyword%")
                ->orWhere('id_puesto', 'LIKE', "%$keyword%")
                ->orWhere('id_vendedor', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $bloqueo = Bloqueo::latest()->paginate($perPage);
        }

        return view('bloqueo.index', compact('bloqueo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('bloqueo.create');
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
			'estado' => 'required',
			'id_puesto' => 'required',
			'id_vendedor' => 'required'
		]);
        $requestData = $request->all();
        
        Bloqueo::create($requestData);

        return redirect('bloqueo')->with('flash_message', 'Bloqueo added!');
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
        $bloqueo = Bloqueo::findOrFail($id);

        return view('bloqueo.show', compact('bloqueo'));
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
        $bloqueo = Bloqueo::findOrFail($id);

        return view('bloqueo.edit', compact('bloqueo'));
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
			'estado' => 'required',
			'id_puesto' => 'required',
			'id_vendedor' => 'required'
		]);
        $requestData = $request->all();
        
        $bloqueo = Bloqueo::findOrFail($id);
        $bloqueo->update($requestData);

        return redirect('bloqueo')->with('flash_message', 'Bloqueo updated!');
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
        Bloqueo::destroy($id);

        return redirect('bloqueo')->with('flash_message', 'Bloqueo deleted!');
    }
}
