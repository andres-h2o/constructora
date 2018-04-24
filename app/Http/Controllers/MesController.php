<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Grupo;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Me;
use App\Proyecto;
use App\Reserva;
use App\Vendedor;
use App\Ventum;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use FontLib\TrueType\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Jenssegers\Date\Date;

class MesController extends Controller
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
        /*$keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $mes = Me::where('ventas_contado', 'LIKE', "%$keyword%")
                ->orWhere('monto_ventas_contado', 'LIKE', "%$keyword%")
                ->orWhere('ventas_credito', 'LIKE', "%$keyword%")
                ->orWhere('monto_ventas_credito', 'LIKE', "%$keyword%")
                ->orWhere('nro_reservas', 'LIKE', "%$keyword%")
                ->orWhere('fecha_inicio', 'LIKE', "%$keyword%")
                ->orWhere('fecha_cierre', 'LIKE', "%$keyword%")
                ->orWhere('estado', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $mes = Me::latest()->paginate($perPage);
        }
        return view('mes.index', compact('mes'));*/
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $proyecto = Proyecto::where('nombre', 'LIKE', "%$keyword%")
                ->orWhere('zona', 'LIKE', "%$keyword%")
                ->orWhere('fecha', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $proyecto = Proyecto::latest()->paginate($perPage);
        }

        return view('mes.proyectos', compact('proyecto'));
    }

    public function topProyectos()
    {
        $perPage = 25;
        $proyecto = Proyecto::latest()->paginate($perPage);
        return view('mes.proyecto-top', compact('proyecto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('mes.create');
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
            'ventas_contado' => 'required',
            'monto_ventas_contado' => 'required',
            'ventas_credito' => 'required',
            'monto_ventas_credito' => 'required',
            'nro_reservas' => 'required',
            'fecha_inicio' => 'required',
            'fecha_cierre' => 'required',
            'estado' => 'required'
        ]);
        $requestData = $request->all();

        Me::create($requestData);

        return redirect('mes')->with('flash_message', 'Me added!');
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
        $me = Me::findOrFail($id);

        return view('mes.show', compact('me'));
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
        $me = Me::findOrFail($id);

        return view('mes.edit', compact('me'));
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
            'ventas_contado' => 'required',
            'monto_ventas_contado' => 'required',
            'ventas_credito' => 'required',
            'monto_ventas_credito' => 'required',
            'nro_reservas' => 'required',
            'fecha_inicio' => 'required',
            'fecha_cierre' => 'required',
            'estado' => 'required'
        ]);
        $requestData = $request->all();

        $me = Me::findOrFail($id);
        $me->update($requestData);

        return redirect('mes')->with('flash_message', 'Me updated!');
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
        Me::destroy($id);

        return redirect('mes')->with('flash_message', 'Me deleted!');
    }

    public function verMeses($id_proyecto)
    {
        $mes = Me::where('id_proyecto', '=', $id_proyecto)->select(
            'id',
            'fecha_inicio',
            'fecha_cierre',
            'estado'
        )->orderBy('id', 'desc')->get();
        return view('mes.index', compact('mes'));
    }

    public function verMesesTop($id_proyecto)
    {
        $mes = Me::where('id_proyecto', '=', $id_proyecto)->select(
            'id',
            'fecha_inicio',
            'fecha_cierre',
            'estado'
        )->orderBy('id', 'desc')->get();
        return view('mes.mes-top', compact('mes'));
    }

    public function informeGeneral($id_mes)
    {

        $datos = DB::select('select v.nombre as vendedor,
                          sum(case  WHEN ven.id_tipo_venta = 1 then ven.monto else 0 end) as montoContado,
                          sum(case  WHEN ven.id_tipo_venta = 2 then ven.monto else 0 end) as montoCredito,
                          sum(case  WHEN ven.id_tipo_venta = 1 then 1 else 0 end) as nroContado,
                          sum(case  WHEN ven.id_tipo_venta = 2 then 1 else 0 end) as nroCredito
                          from vendedors as v,ventas as ven
                                            where v.id = ven.id_vendedor and ven.estado_venta = 1
                    and ven.id_mes = ?
                     GROUP BY v.nombre', [$id_mes]);
        $total = 0;
        $nroTotal = 0;
        foreach ($datos as $item) {
            $total = $total + $item->montoContado + $item->montoCredito;
            $nroTotal = $nroTotal + $item->nroContado + $item->nroCredito;
        }
        $mes = Me::find($id_mes);
        $proyecto = Proyecto::find($mes->id_proyecto);
        $pdf = \PDF::loadView('mes.pdfInforme', compact('mes', 'datos', 'proyecto', 'total', 'nroTotal'));
        $pdf->setPaper("letter", "landscape");
        return $pdf->stream('Informe general de Ventas' . Date:: parse($mes->fecha_inicio)->format('F Y') . '.pdf');
    }

    public function nuevo($id_mes)
    {
        return view('mes.create', compact('id_mes'));
    }

    public function guardar(Request $request, $id_mes)
    {
        $id_proyecto = Me::find($id_mes)->id_proyecto;
        $id_mes = Me::where('estado', '=', 1)
            ->where('id_proyecto', '=', $id_proyecto)
            ->select('id')->orderBy('id', 'desc')->get()->first()->id;

        Me::find($id_mes)->update([
            'estado' => 0,
            'fecha_cierre' => Date::now()->toDateString()
        ]);
        Me::create([
            'fecha_inicio' => Date::now()->toDateString(),
            'estado' => 1,
            'id_proyecto' => $id_proyecto,
            'meta' => $request['meta']
        ]);
        Session::flash('message', 'Se realizó el Cierre Ccrrectamete y se Abrio nuevo Mes... ');
        return redirect('mes/ver/' . $id_proyecto);

    }

    public function irTop($id_mes)
    {


        $mes = Me::find($id_mes);

        $trabajadores = Vendedor::join('ventas as v', 'v.id_vendedor', '=', 'vendedors.id')
            ->join('grupos as g', 'g.id', '=', 'vendedors.id_grupo')
            ->where('id_proyecto', '=', $mes->id_proyecto)->select(
                'vendedors.id as id',
                'vendedors.nombre as nombre',
                'imagen',
                DB::raw('count(*) as nro')
            )->groupBy('vendedors.id', 'vendedors.nombre', 'imagen')
            ->orderBy('nro', 'desc')->get();
        $lista = array();
        foreach ($trabajadores as $item) {
            $ventasContado = Ventum::where('id_mes', '=', $id_mes)
                ->where('id_vendedor', '=', $item->id)
                ->where('id_tipo_venta', '=', 1)
                ->select('id_vendedor', DB::raw('count(*) as nro'))
                ->groupBy('id_vendedor')->get()->first();
            $ventasContado = ($ventasContado != "") ? $ventasContado->nro : 0;
            $ventasCredito = Ventum::where('id_mes', '=', $id_mes)
                ->where('id_vendedor', '=', $item->id)
                ->where('id_tipo_venta', '=', 2)
                ->select('id_vendedor', DB::raw('count(*) as nro'))
                ->groupBy('id_vendedor')->get()->first();
            $ventasCredito = ($ventasCredito != "") ? $ventasCredito->nro : 0;
            $reservas = Reserva::where('id_mes', '=', $id_mes)
                ->where('id_vendedor', '=', $item->id)
                ->select('id_vendedor', DB::raw('count(*) as nro'))
                ->groupBy('id_vendedor')->get()->first();
            $reservas = ($reservas != "") ? $reservas->nro : 0;
            array_push($lista, array(
                "nombre" => $item->nombre,
                "contado" => $ventasContado,
                "credito" => $ventasCredito,
                "reserva" => $reservas,
                "puntos" => $ventasCredito + $ventasContado,
                "falta" => 50 - ($ventasCredito + $ventasContado),
                "meta" => 50,
                "imagen"=>$item->imagen
            ));
        }
        return view('mes.top', compact('lista', 'trabajadores'));

    }

    public function verTopDiario($id_proyecto)
    {
        $id_mes = Me::where('estado', '=', 1)
            ->where('id_proyecto', '=', $id_proyecto)
            ->select('id')->orderBy('id', 'desc')->get()->first()->id;
        $mes = Me::find($id_mes);

        $trabajadores = Vendedor::join('grupos as g', 'g.id', '=', 'vendedors.id_grupo')
            ->join('ventas as v', 'v.id_vendedor', '=', 'vendedors.id')
            ->where('id_proyecto', '=', $mes->id_proyecto)
            ->where('fecha', '=', Carbon::now()->toDateString())
            ->select(
                'vendedors.id as id',
                'vendedors.nombre as nombre',
                'imagen',
                DB::raw('count(*) as nro')
            )->groupBy('vendedors.id', 'vendedors.nombre', 'imagen')
            ->orderBy('nro', 'desc')->get();
        $lista = array();
        foreach ($trabajadores as $item) {
            $ventasContado = Ventum::where('id_mes', '=', $id_mes)
                ->where('id_vendedor', '=', $item->id)
                ->where('id_tipo_venta', '=', 1)
                ->where('fecha', '=', Carbon::now()->toDateString())
                ->select('id_vendedor', DB::raw('count(*) as nro'))
                ->groupBy('id_vendedor')->get()->first();
            $ventasContado = ($ventasContado != "") ? $ventasContado->nro : 0;
            $ventasCredito = Ventum::where('id_mes', '=', $id_mes)
                ->where('id_vendedor', '=', $item->id)
                ->where('id_tipo_venta', '=', 2)
                ->where('fecha', '=', Carbon::now()->toDateString())
                ->select('id_vendedor', DB::raw('count(*) as nro'))
                ->groupBy('id_vendedor')->get()->first();
            $ventasCredito = ($ventasCredito != "") ? $ventasCredito->nro : 0;
            $reservas = Reserva::where('id_mes', '=', $id_mes)
                ->where('id_vendedor', '=', $item->id)
                ->where('fecha', '=', Carbon::now()->toDateString())
                ->select('id_vendedor', DB::raw('count(*) as nro'))
                ->groupBy('id_vendedor')->get()->first();
            $reservas = ($reservas != "") ? $reservas->nro : 0;
            array_push($lista, array(
                "nombre" => $item->nombre,
                "contado" => $ventasContado,
                "credito" => $ventasCredito,
                "reserva" => $reservas,
                "puntos" => $ventasCredito + $ventasContado,
                "falta" => 50 - ($ventasCredito + $ventasContado),
                "meta" => 50
            ));
        }
        return view('mes.top-diario', compact('lista', 'trabajadores'));
    }
}
