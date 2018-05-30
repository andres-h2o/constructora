<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Mensaje;
use App\Proyecto;
use Illuminate\Http\Request;

class MensajeController extends Controller
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
            $mensaje = Mensaje::where('title', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $mensaje = Mensaje::latest()->paginate($perPage);
        }

        return view('mensaje.index', compact('mensaje'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $proyectos =Proyecto::all()->pluck('nombre','id');
        return view('mensaje.create',compact('proyectos'));
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
			'title' => 'required'
		]);
        $requestData = $request->all();

        Mensaje::create($requestData);

        return redirect('mensaje')->with('message', 'Mensaje added!');
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
        $mensaje = Mensaje::findOrFail($id);

        return view('mensaje.show', compact('mensaje'));
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
        $mensaje = Mensaje::findOrFail($id);

        return view('mensaje.edit', compact('mensaje'));
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
			'title' => 'required|max:10'
		]);
        $requestData = $request->all();
        
        $mensaje = Mensaje::findOrFail($id);
        $mensaje->update($requestData);

        return redirect('mensaje')->with('flash_message', 'Mensaje updated!');
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
        Mensaje::destroy($id);

        return redirect('mensaje')->with('flash_message', 'Mensaje deleted!');
    }
}
