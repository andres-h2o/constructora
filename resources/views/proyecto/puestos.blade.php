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
                <div class="card-header"><h1>Puestos <strong>{{ $puestos->first()->proyecto }}</strong></h1><h2>Módulo :{{ $puestos->first()->modulo }}<br>Bloque :{{ $puestos->first()->bloque }}</h2></div>
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
                                <th style="text-align:center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($puestos as $item)
                                <tr>
                                    <td style="text-align:center"><br><h1><strong>{{ $item->numero }}</strong></h1></td>
                                    <td style="text-align:center"><strong>{{ $item->largo*$item->ancho }} mts2</strong><br>Largo : {{ $item->largo }} mts.<br>Ancho : {{ $item->largo }} mts.</td>
                                    <td style="text-align:center;text-transform: capitalize" >{{ $item->estado }} <br>
                                        <a href="{{ url('/puesto/' . $item->estado.'/'.$item->id) }}" title="View Proyecto">
                                            <button class="btn btn-info btn-sm"><i class="fa fa-eye"
                                                                                   aria-hidden="true"></i> Ver
                                            </button>
                                        </a>
                                    </td>
                                    <td  style="background-color: {{ $item->color }};color: white;text-align:center; font-size: xx-large " ><strong>{{ $item->categoria }}</strong></td>
                                    <td style="text-align:center"><strong>{{ $item->proyecto }}</strong><br>Módulo :{{ $item->modulo }}<br>Bloque :{{ $item->bloque }}</td>
                                    <td style="text-align:center">Contado : {{ $item->precio }} $us<br><strong>A Credito</strong><br>Cuota Inicial
                                        : {{ $item->cuota_inicial}} $us<br>Cuota Mensual : {{ $item->cuota_mensual}}$us
                                    </td>
                                    <td >
                                        <br>
                                        <a href="{{ url('/reserva/nueva/' . $item->id.'/'.$item->id_proyecto) }}" title="View Proyecto">
                                            <button class="btn  btn-warning "><i class="fa fa-edit" aria-hidden="true"></i> Reservar
                                            </button>
                                        </a>
                                        {{--<a href="{{ url('/proyecto/' . $item->id . '/edit') }}" title="Edit Proyecto">
                                            <button class="btn btn-primary "><i class="fa fa-money"
                                                                                      aria-hidden="true"></i> Vender
                                            </button>
                                        </a>--}}
                                        <a href="{{ url('/bloqueo/nuevo/' . $item->id.'/'.$item->id_proyecto ) }}" title="Bloquear">
                                            <button class="btn btn-blue "><i class="fa fa-unlock-alt"
                                                                                   aria-hidden="true"></i> Bloquear
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
