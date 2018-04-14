@extends('layouts.admin')

@section('contenido')
    <div class="container">
        <div class="row">


        <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Create New Reserva</div>
                    <div class="card-body">
                        <a href="{{ url('/reserva') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/reserva/guardar/'.$id_puesto.'/'.$id_proyecto) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group {{ $errors->has('fecha') ? 'has-error' : ''}}">
                                <label for="fecha" class="col-md-4 control-label">{{ 'Fecha' }}</label>
                                <div class="col-md-6">
                                    <input class="form-control" readonly="readonly" name="fecha" type="date" id="fecha" value="{{ $reserva->fecha or Carbon\Carbon::now()->format('Y-m-d')}}" required>
                                    {!! $errors->first('fecha', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div><div class="form-group {{ $errors->has('monto') ? 'has-error' : ''}}">
                                <label for="monto" class="col-md-4 control-label">{{ 'Monto' }}</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="monto" type="number" id="monto" value="{{ $reserva->monto or ''}}" required>
                                    {!! $errors->first('monto', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div><div class="form-group {{ $errors->has('id_vendedor') ? 'has-error' : ''}}">
                                <label for="id_vendedor" class="col-md-4 control-label">{{ 'Vendedor' }}</label>
                                <div class="col-md-6">
                                    {!! Form::select('id_vendedor', $vendedores,null, ['class' => 'form-control']) !!}

                                </div>
                            </div><div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
                                <label for="nombre" class="col-md-4 control-label">{{ 'Nombre de Cliente' }}</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="nombre" type="text" id="nombre" value="{{ $cliente->nombre or ''}}" required>
                                    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div><div class="form-group {{ $errors->has('id_tipoReserva') ? 'has-error' : ''}}">
                                <label for="id_tipoReserva" class="col-md-4 control-label">{{ 'Tipo de reserva' }}</label>
                                <div class="col-md-6">
                                    {!! Form::select('id_tipoReserva', $tiposReserva,null, ['class' => 'form-control']) !!}

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-offset-4 col-md-4">
                                    <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
                                </div>
                            </div>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

  {{--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $('#id_vendedor').on('change',function(e){
            $value = e.target.value;
            $.ajax({
                type : 'GET',
                url : "{{url('/json-clientes')}}",
                data : {'id_vendedor':$value},
                success: function(data){
                    console.log(data);
                    $('#id_cliente').empty();
                    $('#id_cliente').append('<option value="0" disable="true" selected="true">=== Seleccione Cliente ===</option>');
                    $.each(data, function(index, clientesObj){
                        $('#id_cliente').append('<option value="'+ clientesObj.id +'">'+ clientesObj.nombre +'</option>');
                    })
                }
            });
        });

/*

        $('#id_vendedor').on('change', function(e){
            console.log(e);
            var id_vendedor = e.target.value;
            $.get('/json-clientes?id_vendedor=' + id_vendedor,function(data) {
                console.log(data);
                $('#id_cliente').empty();
                $('#id_cliente').append('<option value="0" disable="true" selected="true">=== Seleccione Cliente ===</option>');

                $.each(data, function(index, clientesObj){
                    $('#id_cliente').append('<option value="'+ clientesObj.id +'">'+ clientesObj.nombre +'</option>');
                })
            });
        });
*/

    </script>--}}
@endsection
