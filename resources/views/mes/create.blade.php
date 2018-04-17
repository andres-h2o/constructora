@extends('layouts.admin')

@section('contenido')
    <div class="container">
        <div class="row">


            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Abrir Nuevo Mes:  <h2 style="text-transform: uppercase"><strong>{{\Jenssegers\Date\Date:: now()->format('F Y')}}</strong></h2></div>
                    <div class="card-body">

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/mes/guardar/'.$id_mes) }}" accept-charset="UTF-8" class="form-horizontal"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}


                            <div class="form-group {{ $errors->has('fecha_inicio') ? 'has-error' : ''}}">
                                <label for="fecha_inicio" class="col-md-4 control-label">{{ 'Fecha Inicio' }}</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="fecha_inicio" type="text" id="fecha_inicio"
                                           value="{{ \Jenssegers\Date\Date:: now()->format('j F Y') }}" readonly="readonly">
                                    {!! $errors->first('fecha_inicio', '<p class="help-block">:message</p>') !!}
                                    <br>
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('Meta Mensual para Ejecutivos de ventas') ? 'has-error' : ''}}">
                                <label for="ventas_credito"
                                       class="col-md-4 control-label">{{ 'Meta Mensual para Ejecutivos de ventas:' }}</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="meta" type="number" id="meta"
                                           value="{{ 50}}" required>
                                    {!! $errors->first('meta', '<p class="help-block">:message</p>') !!}
                                    <br>
                                </div>
                            </div>
                                <div class="form-group">
                                    <div class="col-md-offset-4 col-md-4">
                                        <input class="btn btn-primary" type="submit"
                                               value="{{ 'Abrir Mes y Cerrar  Mes Anterior' }}">
                                    </div>
                                </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
