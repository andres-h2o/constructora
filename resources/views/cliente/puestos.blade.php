@extends('layouts.admin')

@section('contenido')
    @include('alerts.request')
    @include('alerts.success')
    @include('alerts.existfail')
    @if($puestos->first()!="")
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
                <div class="card-header"><h1 style="text-align: center"><strong>Reservas y Compras</strong> </h1><br><h2>Cliente <strong>{{ $cliente->nombre }}</strong></h2><h2>CI :{{ $cliente->ci }}</h2></div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th style="text-align:center">Puesto</th>
                                <th style="text-align:center">Dimenciones</th>
                                <th style="text-align:center">Estado</th>
                                <th style="text-align:center">Categoria</th>
                                <th style="text-align:center">Proyecto</th>
                                <th style="text-align:center">Precio</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($puestos as $item)
                                <tr>
                                    <td style="text-align:center"><br><h1><strong>{{ $item->numero }}</strong></h1></td>
                                    <td style="text-align:center"><br><br><h2>{{ $item->largo}}</h2> mts2</td>
                                    <td style="text-align:center;text-transform: capitalize" >{{ $item->estado }} <br>
                                        <a href="{{ url('/puesto/' . $item->estado.'/'.$item->id) }}" title="View Proyecto">
                                            <button class="btn btn-info btn-sm"><i class="fa fa-eye"
                                                                                   aria-hidden="true"></i> Ver
                                            </button>
                                        </a>
                                    </td>
                                    <td  style="background-color: {{ $item->color }};color: white;text-align:center; font-size: xx-large ;text-shadow: 2px 2px 4px black" ><strong>{{ $item->categoria }}</strong></td>
                                    <td style="text-align:center"><strong>{{ $item->proyecto }}</strong><br>Módulo :{{ $item->modulo }}<br>Bloque :{{ $item->bloque }}</td>
                                    <td style="text-align:center">Contado : {{ $item->precio }} $us<br><strong>A Credito</strong><br>Cuota Inicial
                                        : {{ $item->cuota_inicial}} $us<br>Cuota Mensual : {{ $item->cuota_mensual}}$us
                                    </td>
                                    <td >
                                        <br>

                                        {{--<a href="{{ url('/proyecto/' . $item->id . '/edit') }}" title="Edit Proyecto">
                                            <button class="btn btn-primary "><i class="fa fa-money"
                                                                                      aria-hidden="true"></i> Vender
                                            </button>
                                        </a>--}}

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
    @else
    <div><h2 style="color: red;text-align: center"> No tiene puestos comprados ni reservados</h2></div>
    @endif
@endsection
