@extends('layouts.admin')

@section('contenido')
    <div class="container">
        <div class="row">


        <div class="col-md-9">
                <div class="card">
                    <div class="card-header"><h3>Ejecutivos de Venta</h3> </div>
                    <div class="card-body">
                        <a href="{{ url('/vendedor/create') }}" class="btn btn-success btn-sm" title="Add New Vendedor">
                            <i class="fa fa-plus" aria-hidden="true"></i> Añadir Nuevo
                        </a>

                        <form method="GET" action="{{ url('/vendedor') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div >
                                <input type="text"  name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Nombre</th><th>Telefono</th><th>Direccion</th><th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($vendedor as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>
                                            @if($item->imagen!="")
                                                <div class="circular--portrait">
                                                    <a href="{{$item->imagen}}" data-toggle="modal" data-target="{{"#".$item->id."ventana"}}">
                                                        <img src="{{$item->imagen}}" class="imgRedonda" ></a>
                                                </div>
                                                <div class="modal fade" id="{{$item->id."ventana"}}" tabindex="-1" role="dialog" align="center"   aria-label="miModalLavel1" aria-hidden="true" >

                                                    <img src="{{$item->imagen}}" class="center"></a>
                                                    {{--<div class="padre">
                                                        <div class="hijo">

                                                        </div>
                                                    </div>--}}

                                                </div>
                                            @else
                                                <div class="circular--portrait">
                                                    <img src="http://manueldeveloper.xyz/constructora/public/admin/app-assets/images/portrait/small/avatar-s-1.png" class="imgRedonda" >
                                                </div>
                                            @endif
                                            {{ $item->nombre }}</td><td>{{ $item->telefono }}</td><td>{{ $item->direccion }}</td>
                                        <td>
                                            <a href="{{ url('/vendedor/' . $item->id) }}" title="Ver Vendedor"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/vendedor/' . $item->id . '/edit') }}" title="Editar Vendedor"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                                        {{--    <a href="{{ url('/vendedor/ventaspdf/' . $item->id ) }}" title="Ventas"><button class="btn btn-blue btn-sm"><i class="fa fa-sellsy" aria-hidden="true"></i> Ventas</button></a>--}}
                                            <a href="{{ url('/vendedor/ventas/' . $item->id ) }}" title="Ventas"><button class="btn btn-blue btn-sm"><i class="fa fa-sellsy" aria-hidden="true"></i> Ventas</button></a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $vendedor->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
