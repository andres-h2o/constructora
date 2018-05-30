<?php

namespace App\Http\Controllers;

use App\Categorium;
use App\Cliente;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Puesto;
use App\TipoVentum;
use App\Vendedor;
use App\Ventum;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VentaController extends Controller
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
     * @param  int $id
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
     * @param  int $id
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
     * @param  int $id
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
     * @param  int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Ventum::destroy($id);

        return redirect('venta')->with('flash_message', 'Ventum deleted!');
    }

    public function actualizarVenta(Request $request, $id_venta)
    {
        $this->validate($request, [
            'estado' => 'required'
        ]);

        Ventum::find($id_venta)->update([
            'estado_venta' => $request['estado']
        ]);
        $venta = Ventum::find($id_venta);
        if ($request['estado'] == 0) {
            Puesto::find($venta->id_puesto)->update([
                'estado' => "libre"
            ]);
            Session::flash('message', 'Venta Anulada correctamente!');
        }
        $puesto = Puesto::find($venta->id_puesto);

        return redirect('cliente/ver-puestos/' . $venta->id_cliente . "");
    }

    public function planDePagos($id_venta)
    {
        $venta = Ventum::find($id_venta);
        $categoria = Categorium::join('puestos as p', 'p.id_categoria', '=', 'categorias.id')
            ->where('p.id', '=', $venta->id_puesto)->get()->first();

        for ($i = 1; $i <= $categoria->plazo_meses; $i++) {

            $fecha = Carbon::createFromFormat('Y-m-d', $venta->fecha)->addMonth($i);
            if ($fecha->isSunday()) {
                $fecha->addDay(1);

            }
            $fecha = $fecha->toDateString();
            $datos['cuota'] = $i;
            $datos['fecha'] = $fecha;
            $datos['monto'] = $categoria->cuota_mensual;
            $cuota[$i] = $datos;
        }
        $puesto = Puesto::_getPuesto($venta->id_puesto);
        $tipoVenta = TipoVentum::find($venta->id_tipo_venta);
        $cliente = Cliente::find($venta->id_cliente);
        $vendedor = Vendedor::find($venta->id_vendedor);
        $pdf = \PDF::loadView('reportes.pdfPlanDePagos', compact(
            'cuota',
            'venta', 'cliente', 'vendedor', 'puesto', 'tipoVenta'
        ));
        return $pdf->stream('Plan de Pago Venta ' . $venta->id . '.pdf');

    }
}
