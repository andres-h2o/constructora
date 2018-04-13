<div class="form-group {{ $errors->has('fecha') ? 'has-error' : ''}}">
    <label for="fecha" class="col-md-4 control-label">{{ 'Fecha' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="fecha" type="date" id="fecha" value="{{ $reserva->fecha or ''}}" required>
        {!! $errors->first('fecha', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('monto') ? 'has-error' : ''}}">
    <label for="monto" class="col-md-4 control-label">{{ 'Monto' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="monto" type="number" id="monto" value="{{ $reserva->monto or ''}}" required>
        {!! $errors->first('monto', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('fecha_fin') ? 'has-error' : ''}}">
    <label for="fecha_fin" class="col-md-4 control-label">{{ 'Fecha Fin' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="fecha_fin" type="date" id="fecha_fin" value="{{ $reserva->fecha_fin or ''}}" required>
        {!! $errors->first('fecha_fin', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('dias') ? 'has-error' : ''}}">
    <label for="dias" class="col-md-4 control-label">{{ 'Dias' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="dias" type="number" id="dias" value="{{ $reserva->dias or ''}}" required>
        {!! $errors->first('dias', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_puesto') ? 'has-error' : ''}}">
    <label for="id_puesto" class="col-md-4 control-label">{{ 'Id Puesto' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_puesto" type="number" id="id_puesto" value="{{ $reserva->id_puesto or ''}}" required>
        {!! $errors->first('id_puesto', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_vendedor') ? 'has-error' : ''}}">
    <label for="id_vendedor" class="col-md-4 control-label">{{ 'Id Vendedor' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_vendedor" type="number" id="id_vendedor" value="{{ $reserva->id_vendedor or ''}}" required>
        {!! $errors->first('id_vendedor', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_tipoReserva') ? 'has-error' : ''}}">
    <label for="id_tipoReserva" class="col-md-4 control-label">{{ 'Id Tiporeserva' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_tipoReserva" type="number" id="id_tipoReserva" value="{{ $reserva->id_tipoReserva or ''}}" required>
        {!! $errors->first('id_tipoReserva', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_mes') ? 'has-error' : ''}}">
    <label for="id_mes" class="col-md-4 control-label">{{ 'Id Mes' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_mes" type="number" id="id_mes" value="{{ $reserva->id_mes or ''}}" required>
        {!! $errors->first('id_mes', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
