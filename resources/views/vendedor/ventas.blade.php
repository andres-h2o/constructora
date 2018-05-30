@extends('layouts.admin')

@section('contenido')
    @include('alerts.request')
    @include('alerts.success')
    @include('alerts.existfail')
    <style>
        .contenedor {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
    <div class="container">

        <div class="col-md-9">
            <div class="card">
                <br>
                <a class="button" style="font-size: 10px;" title="Ir atras" href="{{ URL::previous() }}">
                    <span class="dashicons dashicons-admin-generic"></span><i class="fa fa-mail-reply"></i> Volver Atras
                </a>
                <div class="card-header"><h1><strong>{{ $proyecto }}</strong></h1>
                    <div><h1> Ejecutivo de venta: {{ $nombre }}</h1>
                        <div class="card-body">
                            <div class="table-responsive">
                                <a style="display: flex;justify-content: center;align-content: center" href="{{ url('/vendedor/ventaspdf/' . $id_vendedor ) }}" title="Ventas" target="_blank"><button class="btn btn-red btn-sm"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Imprimir</button></a>
                                <table class="table" style="width: 70%; display: flex;justify-content: center">

                                    <tr class="tr-and">
                                        <td style="text-align: right">
                                            <strong>Total a Contado :</strong>
                                        </td>
                                        <td class="th-and" style="text-transform: uppercase">
                                            <strong>$us.- {{number_format($totalContado, 2, ',', '.')}}</strong>
                                        </td>
                                        <td class="th-and" style="text-transform: uppercase">{{$nroContado}} puestos.</td>

                                    </tr>
                                    <tr class="tr-and">
                                        <td style="text-align: right"><strong>Total a Credito:</strong></td>
                                        <td class="th-and" style="text-transform: uppercase">
                                            <strong>$us.- {{number_format($totalCredito, 2, ',', '.')}}</strong></td>
                                        <td class="th-and" style="text-transform: uppercase">{{$nroCredito}} puestos.</td>

                                    </tr>
                                    <tr class="tr-and">
                                        <td style="text-align: right"><strong>Total :</strong></td>
                                        <td class="th-and" style="text-transform: uppercase">
                                            <strong style="color: red">$us.- {{number_format($total, 2, ',', '.')}}</strong>
                                        </td>
                                        <td class="th-and" style="text-transform: uppercase">
                                            <strong>{{$nroTotal}} puestos.</strong></td>

                                    </tr>

                                </table>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th style="text-align:center">Cliente</th>
                                        <th style="text-align:center">CI</th>
                                        <th style="text-align:center">Nro. <br> de Venta</th>
                                        <th style="text-align:center">Fecha</th>
                                        <th style="text-align:center">Puesto</th>
                                        <th style="text-align:center">Tipo <br>de Venta</th>
                                        <th style="text-align:center">Plazo</th>
                                        <th style="text-align:center">Precio <br>$us.</th>
                                        <th style="text-align:center">Pagado <br>$us.</th>
                                        <th style="text-align:center">Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($datos as $item)
                                        <tr class="tr-and">
                                            <td style="text-transform: uppercase;text-align: left">{{ $loop->iteration}}
                                                .- {{$item->cliente}}</td>
                                            <td style="text-align:center">{{$item->ci}}</td>
                                            <td style="text-align:center">{{$item->nro_venta}}</td>
                                            <td style="text-align:center">{{$item->fecha}}</td>
                                            <td style="text-align:center">{{$item->puesto}}</td>
                                            <td style="text-align:center">{{$item->tipo}}</td>
                                            <td style="text-align:center">{{$item->plazo}}</td>
                                            <td
                                                    style="text-align:center">{{number_format($item->precio, 2, ',', '.')}}</td>
                                            <td
                                                    style="text-align:center">{{number_format($item->monto, 2, ',', '.')}}</td>
                                            <td>
                                                <a href="{{ url('/puesto/vendido/' . $item->id_puesto) }}"
                                                   title="Ver venta">
                                                    <button class="btn btn-info btn-sm"><i class="fa fa-eye"
                                                                                           aria-hidden="true"></i> Ver
                                                    </button>
                                                </a>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{-- <div class="pagination-wrapper"> {!! $proyecto->appends(['search' => Request::get('search')])->render() !!} </div>
                            --}} </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
