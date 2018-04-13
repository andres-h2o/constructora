<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="col-md-4 control-label">{{ 'Nombre' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="nombre" type="text" id="nombre" value="{{ $tiporeserva->nombre or ''}}" required>
        {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('dias') ? 'has-error' : ''}}">
    <label for="dias" class="col-md-4 control-label">{{ 'Dias' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="dias" type="number" id="dias" value="{{ $tiporeserva->dias or ''}}" required>
        {!! $errors->first('dias', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('dias_reales') ? 'has-error' : ''}}">
    <label for="dias_reales" class="col-md-4 control-label">{{ 'Dias Reales' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="dias_reales" type="number" id="dias_reales" value="{{ $tiporeserva->dias_reales or ''}}" required>
        {!! $errors->first('dias_reales', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('definitivo') ? 'has-error' : ''}}">
    <label for="definitivo" class="col-md-4 control-label">{{ 'Definitivo' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="definitivo" type="number" id="definitivo" value="{{ $tiporeserva->definitivo or ''}}" required>
        {!! $errors->first('definitivo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
