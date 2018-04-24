<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="col-md-4 control-label">{{ 'Nombre' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="nombre" type="text" id="nombre" value="{{ $categorium->nombre or ''}}" required>
        {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('color') ? 'has-error' : ''}}">
    <label for="color" class="col-md-4 control-label">{{ 'Color' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="color" type="color" id="color" value="{{ $categorium->color or ''}}" required>
        {!! $errors->first('color', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('precio') ? 'has-error' : ''}}">
    <label for="precio" class="col-md-4 control-label">{{ 'Precio' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="precio" type="number" id="precio" value="{{ $categorium->precio or ''}}" required>
        {!! $errors->first('precio', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('cuota_inicial') ? 'has-error' : ''}}">
    <label for="cuota_inicial" class="col-md-4 control-label">{{ 'Cuota Inicial' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="cuota_inicial" type="number" id="cuota_inicial" value="{{ $categorium->cuota_inicial or ''}}" required>
        {!! $errors->first('cuota_inicial', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('cuota_mensual') ? 'has-error' : ''}}">
    <label for="cuota_mensual" class="col-md-4 control-label">{{ 'Cuota Mensual' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="cuota_mensual" type="number" id="cuota_mensual" value="{{ $categorium->cuota_mensual or ''}}" required>
        {!! $errors->first('cuota_mensual', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('plazo_meses') ? 'has-error' : ''}}">
    <label for="plazo_meses" class="col-md-4 control-label">{{ 'Plazo Meses' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="plazo_meses" type="number" id="plazo_meses" value="{{ $categorium->plazo_meses or ''}}" required>
        {!! $errors->first('plazo_meses', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_proyecto') ? 'has-error' : ''}}">
    <label for="id_vendedor" class="col-md-4 control-label">{{ 'Proyecto' }}</label>
    <div class="col-md-6">
        {!! Form::select('id_proyecto', $proyectos, null, ['class' => 'form-control']) !!}
        {!! $errors->first('id_proyecto', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
