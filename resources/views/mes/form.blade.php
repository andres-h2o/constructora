<div class="form-group {{ $errors->has('ventas_contado') ? 'has-error' : ''}}">
    <label for="ventas_contado" class="col-md-4 control-label">{{ 'Ventas Contado' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="ventas_contado" type="number" id="ventas_contado" value="{{ $me->ventas_contado or ''}}" required>
        {!! $errors->first('ventas_contado', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('monto_ventas_contado') ? 'has-error' : ''}}">
    <label for="monto_ventas_contado" class="col-md-4 control-label">{{ 'Monto Ventas Contado' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="monto_ventas_contado" type="number" id="monto_ventas_contado" value="{{ $me->monto_ventas_contado or ''}}" required>
        {!! $errors->first('monto_ventas_contado', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('ventas_credito') ? 'has-error' : ''}}">
    <label for="ventas_credito" class="col-md-4 control-label">{{ 'Ventas Credito' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="ventas_credito" type="number" id="ventas_credito" value="{{ $me->ventas_credito or ''}}" required>
        {!! $errors->first('ventas_credito', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('monto_ventas_credito') ? 'has-error' : ''}}">
    <label for="monto_ventas_credito" class="col-md-4 control-label">{{ 'Monto Ventas Credito' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="monto_ventas_credito" type="number" id="monto_ventas_credito" value="{{ $me->monto_ventas_credito or ''}}" required>
        {!! $errors->first('monto_ventas_credito', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('nro_reservas') ? 'has-error' : ''}}">
    <label for="nro_reservas" class="col-md-4 control-label">{{ 'Nro Reservas' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="nro_reservas" type="number" id="nro_reservas" value="{{ $me->nro_reservas or ''}}" required>
        {!! $errors->first('nro_reservas', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('fecha_inicio') ? 'has-error' : ''}}">
    <label for="fecha_inicio" class="col-md-4 control-label">{{ 'Fecha Inicio' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="fecha_inicio" type="date" id="fecha_inicio" value="{{ $me->fecha_inicio or ''}}" required>
        {!! $errors->first('fecha_inicio', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('fecha_cierre') ? 'has-error' : ''}}">
    <label for="fecha_cierre" class="col-md-4 control-label">{{ 'Fecha Cierre' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="fecha_cierre" type="date" id="fecha_cierre" value="{{ $me->fecha_cierre or ''}}" required>
        {!! $errors->first('fecha_cierre', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('estado') ? 'has-error' : ''}}">
    <label for="estado" class="col-md-4 control-label">{{ 'Estado' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="estado" type="number" id="estado" value="{{ $me->estado or ''}}" required>
        {!! $errors->first('estado', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
