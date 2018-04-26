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
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($trabajadores as $item)

                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            @if(array_values(array_values($lista)[$loop->iteration-1])[7]!="")
                                                <div class="circular--portrait">
                                                    <a href="{{array_values(array_values($lista)[$loop->iteration-1])[7]}}" data-toggle="modal" data-target="{{"#".$loop->iteration."ventana"}}">
                                                        <img src="{{array_values(array_values($lista)[$loop->iteration-1])[7]}}" class="imgRedonda" ></a>
                                                </div>
                                                <div class="modal fade" id="{{$loop->iteration."ventana"}}" tabindex="-1" role="dialog" align="center"   aria-label="miModalLavel1" aria-hidden="true" >

                                                    <img  class="center" src="{{array_values(array_values($lista)[$loop->iteration-1])[7]}}"></a>

                                                </div>
                                            @else
                                                <div class="circular--portrait">
                                                    <img src="http://manueldeveloper.xyz/constructora/public/admin/app-assets/images/portrait/small/avatar-s-1.png" >
                                                </div>
                                            @endif
                                            {{array_values(array_values($lista)[$loop->iteration-1])[0]}}</td>
                                        <td>{{array_values(array_values($lista)[$loop->iteration-1])[1]}}</td>
                                        <td>{{array_values(array_values($lista)[$loop->iteration-1])[2]}}</td>
                                        <td>{{array_values(array_values($lista)[$loop->iteration-1])[3]}}</td>
                                        <td>{{array_values(array_values($lista)[$loop->iteration-1])[4]}}</td>


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
