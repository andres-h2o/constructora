@extends('layouts.admin')

@section('contenido')
    <div class="container">
        <div class="row">


        <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Bloqueo {{ $bloqueo->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/bloqueo') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/bloqueo/' . $bloqueo->id . '/edit') }}" title="Edit Bloqueo"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('bloqueo' . '/' . $bloqueo->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Bloqueo" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $bloqueo->id }}</td>
                                    </tr>
                                    <tr><th> Estado </th><td> {{ $bloqueo->estado }} </td></tr><tr><th> Id Puesto </th><td> {{ $bloqueo->id_puesto }} </td></tr><tr><th> Id Vendedor </th><td> {{ $bloqueo->id_vendedor }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
