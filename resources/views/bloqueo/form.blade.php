<div class="form-group {{ $errors->has('estado') ? 'has-error' : ''}}">
    <label for="estado" class="col-md-4 control-label">{{ 'Estado' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="estado" type="date" id="estado" value="{{ $bloqueo->estado or ''}}" required>
        {!! $errors->first('estado', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_puesto') ? 'has-error' : ''}}">
    <label for="id_puesto" class="col-md-4 control-label">{{ 'Id Puesto' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_puesto" type="number" id="id_puesto" value="{{ $bloqueo->id_puesto or ''}}" required>
        {!! $errors->first('id_puesto', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_vendedor') ? 'has-error' : ''}}">
    <label for="id_vendedor" class="col-md-4 control-label">{{ 'Id Vendedor' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_vendedor" type="number" id="id_vendedor" value="{{ $bloqueo->id_vendedor or ''}}" required>
        {!! $errors->first('id_vendedor', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
