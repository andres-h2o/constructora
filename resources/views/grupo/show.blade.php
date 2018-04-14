@extends('layouts.admin')

@section('contenido')
    <div class="container">


    <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Grupo {{ $grupo->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/grupo') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/grupo/' . $grupo->id . '/edit') }}" title="Edit Grupo"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('grupo' . '/' . $grupo->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Grupo" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $grupo->id }}</td>
                                    </tr>
                                    <tr><th> Nombre </th><td> {{ $grupo->nombre }} </td></tr><tr><th> Detalle </th><td> {{ $grupo->detalle }} </td></tr><tr><th> Id Proyecto </th><td> {{ $grupo->id_proyecto }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
