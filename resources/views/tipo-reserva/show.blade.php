@extends('layouts.admin')

@section('contenido')
    <div class="container">
        <div class="row">


        <div class="col-md-9">
                <div class="card">
                    <div class="card-header">TipoReserva {{ $tiporeserva->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/tipo-reserva') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/tipo-reserva/' . $tiporeserva->id . '/edit') }}" title="Edit TipoReserva"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('tiporeserva' . '/' . $tiporeserva->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete TipoReserva" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $tiporeserva->id }}</td>
                                    </tr>
                                    <tr><th> Nombre </th><td> {{ $tiporeserva->nombre }} </td></tr><tr><th> Dias </th><td> {{ $tiporeserva->dias }} </td></tr><tr><th> Dias Reales </th><td> {{ $tiporeserva->dias_reales }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
