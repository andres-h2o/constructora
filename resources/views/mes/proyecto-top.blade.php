    @extends('layouts.admin')

@section('contenido')
    <div class="container">
            <div class="col-md-9">
                <div class="card">
                    <br>
                    <a class="button" style="font-size: 10px;" title="Ir atras" href="{{ URL::previous() }}">
                        <span class="dashicons dashicons-admin-generic"></span><i class="fa fa-mail-reply"></i> Volver Atras
                    </a>
                    <div class="card-header">Elegir Proyecto Para ver Top Mensuales</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Nombre</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($proyecto as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->nombre }}</td>
                                        <td>
                                            <a href="{{ url('/mes/ver-top/' . $item->id) }}" title="Ver Meses"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Ver Meses</button></a>
                                            <a href="{{ url('/mes/ver-top-diario/' . $item->id) }}" title="Top Diario"><button class="btn btn-blue btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Ver Top Diario</button></a>


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
