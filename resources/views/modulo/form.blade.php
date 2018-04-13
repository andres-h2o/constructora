<div class="form-group {{ $errors->has('nro') ? 'has-error' : ''}}">
    <label for="nro" class="col-md-4 control-label">{{ 'Nro' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="nro" type="number" id="nro" value="{{ $modulo->nro or ''}}" required>
        {!! $errors->first('nro', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_proyecto') ? 'has-error' : ''}}">
    <label for="id_proyecto" class="col-md-4 control-label">{{ 'Id Proyecto' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_proyecto" type="number" id="id_proyecto" value="{{ $modulo->id_proyecto or ''}}" required>
        {!! $errors->first('id_proyecto', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
