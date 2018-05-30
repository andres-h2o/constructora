<?php

namespace App\Http\Controllers;

use App\Grupo;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Vendedor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $grupos = Grupo::all()->pluck('nombre', 'id');
        return view('vendedor.create', compact('grupos'));
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
            'nombre' => $request['nombre'],
            'telefono' => $request['telefono'],
            'direccion' => $request['direccion'],
            'ci' => $request['ci'],
            'id_grupo' => $request['id_grupo'],
            'codigo' => '123abc',
            'estado' => 1,
        ]);

        return redirect('vendedor')->with('message', 'Vendedor added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
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
     * @param  int $id
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
     * @param  int $id
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
     * @param  int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Vendedor::destroy($id);

        return redirect('vendedor')->with('flash_message', 'Vendedor deleted!');
    }

    public function ventas($id_vendedor)
    {
        $datos = DB::select('select 
                            c.nombre as cliente,
                            ci,
                            ven.id as nro_venta,
                            ven.fecha as fecha,
                            tv.nombre as tipo,
                            concat(b.numero,"-",p.nro)as puesto,
                            p.id as id_puesto,
                            cat.precio,
                            case  WHEN ven.id_tipo_venta = 2 then cat.plazo_meses else "-" end as plazo,
                            ven.monto
                            from ventas as ven, tipo_ventas as tv, clientes as c,
                            puestos as p,bloques as b, modulos as m, proyectos as pro,
                            categorias as cat
                            where 
                            ven.id_tipo_venta=tv.id and 
                            ven.id_cliente=c.id and
                            ven.estado_venta=1 and
                            ven.id_puesto=p.id and
                            p.id_bloque=b.id AND 
                            b.id_modulo=m.id AND 
                            m.id_proyecto= pro.id AND 
                            p.id_categoria=cat.id AND 
                            ven.id_vendedor=?
                            order by ven.fecha desc ,ven.id desc', [$id_vendedor]);

        $total = 0;
        $totalContado = 0;
        $totalCredito = 0;

        $nroTotal = 0;
        $nroContado = 0;
        $nroCredito = 0;
        foreach ($datos as $item) {
            $total = $total + $item->monto;
            if ($item->tipo == 'Contado') {
                $nroContado += 1;
                $totalContado = $totalContado + $item->monto;
            } else if ($item->tipo == 'Credito') {
                $nroCredito += 1;
                $totalCredito = $totalCredito + $item->monto;
            }
            $nroTotal += 1;
        }
        $nombre = Vendedor::find($id_vendedor)->nombre;
        $proyecto = Vendedor::join('grupos as g', 'g.id', '=', 'id_grupo')
            ->join('proyectos as p', 'p.id', '=', 'g.id_proyecto')
            ->select('p.nombre as nombre')
            ->where('vendedors.id', '=', $id_vendedor)->get()->first()->nombre;
        // return $proyecto;
        return view('vendedor.ventas', compact(
            'datos',
            'proyecto',
            'total',
            'nroTotal',
            'nroContado',
            'nroCredito',
            'totalContado',
            'totalCredito',
            'nombre',
            'id_vendedor'
        ));
    }

    public function ventaspdf($id_vendedor)
    {
        $datos = DB::select('select 
                            c.nombre as cliente,
                            ci,
                            ven.id as nro_venta,
                            ven.fecha as fecha,
                            tv.nombre as tipo,
                            concat(b.numero,"-",p.nro)as puesto,
                            cat.precio,
                            case  WHEN ven.id_tipo_venta = 2 then cat.plazo_meses else "-" end as plazo,
                            ven.monto
                            from ventas as ven, tipo_ventas as tv, clientes as c,
                            puestos as p,bloques as b, modulos as m, proyectos as pro,
                            categorias as cat
                            where 
                            ven.id_tipo_venta=tv.id and 
                            ven.id_cliente=c.id and
                            ven.estado_venta=1 and
                            ven.id_puesto=p.id and
                            p.id_bloque=b.id AND 
                            b.id_modulo=m.id AND 
                            m.id_proyecto= pro.id AND 
                            p.id_categoria=cat.id AND 
                            ven.id_vendedor=?
                            order by ven.fecha desc ,ven.id desc', [$id_vendedor]);

        $total = 0;
        $totalContado = 0;
        $totalCredito = 0;

        $nroTotal = 0;
        $nroContado = 0;
        $nroCredito = 0;
        foreach ($datos as $item) {
            $total = $total + $item->monto;
            if ($item->tipo == 'Contado') {
                $nroContado += 1;
                $totalContado = $totalContado + $item->monto;
            } else if ($item->tipo == 'Credito') {
                $nroCredito += 1;
                $totalCredito = $totalCredito + $item->monto;
            }
            $nroTotal += 1;
        }
        $nombre = Vendedor::find($id_vendedor)->nombre;
        $proyecto = Vendedor::join('grupos as g', 'g.id', '=', 'id_grupo')
            ->join('proyectos as p', 'p.id', '=', 'g.id_proyecto')
            ->select('p.nombre as nombre')
            ->where('vendedors.id', '=', $id_vendedor)->get()->first()->nombre;
        // return $proyecto;
        $pdf = \PDF::loadView('reportes.pdfInformeEjecVent', compact(
            'datos',
            'proyecto',
            'total',
            'nroTotal',
            'nroContado',
            'nroCredito',
            'totalContado',
            'totalCredito',
            'nombre'
        ));
        $pdf->setPaper("letter", "landscape");
        return $pdf->stream('Informe de Ventas ' . $nombre . Carbon::now()->format('YMd') . '.pdf');
    }

}
