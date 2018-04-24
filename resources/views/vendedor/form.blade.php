<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="col-md-4 control-label">{{ 'Nombre' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="nombre" onblur="aMayusculas(this.value,this.id)" type="text" id="nombre" value="{{ $vendedor->nombre or ''}}" required style="text-transform: uppercase">
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
</div><div class="form-group {{ $errors->has('ci') ? 'has-error' : ''}}">
    <label for="ci" class="col-md-4 control-label">{{ 'Ci' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="ci" type="text" id="ci" value="{{ $vendedor->ci or ''}}" required>
        {!! $errors->first('ci', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_grupo') ? 'has-error' : ''}}">
    <label for="id_vendedor" class="col-md-4 control-label">{{ 'Grupo' }}</label>
    <div class="col-md-6">
        {!! Form::select('id_grupo', $grupos, null, ['class' => 'form-control']) !!}
        {!! $errors->first('id_grupo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>

<script>
    function aMayusculas(obj,id){
        obj = obj.toUpperCase();
        document.getElementById(id).value = obj;
    }
</script>