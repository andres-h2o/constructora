@extends('layouts.admin')

@section('contenido')

    @include('alerts.request')
    @include('alerts.success')
    @include('alerts.existfail')
    <div class="container">
        <div class="row">


            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Meses</div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Mes</th>
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

                                            <td>
                                                <a href="{{ url('/mes/top/' . $item->id) }}" title="View Me">
                                                    <button class="btn btn-info btn-sm">
                                                        <i class="fa fa-eye" aria-hidden="true"></i> Ver Top
                                                    </button>
                                                </a>


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
