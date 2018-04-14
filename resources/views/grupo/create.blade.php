@extends('layouts.admin')

@section('contenido')
    <div class="container">


    <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Create New Grupo</div>
                    <div class="card-body">
                        <a href="{{ url('/grupo') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/grupo') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('grupo.form')

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
