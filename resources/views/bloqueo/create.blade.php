@extends('layouts.admin')

@section('contenido')
    <div class="container">
        <div class="row">


            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Realizar Bloqueo de Puesto <h1>Puesto <strong>{{ $puesto->numero }}</strong></h1><h4><strong>{{ $puesto->proyecto }}</strong> --- Módulo  : {{ $puesto->modulo }} ---  Bloque  : {{ $puesto->bloque }}</h4></div>
                    <div class="card-body">


                        <form method="POST" action="{{ url('/bloqueo/guardar/'.$id_puesto) }}"
                              accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('id_vendedor') ? 'has-error' : ''}}">
                                <label for="id_vendedor" class="col-md-4 control-label">{{ 'Vendedor' }}</label>
                                <div class="col-md-6">
                                    {!! Form::select('id_vendedor', $vendedores,null, ['class' => 'form-control']) !!}

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-offset-4 col-md-4">
                                    <input class="btn btn-primary" type="submit"
                                           value="{{ $submitButtonText or 'Bloquear' }}">
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
