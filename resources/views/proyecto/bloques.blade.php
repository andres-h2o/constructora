@extends('layouts.admin')
@section('contenido')
    @if ($bloques[1]!="")

    <br>
    <div class="panel panel-primary">
        <div class="panel-body">
            <h1 id="cabeza">Lista de Bloques por Módulos <br>del Proyecto: {{$proyecto->nombre}}</h1>
            <form method="GET" action="{{ url('/cliente') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                <div class="input-group">
                    Bloque:
                    <input type="number"  name="bloque" placeholder="Bloque..." value="{{ request('search') }}">Puesto:<input type="number"  name="puesto" placeholder="Puesto..." value="{{ request('search') }}">
                    <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                </div>
            </form>
            <br>

            <div  id="accordion" >
                @foreach($bloques as $bloque)
                <div class="panel panel-default">

                        <h4 class="panel-title" id="{{$bloque->first()->modulo}}">
                            <button class="btn btn-info" role="button" data-toggle="collapse" data-target="#c{{$bloque->first()->modulo}}" aria-expanded="true" aria-controls="collapseOne" style="width: 100%; height: 40px; background-color:tomato" >
                                Módulo : {{$bloque->first()->modulo}}
                            </button>
                        </h4>

                    <div id="c{{$bloque->first()->modulo}}" class="collapse show" aria-labelledby="{{$bloque->first()->modulo}}" data-parent="#accordion">

                        @foreach($bloque as $item)
                        <div class="card-body">
                            <h4 class="panel-title">
                                <a class="btn btn-blue" role="button"
                                   href="{{ url('/puesto/listar/' . $item->id_bloque)}}"
                                   style="width: 100%; height: 40px; background-color:#00a65a" >
                                    <strong>Bloque : {{$item->bloque}} </strong>
                                </a>
                            </h4>

                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>


        </div>
    </div>
    @else
        <br>
        <div class="panel panel-default">
            <div class="panel-body">
                <h3 style="text-align: center;">
                    <b style="text-align: center;"></b> No Hay Modulos.
                </h3>
            </div>
        </div>
    @endif

@endsection
