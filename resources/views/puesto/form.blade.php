<div class="form-group {{ $errors->has('nro') ? 'has-error' : ''}}">
    <label for="nro" class="col-md-4 control-label">{{ 'Nro' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="nro" type="number" id="nro" value="{{ $puesto->nro or ''}}" >
        {!! $errors->first('nro', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('largo') ? 'has-error' : ''}}">
    <label for="largo" class="col-md-4 control-label">{{ 'Largo' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="largo" type="number" id="largo" value="{{ $puesto->largo or ''}}" required>
        {!! $errors->first('largo', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('ancho') ? 'has-error' : ''}}">
    <label for="ancho" class="col-md-4 control-label">{{ 'Ancho' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="ancho" type="number" id="ancho" value="{{ $puesto->ancho or ''}}" required>
        {!! $errors->first('ancho', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('latitud') ? 'has-error' : ''}}">
    <label for="latitud" class="col-md-4 control-label">{{ 'Latitud' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="latitud" type="number" id="latitud" value="{{ $puesto->latitud or ''}}" required>
        {!! $errors->first('latitud', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('longitud') ? 'has-error' : ''}}">
    <label for="longitud" class="col-md-4 control-label">{{ 'Longitud' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="longitud" type="number" id="longitud" value="{{ $puesto->longitud or ''}}" required>
        {!! $errors->first('longitud', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('estado') ? 'has-error' : ''}}">
    <label for="estado" class="col-md-4 control-label">{{ 'Estado' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="estado" type="text" id="estado" value="{{ $puesto->estado or ''}}" required>
        {!! $errors->first('estado', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_bloque') ? 'has-error' : ''}}">
    <label for="id_bloque" class="col-md-4 control-label">{{ 'Id Bloque' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_bloque" type="number" id="id_bloque" value="{{ $puesto->id_bloque or ''}}" >
        {!! $errors->first('id_bloque', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_categoria') ? 'has-error' : ''}}">
    <label for="id_categoria" class="col-md-4 control-label">{{ 'Id Categoria' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_categoria" type="number" id="id_categoria" value="{{ $puesto->id_categoria or ''}}" >
        {!! $errors->first('id_categoria', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
