@extends('layouts.admin')

@section('contenido')

    <div class="container">
        <div class="row">


            <div class="col-md-9">
                <div class="card">
                    <br>
                    <a class="button" style="font-size: 10px;" title="Ir atras" href="{{ URL::previous() }}">
                        <span class="dashicons dashicons-admin-generic"></span><i class="fa fa-mail-reply"></i> Volver Atras
                    </a>
                    <div class="card-header"><h2><strong>Ver Detalles de Venta</strong><br><br></h2>
                        <h3><strong>{{ $puesto->proyecto }} <br>
                            </strong> Módulo  : {{ $puesto->modulo }} ---  Bloque  : {{ $puesto->bloque }}
                            --- Puesto <strong>{{ $puesto->numero }}</strong></h3>
                    </div>
                    <div class="card-body">



                            <div class="form-group {{ $errors->has('dias') ? 'has-error' : ''}}">
                                <div class="col-md-6">
                                    <h3><strong>Cliente : </strong> {{$cliente->nombre}}<br><br>
                                    <strong>CI : </strong> {{$cliente->ci}}<br><br>
                                    </h3><h5><strong>Fecha : </strong> {{$venta->created_at}}<br><br>
                                        <strong>Tipo de Venta : </strong> {{$tipoVenta->nombre}} <br><br>
                                        <strong>Monto :</strong> {{$venta->monto}} $us<br><br>
                                        <strong>Oficial de Venta : </strong> {{$vendedor->nombre}}<br><br>
                                    </h5>
                                </div>
                            </div>




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
