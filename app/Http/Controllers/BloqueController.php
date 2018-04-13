<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Bloque;
use Illuminate\Http\Request;

class BloqueController extends Controller
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
            $bloque = Bloque::where('numero', 'LIKE', "%$keyword%")
                ->orWhere('id_modulo', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $bloque = Bloque::latest()->paginate($perPage);
        }

        return view('bloque.index', compact('bloque'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('bloque.create');
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
			'numero' => 'required',
			'id_modulo' => 'required'
		]);
        $requestData = $request->all();
        
        Bloque::create($requestData);

        return redirect('bloque')->with('flash_message', 'Bloque added!');
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
        $bloque = Bloque::findOrFail($id);

        return view('bloque.show', compact('bloque'));
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
        $bloque = Bloque::findOrFail($id);

        return view('bloque.edit', compact('bloque'));
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
			'numero' => 'required',
			'id_modulo' => 'required'
		]);
        $requestData = $request->all();
        
        $bloque = Bloque::findOrFail($id);
        $bloque->update($requestData);

        return redirect('bloque')->with('flash_message', 'Bloque updated!');
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
        Bloque::destroy($id);

        return redirect('bloque')->with('flash_message', 'Bloque deleted!');
    }
}
