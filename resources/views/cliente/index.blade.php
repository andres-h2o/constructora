@extends('layouts.admin')

@section('contenido')
    <div class="container">
        <div class="row">



        <div class="col-md-9">
                <div class="card">
                    <div class="card-header"><h3>Clientes</h3> </div>
                    <div class="card-body">
                        <a href="{{ url('/cliente/create') }}" class="btn btn-success btn-sm" title="Add New Cliente">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/cliente') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text"  name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Nombre</th><th>Telefono</th><th>CI</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($cliente as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->nombre }}</td><td>{{ $item->telefono }}</td><td>{{ $item->ci }}</td>
                                        <td>
                                            <a href="{{ url('/cliente/' . $item->id) }}" title="View Cliente"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Ver Datos</button></a>
                                            <a href="{{ url('/cliente/ver-puestos/' . $item->id) }}" title="View Cliente"><button class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Ver Compras</button></a>
                                            {{--<a href="{{ url('/cliente/' . $item->id . '/edit') }}" title="Edit Cliente"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
--}}
                                            {{--<form method="POST" action="{{ url('/cliente' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Cliente" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $cliente->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
