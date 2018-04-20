@extends('layouts.admin')

@section('contenido')

    @include('alerts.request')
    @include('alerts.success')
    @include('alerts.existfail')
    <div class="container">
        <div class="row">


            <div class="col-md-9">
                <div class="card">
                    <br>
                    <a class="button" style="font-size: 10px;" title="Ir atras" href="{{ URL::previous() }}">
                        <span class="dashicons dashicons-admin-generic"></span><i class="fa fa-mail-reply"></i> Volver Atras
                    </a>
                    <div class="card-header"><h3> Meses</h3></div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Mes</th>
                                    <th>Fecha Inicio</th>
                                    <th>Fecha Cierre</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($mes as $item)
                                    @if($item->estado==1)
                                        <tr style="color: darkgreen ">
                                    @else
                                        <tr>
                                    @endif
                                            <td>{{ $loop->iteration or $item->id }}</td>
                                            <td style="text-transform: uppercase">{{ \Jenssegers\Date\Date:: parse($item->fecha_inicio)->format('F Y') }}</td>
                                            <td>{{ \Jenssegers\Date\Date:: parse($item->fecha_inicio)->format('j F Y')  }}</td>

                                            <td>
                                                @if($item->estado==0)
                                                    {{ \Jenssegers\Date\Date:: parse($item->fecha_cierre)->format('j F Y') }}
                                                @else
                                                    En Curso
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('/mes/imprimir/' . $item->id) }}" title="View Me">
                                                    <button class="btn btn-info btn-sm">
                                                        <i class="fa fa-eye" aria-hidden="true"></i> Ver e Imprimir
                                                    </button>
                                                </a>
                                                @if($item->estado==1)
                                                    <a href="{{ url('/mes/nuevo/' . $item->id) }}" title="Edit Me">
                                                        <button class="btn btn-primary btn-sm" onclick="return confirm('Seguro que desea Cerrar Mes?')">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Cerrar
                                                        </button>
                                                    </a>
                                                @endif

                                            </td>
                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
