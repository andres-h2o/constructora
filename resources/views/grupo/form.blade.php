<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="col-md-4 control-label">{{ 'Nombre' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="nombre" type="text" id="nombre" value="{{ $grupo->nombre or ''}}" required>
        {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('detalle') ? 'has-error' : ''}}">
    <label for="detalle" class="col-md-4 control-label">{{ 'Detalle' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="detalle" type="text" id="detalle" value="{{ $grupo->detalle or ''}}" required>
        {!! $errors->first('detalle', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_proyecto') ? 'has-error' : ''}}">
    <label for="id_proyecto" class="col-md-4 control-label">{{ 'Id Proyecto' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_proyecto" type="number" id="id_proyecto" value="{{ $grupo->id_proyecto or ''}}" required>
        {!! $errors->first('id_proyecto', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_coordinador') ? 'has-error' : ''}}">
    <label for="id_coordinador" class="col-md-4 control-label">{{ 'Id Coordinador' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_coordinador" type="number" id="id_coordinador" value="{{ $grupo->id_coordinador or ''}}" required>
        {!! $errors->first('id_coordinador', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
