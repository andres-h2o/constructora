@extends('layouts.admin')

@section('contenido')
    <div class="container">
        <div class="row">


        <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Vendedor {{ $vendedor->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/vendedor') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/vendedor/' . $vendedor->id . '/edit') }}" title="Edit Vendedor"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('vendedor' . '/' . $vendedor->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Vendedor" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $vendedor->id }}</td>
                                    </tr>
                                    <tr><th> Nombre </th><td> {{ $vendedor->nombre }} </td></tr><tr><th> Telefono </th><td> {{ $vendedor->telefono }} </td></tr><tr><th> Direccion </th><td> {{ $vendedor->direccion }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
