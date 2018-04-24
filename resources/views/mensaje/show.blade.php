@extends('layouts.admin')

@section('contenido')

    @include('alerts.request')
    @include('alerts.success')
    @include('alerts.existfail')
    <div class="container">
        <div class="row">


        <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Mensaje {{ $mensaje->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/mensaje') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/mensaje/' . $mensaje->id . '/edit') }}" title="Edit Mensaje"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('mensaje' . '/' . $mensaje->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Mensaje" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $mensaje->id }}</td>
                                    </tr>
                                    <tr><th> Title </th><td> {{ $mensaje->title }} </td></tr><tr><th> Content </th><td> {{ $mensaje->content }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
