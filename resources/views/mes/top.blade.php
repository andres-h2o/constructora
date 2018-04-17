@extends('layouts.admin')

@section('contenido')

    @include('alerts.request')
    @include('alerts.success')
    @include('alerts.existfail')
    <div class="container">
        <div class="row">
          <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Top Five Mensual</div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Ejecutivo de Venta</th>
                                    <th>Ventas <br>al Contado</th>
                                    <th>Ventas <br>al Credito</th>
                                    <th>Reservas</th>
                                    <th>Puntos</th>
                                    <th>Falta</th>
                                    <th>Meta</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($trabajadores as $item)

                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{array_values(array_values($lista)[$loop->iteration-1])[0]}}</td>
                                        <td>{{array_values(array_values($lista)[$loop->iteration-1])[1]}}</td>
                                        <td>{{array_values(array_values($lista)[$loop->iteration-1])[2]}}</td>
                                        <td>{{array_values(array_values($lista)[$loop->iteration-1])[3]}}</td>
                                        <td>{{array_values(array_values($lista)[$loop->iteration-1])[4]}}</td>
                                        <td>{{array_values(array_values($lista)[$loop->iteration-1])[5]}}</td>
                                        <td>{{array_values(array_values($lista)[$loop->iteration-1])[6]}}</td>


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
