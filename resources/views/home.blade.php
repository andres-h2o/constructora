@extends('layouts.admin')

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"></div>

                <div class="panel-body">
                     <h3>{{Auth::user()->name }}</h3>
                    <br>
                    Bienvenido al Sistema de Ventas!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
