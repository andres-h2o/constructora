@extends('layouts.admin')

@section('contenido')
    <div class="container">

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Proyecto</div>
                    <div class="card-body">
                        <a href="{{ url('/proyecto/create') }}" class="btn btn-success btn-sm" title="Add New Proyecto">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/proyecto') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
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
                                        <th>#</th><th>Nombre</th><th>Zona</th><th>Fecha</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($proyecto as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->nombre }}</td><td>{{ $item->zona }}</td><td>{{ $item->fecha }}</td>
                                        <td>
                                            <a href="{{ url('/proyecto/' . $item->id) }}" title="View Proyecto"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/proyecto/' . $item->id . '/edit') }}" title="Edit Proyecto"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                                            <a href="{{ url('/bloque/listar/' . $item->id  ) }}" title="Bloques"><button class="btn btn-blue btn-sm"><i class="fa fa-table" aria-hidden="true"></i> Bloques</button></a>

                                            {{--<form method="POST" action="{{ url('/proyecto' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Proyecto" onclick="return confirm('Seguro que desea Borrar Proyecto?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $proyecto->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
