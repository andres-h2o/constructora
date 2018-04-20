@extends('layouts.admin')
@section('contenido')

    @include('alerts.request')
    @include('alerts.success')
    @include('alerts.existfail')
    <br>
    <div class="panel panel-primary">
        <div class="panel-body">
            <h1 id="cabeza">Buscar Puesto </h1>
            <form method="GET" action="{{ url('/puesto/encontrar') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                <div class="input-group">

                    Proyecto:
                    {!! Form::select('id_proyecto', $proyectos, null, ['class' => 'form-control']) !!}
                    {!! $errors->first('id_proyecto', '<p class="help-block">:message</p>') !!}
                    <br>
                    Bloque:
                    <input type="number"  name="bloque" placeholder="Bloque..." value="{{ request('bloque') }}" required>
                    Puesto:<input type="number"  name="puesto" placeholder="Puesto..." value="{{ request('puesto') }}">
                    <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                </div>
            </form>
            <br>




        </div>
    </div>


@endsection
