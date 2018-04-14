@extends('layouts.admin')

@section('contenido')
    <div class="container">
        <div class="row">


            <div class="col-md-9">
                <div class="card">
                    <div class="card-header"><h2><strong>Ver Reserva</strong></h2> <h1>Puesto <strong>{{ $puesto->numero }}</strong></h1><h4><strong>{{ $puesto->proyecto }}</strong> --- Módulo  : {{ $puesto->modulo }} ---  Bloque  : {{ $puesto->bloque }}</h4></div>
                    <div class="card-body">


                        <form method="POST" action="{{ url('/reserva/actualizar/'.$reserva->id) }}"
                              accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group {{ $errors->has('dias') ? 'has-error' : ''}}">
                                <div class="col-md-6">
                                    <h3><strong>Fecha : </strong> {{$reserva->created_at}}<br><br>
                                        <strong>Dias Restantes : </strong> {{$restantes}}<br><br>
                                        <strong>Monto :</strong> {{$reserva->monto}} $us<br><br>
                                        <strong>Vendedor : </strong> {{$vendedor->nombre}}<br><br>
                                        <strong>Cliente : </strong> {{$cliente->nombre}}<br><br>
                                        <strong>Tipo de reserva : </strong> {{$tipo_reserva->nombre}}
                                    </h3>
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('dias') ? 'has-error' : ''}}">
                                <label for="dias" class="col-md-4 control-label"><h2><strong>{{ 'Total Dias' }}</strong>
                                    </h2></label>
                                <div class="col-md-6">
                                    <input class="form-control" name="dias" type="number" id="dias"
                                           value="{{ $reserva->dias or ''}}" required>
                                    {!! $errors->first('dias', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('estado') ? 'has-error' : ''}}"><h2><strong>

                                        {!! Form::label('estado', 'Estado', ['class' => 'col-md-4 control-label']) !!}
                                    </strong></h2>
                                <div class="col-md-6">
                                    {!! Form::select('estado', [1=>'ACTIVA', 0=>'ANULADA'], $reserva->estado, ['class' => 'form-control']) !!}
                                    {!! $errors->first('estado', '<p class="help-block">:message</p>') !!}
                                </div>

                            </div>
                                <div class="form-group">
                                    <div class="col-md-offset-4 col-md-4">
                                        <br>
                                        <input class="btn btn-primary" type="submit"
                                               value="{{  'Actualizar' }}">
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
