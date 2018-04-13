@extends('layouts.admin')

@section('contenido')
    <div class="container">
        <div class="row">


        <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Me {{ $me->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/mes') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/mes/' . $me->id . '/edit') }}" title="Edit Me"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('mes' . '/' . $me->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Me" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $me->id }}</td>
                                    </tr>
                                    <tr><th> Ventas Contado </th><td> {{ $me->ventas_contado }} </td></tr><tr><th> Monto Ventas Contado </th><td> {{ $me->monto_ventas_contado }} </td></tr><tr><th> Ventas Credito </th><td> {{ $me->ventas_credito }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
