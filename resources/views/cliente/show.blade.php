@extends('layouts.admin')

@section('contenido')
    <div class="container">
        <div class="row">



        <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Cliente {{ $cliente->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/cliente') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</button></a>
                        <a href="{{ url('/cliente/' . $cliente->id . '/edit') }}" title="Edit Cliente"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $cliente->id }}</td>
                                    </tr>
                                    <tr><th> Nombre </th><td> {{ $cliente->nombre }} </td></tr><tr><th> Telefono </th><td> {{ $cliente->telefono }} </td></tr><tr><th> Direccion </th><td> {{ $cliente->direccion }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
