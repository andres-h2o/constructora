@extends('layouts.admin')

@section('contenido')
    <div class="container">
        <div class="row">

        <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Coordinador</div>
                    <div class="card-body">
                        <a href="{{ url('/coordinador/create') }}" class="btn btn-success btn-sm" title="Add New Coordinador">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/coordinador') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>#</th><th>Nombre</th><th>Telefono</th><th>Direccion</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($coordinador as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->nombre }}</td><td>{{ $item->telefono }}</td><td>{{ $item->direccion }}</td>
                                        <td>
                                            <a href="{{ url('/coordinador/' . $item->id) }}" title="View Coordinador"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/coordinador/' . $item->id . '/edit') }}" title="Edit Coordinador"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            {{--<form method="POST" action="{{ url('/coordinador' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Coordinador" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $coordinador->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
