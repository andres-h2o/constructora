<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="col-md-4 control-label">{{ 'Nombre' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="nombre" type="text" id="nombre" value="{{ $vendedor->nombre or ''}}" required>
        {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('telefono') ? 'has-error' : ''}}">
    <label for="telefono" class="col-md-4 control-label">{{ 'Telefono' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="telefono" type="number" id="telefono" value="{{ $vendedor->telefono or ''}}" required>
        {!! $errors->first('telefono', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('direccion') ? 'has-error' : ''}}">
    <label for="direccion" class="col-md-4 control-label">{{ 'Direccion' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="direccion" type="text" id="direccion" value="{{ $vendedor->direccion or ''}}" required>
        {!! $errors->first('direccion', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('estado') ? 'has-error' : ''}}">
    <label for="estado" class="col-md-4 control-label">{{ 'Estado' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="estado" type="number" id="estado" value="{{ $vendedor->estado or ''}}" required>
        {!! $errors->first('estado', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('codigo') ? 'has-error' : ''}}">
    <label for="codigo" class="col-md-4 control-label">{{ 'Codigo' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="codigo" type="number" id="codigo" value="{{ $vendedor->codigo or ''}}" required>
        {!! $errors->first('codigo', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('ci') ? 'has-error' : ''}}">
    <label for="ci" class="col-md-4 control-label">{{ 'Ci' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="ci" type="text" id="ci" value="{{ $vendedor->ci or ''}}" required>
        {!! $errors->first('ci', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_grupo') ? 'has-error' : ''}}">
    <label for="id_grupo" class="col-md-4 control-label">{{ 'Id Grupo' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_grupo" type="number" id="id_grupo" value="{{ $vendedor->id_grupo or ''}}" required>
        {!! $errors->first('id_grupo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
