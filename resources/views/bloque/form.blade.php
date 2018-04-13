<div class="form-group {{ $errors->has('numero') ? 'has-error' : ''}}">
    <label for="numero" class="col-md-4 control-label">{{ 'Numero' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="numero" type="number" id="numero" value="{{ $bloque->numero or ''}}" required>
        {!! $errors->first('numero', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_modulo') ? 'has-error' : ''}}">
    <label for="id_modulo" class="col-md-4 control-label">{{ 'Id Modulo' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_modulo" type="number" id="id_modulo" value="{{ $bloque->id_modulo or ''}}" required>
        {!! $errors->first('id_modulo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
